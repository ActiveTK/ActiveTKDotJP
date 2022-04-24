<?php

  function GetRand( int $len = 32 ) {

    $bytes = openssl_random_pseudo_bytes( $len / 2 );
    $str = bin2hex( $bytes );

    $usestr = '1234567890abcdefghijklmnopqrstuvwxyz';
    $str2 = substr( str_shuffle( $usestr ), 0, 12 );

    return substr( str_shuffle( $str . $str2 ) , 0, -12 );

  }

?>

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>DownChecker - ActiveTK.jp</title>
    <meta name="ROBOTS" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="ウェブサイトが落ちているか確認します。">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DownChecker - ActiveTK.jp">
    <meta name="twitter:description" content="ウェブサイトが落ちているか確認します。">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="DownChecker - ActiveTK.jp">
    <meta property="og:description" content="ウェブサイトが落ちているか確認します。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.activetk.jp/tools/QL-MAKE.php">
    <meta property="og:site_name" content="DownChecker - ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <?=Get_Default()?>
    <style>a{color:#c71585;position:relative;display:inline-block}a,a:after{transition:.3s}a:after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transform:translateX(-50%)}a:hover:after{width:100%}</style>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
  <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>DownChecker</h1>
      <p>ウェブサイトが落ちているか確認します。</p>
      <hr size="1" color="#7fffd4">
      <?php
        if (isset($_POST["len"]) && !empty($_POST["len"]) && is_numeric($_POST["len"]))
        {
          echo "<h1>ウェブサイト「" . $_POST["len"] . "」は落ちています。</h1><br>\n";
          echo "<hr size='1' color='#7fffd4'>";
        }
      ?>
      <form action="" method="POST">
        URL: <input type="url" name="len" placeholder="桁数" title="桁数"><br>
        <input type="submit" value="安全な疑似乱数を生成" style="height:60px;width:200px;"><br>
      </form>
      <hr size="1" color="#7fffd4">
      <p align="center"><a href="https://github.com/ActiveTK/ActiveTKDotJP/blob/main/public_html/Tools/rand.php" target="_blank">アルゴリズム(PHP)</a></p>
    </div>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
  </body>
</html>