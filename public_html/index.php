<?php

  /*!
   *  Home - ActiveTK.jp
   *  (c) 2022 ActiveTK.
   */

  // 設定ファイル読み込み
  require "/home/activetk/require/Config.php";

  // ヘッダー処理
  if ( empty( $_SERVER['HTTPS'] ) && !isset( $_GET["no-ssl"] ) ) {
    header( "Location: https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" );
    die();
  }
  else if ( !isset( $_GET["no-ssl"] ) )
    header( "Strict-Transport-Security: max-age=63072000; includeSubdomains; preload" );
  if ($_SERVER['HTTP_HOST'] == "activetk.jp") {
    header( "Location: https://www.activetk.jp{$_SERVER['REQUEST_URI']}" );
    die();
  }
  header( "X-Frame-Options: deny" );
  header( "X-XSS-Protection: 1; mode=block" );
  header( "X-Content-Type-Options: nosniff" );
  header( "X-Permitted-Cross-Domain-Policies: none" );
  header( "Referrer-Policy: same-origin" );

  // スクリプト用のNonce生成関数
  function CreateNonce() {
    $bytes = openssl_random_pseudo_bytes( 18 );
    $str = bin2hex( $bytes );
    $usestr = '1234567890abcdefghijklmnopqrstuvwxyz';
    $str2 = substr( str_shuffle( $usestr ), 0, 12 );
    define( "nonce", substr( str_shuffle( $str . $str2 ) , 0, -12 ) );
    header( "Content-Security-Policy: script-src 'nonce-" . nonce . "' 'strict-dynamic' 'unsafe-eval';" );
  }

  // 管理者への通知
  function NotificationAdmin( string $title = "", string $str = "" ) {
    try{
      $body = '<body style="background-color:#e6e6fa;text:#363636;"><div align="center"><p>【' . htmlspecialchars($title) . '】</p><hr color="#363636" size="2">'. $str .
      '<br><hr color="#363636" size="2"><font style="background-color:#06f5f3;">Copyright &copy; 2022 ActiveTK. All rights reserved.</font></div></body>';
      mb_language("Japanese");
      mb_internal_encoding("UTF-8");
      define( "MAIL_SUBJECT", $title);
      define( "MAIL_BODY", $body);
      define( "MAIL_FROM_ADDRESS", "no-reply@activetk.jp");
      define( "MAIL_FROM_NAME", "no-reply@activetk.jp");
      define( "MAIL_HEADER",
        "Content-Type: text/html; charset=UTF-8 \n".
        "From: " . MAIL_FROM_NAME . "\n".
        "Sender: " . MAIL_FROM_ADDRESS ." \n".
        "Return-Path: " . MAIL_FROM_ADDRESS . " \n".
        "Reply-To: " . MAIL_FROM_ADDRESS . " \n".
        "Content-Transfer-Encoding: BASE64\n");
      @mb_send_mail( ADMIN_MAIL_ADDRESS, MAIL_SUBJECT, MAIL_BODY, MAIL_HEADER, "-f ".MAIL_FROM_ADDRESS );
    }
    catch (Exception $e) { }
  }

  // var_dumpを取得する関数
  function get_vardump($data) {
    ob_start();
    var_dump($data);
    $str = ob_get_contents();
    ob_end_clean();
    return $str;
  }

  // スマホ判定
  if (
      !preg_match( '/' . implode( '|', array( 'Android' ) ) . '/i', $_SERVER['HTTP_USER_AGENT']) &&
      !preg_match( '/' . implode( '|', array( 'iPhone' ) ) . '/i', $_SERVER['HTTP_USER_AGENT']) &&
      !preg_match( '/' . implode( '|', array( 'Windows Phone' ) ) . '/i', $_SERVER['HTTP_USER_AGENT'])
    )
    $issumaho = false;
  else
    $issumaho = true;

  // リクエスト処理
  if ( isset( $_GET["request"] ) && $_GET["request"] != "")
  {

    if ( substr( $_GET["request"] , -1) == "/" )
    {
      header( "Location: https://www.activetk.jp/" . strtolower( substr( $_GET["request"], 0, -1 ) ), true, 301 );
      exit();
    }
    else
      define( "request_path", strtolower( $_GET["request"]) );

    // nonce無しのURIだけ処理
    if ( request_path == "tools/justclock" )
    {
      define( "nonce", "" );
      require_once( "./Tools/justclock.php" );
      exit();
    }
    else if ( request_path == "tools/urlmin" )
    {
      define( "nonce", "" );
      require_once( "./Tools/urlmin.php" );
      exit();
    }
    else if ( request_path == "tools/tokutei" )
    {
      define( "nonce", "" );
      require_once( "./Tools/tokutei.php" );
      exit();
    }
    else if ( request_path == "tools/copyright" )
    {
      define( "nonce", "" );
      require_once( "./Tools/copyright/index.php" );
      exit();
    }
    else if ( request_path == "tools/iframe" )
    {
      define( "nonce", "" );
      require_once( "./Tools/iframe.php" );
      exit();
    }
    else if ( request_path == "tools/windowsupdate" )
    {
      define( "nonce", "" );
      require_once( "./Tools/windowsupdate.php" );
      exit();
    }
    else if ( request_path == "tools/nextip" )
    {
      define( "nonce", "" );
      require_once( "./Tools/nextip.php" );
      exit();
    }

    // nonce生成
    CreateNonce();
    $nonce = nonce;

    if ( request_path == "home" )
      require_once( "./home.php" );
    else if ( request_path == "about" )
      require_once( "./about.php" );
    else if ( request_path == "license" )
      require_once( "./license.php" );
    else if ( request_path == "privacy" )
      require_once( "./privacy.php" );
    else if ( request_path == "contact" )
      require_once( "./contact.php" );
    else if ( request_path == "developer" )
      require_once( "./developer.php" );
    else if ( request_path == "donate" )
      require_once( "./donate.php" );
    else if ( request_path == "report" )
    {
      if ( isset( $_GET["fin"] ) )
      {
        ?>
          <meta name="robots" content="noindex, nofollow">
          <body style="background-color:#e6e6fa;">
            <h1>報告を受け付けました。</h1>
            <p><b>エラー(バグ)をご報告いただき、ありがとうございました。<br>このデータは、<a href="/privacy">プライバシーに関する声明</a>に基づき、サービスの改善に使用させていただきます。</b></p>
            <h3><a href="/home">ホームへ戻る</a></h3>
          </body>
      <?php
        exit();

      }

      if ( !isset( $_GET["data"] ) || empty( $_GET["data"] ) )
        die( "<meta name='robots' content='noindex, nofollow'>エラー報告画面で、エラーが発生しました。 -> (HTTP)GET[\"data\"]　が定義されていない、又はnullです。" );

      $LogFile = "/home/activetk/data/ActiveTKDotJP/UserReport.log";

      $debuginfo = array();

      $debuginfo["Time"] = date("Y/m/d - M (D) H:i:s");
      $debuginfo["Time_Unix"] = microtime(true);

      $debuginfo["IP"] = $_SERVER['REMOTE_ADDR'];

      if ( isset( $_SERVER['HTTP_USER_AGENT'] ) )
        $debuginfo["UserAgent"] = $_SERVER['HTTP_USER_AGENT'];
      else
        $debuginfo["UserAgent"] = "";

      $debuginfo["Error"] = $_GET["data"];

      $a = fopen($LogFile, "a");
      @fwrite( $a, json_encode( $debuginfo ) . "\n" );
      fclose( $a );

      NotificationAdmin("エラーページの報告",
      "<p>送信時刻: " . date("Y/m/d - M (D) H:i:s") . "</p><p>IPアドレス: " . $_SERVER['REMOTE_ADDR'] . "</p><p>UserAgent: " . $debuginfo["UserAgent"] . "</p>" .
      "<hr color='#363636' size='2'><pre>" . htmlspecialchars(get_vardump(json_decode($_GET["data"]))) . "</pre><br>");

      header("Location: /report?fin");
      exit();

    }
    else if ( request_path == "tools/qrcode" )
      require_once( "./Tools/qrcode.php" );
    else if ( request_path == "tools/time" )
      require_once( "./Tools/time.php" );
    else if ( request_path == "tools/image" )
      require_once( "./Tools/image.php" );
    else if ( request_path == "tools/rand" )
      require_once( "./Tools/rand.php" );
    else if ( request_path == "tools/url-encode" )
      require_once( "./Tools/url-encode.php" );
    else if ( request_path == "tools/url-decode" )
      require_once( "./Tools/url-decode.php" );
    else if ( request_path == "tools/base64-encode" )
      require_once( "./Tools/base64-encode.php" );
    else if ( request_path == "tools/base64-decode" )
      require_once( "./Tools/base64-decode.php" );
    else if ( request_path == "tools/english2leet" )
      require_once( "./Tools/english2leet.php" );
    else if ( request_path == "tools/leet2english" )
      require_once( "./Tools/leet2english.php" );
    else if ( request_path == "tools/paintweb" )
      require_once( "./Tools/paintweb.php" );
    else if ( request_path == "tools/download" )
      require_once( "./Tools/download.php" );
    else if ( request_path == "tools/encrypt" )
      require_once( "./Tools/encrypt.php" );
    else if ( request_path == "tools/info" )
      require_once( "./Tools/info.php" );
    else if ( request_path == "tools/tokutei" )
      require_once( "./Tools/tokutei.php" );
    else if ( request_path == "tools/speedtest" )
      require_once( "./Tools/speedtest.php" );
    else if ( request_path == "tools/hash" )
      require_once( "./Tools/hash.php" );
    else if ( request_path == "tools/ruijyou" )
      require_once( "./Tools/ruijyou.php" );
    else if ( request_path == "tools/downchecker" )
      require_once( "./Tools/downchecker.php" );
    else if ( request_path == "tools/learn" )
      require_once( "./Tools/learn.php" );
    else if ( request_path == "400" )
      require_once( "./Error/400/index.php" );
    else if ( request_path == "403" )
      require_once( "./Error/403/index.php" );
    else if ( request_path == "404" )
      require_once( "./Error/404/index.php" );
    else if ( request_path == "418" )
      require_once( "./Error/418/index.php" );
    else if ( request_path == "500" )
      require_once( "./Error/500/index.php" );
    else
      require_once( "./Error/404/index.php" );
  }
  else
  {
    // nonce生成
    CreateNonce();
    $nonce = nonce;
    require_once( "./welcome.php" );
  }

  // ヘッダー描写
  function Get_Header() {
  ?>

    <div align="left" style="background-color:#6495ed;color:#080808;" id="headtitles">
      <nav class="navbar navbar-expand-lg p-nextchatcolor" style="background-color:#6495ed;color:#080808;z-index:5;position:fixed;top:0px;left:0px;width:100%;height:12% !important;">
        <div class="container-fluid">
          <span class="navbar-brand" title="WebTools">ActiveTK.jp</span>
          <button class="navbar-toggler" id="toggler-button" type="button" data-bs-toggle="collapse" data-bs-target="navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="background-color:#6495ed;color:#080808;">
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" aria-current="page" href="/home">ホーム</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" aria-current="page" href="/about">サービス概要</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="/license">利用規約</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="/privacy">プライバシー</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="/donate">寄付</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="/developer">開発者</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="/contact">お問い合わせ</a>
              </li>
            </ul>
          </div>
        </div>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
      </nav>
    </div>

  <?php
  }

  // 著作権表示
  function Get_Last() {
  ?>

    <p>
      <a href="/home" style="color:#00ff00 !important;">ホーム</a>・
      <a href="/about" style="color:#0403f9 !important;">本サイトについて</a>・
      <a href="/license" style="color:#ffa500 !important;">利用規約</a>・
      <a href="/privacy" style="color:#ff00ff !important;">プライバシーに関する声明</a>・
      <a href="/donate" style="color:#4169e1 !important;">寄付</a>
      (c) 2022 ActiveTK.</p>

    <p>Onion Mirror: http://apzjiwz4762353egpdpyyg7nyv5gmifv46bwkc6gdvp3ei2e74ejidyd.onion/</p>

  <?php
  }

  // 共通コード取得
  function Get_Default() {
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V1CPYP07HP" nonce="<?=nonce?>"></script>
    <script nonce="<?=nonce?>">window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-V1CPYP07HP');</script>
    <?php
  }

  // 広告コード取得
  function GetAdHere(string $nonce = "") {
    if (empty($nonce))
    {
      ?>
        <div title="広告">
          <script type="text/javascript">MafRakutenWidgetParam=function() { return{ size:'600x200',design:'slide',recommend:'on',auto_mode:'on',a_id:'3388984', border:'on'};};</script>
          <script type="text/javascript" src="//image.moshimo.com/static/publish/af/rakuten/widget.js"></script>
        </div>
      <?php
    } else {
      ?>
      <div title="広告">
        <script nonce="<?=$nonce?>">
        (function(b,c,f,g,a,d,e){b.MoshimoAffiliateObject=a;
        b[a]=b[a]||function(){arguments.currentScript=c.currentScript
        ||c.scripts[c.scripts.length-2];(b[a].q=b[a].q||[]).push(arguments)};
        c.getElementById(a)||(d=c.createElement(f),d.src=g,
        d.id=a,e=c.getElementsByTagName("body")[0],e.appendChild(d))})
        (window,document,"script","//dn.msmstatic.com/site/cardlink/bundle.js?20220329","msmaflink");
        msmaflink({"n":"Crucial クルーシャル SSD 480GB R:540MB\/s W:500MB\/s 【3年保証・翌日配達送料無料】BX500 SATA 6.0Gb\/s 内蔵2.5インチ 7mm CT480BX500SSD1","b":"","t":"","d":"https:\/\/thumbnail.image.rakuten.co.jp","c_p":"\/","p":["@0_mall\/spd-shop\/cabinet\/ssd\/imgrc0089045992.jpg","@0_gold\/spd-shop\/w600-nekopost-wl.gif","@0_mall\/spd-shop\/cabinet\/04904589\/imgrc0083418866.jpg"],"u":{"u":"https:\/\/item.rakuten.co.jp\/spd-shop\/mcssd480g-bx500\/","t":"rakuten","r_v":""},"v":"2.1","b_l":[{"id":1,"u_tx":"楽天市場で見る","u_bc":"#f76956","u_url":"https:\/\/item.rakuten.co.jp\/spd-shop\/mcssd480g-bx500\/","a_id":3388984,"p_id":54,"pl_id":27059,"pc_id":54,"s_n":"rakuten","u_so":1}],"eid":"T3ovN","s":"xs"});
        </script>
        <div id="msmaflink-T3ovN">リンク</div>
      </div>
      <?php
    }
    /*
      <div title="広告">
        <a href="https://rakkoserver.com/?r=FF75020445" target="_blank">
          <img style="width:320px;height:120px;" src="data:image/png;base64,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">
        </a>
      </div>
    */
    return "";
  }

  /*     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2629549044897718" crossorigin="anonymous" nonce="<?=nonce?>"></script> */
