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
    <title>ネットワーク速度テスター - ActiveTK.jp</title>
    <meta name="ROBOTS" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="簡単にネットワークの速度を計測する事ができるツールです。">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="ネットワーク速度テスター - ActiveTK.jp">
    <meta name="twitter:description" content="簡単にネットワークの速度を計測する事ができるツールです。">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="ネットワーク速度テスター - ActiveTK.jp">
    <meta property="og:description" content="簡単にネットワークの速度を計測する事ができるツールです。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.activetk.jp/tools/speedtest">
    <meta property="og:site_name" content="ネットワーク速度テスター - ActiveTK.jp">
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
    <script src="https://code.activetk.jp/ActiveTK.min.js" nonce="<?=$nonce?>"></script>
    <script nonce="<?=$nonce?>">
    
      window.SpeedTest = {};
      window.SpeedTest.Download_StartTime = null;
      window.SpeedTest.Download_EndTime = null;
      window.SpeedTest.Start = function() {
        _("result").innerText = "下り回線のテストを開始しています。。";
        Download_StartTime = new Date();
      }

      window.onload = function() {
        _("startspeedtest").onclick = function() {
          _("startspeedtest").value = "テスト中です。。";
          _("startspeedtest").disabled = true;
          window.SpeedTest.Start();
          _("startspeedtest").disabled = false;
          _("startspeedtest").value = "速度の計測を開始";
        }
      }
    
    </script>
    <style>a{color:#c71585;position:relative;display:inline-block}a,a:after{transition:.3s}a:after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transform:translateX(-50%)}a:hover:after{width:100%}</style>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
  <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>ネットワーク速度テスター</h1>
      <hr size="1" color="#7fffd4">
      <input type="button" value="速度の計測を開始" style="height:60px;width:200px;" id="startspeedtest"><br>
      <pre>注意: 「速度の計測を開始」を押すと、ネットワークの速度を計測するために、下り約10MB/上り約5MBのデータが転送されます。</pre>
      <hr size="1" color="#7fffd4">
      <h2>結果</h2>
      <div><p><span id="download"></span>  <span id="upload"></span></p><span id="result">テストを行うとここに結果が表示されます。</div></span>
      <hr size="1" color="#7fffd4">
    </div>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
  </body>
</html>