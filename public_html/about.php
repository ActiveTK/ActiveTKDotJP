<?php

  define( "Title", "サービス概要" );

?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="ActiveTK,activetk.jp,WEBツール,HackAll,位置情報特定ツール,IPアドレス特定博士">
    <title><?=Title?> | ActiveTK.jp</title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta name="description" content="<?=$dec?>">
    <meta name="copyright" content="Copyright &copy; 2020-2022 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ActiveTK5929">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="<?=Title?> | ActiveTK.jp">
    <meta name="twitter:description" content="<?=$dec?>">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="<?=Title?> | ActiveTK.jp">
    <meta property="og:description" content="<?=$dec?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.activetk.jp/">
    <meta property="og:site_name" content="<?=Title?> | ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <link href="https://www.activetk.jp/css/index.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>a{color:#00ff00;position:relative;display:inline-block;transition:.3s;}a::after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transition:.3s;transform:translateX(-50%);}a:hover::after{width:100%;}</style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#e6e6fa;">
    <noscript>
      <div title="NO SCRIPT ERROR" style="background-color:#404ff0;color:#ff4500;" align="center">
        <h1>No JavaScript Error.</h1>
      </div>
    </noscript>
    <?=Get_Header()?>
    <div align="center" class="mainobject" style="position:fixed;overflow:scroll;color:#000000;z-index:1;top:12%;left:0px;width:100%;height:88%;">
      <br>
      <h1>サービス概要 - ActiveTK.jp</h1>
      <br>
	  <div align="left" style="width:70%;overflow-x:hidden;overflow-y:visible;">
        <div title="概要" style="background-color:#90ee90;">
          <h3>概要</h3>
        </div>
        <p>本サイト「activetk.jp」では、<b>簡単に、安全で、無料で使える便利なツール</b>を提供する事を目標としています。<br>
        本サイト内の全てのツールは、特に指定が無い場合、全て<b>無料</b>でご利用いただけます。<br>
        また、本サイトは全て<b>安全安心のオープンソース</b>です。ソースコードは<a href="https://github.com/ActiveTK/ActiveTKDotJP" target="_blank">[こちら]</a>からご覧いただけます。</p>
        <div title="沿革" style="background-color:#90ee90;">
          <h3>沿革</h3>
        </div>
        <b>2020.10.24</b> 本サイトを作成、xfreeを使用してactivetk.cfで公開。<br>
        <b>2020.11.07</b> SNS用のmetaタグを作成。<br>
        <b>2020.11.21</b> 全てのURLをa-tk.cfに短縮。<br>
        <b>2020.12.05</b> nonceを有効化。<br>
        <b>2020.12.07</b> 感想フォームを設置。<br>
        <b>2020.12.26</b> スパムコメント対策を作成。<br>
        <b>2021.01.02</b> PHPのバージョンを [PHP7.0.x] から [PHP7.1.x] に変更。<br>
        <b>2021.01.04</b> スパムメール収集用のコンテンツを作成。<br>
        <b>2021.01.08</b> はてなブックマークのリンクを作成。<br>
        <b>2021.03.02</b> a-tk.jpの短縮リンクを削除。<br>
        <b>2021.03.23</b> StarServer(ライト)に移行。https化。<br>
        <b>2021.04.27</b> Tor拒否を無効化。感想書き込み時は有効のまま。<br>
        <b>2021.05.03</b> 一部のリンクをrinu.cfに短縮。<br>
        <b>2021.06.10</b> コメントをSQLで管理するようにした。<br>
        <b>2021.12.27</b> DDOS攻撃に伴い、アクセスカウンターの方式を変更。<br>
        <b>2022.01.06</b> サイトのデザインをかなり変更。<br>
        <b>2021.07.31</b> PHPのバージョンを [PHP8.x](現在8.07)に変更。<br>
        <b>2022.03.18</b> activetk.jpへ移動。UIの大幅な変更。OSS化。<br>
      </div>
      <?=Get_Last()?>
    </div>
    <script nonce="<?=nonce?>" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script nonce="<?=nonce?>">function collapse_handler(e){let t=document.getElementById("navbar-collapse");new bootstrap.Collapse(t,{toggle:!0})}document.addEventListener("DOMContentLoaded",()=>{document.getElementById("toggler-button").addEventListener("click",collapse_handler,!1)});</script>
  </body>
</html>