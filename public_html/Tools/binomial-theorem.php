<?php
  $title = "二項定理展開ツール | ActiveTK.jp";
  $dec = "Web上で二項定理の計算ができます。JavaScriptで処理されるのでサーバーにアップロードする必要が無く、安全です。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/binomial-theorem.php";
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=MML_SVG" nonce="<?=$nonce?>"></script>
    <script type="text/javascript" nonce="<?=$nonce?>">
      document.addEventListener('DOMContentLoaded', function() {
        UpdateFunc();
        _("td").onsubmit = function () {
          try {
            UpdateFunc();
          } catch(e) { alert(e); }
          return false;
        }
        _("calc").onclick = function () {
          try {
            UpdateFunc();
          } catch(e) { alert(e); }
        }
      }, false);
      function UpdateFunc() {
        try {
          if (!_("numn").value)
            _("ma").innerHTML = "数値を入力して下さい。";
          else {
            let math = "<math>";
            math += "<mrow><msup><mi>(a+b)</mi><mn>" + _("numn").value + "</mn></msup></mrow><mo>=</mo><mrow>";
            for (let i = BigInt(_("numn").value); i >= 0n; i--)
            {
              let a = BigInt(i), b = BigInt(BigInt(_("numn").value) - i);
              let keisuu = GetKeisuu(BigInt(_("numn").value), a);
              if (i != BigInt(_("numn").value))
                math += "<mo>+</mo>";
              if (keisuu !== 1n)
                math += "<mi>" + keisuu + "</mi>";
              if (a == 0n) {}
              else if (a == 1n)
                math += "<msup><mi>a</mi></msup>";
              else
                math += "<msup><mi>a</mi><mn>" + a + "</mn></msup>";
              if (b == 0n) {}
              else if (b == 1n)
                math += "<msup><mi>b</mi></msup>";
              else
                math += "<msup><mi>b</mi><mn>" + b + "</mn></msup>";
              if (b != 0n && b % 6n == 0n)
                math += "</mrow></math><br><math><mrow>";
            }
            math += "</mrow></math>";
            _("ma").innerHTML = math;
            MathJax.Hub.Typeset(_("ma"));
          }
        } catch (e) { alert(e); }
      }
      function GetKeisuu(a, b) {
        let bunnbo = 1n;
        for (let f = 1n; f <= b; f++)
          bunnbo *= f;
        let bunnshi = 1n;
        for (let t = b; t > 0n; t--)
          bunnshi *= a - (b - t);
        return bunnshi / bunnbo;
      }
    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
        <h1>二項定理展開ツール - ActiveTK.jp</h1>
        <p>Web上で二項定理(パスカルの三角形)の計算ができます。公式を導きたい場合に利用して下さい。</p>
        <form action="" method="POST" id="td">
          <p>
            <math><mrow><msup><mi>(a+b)</mi><mn>n</mn></msup></mrow></math>
          </p>
          <p>n = <input type="number" id="numn" value="3" style="margin: 0px; height: 40px; width: 52px;"></p>
          <br>
          <input type='button' id="calc" value='計算！' style="height:60px;width:140px;">
          <hr size="1" color="#7fffd4">
          ↓↓結果↓↓<br>
          <p id="ma"></p>
        </form>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>