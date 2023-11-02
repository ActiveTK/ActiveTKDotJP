<?php
  if (function_exists("DefaultPageView"))
    DefaultPageView("Home");
  function ViewTool( $ToolName, $ToolURL, $ToolDec ) {
    ?>** <?="\e"?>[38;5;049m<?=str_pad( $ToolURL, 27, " ", STR_PAD_RIGHT)?><?="\e"?>[0m | <?="\e"?>[38;5;150m<?=$ToolName?><?="\e"?>[0m => <?=$ToolDec?><?php echo "\n";
  }
?>
<?=ViewTool( "URL短縮ツール「rinu.cf」", "/tools/urlmin", "URLを貼り付け「短縮」を押すだけで簡単にURLを短縮できます。" )?>
<?=ViewTool( "位置情報特定ツール", "/tools/tokutei", "IPアドレスなどを取得できるツールです。" )?>
<?=ViewTool( "Web Whois", "/tools/whois", "ドメインのwhois参照ができます。" )?>
<?=ViewTool( "QRコード作成ツール", "/tools/qrcode", "2次元QRコードを作成できます。" )?>
<?=ViewTool( "Web Recorder", "/tools/webrecorder", "Web上で音声を録音・ダウンロードできます。" )?>
<?=ViewTool( "HackAll", "hackall.cipher.jp", "ハッキングデモサイトです。" )?>
<?=ViewTool( "簡易現在時刻ビュワー", "/tools/time", "画面に大きく現在時刻を表示します。" )?>
<?=ViewTool( "NextIP v6", "/tools/nextip", "プライバシー重視のプロキシツールです。" )?>
<?=ViewTool( "MarkDown Editor", "/tools/markdown", "MarkDownテキストの編集・プレビューが行えます。" )?>
<?=ViewTool( "Bitcoin関連ツール", "bitcoin.activetk.jp", "仮想通貨関連のツールです。" )?>
<?=ViewTool( "画像形式変換ツール", "/tools/image", "画像の形式を、「png」から「jpg」のように変更する事ができます。" )?>
<?=ViewTool( "擬似乱数生成ツール", "/tools/rand", "暗号学的に安全なランダムなパスワード用の文字列を生成できます。" )?>
<?=ViewTool( "JustClock", "/tools/justclock", "日時を指定すると、その時刻に音を鳴らします。" )?>
<?=ViewTool( "ファイル暗号化・複合化ツール", "/tools/encrypt", "ファイルを暗号化・複合化できます。" )?>
<?=ViewTool( "【学習用】暗記ツール", "/tools/learn", "受験生必見！問題を何度も繰り返し解くことができるツールです。" )?>
<?=ViewTool( "著作物利用許可申請書作成ツール", "/tools/copyright", "著作権の利用許可を申請するテキストを作れます。" )?>
<?=ViewTool( "匿名ファイル便 v2", "file-uploader.cf/", "匿名でファイルをアップロードできます。" )?>
<?=ViewTool( "URLエンコーダー", "/tools/url-encode", "指定した文字列をURLエンコードします。" )?>
<?=ViewTool( "URLデコーダー", "/tools/url-decode", "指定した文字列をURLデコードします。" )?>
<?=ViewTool( "WebScreenShot", "/tools/screenshot", "Web上でWebサイトのスクリーンショットを撮影できます。" )?>
<?=ViewTool( "NSLookUP Online", "/tools/nslookup", "Web上でドメインのDNS参照を行えます。" )?>
<?=ViewTool( "文字数解析", "/tools/str-count", "指定した文字列の文字数や行数などを表示します。" )?>
<?=ViewTool( "Tor2Web的なやつ", "tor2web.activetk.jp", "通常のブラウザから「.onion」ドメインへアクセスできます。" )?>
<?=ViewTool( "DarkWeb Archive", "darkweb-archive.activetk.jp", "ダークウェブ用の魚拓作成ツールです。" )?>
<?=ViewTool( "Webサイト複製防止スクリプト生成ツール", "/tools/copyprotect", "サイトの無断複製を防止できます。" )?>
<?=ViewTool( "文字列大文字化", "/tools/str2oomoji", "指定した文字列を大文字にします。" )?>
<?=ViewTool( "文字列小文字化", "/tools/str2komoji", "指定した文字列を小文字にします。" )?>
<?=ViewTool( "URLダウンロードツール", "/tools/download", "ファイルを「プレビューせずに」ダウンロードできます。" )?>
<?=ViewTool( "Twitter Leaked Checker", "/tools/twitter-leaked200", "Twitterアカウントが流出していないか確認できます。" )?>
<?=ViewTool( "ハッシュ(md5、sha256、sha364、sha512)計算ツール", "/tools/hash", "様々な種類のハッシュを計算します。" )?>
<?=ViewTool( "Base64エンコーダー", "/tools/base64-encode", "指定した文字列をbase64エンコードします。" )?>
<?=ViewTool( "Base64デコーダー", "/tools/base64-decode", "指定した文字列をbase64デコードします。" )?>
<?=ViewTool( "HTTP情報ビュワー", "/tools/info", "HTTPヘッダーなどの情報を確認できます。" )?>
<?=ViewTool( "English2Leet", "/tools/english2leet", "英語の文字列を、Leetと呼ばれる「ハッカー語」に変換するツールです。" )?>
<?=ViewTool( "Leet2English", "/tools/leet2english", "Leetと呼ばれる「ハッカー語」の文字列を英語に変換するツールです。" )?>
<?=ViewTool( "ペイントWeb", "/tools/paintweb", "ページ上で絵を描くことができます。" )?>
<?=ViewTool( "Iframe君", "/tools/iframe", "指定されたページをiframeで表示します。" )?>
<?=ViewTool( "Windows Update", "/tools/windowsupdate", "WindowsUpdate風のスクリーンセーバーです。" )?>
<?=ViewTool( "累乗計算ツール", "/tools/ruijyou", "Web上で累乗の計算を行う事ができるツールです。" )?>
<?=ViewTool( "sin/cos/tan近似計算ツール", "/tools/sin-cos-tan", "Web上でsin/cos/tanを計算できます。" )?>
<?=ViewTool( "冪函数の定積分近似計算ツール", "/tools/beki-integration", "Web上で冪函数の定積分の近似値を計算できます。" )?>
*****************************************************************************
** 【利用方法】
**
** > curl https://curl.activetk.jp{$RequestPath}?args[]={$Arguments}
**                                 ^^^^^^^^^^^^          ^^^^^^^^^^
** * {$RequestPath}: リストの一番左の列に記載されている「ツールのパス」を指定して下さい。
** * {$Arguments}  : ツールに対する引数の指定を行えます。
**                   複数の引数が必要なツールには、args[]=arg1&args[]=arg2のように指定して下さい。
*****************************************************************************
