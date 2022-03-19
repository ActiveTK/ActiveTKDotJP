<?php
  $title = "ペイントWeb | ActiveTK.jp";
  $dec = "ページ上で絵を描くことができます。";
  $root = "https://www.activetk.jp/";
  $url = "https://www.activetk.jp/tools/paintweb";
?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>
    <base href="<?php echo $url; ?>">
    <meta name="ROBOTS" content="ALL">
    <meta name="favicon" content="<?=$root?>icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="<?php echo $dec; ?>">
    <meta name="thumbnail" content="<?=$root?>icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ActiveTK5929">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $dec; ?>">
    <meta name="twitter:image:src" content="<?=$root?>icon/index.jpg">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $dec; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:site_name" content="<?php echo $title; ?>">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="<?=$root?>icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="canonical" href="<?php echo $url; ?>">
    <link rel="shortcut icon" href="<?=$root?>icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="<?=$root?>icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="<?=$root?>icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="<?=$root?>icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="<?=$root?>icon/index_150_150.ico">
    <script type="text/javascript" charset="UTF-8" nonce="<?=$nonce?>">var mamDraw=[];function StopShake(o){mamDraw.isMouseDown=!1,o.stopPropagation()}function onDown(o){mamDraw.isMouseDown=!0,mamDraw.position.px=o.touches[0].pageX-o.target.getBoundingClientRect().left-mamGetScrollPosition().x,mamDraw.position.py=o.touches[0].pageY-o.target.getBoundingClientRect().top-mamGetScrollPosition().y,mamDraw.position.x=mamDraw.position.px,mamDraw.position.y=mamDraw.position.py,drawLine(),o.preventDefault(),o.stopPropagation()}function onMove(o){mamDraw.isMouseDown&&(mamDraw.position.x=o.touches[0].pageX-o.target.getBoundingClientRect().left-mamGetScrollPosition().x,mamDraw.position.y=o.touches[0].pageY-o.target.getBoundingClientRect().top-mamGetScrollPosition().y,drawLine(),mamDraw.position.px=mamDraw.position.x,mamDraw.position.py=mamDraw.position.y,o.stopPropagation())}function onUp(o){mamDraw.isMouseDown=!1,o.stopPropagation()}function onMouseDown(o){mamDraw.position.px=o.clientX-o.target.getBoundingClientRect().left,mamDraw.position.py=o.clientY-o.target.getBoundingClientRect().top,mamDraw.position.x=mamDraw.position.px,mamDraw.position.y=mamDraw.position.py,drawLine(),mamDraw.isMouseDown=!0,o.stopPropagation()}function onMouseMove(o){mamDraw.isMouseDown&&(mamDraw.position.x=o.clientX-o.target.getBoundingClientRect().left,mamDraw.position.y=o.clientY-o.target.getBoundingClientRect().top,drawLine(),mamDraw.position.px=mamDraw.position.x,mamDraw.position.py=mamDraw.position.y,o.stopPropagation())}function onMouseUp(o){mamDraw.isMouseDown=!1,o.stopPropagation()}function drawLine(){mamDraw.context.strokeStyle="#000000",mamDraw.context.lineWidth=5,mamDraw.context.lineJoin="round",mamDraw.context.lineCap="round",mamDraw.context.beginPath(),mamDraw.context.moveTo(mamDraw.position.px,mamDraw.position.py),mamDraw.context.lineTo(mamDraw.position.x,mamDraw.position.y),mamDraw.context.stroke()}function clearCanvas(){mamDraw.context.fillStyle="rgb(255,255,255)",mamDraw.context.fillRect(0,0,mamDraw.canvas.getBoundingClientRect().width,mamDraw.canvas.getBoundingClientRect().height)}function mamGetScrollPosition(){return{x:document.documentElement.scrollLeft||document.body.scrollLeft,y:document.documentElement.scrollTop||document.body.scrollTop}}mamDraw.isMouseDown=!1,mamDraw.position=[],mamDraw.position.x=0,mamDraw.position.y=0,mamDraw.position.px=0,mamDraw.position.py=0,window.addEventListener("load",function(){mamDraw.canvas=document.getElementById("drawcanvas"),mamDraw.canvas.addEventListener("touchstart",onDown),mamDraw.canvas.addEventListener("touchmove",onMove),mamDraw.canvas.addEventListener("touchend",onUp),mamDraw.canvas.addEventListener("mousedown",onMouseDown),mamDraw.canvas.addEventListener("mousemove",onMouseMove),mamDraw.canvas.addEventListener("mouseup",onMouseUp),window.addEventListener("mousemove",StopShake),mamDraw.context=mamDraw.canvas.getContext("2d"),mamDraw.context.strokeStyle="#000000",mamDraw.context.lineWidth=5,mamDraw.context.lineJoin="round",mamDraw.context.lineCap="round",document.getElementById("clearCanvas").addEventListener("click",clearCanvas)});</script>
    <style>canvas#drawcanvas{-ms-touch-action:none;touch-action:none;}a{color:#c71585;position:relative;display:inline-block}a,a:after{transition:.3s}a:after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transform:translateX(-50%)}a:hover:after{width:100%}</style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
  <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>ペイントWeb - ActiveTK.jp</h1>
      <hr size="1" color="#7fffd4">
      <canvas id="drawcanvas" width="1000px" height="450px" style="border:1px solid #000;background-color:#ffffff;"></canvas>
      <br>
      <input type="button" id="clearCanvas" value="クリア" style="width:160px;height:60px;" data-inline="true">
    </div>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
  </body>
</html>