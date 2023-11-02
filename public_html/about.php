<?php

  define( "Title", "サービス概要" );
  $dec = "サービス概要です。";

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
    <meta name="copyright" content="Copyright &copy; 2020-2023 ActiveTK. All rights reserved.">
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
	  <div align="center" style="width:70%;overflow-x:hidden;overflow-y:visible;">
        <div title="概要" style="background-color:#90ee90;border-radius:30px;text-align:center;">
          <h3>概要</h3>
        </div>
        <p>本サイト「activetk.jp」では、<b>簡単に、安全で、無料で使える便利なツール</b>を提供する事を目標としています。<br>
        本サイト内の全てのツールは、特に指定が無い場合、全て<b>無料</b>でご利用いただけます。<br>
        また、本サイトは全て<b>安全安心のオープンソース</b>です。ソースコードは<a href="https://github.com/ActiveTK/ActiveTKDotJP" target="_blank">[こちら]</a>からご覧いただけます。</p>
        <div title="沿革" style="background-color:#90ee90;border-radius:30px;text-align:center;">
          <h3>沿革</h3>
        </div>
        <div align="left" style="width:<?=com(50, 90)?>%;overflow-x:visible;overflow-y:visible;">
          <b>2020/10/24　</b> <?=com("", "<br>")?>本サイトを作成し、xfreeを使用してactivetk.cfで公開。<br><?=com("", "<br>")?>
          <b>2020/12/07　</b> <?=com("", "<br>")?>感想フォームを設置。<br><?=com("", "<br>")?>
          <b>2021/03/23　</b> <?=com("", "<br>")?>サーバーをスターサーバー(ライト)に移行。https化。<br><?=com("", "<br>")?>
          <b>2021/06/10　</b> <?=com("", "<br>")?>コメントをSQLで管理するように変更。<br><?=com("", "<br>")?>
          <b>2021/12/27　</b> <?=com("", "<br>")?>DDoS攻撃に伴って、アクセスカウンターの方式を変更。<br><?=com("", "<br>")?>
          <b>2022/01/06　</b> <?=com("", "<br>")?>サイトのデザインを大幅に変更。<br><?=com("", "<br>")?>
          <b>2022/03/18　</b> <?=com("", "<br>")?>ドメインをactivetk.jpに改め、生HTMLからbootstrapへ変更。ソースコードを公開。<br><?=com("", "<br>")?>
          <b>2022/04/16　</b> <?=com("", "<br>")?>Onionミラーの「ActiveTK.jp#Onion」を作成。<br><?=com("", "<br>")?>
          <b>2022/04/30　</b> <?=com("", "<br>")?>「ActiveTK.jp」がGoogle アドセンスに合格。<br><?=com("", "<br>")?>
          <b>2022/08/13　</b> <?=com("", "<br>")?>「ActiveTK.jp#Onion」のURLを変更。<br><?=com("", "<br>")?>
          <b>2022/12/30　</b> <?=com("", "<br>")?>ブログである「ActiveTK's Note」を作成。<br><?=com("", "<br>")?>
          <b>2023/03/07　</b> <?=com("", "<br>")?>curl版のActiveTK.jpを作成。<br><?=com("", "<br>")?>
          <b>2023/09/23　</b> <?=com("", "<br>")?>「ActiveTK's Note」のフレームワークをbootstrapからtailwindに変更。<br><?=com("", "<br>")?>
        </div>
        <div title="オススメのサイト" style="background-color:#90ee90;border-radius:30px;text-align:center;">
          <h3>相互リンク / お勧めのサイト</h3>
        </div>
        <div align="left" style="width:<?=com(50, 90)?>%;overflow-x:visible;overflow-y:visible;">
          <p><li><a href="https://rinu.cf/tsumuri" style="color: #017022;">tsumuri's website</a> tsumuriさんが作成・更新しているサイトで、ブログやWeb上で動作するアプリがあります！</li></p>
          <p><li><a href="https://rinu.cf/256server" style="color: #017022;">256server</a> 256大好き!さんが管理しているサイトで、便利なWebツールがあります！自宅鯖らしい！！</li></p>
          <p><li><a href="https://nyanlabo.com/" style="color: #017022;">にゃんでもラボ</a> 魔理沙っちさんが管理しているブログで、wp運営のノウハウやWeb技術がまとめられています！</li></p>
          <p><li><a href="https://www.choko1229.net/" style="color: #017022;">ちょこのうぇぶさいと！</a> choko1229さんが管理しているブログで、マインクラフトの日記があります！</li></p>
          <p><li><a href="https://xely.net/" style="color: #017022;">Xely | Never Stop Evolving.</a> あくてぃばるさんが管理しているサイトで、便利なWebツールが大量にあります！</li></p>
          <p><li><a href="https://xn--08j8cqe.jp/" style="color: #017022;">けびん</a> けびんさんのプロフィールページです！</li></p>
          <p><li><a href="https://p-nutsk.github.io/" style="color: #017022;">P_nutsKのページ</a> ScratcherのP_nutsKさんが管理しているサイトです！</li></p>
          <p><li><a href="https://www.kobakoo.com/" style="color: #017022;">kobako0O.com</a> kbkさんが管理しているサイトで、ブログなどがあります！</li></p>
          <p><li><a href="https://ichiru-game.com/" style="color: #017022;">いちるブログ</a> ichiruさんが管理しているブログで、PHPの記事やWeb関連技術の投稿があります！</li></p>
          <p><li><a href="https://wasabii.net/" style="color: #017022;">Wasabi Lab.</a> 高校生のわさびさんが管理しているブログで、WordPressの運営ノウハウがまとまっています！</li></p>
        </div>
        <hr>
      </div>
      <?=Get_Last()?>
    </div>
    <script nonce="<?=nonce?>" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script nonce="<?=nonce?>">function collapse_handler(e){let t=document.getElementById("navbar-collapse");new bootstrap.Collapse(t,{toggle:!0})}document.addEventListener("DOMContentLoaded",()=>{document.getElementById("toggler-button").addEventListener("click",collapse_handler,!1)});</script>
  </body>
</html>