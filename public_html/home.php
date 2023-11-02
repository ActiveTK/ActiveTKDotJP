<?php

  // 共通変数
  define( "Title", "Home" );
  $dec = "URL短縮、QRコード作成、位置情報特定、NextIP、画像形式変換、ファイル暗号化、URLエンコード、Base64エンコードなどの、無料で使える便利ツールを提供させていただきます。";

  // ツール表示
  function ViewTool( $ToolName, $ToolURL, $ToolDec ) {
    ?>
      <a href="<?=$ToolURL?>" class="btn btn--blue btn--border-double">
        <h3 style="color:#212529;"><?=$ToolName?></h3>
      </a>
      <br>
      <p><?=$ToolDec?></p>
      <br>
    <?php
  }

?>

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
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
    <script type="text/javascript" nonce="<?=nonce?>" src="https://code.activetk.jp/ActiveTK.min.js" charset="UTF-8"></script>
    <link href="https://www.activetk.jp/css/index.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?=Get_Default()?>
  </head>
  <body style="background-color:#e6e6fa;">
    <noscript>
      <div title="NO SCRIPT ERROR" style="background-color:#404ff0;color:#ff4500;" align="center">
        <h1>No JavaScript Error.</h1>
      </div>
    </noscript>
    <?=Get_Header()?>
    <div align="center" id="top" class="mainobject" style="position:fixed;overflow:scroll;-webkit-overflow-scrolling:touch;color:#000000;z-index:1;top:12%;left:0px;width:100%;height:88%;">
      <br>
      <h1>Home - ActiveTK.jp</h1>
      <br>
      <?=ViewTool( "URL短縮ツール「rinu.cf」", "https://www.activetk.jp/tools/urlmin", "URLを貼り付け、「短縮」を押すだけで簡単にURLを短縮できます。<br>Googleセーフブラウジングを用いた安全危険判定機能付きです。" )?>
      <?=ViewTool( "位置情報特定ツール", "https://www.activetk.jp/tools/tokutei", "相手にリンクを開かせる事でIPアドレスなどを取得できるツールです。<br>スマホを盗まれた場合や、詐欺にあった場合などに使用してみてください。" )?>
      <?=ViewTool( "Web Whois", "https://www.activetk.jp/tools/whois", "ドメインのwhois参照により、所有者の情報などを取得できます。" )?>
      <?=ViewTool( "Study Logger", "https://www.activetk.jp/tools/study-logger", "毎日の勉強時間を記録して現状を分析できます。" )?>
      <?=ViewTool( "Web Recorder", "https://www.activetk.jp/tools/webrecorder", "Web上で音声を録音・ダウンロードすることができます。" )?>
      <?=ViewTool( "HackAll", "https://hackall.cipher.jp/", "ハッキングデモサイトです。我こそは伝説のハッカーだ!という方は是非挑戦してみてください。" )?>

      <hr color="#363636" size="2">
      <?=GetAdHere(nonce)?>
      <hr color="#363636" size="2">

      <?=ViewTool( "簡易現在時刻ビュワー", "https://www.activetk.jp/tools/time", "画面に大きく現在時刻を表示します。スクリーンセーバーにいかがでしょうか？" )?>
      <?=ViewTool( "NextIP v6", "https://www.activetk.jp/tools/nextip", "NextIPは、Web上で動作するプライバシー重視のプロキシツールです。<br>指定されたウェブサイトへユーザーに代わってHTTPリクエストを送ります。" )?>
      <?=ViewTool( "MarkDown Editor", "https://www.activetk.jp/tools/markdown", "オンラインでMarkDownテキストの編集・プレビューが行えます。" )?>
      <?=ViewTool( "Bitcoin関連ツール", "https://bitcoin.activetk.jp/", "仮想通貨関連のツールです。<br>アドレス生成ツールやエクスプローラー、チャートなどがあります。" )?>
      <?=ViewTool( "QRコード作成ツール", "https://www.activetk.jp/tools/qrcode", "好きな文字列やURLを指定して2次元QRコードを作成できます。" )?>
      <?=ViewTool( "画像形式変換ツール", "https://www.activetk.jp/tools/image", "画像の形式を、「png」から「jpg」のように変更する事ができます。" )?>
      <?=ViewTool( "擬似乱数生成ツール", "https://www.activetk.jp/tools/rand", "暗号学的に安全なランダムなパスワード用の文字列を生成できます。" )?>
      <?=ViewTool( "JustClock", "https://www.activetk.jp/tools/justclock", "日時を指定すると、その時刻に音を鳴らします。予定管理などに使用してみてください。" )?>

      <hr color="#363636" size="2">
      <?=GetAdHere(nonce)?>
      <hr color="#363636" size="2">

      <?=ViewTool( "End2End.tech", "https://end2end.tech/", "OSS/E2EE対応/No Logの匿名ファイルアップローダーです。" )?>
      <?=ViewTool( "メールヘッダー分析ツール", "https://email-analyze.activetk.jp/", "メールのヘッダーを分析して、経由したサーバーの情報などを取得できます。" )?>
      <?=ViewTool( "著作物利用許可申請書作成ツール", "https://www.activetk.jp/tools/copyright", "ネット上での著作権侵害が問題になっています。そこで、このツールを作成しました。<br>このツールを使えば3分で著作権の利用許可を申請するテキストを作れます。" )?>
      <?=ViewTool( "YouTube動画ダウンローダー", "https://ytdl.activetk.jp/", "完全無料・悪質広告なしのWeb上で使用できるYouTubeダウンローダーです。<br>mp3やmp4形式でYouTube動画をダウンロードできます。" )?>
      <?=ViewTool( "URLエンコーダー", "https://www.activetk.jp/tools/url-encode", "指定した文字列をURLエンコードします。" )?>
      <?=ViewTool( "URLデコーダー", "https://www.activetk.jp/tools/url-decode", "指定した文字列をURLデコードします。" )?>
      <?=ViewTool( "WebScreenShot", "https://www.activetk.jp/tools/screenshot", "Web上でWebサイトのスクリーンショットを撮影できます。" )?>
      <?=ViewTool( "NSLookUP Online", "https://www.activetk.jp/tools/nslookup", "Web上でドメインのDNS参照を行えます。" )?>
      <?=ViewTool( "文字数解析", "https://www.activetk.jp/tools/str-count", "指定した文字列の文字数や行数などを表示します。" )?>
      <?=ViewTool( "Tor2Web的なやつ", "https://tor2web.activetk.jp/", "通常のブラウザから「.onion」ドメインのウェブサイトへアクセスできます。<br>サイト内のJavaScriptは自動で無効化されます。" )?>
      <?=ViewTool( "DarkWeb Archive", "https://darkweb-archive.activetk.jp/", "ダークウェブ用の魚拓作成ツールです。<br>OnionサイトをアーカイブしてZIP形式でダウンロードできます。" )?>
      <?=ViewTool( "ファイル暗号化・複合化ツール", "https://www.activetk.jp/tools/encrypt", "たった一回のクリックで簡単にファイルを暗号化・複合化できます。<br>アルゴリズムには強度の高いAESの256bit(CBCモード)を使用しているので安心してお使いいただけます！" )?>

      <hr color="#363636" size="2">
      <?=GetAdHere(nonce)?>
      <hr color="#363636" size="2">

      <?=ViewTool( "【学習用】暗記ツール", "https://www.activetk.jp/tools/learn", "受験生必見！覚えたい単語などを質問と回答のセットで保存し、何度も繰り返し解くことができるツールです。" )?>
      <?=ViewTool( "文字列のコピー無効化ツール", "https://www.activetk.jp/tools/string-copy-disable", "文字列にUnicodeの制御文字(LRO/RLO)を混在させて、コピーできないようにします。" )?>
      <?=ViewTool( "Webサイト複製防止スクリプト生成ツール", "https://www.activetk.jp/tools/copyprotect", "Webサイトの無断複製を防止できるJavaScriptを簡単に生成できます。" )?>
      <?=ViewTool( "URLダウンロードツール", "https://www.activetk.jp/tools/download", "iPadやスマホなどで、ファイルを「プレビューせずに」ダウンロードする事が出来ます。" )?>
      <?=ViewTool( "Twitter Leaked Checker", "https://www.activetk.jp/tools/twitter-leaked200", "2021年後半に2億人超のアカウント情報がTwitterから流失したとみられています。<br>本ツールではご自身のアカウントがそのデータベースに含まれているか確認できます。" )?>
      <?=ViewTool( "Gmail OSINT", "https://gmail-osint.activetk.jp/", "GmailアドレスからGoogleアカウントの情報(名前やプロフ画像、利用したサービスなど)を取得できます。" )?>
      <?=ViewTool( "文字列大文字化", "https://www.activetk.jp/tools/str2oomoji", "指定した文字列を大文字にします。" )?>
      <?=ViewTool( "文字列小文字化", "https://www.activetk.jp/tools/str2komoji", "指定した文字列を小文字にします。" )?>
      <?=ViewTool( "ハッシュ(md5、sha256、sha364、sha512)計算ツール", "https://www.activetk.jp/tools/hash", "オンラインで様々な種類のハッシュを計算します。<br>JavaScriptで処理されるのでサーバーにアップロードする必要が無く、安全です。" )?>
      <?=ViewTool( "Base64エンコーダー", "https://www.activetk.jp/tools/base64-encode", "指定した文字列をbase64エンコードします。" )?>
      <?=ViewTool( "Base64デコーダー", "https://www.activetk.jp/tools/base64-decode", "指定した文字列をbase64デコードします。" )?>

      <hr color="#363636" size="2">
      <?=GetAdHere(nonce)?>
      <hr color="#363636" size="2">

      <?=ViewTool( "HTTP情報ビュワー", "https://www.activetk.jp/tools/info", "HTTPヘッダーなどの情報を確認できます。" )?>
      <?=ViewTool( "Ha.cker.jp Terminal", "https://ha.cker.jp/", "Web上で動作するターミナル的なサイトです。" )?>
      <?=ViewTool( "English2Leet", "https://www.activetk.jp/tools/english2leet", "英語の文字列を、Leetと呼ばれる「ハッカー語」に変換するツールです。" )?>
      <?=ViewTool( "Leet2English", "https://www.activetk.jp/tools/leet2english", "Leetと呼ばれる「ハッカー語」の文字列を英語に変換するツールです。" )?>
      <?=ViewTool( "ペイントWeb", "https://www.activetk.jp/tools/paintweb", "ページ上で絵を描くことができます。" )?>
      <?=ViewTool( "Iframe君", "https://www.activetk.jp/tools/iframe", "指定されたページをiframeで表示します。" )?>
      <?=ViewTool( "Windows Update", "https://www.activetk.jp/tools/windowsupdate", "WindowsUpdate風のスクリーンセーバーです。" )?>
      <?=ViewTool( "累乗計算ツール", "https://www.activetk.jp/tools/ruijyou", "Web上で累乗の計算を行う事ができるツールです。" )?>
      <?=ViewTool( "sin/cos/tan近似計算ツール", "https://www.activetk.jp/tools/sin-cos-tan", "Web上でsin/cos/tanを計算できます。" )?>
      <?=ViewTool( "冪函数の定積分近似計算ツール", "https://www.activetk.jp/tools/beki-integration", "Web上で冪函数の定積分の近似値を計算できます。" )?>
      <?=ViewTool( "二項定理展開ツール", "https://www.activetk.jp/tools/binomial-theorem", "二項定理(パスカルの三角形)の計算ができます。<br>公式を導きたい場合に利用して下さい。" )?>
      <?=ViewTool( "もしかしてジェネレーター", "https://www.activetk.jp/tools/moshikasite", "好きな文字列で検索エンジンの`もしかして`の画像を作成できます。" )?>
      <?=ViewTool( "偽中国語ジェネレータ", "https://fake-chinese.activetk.jp/", "日本語の文章から平仮名を削除し、要点だけを抜き出します。" )?>
      <?=ViewTool( "YouTube 逆順検索ツール", "https://www.activetk.jp/tools/yt-not-well-known", "YouTubeの動画を再生数や高評価が少ない順で検索できます。" )?>
      <?=ViewTool( "pictSQUARE Leaked Checker", "https://www.activetk.jp/tools/pictsquare-leaked", "2023年にpictBLandとpictSQUAREから情報が流失したとみられています。<br>本ツールではご自身のアカウントがそのデータベースに含まれているか確認できます。" )?>
      <?=ViewTool( "ローマ数字変換ツール", "https://www.activetk.jp/tools/roman", "Webで数字をローマ数字の表記に変換できるツールです。" )?>
      <?=ViewTool( "White Encoder", "https://www.activetk.jp/tools/white-encode", "指定された文字列を「改行」「Tab」「Empty」の3種類のデータで表現します。" )?>
      <?=ViewTool( "White Decoder", "https://www.activetk.jp/tools/white-decode", "White Encoderで変換された文字列を元に戻します。" )?>

      <a href="javascipt:void(0);" class="btn btn--blue btn--border-double" id="click2terminal">
        <h3 style="color:#212529;">ActiveTK.jp ターミナル</h3>
      </a>
      <br>
      <p>上上下下左右左右BAで起動します。</p>
      <br>

      <?=Get_Last()?>

    </div>
    <script nonce="<?=nonce?>" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script nonce="<?=nonce?>">function collapse_handler(e){let t=document.getElementById("navbar-collapse");new bootstrap.Collapse(t,{toggle:!0})}document.addEventListener("DOMContentLoaded",()=>{document.getElementById("toggler-button").addEventListener("click",collapse_handler,!1)});_("click2terminal").onclick=function(){window.konamicode.callback();}</script>
  </body>
</html>
