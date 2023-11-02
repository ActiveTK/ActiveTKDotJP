<?php
  $title = "sin/cos/tan近似計算ツール | ActiveTK.jp";
  $dec = "Web上でsin/cos/tanを計算できます。JavaScriptで処理されるのでサーバーにアップロードする必要が無く、安全です。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/sin-cos-tan";
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
    <script type="text/javascript" nonce="<?=$nonce?>">

      document.addEventListener('DOMContentLoaded', function() {
        _("td").onsubmit = function() {
          _("sin").value = Math.sin(_("numrad").value);
          _("cos").value = Math.cos(_("numrad").value);
          if (_("num").value != 90)
            _("tan").value = Math.tan(_("numrad").value);
          else
            _("tan").value = "けいさんふのー";
          return false;
        }
        _("num").onchange = function() {
          let radian = _("num").value * ( Math.PI / 180 );
          _("numrad").value = radian;
        }
        _("numrad").onchange = function() {
          var degree = _("numrad").value * ( 180 / Math.PI );
          _("num").value = degree;
        }
    }, false);

    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
        <h1>sin/cos/tan近似計算ツール - ActiveTK.jp</h1>
        <p>Web上でsin/cos/tanを計算できます。</p>
        <form action="" method="POST" id="td">
          <p>sin(n)/cos(n)/tan(n); n = <input type="number" id="num" step="0.000000000000000001" value="45" style="margin: 0px; height: 40px; width: 52px;">°= <input type="number" step="0.000000000000000001" id="numrad" value="0.7853981633974483" style="margin: 0px; height: 40px; width: 152px;">rad</p>
          <br>
          <input type="submit" value="計算" style="height:60px;width:140px;">
          <hr size="1" color="#7fffd4">
          ↓↓結果↓↓<br>
          sin: <input type="text" id="sin" style="margin: 0px; height: 50px; width: 152px;" readonly><br>
          cos: <input type="text" id="cos" style="margin: 0px; height: 50px; width: 152px;" readonly><br>
          tan: <input type="text" id="tan" style="margin: 0px; height: 50px; width: 152px;" readonly><br>
        </form>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>