<?php
  $title = "Base64デコーダー - ActiveTK.CF";
  $dec = "Base64デコーダーです。";
  $root = "https://www.activetk.cf/";
  $url = "{$root}tools/base64-decode.php";
?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="NextChat,nextchat">
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
    <script src="https://code.activetk.cf/ActiveTK.min.js" type="text/javascript" charset="UTF-8"></script>
    <script type="text/javascript"">onload=function(){_("copy").onclick=function(){atk.copy(_("savek").value),_("copyk").innerHTML="コピーしました！"};_("clear").onclick=function(){_("save").value=""};_("td").onsubmit=function(){_('savek').value = new TextDecoder().decode(new Uint8Array(Array.prototype.map.call(atob(_('save').value), c => c.charCodeAt())));return false};}</script>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
        <h2>Base64デコード - ActiveTK.CF</h2>
        <form action="" method="POST" id="td">
          <textarea rows="14" id="save" style="margin: 0px; height: 140px; width: 542px;"></textarea>
          <br>
          <input type="submit" value="デコード">
          <input type="button" value="クリア" id="clear">
          <hr size="1" color="#7fffd4">
          ↓↓結果↓↓<br>
          <textarea rows="14" id="savek" style="margin: 0px; height: 140px; width: 542px;"></textarea>
          <br>
          <input type="button" value="コピー" id="copy"><span id="copyk"></span>
        </form>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><font style="background-color:#06f5f3;">Copyright &copy; 2021 ActiveTK. All rights reserved.</font></div>
    <br>
  </body>
</html>