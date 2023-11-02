<?php

  /////////////////////////////////////////////////
  /*!
   * Base Functions of note.activetk.jp
   * Copyright 2022 ActiveTK. All rights reserved.
   */
  /////////////////////////////////////////////////

  // 設定ファイル読み込み
  require "/home/activetk/require/Config.php";

  // ヘッダー処理
  if ( empty( $_SERVER['HTTPS'] ) && !isset( $_GET["no-ssl"] ) ) {
    header( "Location: https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" );
    die();
  }
  else if ( !isset( $_GET["no-ssl"] ) )
    header( "Strict-Transport-Security: max-age=63072000; includeSubdomains; preload" );
    
  header( "Access-Control-Allow-Origin: https://www.activetk.jp" );

  // ads.txt
  if ( isset( $_GET["request"] ) && strtolower( $_GET["request"]) == "ads.txt" )
  {
    header("Content-Type: text/plain;charset=UTF8");
    echo "google.com, pub-2939270978924591, DIRECT, f08c47fec0942fa0";
    exit();
  }
  else if ( isset( $_GET["request"] ) && strtolower( $_GET["request"]) == "rss.xml" )
  {
    header("Content-Type: application/xml;charset=UTF-8");
    echo "<" . "?"; ?>xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title>ActiveTK's Note</title>
    <link>https://note.activetk.jp/</link>
    <description>情報セキュリティ関連やサイバー犯罪の調査、便利ツールの紹介を行うブログです。</description>
    <lastBuildDate><?=gmdate("D, d M Y H:i:s T")?></lastBuildDate>
    <?php
      $Notes = array();
      try {
        $Notes = (new PDO(DSN, DB_USER, DB_PASS))->query('select * from noteblog where not decinfo = "" order by lastwritetime asc;');
        if ($Notes !== false) { }
        else die("SQLの実行中にエラーが発生しました。");
      } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }

      foreach($Notes as $value)
      {
    ?>
  <item>
    <title><?=$value["pagetitle"]?></title>
    <link>https://note.activetk.jp/<?=$value["httppath"]?></link>
    <guid>https://note.activetk.jp/<?=$value["httppath"]?></guid>
    <pubDate><?=gmdate("D, d M Y H:i:s T", $value["publishtime"])?></pubDate>
  </item>
    <?php
      }
?>
  </channel>
