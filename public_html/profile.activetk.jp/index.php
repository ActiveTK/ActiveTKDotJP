<?php

  /*!
   *  Profile - ActiveTK.jp
   *  (c) 2022 ActiveTK.
   */

  // 設定ファイル読み込み
  require "/home/activetk/require/Config.php";

  // ヘッダー処理
  if ( empty( $_SERVER['HTTPS'] ) ) {
    header( "Location: https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" );
    die();
  }
  header( "Strict-Transport-Security: max-age=63072000; includeSubdomains; preload" );
  header( "X-Frame-Options: deny" );
  header( "X-XSS-Protection: 1; mode=block" );
  header( "X-Content-Type-Options: nosniff" );
  header( "X-Permitted-Cross-Domain-Policies: none" );
  header( "Referrer-Policy: same-origin" );

?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="ActiveTK,activetk.jp,WEBツール,HackAll,位置情報特定ツール,IPアドレス特定博士">
    <title>プロフィール | ActiveTK.jp</title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta name="description" content="">
    <meta name="copyright" content="Copyright &copy; 2020-2022 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ActiveTK5929">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="プロフィール | ActiveTK.jp">
    <meta name="twitter:description" content="">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="プロフィール | ActiveTK.jp">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://profile.activetk.jp/">
    <meta property="og:site_name" content="プロフィール | ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <script type="text/javascript" src="https://code.activetk.jp/ActiveTK.min.js" charset="UTF-8"></script>
    <script src="https://profile.activetk.jp/main.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V1CPYP07HP"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-V1CPYP07HP');</script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2629549044897718" crossorigin="anonymous"></script>
    <style>a{color:#00ff00;position:relative;display:inline-block;transition:.3s;}a::after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transition:.3s;transform:translateX(-50%);}a:hover::after{width:100%;}</style>
    <link href="https://profile.activetk.jp/main.min.css" rel="stylesheet">
  </head>
  <body style="background-color:#6495ed;color:#080808;">
    <noscript>
      <div title="NO SCRIPT ERROR" style="background-color:#404ff0;color:#ff4500;" align="center">
        <h1>No JavaScript Error.</h1>
      </div>
    </noscript>
    <div class="main" id="main">
      <h1 class="big"><span class="command">$&gt; sudo Show WHOAMI</span></h1>
      <p class="superbig"><span id="mynameis" class="littlebig"></span> <span id="myname" class="underline"></span></p>
    </div>
    <div class="dec" id="dec">
      <h1 class="big"><span class="command">$&gt; sudo Show My-Profile</span></h1>
      <p class="littlebig"><span id="MyProfile1" class="underline"></span></p>
      <p class="littlebig"><span id="MyProfile2" class="underline"></span></p>
    </div>
    <div class="history" id="history">
      <h1 class="big"><span class="command">$&gt; sudo Show My-History</span></h1>
      <p class="superlittlebig"><span id="history2019" class="underline"></span></p>
      <p class="superlittlebig"><span id="history2020" class="underline"></span></p>
      <p class="superlittlebig"><span id="history2021" class="underline"></span></p>
    </div>
    <div class="links" id="links">
      <h1 class="big"><span class="command">$&gt; sudo Show My-Websites</span></h1>
      <p class="littlebig">
        <a href="https://twitter.com/ActiveTK5929" target="_blank">
          Twitter
        </a>・
        <a href="https://www.youtube.com/c/ActiveTK" target="_blank">
          YouTube
        </a>・
        <a href="https://github.com/ActiveTK" target="_blank">
          Github
        </a>
      </p>
      <p class="littlebig">
        <a href="m&#97;i&#108;t&#111;:w&#101;&#98;ma&#115;&#116;&#101;&#114;&#64;&#97;&#99;&#116;&#105;v&#101;&#116;k&#46;&#106;&#112;" target="_blank">
          Mail
        </a>・
        <a href="https://rinu.cf/pgp" target="_blank">
          PGP-PublicKEY
        </a>
      </p>
      <p class="littlebig"><span id="welcome" class="welcomemsg"></span></p>
      <p><a href="/home" style="color:#00ff00 !important;">ホーム</a>・<a href="/about" style="color:#0403f9 !important;">本サイトについて</a>・<a href="/license" style="color:#ffa500 !important;">利用規約</a>・<a href="/privacy" style="color:#ff00ff !important;">プライバシーに関する声明</a> (c) 2022 ActiveTK.</p>
    </div>
  </body>
</html>