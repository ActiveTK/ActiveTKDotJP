<?php
  $title = "White Decoder | ActiveTK.jp";
  $dec = "A White Decoder";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/white-decoder";
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

    window.onload=function(){_("copy").onclick=function(){atk.copy(_("savek").value),_("copyk").innerHTML="コピーしました！"};_("clear").onclick=function(){_("save").value=""};
    _("td").onsubmit=function(){_('savek').value=DecodeFromWhite(_('save').value);return false};}

    function DecodeFromWhite(str) {
      let res = "";
      let charr = str.split("\n");
      for (let i = 0; i < charr.length; i++)
      {
        let strIn2 = "";
        for (let n = 0; n < charr[i].length; n++)
        {
          if (charr[i][n] === " ")
            strIn2 += "0";
          else
            strIn2 += "1";
        }
        res += String.fromCharCode(parseInt(strIn2, 2));
      }
      return res;
    }

    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
        <h1>White Decoder | ActiveTK.jp</h1>
        <p>「\n」「Tab」「Empty」の3種類のデータで表現された文字列を元に戻します。</p>
        <p><a href="white-encode">&gt; エンコーダーはこちらです</a></p>
        <form action="" method="POST" id="td">
          <textarea rows="14" id="save" style="margin: 0px; height: 140px; width: 542px;"></textarea>
          <br>
          <input type="submit" value="デコード" style="height:60px;width:140px;">
          <input type="button" value="クリア" id="clear" style="height:60px;width:140px;">
          <hr size="1" color="#7fffd4">
          ↓↓結果↓↓<br>
          <textarea rows="14" id="savek" style="margin: 0px; height: 140px; width: 542px;"></textarea>
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
