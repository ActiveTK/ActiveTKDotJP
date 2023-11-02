<?php
  $title = "ローマ数字変換ツール | ActiveTK.jp";
  $dec = "Webで数字をローマ数字の表記に変換できるツールです。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/ruijyou";
?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>
    <base href="<?php echo $url; ?>">
    <meta name="robots" content="All">
    <meta name="favicon" content="<?=$root?>icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="<?php echo $dec; ?>">
    <meta name="thumbnail" content="<?=$root?>icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
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
    <script src="https://code.activetk.jp/ActiveTK.min.js" type="text/javascript" charset="UTF-8" nonce="<?=$nonce?>"></script>
    <script type="text/javascript" nonce="<?=$nonce?>">window.onload=function(){_("copy").onclick=function(){atk.copy(_("savek").value),_("copyk").innerHTML="コピーしました！"},_("td").onsubmit=function(){try{_("savek").value=function(n){if(n<1||n>3999)throw"not accepted";const o={M:1e3,CM:900,D:500,CD:400,C:100,XC:90,L:50,XL:40,X:10,IX:9,V:5,IV:4,I:1};let t="";for(const c in o){const e=o[c];for(;n>=e;)t+=c,n-=e}return t}(_("num").value)}catch(n){_("savek").value="ローマ数字で表記できるのは、1以上4000未満の数字です。"}return!1}};</script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>ローマ数字変換ツール | ActiveTK.jp</h1>
      <p>Webで数字をローマ数字の表記に変換できるツールです。</p>
      <hr size="1" color="#7fffd4">
      <form action="" method="POST" id="td">
        <p>変換したい数: <input type="number" id="num" style="margin: 0px; height: 40px; width: 52px;"></p>
        <br>
        <input type="submit" value="変換" style="height:60px;width:140px;">
        <hr size="1" color="#7fffd4">
        ↓↓結果↓↓<br>
        <textarea rows="14" id="savek" style="margin: 0px; height: 140px; width: 542px;font-size:4rem;"></textarea>
        <br>
        <input type="button" value="コピー" id="copy" style="height:60px;width:140px;"><span id="copyk"></span>
      </form>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>