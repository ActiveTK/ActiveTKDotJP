<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="ActiveTK,activetk.jp,WEBツール,現在時刻">
    <title>簡易現在時刻ビュワー | ActiveTK.jp</title>
    <base href="https://www.activetk.jp/tools/time">
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="簡易現在時刻ビュワーです。">
    <meta name="copyright" content="Copyright &copy; 2022 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="簡易現在時刻ビュワー">
    <meta name="twitter:description" content="簡易現在時刻ビュワーです。">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="簡易現在時刻ビュワー">
    <meta property="og:description" content="簡易現在時刻ビュワーです。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.activetk.jp/tools/time">
    <meta property="og:site_name" content="簡易現在時刻ビュワー">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="canonical" href="https://www.activetk.jp/tools/time">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <style>a{color: #00ff00;position: relative;display: inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
    <?=Get_Default()?>
    <script type="text/javascript" nonce="<?=$nonce?>">function clock(){document.getElementById("view_clock").innerHTML=getNow()} function getNow(){var e=new Date;return"現在時刻:<span style='color:#33bbff;'>"+e.getFullYear()+"年"+(e.getMonth()+1)+"月"+e.getDate()+"日"+e.getHours()+"時"+e.getMinutes()+"分"+e.getSeconds()+"秒</span>"} setInterval("clock()",100)</script>
  </head>
  <body style="background-color:#e6e6fa;text:#363636;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center">
      <br><br>
      <h1><span id="view_clock">現在取得中です。。</span></h1>
      <br>
      <p>アクセス時刻: <?=date("Y/m/d - M (D) H:i:s")?> (UNIXTIME:<?=time()?>)</p>
      <pre>date("Y/m/d - M (D) H:i:s")</pre>
      <br>
    </div>
    <div align="center"><?=Get_Last()?></div>
  </body>
</html>