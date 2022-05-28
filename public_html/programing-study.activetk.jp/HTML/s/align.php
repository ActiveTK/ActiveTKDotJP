<?php

  require_once("/home/activetk/activetk.jp/public_html/programing-study.activetk.jp/_base.php");

?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>HTMLで左寄せ・中央寄せ・右寄せする方法 | プログラミング自習室 | ActiveTK.jp</title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://programing-study.activetk.jp/images/logo_256x256.ico">
    <meta name="description" content="HTMLで左寄せ・中央寄せ・右寄せする方法についてまとめました。">
    <meta property="og:title" content="HTMLで左寄せ・中央寄せ・右寄せする方法 | プログラミング自習室 | ActiveTK.jp">
    <meta property="og:description" content="HTMLで左寄せ・中央寄せ・右寄せする方法についてまとめました。">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="HTMLで左寄せ・中央寄せ・右寄せする方法 | プログラミング自習室 | ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="/lang/index.png">
    <?=GetDefaultHeaders()?>
  </head>
  <body style="background-color:#e6e6fa;text:#363636;">
    <div align="center">
      <div class="main" style="background-color:#00ffEE;color:#ffffff;">
        <br>
        <div align="center"><span class="welcomemsg">　<b>プログラミング自習室</b>　</span></div>
        <br>
      </div>

      <br>

      <div class="main">

        <span class="titles"><span class="inpblue"><b>HTMLで左寄せ・中央寄せ・右寄せする方法</b></span></span>

        <p>HTMLで左寄せ・中央寄せ・右寄せする方法についてまとめてみました。</p>

        <hr>

        <?=GetAdHere()?>

        <br>
        <hr>

        <div class="main">
          <span class="titles"><span class="inpgreen">align属性を使用する</span></span>
          <p><span class="inpblue">div要素</span>などの要素にalign属性を指定すると、左寄せ・中央寄せ・右寄せを行う事ができます。</p>
          <div class="code" align="center">
            <?=htmlspecialchars("<div align=\"left\">左寄せ</div>")?><br>
            <?=htmlspecialchars("<div align=\"center\">中央寄せ</div>")?><br>
            <?=htmlspecialchars("<div align=\"right\">右寄せ</div>")?><br>
          </div>
          <div align="left">左寄せ</div>
          <div align="center">中央寄せ</div>
          <div align="right">右寄せ</div>
        </div>

        <hr>

      </div>

      <br>
      <?=GetLast()?>
  </body>
</html>
