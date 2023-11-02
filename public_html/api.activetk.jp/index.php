<?php

  /////////////////////////////////////////////////
  /*!
   * API of activetk.jp
   * Copyright 2023 ActiveTK. All rights reserved.
   */
  /////////////////////////////////////////////////

  require "/home/activetk/require/Config.php";

  if ( empty( $_SERVER['HTTPS'] ) && !isset( $_GET["no-ssl"] ) ) {
    header( "Location: https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" );
    die();
  }
  else if ( !isset( $_GET["no-ssl"] ) )
    header( "Strict-Transport-Security: max-age=63072000; includeSubdomains; preload" );

  header( "Access-Control-Allow-Origin: *" );

  function error_with_die( int $statuscode = 400, string $message = "" ) {
    http_response_code( $statuscode );
    header( "Content-Type: application/json;charset=UTF8" );
    echo json_encode( array( "status"=>"Error", "type"=>$statuscode, "details"=>$message ), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    die();
  }

  function CreateNonce() {
    $bytes = openssl_random_pseudo_bytes( 18 );
    $str = bin2hex( $bytes );
    $usestr = '1234567890abcdefghijklmnopqrstuvwxyz';
    $str2 = substr( str_shuffle( $usestr ), 0, 12 );
    define( "nonce", substr( str_shuffle( $str . $str2 ) , 0, -12 ) );
    header( "Content-Security-Policy: script-src 'nonce-" . nonce . "' 'strict-dynamic' 'unsafe-eval';" );
  }

  function comUI(string $MessageForPC = "", string $MessageForMobile = "") {
    if (empty($MessageForPC))
      return "<div class='Msg4MB'>{$MessageForMobile}</div>";
    else if (empty($MessageForMobile))
      return "<div class='Msg4PC'>{$MessageForPC}</div>";
    return "<div class='Msg4PC'>{$MessageForPC}</div>" .
           "<div class='Msg4MB'>{$MessageForMobile}</div>";
  }

  function Get_Last() {
  ?>
      <p>
        <a href="https://www.activetk.jp/home" style="color:#00ff00 !important;">ホーム</a>・
        <a href="https://www.activetk.jp/about" style="color:#0403f9 !important;">本サイトについて</a>・
        <a href="https://www.activetk.jp/license" style="color:#ffa500 !important;">利用規約</a>・
        <a href="https://www.activetk.jp/privacy" style="color:#ff00ff !important;">プライバシー</a>・
        <a href="https://profile.activetk.jp/" style="color:#0403f9 !important;">開発者</a>
        (c) 2023 ActiveTK.
      </p>
      <?=comUI(
        "<p>Onion Mirror: " .
        "  <a href='http://activetkqz22r3lvvvqeos5qnbrwfwzjajlaljbrqmybsooxjpkccpid.onion/'>" .
        "    <span style='color:#000000 !important;'>http://<b>ActiveTK</b>qz22r3lvvvqeos5qnbrwfwzjajlaljbrqmybsooxjpkccpid.onion</span>".
        "  </a>" .
        "</p>", "")
      ?>

  <?php
  }
    
  function CREATE_MIN_CODE() {
    return substr(base_convert(sha1(md5(uniqid()).md5(microtime())), 16, 36), 0, 6);
  }

  if ( isset( $_GET["request"] ) && strtolower( $_GET["request"]) == "twitter-leaked200" )
  {
    if ( !isset( $_GET["user"] ) || !is_string( $_GET["user"] ) || empty( $_GET["user"] ) )
      error_with_die( 400, "GET parameter `user` is required." );
    
    $UID = basename( trim( $_GET["user"] ) );
    if ( substr( $UID, 0, 1 ) == "@" )
      $UID = substr( $UID, 1 );

    if ( strlen( $UID ) < 4 )
      error_with_die( 400, "ScreenName must be more than 4 chars." );

    if ( stripos( file_get_contents("/home/activetk/data/ActiveTKDotJP/v-accounts.txt"), $UID . "\r" ) !== false )
    {
      header( "Content-Type: application/json;charset=UTF8" );
      exit(
        json_encode(
          array( "status"=>"Leaked", "ScreenName"=>$UID ),
          JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        )
      );
    }

    header( "Content-Type: application/json;charset=UTF8" );
    exit(
      json_encode(
        array( "status"=>"Good", "ScreenName"=>$UID ),
        JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
      )
    );

    exit();
  }
  else if ( isset( $_GET["request"] ) && strtolower( $_GET["request"]) == "urlmin/get" )
  {
    if ( !isset( $_GET["code"] ) || !is_string( $_GET["code"] ) || empty( $_GET["code"] ) )
      error_with_die( 400, "GET parameter `code` is required." );

    if ( strlen( $_GET["code"] ) > 100 || !preg_match( "/^[a-zA-Z0-9]+$/", $_GET["code"] ) )
      error_with_die( 400, "GET parameter `code` must be matched with /^[a-zA-Z0-9]+$/." );

    $row = false;

    try {
      $dbh = new PDO(DSN, DB_USER, DB_PASS);
      $stmt = $dbh->prepare('select * from urlmin_url where code = ?;');
      $stmt->execute( [$_GET["code"]] );
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Throwable $e) {
      error_with_die( 500, "SQL Error." );
    }

    if ( $row == false )
      error_with_die( 404, "No such a code." );

    header( "Content-Type: application/json;charset=UTF8" );
    $data = @json_decode(@file_get_contents("https://ipinfo.io/" . $row["makeip"] . "?token=43830721110593"), true);
    if ( !isset( $data["country"] ) ) $data["country"] = "";
    if ( !isset( $data["region"] ) ) $data["region"] = "";
    if ( !isset( $data["city"] ) ) $data["city"] = "";
    if ( !isset( $data["org"] ) ) $data["org"] = "";
    if ( !isset( $data["timezone"] ) ) $data["timezone"] = "";

    $Creator = array(
      "IPAddress"=>$row["makeip"],
      "HostName"=>gethostbyaddr($row["makeip"]),
      "Location"=>$data["country"] . " / " . $data["region"] . " / " . $data["city"],
      "Organization"=>$data["org"],
      "TimeZone"=>$data["timezone"],
      "MoreInformation"=>"https://ipinfo.io/" . $row["makeip"]
    );

    exit(
      json_encode(
        array( 
          "status"=>"OK",
          "Code"=>$row["code"],
          "LinkURL"=>$row["tourl"],
          "CreatorInfo"=>$Creator,
          "CreatedDateTime"=>date("Y/m/d - M (D) H:i:s", $row["maketime"]),
          "CreatedDateTimeAsUnixTime"=>$row["maketime"],
          "UsedCount"=>$row["usetimes"],
          "LastUsed"=>$row["lastuse"]
        ),
        JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
      )
    );

    exit();
  }
  else if ( isset( $_GET["request"] ) && strtolower( $_GET["request"]) == "urlmin/set" )
  {
    if ( !isset( $_GET["url"] ) || !is_string( $_GET["url"] ) || empty( $_GET["url"] ) )
      error_with_die( 400, "GET parameter `url` is required." );

    $code = CREATE_MIN_CODE();
    $url = $_GET["url"];
    $url = str_replace("\n", "", $url);
    $url = str_replace("\r", "", $url);
    $url = str_replace("\0", "", $url);

    if ( strlen( $url ) < 1 || strlen( $url ) > 255 )
      error_with_die( 400, "The length of GET parameter `url` must be between 1-255." );

    try
    {
      $pdo = new PDO(DSN, DB_USER, DB_PASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $pdo->prepare("insert into urlmin_url(code, tourl, makeip, maketime, usetimes, lastuse) value(?, ?, ?, ?, ?, ?)");
      $stmt->execute([
        $code,
        $url,
        $_SERVER['REMOTE_ADDR'], 
        time(),
        "0",
        "NotUsed"
      ]);
    } catch (\Throwable $e) {
      error_with_die( 500, "SQL Error." );
    }

    header( "Content-Type: application/json;charset=UTF8" );
    exit(
      json_encode(
        array( 
          "status"=>"OK",
          "Code"=>$code,
          "ResultURL"=>"https://rinu.cf/" . $code
        ),
        JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
      )
    );

    exit();
  }
  else
  {
    CreateNonce();
    $nonce = nonce;
    require_once( "../Error/404/index.php" );
    exit();
  }
