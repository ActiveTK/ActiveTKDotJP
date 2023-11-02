<?php
  $title = "冪函数の定積分近似計算ツール | ActiveTK.jp";
  $dec = "Web上で冪函数の定積分の近似値を計算できます。JavaScriptで処理されるのでサーバーにアップロードする必要が無く、安全です。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/beki-integration";
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=MML_SVG" nonce="<?=$nonce?>" async></script>
    <script type="text/javascript" nonce="<?=$nonce?>">

      document.addEventListener('DOMContentLoaded', function() {
        UpdateFunc();
        calc();
        _("numn").onchange = function() {
          UpdateFunc();
          calc();
        }
        _("numa").onchange = function() {
          UpdateFunc();
          calc();
        }
        _("numb").onchange = function() {
          UpdateFunc();
          calc();
        }
    }, false);
    function UpdateFunc() {
      _("ma").innerHTML = "<math><msubsup><mo>∫</mo><mn>" + _("numa").value + "</mn><mi>" + _("numb").value + "</mi></msubsup><msup><mi>x</mi><mn>" + _("numn").value + "</mn></msup></mrow></mfenced><mi>d</mi><mi>x</mi>" +
                          "</math><br><br><math><mo>=</mo><mo>(Math.pow(b, n + 1) - Math.pow(a, n + 1)) / (n + 1)</mo></math>";
      MathJax.Hub.Typeset(_("ma"));
    }
    function calc() {
      let a = _("numa").value * 1, b = _("numb").value * 1, n = _("numn").value * 1;
      _("res1").value = (Math.pow(b, n + 1) - Math.pow(a, n + 1)) + "/" + (n + 1);
      _("res2").value = (Math.pow(b, n + 1) - Math.pow(a, n + 1)) / (n + 1);
    }
    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
        <h1>冪函数の定積分近似計算ツール - ActiveTK.jp</h1>
        <p>Web上で冪函数の定積分の近似値を計算できます。</p>
        <form action="" method="POST" id="td">
          <p>
            <math><msubsup><mo>∫</mo><mn>a</mn><mi>b</mi></msubsup><mi>f</mi><mo></mo><mfenced><mrow><mi>x</mi></mrow></mfenced><mi>d</mi><mi>x</mi></math>;
            <math><mi>f</mi><mo></mo><mfenced><mrow><mi>x</mi></mrow></mfenced><mo>=</mo><mrow><msup><mi>x</mi><mn>n</mn></msup></mrow></math>;
          </p><br>
          <p>n = <input type="number" id="numn" step="0.00001" value="2" style="margin: 0px; height: 40px; width: 52px;">,
             a = <input type="number" id="numa" step="0.00001" value="1" style="margin: 0px; height: 40px; width: 52px;">,
             b = <input type="number" id="numb" step="0.00001" value="2" style="margin: 0px; height: 40px; width: 52px;"></p>
          <br>
          <hr size="1" color="#7fffd4">
          ↓↓結果↓↓<br>
          <p id="ma">
            <math><msubsup><mo>∫</mo><mn>a</mn><mi>b</mi></msubsup><mi>f</mi><mo></mo><mfenced><mrow><mi>x</mi></mrow></mfenced><mi>d</mi><mi>x</mi></math>;
            <math><mi>f</mi><mo></mo><mfenced><mrow><mi>x</mi></mrow></mfenced><mo>=</mo><mrow><msup><mi>x</mi><mn>n</mn></msup></mrow></math>;
          </p><br>
          分数表記: <input type="text" id="res1" style="margin: 0px; height: 50px; width: 152px;" readonly><br>
          近似値: <input type="text" id="res2" style="margin: 0px; height: 50px; width: 152px;" readonly><br>
        </form>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>