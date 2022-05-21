<?php
  $title = "文字数解析 | ActiveTK.jp";
  $dec = "文字列の文字数や行数などを表示します。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/str-count";
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

       window.onload = function(){
         _("clear").onclick = function() {
           _("save").value = "";
         };
         _("td").onsubmit = function() {
           _('result').style = "display:block;";
           _('len').innerText = _('save').value.length;
           let num;
           num = _('save').value.match(/\r\n/g);
           num = _('save').value.match(/\n/g);
       　　if(num != null)
             _('line').innerText = (num.length + 1) + "";
　　     　else
             _('line').innerText = "1";
           return false;
         };
       }

    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
        <h1>文字数解析 | ActiveTK.jp</h1>
        <p>文字列の文字数や行数などを表示します。</p>
        <form action="" method="POST" id="td">
          <textarea rows="14" id="save" style="margin: 0px; height: 140px; width: 542px;"></textarea>
          <br>
          <input type="submit" value="文字数などを取得" style="height:60px;width:140px;">
          <input type="button" value="クリア" id="clear" style="height:60px;width:140px;">
          <hr size="1" color="#7fffd4">
          <div id="result" style="display:none;">
            ↓↓結果↓↓<br>
            文字数: <b><span id="len"></span></b>文字<br>
            行数: <b><span id="line"></span>行</b>
            <hr size="1" color="#7fffd4">
          </div>
        </form>
    </div>
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>