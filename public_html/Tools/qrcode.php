<?php
  $title = "QRコード作成ツール | ActiveTK.jp";
  $dec = "QLコード作成ツールです。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/qrcode";
?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>
    <base href="<?php echo $url; ?>">
    <meta name="ROBOTS" content="All">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript" charset="UTF-8" nonce="<?=$nonce?>"></script>
    <script src="https://code.activetk.jp/jquery-qrcode.min.js" type="text/javascript" charset="UTF-8" nonce="<?=$nonce?>"></script>
    <script type="text/javascript" nonce="<?=$nonce?>"><?php
    if (isset($_POST["text"]))
    {
      echo "window.onload=function(){".'$'."('#code').qrcode({width: ".htmlspecialchars($_POST["yoko"]).", height: ".htmlspecialchars($_POST["tate"]).", text: '".htmlspecialchars($_POST["text"])."'});}";
    }
    ?></script>
    <style>a{color:#c71585;position:relative;display:inline-block}a,a:after{transition:.3s}a:after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transform:translateX(-50%)}a:hover:after{width:100%}</style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
  <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>QRコード作成ツール</h1>
      <?php if (isset($_POST["text"])) { ?><hr size="1" color="#7fffd4"><h2>【<?=htmlspecialchars($_POST["text"])?>】</h2><?php } ?>
      <div id="code"></div>
      <hr size="1" color="#7fffd4">
      <form action="" method="POST">
        <input type="text" size="45" name="text" value="<?php if (isset($_POST["text"])) echo htmlspecialchars($_POST["text"]); ?>" placeholder="テキスト又はURLを入力してください。" title="QLコードにしたいテキスト"><br>
        横幅:<input type="text" size="3" name="tate" value="256" placeholder="256" title="横幅"><br>
        高さ:<input type="text" size="3" name="yoko" value="256" placeholder="256" title="高さ"><br>
        <input type="submit" value="QRコードを作成" style="height:60px;width:140px;"><br>
      </form>
    </div>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
  </body>
</html>