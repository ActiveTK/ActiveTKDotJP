<?php
  $title = "HTTP情報ビュワー | ActiveTK.jp";
  $dec = "ブラウザの情報などを表示します。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/info";
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
    let url = new URL(window.location.href);
    try{if(!url.searchParams.get('nocache')){url.searchParams.set('nocache', Date.now());window.location.href=url.href;}}catch{url.searchParams.set('nocache', Date.now());window.location.href=url.href;}
    window.onload=function(){_("copy").onclick=function(){atk.copy(_("savek").value),_("copyk").innerHTML="コピーしました！"};_("clear").onclick=function(){_("save").value=""};_("td").onsubmit=function(){_('savek').value=btoa(_('save').value);return false};}
    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>HTTP情報ビュワー | ActiveTK.jp</h1>
      <hr size="1" color="#7fffd4">
      <table border="1" style="position:relative;">
        <tr>
          <th style="position:relative;background-color:#0000ff;color:#ffffff;">項目</th>
          <th style="position:relative;background-color:#0000ff;color:#ffffff;">情報</th>
        </tr>
        <tr>
          <th style="position:relative;">現在時刻</th>
          <th style="position:relative;"><?=date("Y/m/d - M (D) H:i:s")?></th>
        </tr>
        <tr>
          <th style="position:relative;">IPアドレス</th>
          <th style="position:relative;"><?=$_SERVER["REMOTE_ADDR"]?></th>
        </tr>
        <tr>
          <th style="position:relative;">アドレス</th>
          <th style="position:relative;"><?=gethostbyaddr($_SERVER["REMOTE_ADDR"])?></th>
        </tr>
        <tr>
          <th style="position:relative;">ユーザーエージェント</th>
          <th style="position:relative;"><?=htmlspecialchars($_SERVER['HTTP_USER_AGENT'])?></th>
        </tr>
        <?php function IsTorExitPoint(){ if (gethostbyname(ReverseIPOctets($_SERVER['REMOTE_ADDR']).".dnsel.torproject.org")=="127.0.0.2") { return true; } else { return false; } }
              function ReverseIPOctets($inputip){ $ipoc = explode(".", $inputip); return $ipoc[3].".".$ipoc[2].".".$ipoc[1].".".$ipoc[0]; } ?>
        <tr>
          <th style="position:relative;">Tor</th>
          <th style="position:relative;"><?php if (IsTorExitPoint()) echo "true (Torを使用しています)"; else echo "false (Torを使用していません)"; ?></th>
        </tr>
      </table>
      <hr size="1" color="#7fffd4">
      <h2>HTTPヘッダー一覧</h2>
      <table border="1" style="position:relative;">
        <tr>
          <th style="position:relative;background-color:#0000ff;color:#ffffff;">項目</th>
          <th style="position:relative;background-color:#0000ff;color:#ffffff;">情報</th>
        </tr>
        <?php foreach (getallheaders() as $name => $value) { ?>
        <tr>
          <th style="position:relative;"><?=htmlspecialchars($name)?></th>
          <th style="position:relative;"><?=htmlspecialchars($value)?></th>
        </tr>
        <?php } ?>
      </table>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>
