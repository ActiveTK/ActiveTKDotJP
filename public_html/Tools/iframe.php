<!DOCTYPE html>
<?php
  define( "Title", "Iframe君" );
  $dec = "指定されたページをIframeで表示します。";
?>

<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage">
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
    <meta property="og:site_name" content="<?=Title?> | ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <script type="text/javascript">var scy="OK",scys="OK";function gp(t,e){e||(e=location.href),t=t.replace(/[\[\]]/g,"\\$&");var n=new RegExp("[?&]"+t+"(=([^&#]*)|&|#|$)").exec(e);return n?n[2]?decodeURIComponent(n[2].replace(/\+/g," ")):"NO2":"NO"}function _(t){return document.getElementById(t)}var site=gp("url");function yt(){let t=prompt("埋め込みたいYouTubeの動画の\n「https://www.youtube.com/watch?v=」からの部分を入力してください。");t&&(_("startx").src="https://www.youtube.com/embed/"+t)&&(_("ur").value="https://www.youtube.com/embed/"+t)}site&&"NO"!=site&&"NO2"!=site||(site="about:blank"),onload=function(){_("startx").src=site+"#779642718",_("ur").value=site,_("startx").width=innerWidth-25,_("startx").height=innerHeight-75;if(matchMedia&&matchMedia('(max-device-width: 640px)').matches)_("smh").innerHTML="<br>"};function ch(){_("startx").src=_("ur").value}function sch(){"OK"==scy?(_("startx").sandbox="allow-top-navigation allow-popups",scy="NG",_("scri").innerHTML="[JavaScriptを有効にする]"):(_("startx").removeAttribute("sandbox"),scy="OK",_("scri").innerHTML="[JavaScriptを無効にする]")}</script>
    <style>a{color: #00ff00;position: relative;display: inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#000000;">
    <div align="center"><input type='text'  placeholder='iframeのURL' size='42' id="ur" value="about:blank"><button onclick="ch()">[適用]</button></div>
    <iframe src="about:blank" id="startx" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <a href='javascript:yt();'>[YouTubeの動画を埋め込む]</a><a href='javascript:sch();'><div id="scri">[JavaScriptを無効にする]</div></a><div id="smh"></div>
    <div align="right" style="position: fixed;bottom: 0px;right: 0px;"><?=Get_Last()?></div>
  </body>
</html>