</rss><?php
    exit();
  }
  else if ( isset( $_GET["request"] ) && strtolower( $_GET["request"]) == "sitemap.xml" )
  {
    header("Content-Type: application/xml;charset=UTF-8");
    echo "<" . "?"; ?>xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<url>
  <loc>https://note.activetk.jp</loc>
  <lastmod>2022-12-30T06:31:55+00:00</lastmod>
  <priority>1</priority>
</url>

    <?php
      $Notes = array();
      try {
        $Notes = (new PDO(DSN, DB_USER, DB_PASS))->query('select * from noteblog where not decinfo = "" order by lastwritetime asc;');
        if ($Notes !== false) { }
        else die("SQLの実行中にエラーが発生しました。");
      } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }

      foreach($Notes as $value)
      {
    ?>
<url>
  <loc>https://note.activetk.jp/<?=$value["httppath"]?></loc>
  <lastmod><?=date('c', $value["lastwritetime"])?></lastmod>
  <priority>0.8</priority>
</url>
    <?php } ?>
  </urlset><?php
    exit();
  }

  // SQL Connection
  $dbh = new PDO(DSN, DB_USER, DB_PASS);

  header( "X-Frame-Options: deny" );
  header( "X-XSS-Protection: 1; mode=block" );
  header( "X-Content-Type-Options: nosniff" );
  header( "X-Permitted-Cross-Domain-Policies: none" );
  header( "Referrer-Policy: same-origin" );

  // デバッグ
  function out($Title, $Obj)
  {
    $Title = htmlspecialchars($Title);
    echo "\n\n{$Title}\n\n";
    var_dump($Obj);
  }

  function aais_android() {
    if (!preg_match('/'.implode('|', array('Android')).'/i', $_SERVER['HTTP_USER_AGENT'])) return "no";
    else return "yes";
  }
  function aais_iphone() {
    if (!preg_match('/'.implode('|', array('iPhone')).'/i', $_SERVER['HTTP_USER_AGENT'])) return "no";
    else return "yes";
  }
  function aais_winphone() {
    if (!preg_match('/'.implode('|', array('Windows Phone')).'/i', $_SERVER['HTTP_USER_AGENT'])) return "no";
    else return "yes";
  }
  if (aais_android() == "no" && aais_iphone() == "no" && aais_winphone() == "no")
    $issumaho = false;
  else
    $issumaho = true;
  define( "issumaho", $issumaho );

  function com( $pc, $sm ) {
    if (issumaho) echo $sm;
    else echo $pc;
  }
  function comx( $pc, $sm ) {
    if (issumaho) return $sm;
    else return $pc;
  }
  function GetEcho( $pc, $sm ) {
    if (issumaho) echo $sm;
    else echo $pc;
  }

  function CreateNonce() {
    $bytes = openssl_random_pseudo_bytes( 18 );
    $str = bin2hex( $bytes );
    $usestr = '1234567890abcdefghijklmnopqrstuvwxyz';
    $str2 = substr( str_shuffle( $usestr ), 0, 12 );
    define( "nonce", substr( str_shuffle( $str . $str2 ) , 0, -12 ) );
    header( "Content-Security-Policy: script-src 'nonce-" . nonce . "' 'strict-dynamic' 'unsafe-eval';" );
  }

  function GetAdHere(string $nonce = "") {
    ?>
      <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2939270978924591" data-ad-slot="8240315429" data-ad-format="auto" data-full-width-responsive="true"></ins>
      <script>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
    <?php return "";
  }

  function ShowBasicCSS() { }

  function Get_Last() {

  ?>
    <div class="main bg-gray-900">
      <footer class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="mb-16 grid grid-cols-2 gap-12 pt-10 md:grid-cols-4 lg:grid-cols-6 lg:gap-8 lg:pt-12">
          <div class="col-span-full lg:col-span-2">
            <div class="mb-4 lg:-mt-2 gap-2 text-xl font-bold text-gray-100 md:text-2xl">
              ActiveTK's Note
            </div>
            <p class="mb-6 text-gray-400 sm:pr-8">情報セキュリティ関連やサイバー犯罪の調査、便利ツールの紹介を行うブログ。</p>
          </div>

          <div>
            <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Sitemap</div>
            <nav class="flex flex-col gap-4">
              <div>
                <a href="https://note.activetk.jp" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">ホーム</span></a>
              </div>
              <div>
                <a href="https://note.activetk.jp/about" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">サイト概要</span></a>
              </div>
              <div>
                <a href="https://note.activetk.jp/license" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">利用規約</span></a>
              </div>
            </nav>
          </div>

          <div>
            <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Development</div>
            <nav class="flex flex-col gap-4">
              <div>
                <a href="https://www.activetk.jp" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">ActiveTK.jp</span></a>
              </div>
              <div>
                <a href="https://github.com/ActiveTK/ActiveTKDotJP" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">GitHub</span></a>
              </div>
              <div>
                <a href="http://note.activetkqz22r3lvvvqeos5qnbrwfwzjajlaljbrqmybsooxjpkccpid.onion/" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">Onion Mirror</span></a>
              </div>
            </nav>
          </div>

          <div>
            <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">et cetera</div>
            <nav class="flex flex-col gap-4">
              <div>
                <a href="https://www.activetk.jp/contact" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">お問い合わせ</span></a>
              </div>
              <div>
                <a href="https://www.activetk.jp/privacy" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">プライバシーポリシー</span></a>
              </div>
              <div>
                <a href="https://note.activetk.jp/sitemap.xml" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">sitemap.xml</span></a>
              </div>
            </nav>
          </div>

          <div>
            <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Information</div>
            <nav class="flex flex-col gap-4" style="color:#6495ed;">
              <div>Server-Side Time: {{serverside-time}}</div>
              <div>Cached Date: {{cached-date}}</div>
            </nav>
          </div>

        </div>
        <div class="border-t border-gray-800 py-8 text-center text-sm text-gray-400">(c) 2023 ActiveTK. - Developed with{{space}}<a href="https://www.php.net/" target="_blank"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">PHP8.2</span></a>{{space}}&{{space}}<a href="https://tailwindcss.com/" target="_blank"><span style="color:rgb(156 163 175 / var(--tw-text-opacity)) !important;">Tailwind CSS</span></a></div>
      </footer>
    </div>
  <?php

  }

  // リクエスト処理
  $nonce = "";
  if ( isset( $_GET["request"] ) && $_GET["request"] != "")
  {

    define( "request_path", strtolower( $_GET["request"]) );
    if ( request_path == "" || request_path == "/" )
    {
      define( "nonce", "" );
      require_once( "./Note.Home.php" );
      exit();
    }
    else if ( request_path == "home" )
    {
      header( "Location: https://note.activetk.jp/" );
      exit();
    }

    if ( substr( request_path, -1) == "/" )
    {
      header( "Location: https://note.activetk.jp/" . strtolower( substr( $_GET["request"], 0, -1 ) ), true, 301 );
      exit();
    }
    else
    {

      /* Search File */
      $Note = array();
      try {
        $stmt = $dbh->prepare('select * from noteblog where httppath = ?');
        $stmt->execute([request_path]);
        $resd = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resd !== false) $Note = $resd;
        else
        {
          CreateNonce();
          $nonce = nonce;
          require_once( "../Error/404/index.php" );
          exit();
        }
        unset($resd);
      } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }

      $Note["pvcount"] = sprintf('%010d', $Note["pvcount"] + 1);

      try {
        $stmt = $dbh->prepare("update noteblog set pvcount = ? where localpath = ?;");
        $stmt->execute([
          $Note["pvcount"],
          $Note["localpath"]
        ]);
      } catch (\Throwable $e) { }

      define("NoteInfo", $Note);
      require_once("./Note.Load.php");

      exit();
    }

  }

  define( "nonce", "" );
  require_once( "./Note.Home.php" );
  exit();
