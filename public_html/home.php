<?php

  // 共通変数
  define( "Title", "Home" );
  $dec = "無料で使える、様々なWEBツールをご提供させていただきます。[メモブログ|位置情報特定ツール|HackAll|URL短縮|ファイル解析|QRコード作成|..etc]";

  // ツール表示
  function ViewTool( $ToolName, $ToolURL, $ToolDec ) {
    ?>
      <a href="<?=$ToolURL?>" class="btn btn--blue btn--border-double">
        <h3 style="color:#212529;"><?=$ToolName?></h3>
      </a>
      <br>
      <p><?=$ToolDec?></p>
      <br>
    <?php
  }

?>

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="ActiveTK,activetk.jp,WEBツール,HackAll,位置情報特定ツール,IPアドレス特定博士">
    <title><?=Title?> | ActiveTK.jp</title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta name="description" content="<?=$dec?>">
    <meta name="copyright" content="Copyright &copy; 2020-2022 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ActiveTK5929">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="<?=Title?> | ActiveTK.jp">
    <meta name="twitter:description" content="<?=$dec?>">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="<?=Title?> | ActiveTK.jp">
    <meta property="og:description" content="<?=$dec?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.activetk.jp/">
    <meta property="og:site_name" content="<?=Title?> | ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="canonical" href="https://www.activetk.jp/">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <script type="text/javascript" nonce="<?=nonce?>">var Ease={easeInOut:e=>e<.5?4*e*e*e:(e-1)*(2*e-2)*(2*e-2)+1},duration=500;addEventListener("DOMContentLoaded",()=>{document.querySelectorAll('a[href^="#"]').forEach(function(e){e.addEventListener("click",function(t){var n=e.getAttribute("href"),o=document.documentElement.scrollTop||document.body.scrollTop,r=document.getElementById(n.replace("#",""));if(r){t.preventDefault(),t.stopPropagation();var a=pageYOffset+r.getBoundingClientRect().top-115,i=performance.now(),d=function(e){var t=(e-i)/duration;t<1?(scrollTo(0,o+(a-o)*Ease.easeInOut(t)),requestAnimationFrame(d)):window.scrollTo(0,a)};requestAnimationFrame(d)}})})});</script>
    <script type="text/javascript" nonce="<?=nonce?>" src="https://code.activetk.jp/ActiveTK.min.js" charset="UTF-8"></script>
    <link href="https://www.activetk.jp/css/index.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body style="background-color:#e6e6fa;">
    <noscript>
      <div title="NO SCRIPT ERROR" style="background-color:#404ff0;color:#ff4500;" align="center">
        <h1>No JavaScript Error.</h1>
      </div>
    </noscript>
    <?=Get_Header()?>
    <div align="center" class="mainobject" style="position:fixed;overflow:scroll;color:#000000;z-index:1;top:12%;left:0px;width:100%;height:88%;">
      <br>
      <h1>Get Started - ActiveTK.jp</h1>
      <br>
      <?=ViewTool( "URL短縮ツール「rinu.cf」", "https://rinu.cf/", "URLを貼り付け、「短縮」を押すだけで簡単にURLを短縮できます。<br>Googleセーフブラウジングを用いた安全危険判定機能付きです。" )?>
      <?=ViewTool( "QRコード作成ツール", "https://www.activetk.jp/tools/qrcode", "好きな文字列やURLを指定して2次元QRコードを作成できます。" )?>
      <?=ViewTool( "簡易現在時刻ビュワー", "https://www.activetk.jp/tools/time", "画面に大きく現在時刻を表示します。スクリーンセーバーにいかがでしょうか？" )?>
      <?=ViewTool( "画像形式変換ツール", "https://www.activetk.jp/tools/image", "画像の形式を、「png」から「jpg」のように変更する事ができます。" )?>
      <?=ViewTool( "擬似乱数生成ツール", "https://www.activetk.jp/tools/rand", "暗号学的に安全なランダムなパスワード用の文字列を生成できます。" )?>
      <?=ViewTool( "URLエンコーダー", "https://www.activetk.jp/tools/url-encode", "指定した文字列をURLエンコードします。サーバーにアップロードされず、JavaScriptで処理するので安全です。" )?>
      <?=ViewTool( "URLデコーダー", "https://www.activetk.jp/tools/url-decode", "指定した文字列をURLデコードします。サーバーにアップロードされず、JavaScriptで処理するので安全です。" )?>
      <?=ViewTool( "Base64エンコーダー", "https://www.activetk.jp/tools/base64-encode", "指定した文字列をbase64エンコードします。サーバーにアップロードされず、JavaScriptで処理するので安全です。" )?>
      <?=ViewTool( "Base64デコーダー", "https://www.activetk.jp/tools/base64-decode", "指定した文字列をbase64デコードします。サーバーにアップロードされず、JavaScriptで処理するので安全です。" )?>
      <?=Get_Last()?>
    </div>
    <script nonce="<?=nonce?>" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script nonce="<?=nonce?>">function collapse_handler(e){let t=document.getElementById("navbar-collapse");new bootstrap.Collapse(t,{toggle:!0})}document.addEventListener("DOMContentLoaded",()=>{document.getElementById("toggler-button").addEventListener("click",collapse_handler,!1)});</script>
  </body>
</html>