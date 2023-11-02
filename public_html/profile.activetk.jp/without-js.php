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

  if ( !isset( $_SERVER['HTTP_USER_AGENT'] ) )
    define( 'Phone', false );
  else if (
    (
      strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false
    ) &&
    (
      strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false
    ) ||
    (
      strpos( $_SERVER['HTTP_USER_AGENT'], 'iPhone' ) !== false
    )
  )
    define( 'Phone', true );
  else
    define( 'Phone', false );

  function com($ForPC, $ForMobile) {
    if (Phone)
      return $ForMobile;
    else
      return $ForPC;
  }

?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>ActiveTK. | ActiveTK.jp</title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="noindex, nofollow">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta name="description" content="ActiveTK.のプロフィールページです。">
    <meta name="copyright" content="Copyright &copy; 2020-2022 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ActiveTK5929">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="プロフィール | ActiveTK.jp">
    <meta name="twitter:description" content="ActiveTK.のプロフィールページです。">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="プロフィール | ActiveTK.jp">
    <meta property="og:description" content="ActiveTK.のプロフィールページです。">
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
    <script src="https://code.activetk.jp/ActiveTK.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V1CPYP07HP"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-V1CPYP07HP');</script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>a{color:#00ff00;position:relative;display:inline-block;transition:.3s;}a::after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transition:.3s;transform:translateX(-50%);}a:hover::after{width:100%;}</style>
    <style>
    
      .command {
        font-size: 1.5rem;
      }

      .result {
        font-size: 1rem;
      }

      .navbar-toggler .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,0,0,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
      }

      @font-face {
        font-family: 'KikaiChokokuJISMd';
        src: url(https://www.activetk.jp/font/KikaiChokokuJIS-Md.otf);
      }

      .thankyou {
        font-size: 4rem;
      }

      .tyoukokufont {
        font-family: KikaiChokokuJISMd;
      }

    </style>
    <script>
    
      window.onload = function() {
        _("att").innerText = "@";
        _("att3").innerText = "@";
        _("ml").href = "mailto:webmaster" + "@activetk.jp";
        _("ml2").href = "mailto:webmaster" + "@activetk.jp";
      }

    </script>
  </head>
  <body style="background-color:#080808;color:#00BB00">

    <div style="background-color:#6495ed;color:#00BB00;" id="headtitles">
      <nav class="navbar navbar-expand-lg p-nextchatcolor" style="background-color:#6495ed;color:#00BB00;z-index:5;top:0px;left:0px;width:100%;height:12%">
        <div class="container-fluid">
          <span class="navbar-brand" style="color:#000000;">ActiveTK.</span>
          <button class="navbar-toggler" id="toggler-button" type="button" data-bs-toggle="collapse" data-bs-target="navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="background-color:#6495ed;color:#00BB00;">
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" aria-current="page" href="#whoami" style="color:#FF0000;">/AboutMe</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" aria-current="page" href="#skill" style="color:#FF55FF;">/MySkills</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="#works" style="color:#0000FF;">/Works</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="#accounts" style="color:#00FF00;">/Accounts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="#pgp">/PGP</a>
              </li>
            </ul>
          </div>
        </div>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
      </nav>
    </div>

    <div class="main" align="center">
      <br><br>
      <div id="whoami">
        <p class="command">$ /AboutMe</p>
        <h2>
          <img style="width:40px;height:40px;" src="https://www.activetk.jp/icon/activetk-v2_40x40.png">
          <span style="color:#008080;">ActiveTK.</span>
        </h2>
        <p class="result">情報セキュリティやダークウェブなどに<?=com("", "<br>")?>興味がある学生です。</p>
        <p class="result">趣味はプログラミングと法律勉強です。</p>
        <p class="result">得意な分野はWeb開発からダークウェブの調査や<?=com("", "<br>")?>Bitcoinの追跡まで多岐に渡ります。</p>
      </div>
      <div id="skill">
        <p class="command">$ /MySkills</p>
        <table border="1">
          <tr>
            <th>内容</th>
            <th>具体例</th>
            <th>得意度(☆☆☆☆☆)</th>
          </tr>
          <tr>
            <td>Web開発</td>
            <td>HTMLやJavaScript、CSSを利用したウェブサイト制作</td>
            <td>★★★★★</td>
          </tr>
          <tr>
            <td>バックエンド開発</td>
            <td>PHPでのサーバーサイド構築</td>
            <td>★★★★☆</td>
          </tr>
          <tr>
            <td>アプリ開発</td>
            <td>C#でのWindowsアプリ(.NET)開発</td>
            <td>★★★★☆</td>
          </tr>
          <tr>
            <td>SQL管理</td>
            <td>PHPを用いたMySQLのDB操作など</td>
            <td>★★★★☆</td>
          </tr>
        </table>
        <br>
      </div>
      <div id="works">
        <p class="command">$ /Works</p>
        <p class="result">仕事のご依頼は<a href="mailto:webmaster@activetk.jp" id="ml2">メール</a>でお願い致します。<?=com("", "<br>")?>料金やお支払い方法はご相談下さい。</p>
        <p class="result">Webサイトの制作やアプリ開発、<?=com("", "<br>")?>Bitcoinの追跡などをお受けできます。</p>
        <p class="result">なお、法執行機関からのご依頼は<?=com("", "<br>")?>無償でお受けします。</p>
      </div>
      <div id="accounts">
        <p class="command">$ /Accounts</p>
        <p class="result">Twitter <a href="https://twitter.com/ActiveTK5929" target="_blank">@ActiveTK5929</a></p>
        <p class="result">Github <a href="https://github.com/ActiveTK" target="_blank">/ActiveTK</a></p>
        <p class="result">Mail <a href="mailto:webmaster@activetk.jp" id="ml">webmaster@activetk.jp</a></p>
        <p class="result">Keybase <a href="https://keybase.io/activetk" target="_blank">activetk</a></p>
        <p class="result">Element <a href="https://matrix.to/#/@psnt00:matrix.org" target="_blank">@psnt00:matrix.org</a></p>
      </div>
      <div id="pgp">
        <p class="command">$ /PGP</p>
<pre style="width:<?=com(30, 90)?>%;text-align:left;" align="left">-----BEGIN PGP PUBLIC KEY BLOCK-----
Comment: User-ID:	ActiveTK. &lt;webmaster<span id="att3">＠</span>activetk.jp&gt;
Comment: Created:	2022/03/29 11:13
Comment: Type:	4,096-bit RSA (secret key available)
Comment: Usage:	Signing, Encryption, Certifying User-IDs, SSH Authentication
Comment: Fingerprint:	214430038FE34F3BEC7C128B24319222EC4A45B2


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
Gg==
=yEXf
-----END PGP PUBLIC KEY BLOCK-----
</pre>
      </div>
      <div id="thanks">
        <p class="command">$ /Thanks</p>
        <p class="tyoukokufont thankyou">Thank You</p>
        <p class=" tyoukokufont result">For Watching My Website!</p>
        <pre class="tyoukokufont">※<a href="https://ja.wikipedia.org/wiki/Coinhive%E4%BA%8B%E4%BB%B6" target="_blank">Coinhive事件</a>の勝訴時に利用された、<?=com("", "\n")?><a href="https://font.kim/" target="_blank">機械彫刻用標準書体フォント</a>を使用しています。</pre>
      </div>
    </div>
    <div style="background-color:#6495ed;color:#0f0f0f;">
      <div id="footer" style="align:center;text-align:center;">

        <br>

        <hr>

        <p class="result">
          We are Anonymous. We are Legion.<br>
          We do not forgive. We do not forget.<br>
          Expect us.
        </p>

        <hr>

        <p class="result">
          <a href="https://www.activetk.jp/home" style="color:#00ff00 !important;">ホーム</a>・
          <a href="https://www.activetk.jp/about" style="color:#0403f9 !important;">本サイトについて</a>・
          <a href="https://www.activetk.jp/license" style="color:#ffa500 !important;">利用規約</a>・
          <a href="https://www.activetk.jp/privacy" style="color:#ff00ff !important;">プライバシーに関する声明</a>
            &copy; 2022 ActiveTK.</p>

        <?=com("<p class='result'>Onion Mirror: <a href='http://activetkqz22r3lvvvqeos5qnbrwfwzjajlaljbrqmybsooxjpkccpid.onion/'><span style='color:#000000 !important;'>http://<b>ActiveTK</b>qz22r3lvvvqeos5qnbrwfwzjajlaljbrqmybsooxjpkccpid.onion</span></a></p>", "")?>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>function collapse_handler(e){let t=document.getElementById("navbar-collapse");new bootstrap.Collapse(t,{toggle:!0})}document.addEventListener("DOMContentLoaded",()=>{document.getElementById("toggler-button").addEventListener("click",collapse_handler,!1)});</script>
  </body>
</html>
