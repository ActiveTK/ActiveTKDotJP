<?php

  /*!
   *  Home - ActiveTK.CF
   *  (c) 2021 ActiveTK.
   */

  require "/home/activetk/require/Config.php";
  require "/home/activetk/activetk.cf/public_html/main.php";

  function aais_android() {
    if (!preg_match('/'.implode('|', array('Android')).'/i', $_SERVER['HTTP_USER_AGENT'])) return "no";
    else return "yes";
  }
  function aais_iphone() {
    if (!preg_match('/'.implode('|', array('iPhone')).'/i', $_SERVER['HTTP_USER_AGENT'])) return "no";
    else return "yes";
  }
  function aais_winphone() {
    if (!preg_match('/'.implode('|', array('Windows Phone')).'/i', $_SERVER['HTTP_USER_AGENT'])) return "no";
    else return "yes";
  }
  if (aais_android() == "no" && aais_iphone() == "no" && aais_winphone() == "no")
    $issumaho = false;
  else
    $issumaho = true;

  if (isset($_POST["name"]) && isset($_POST["cmt"]))
  {
    $text = $_POST["cmt"];
    $bday = date('Ymd');
    list($oldip, $day) = explode(",", read("./Files/comment.log"));
    if(IsTor($_SERVER['REMOTE_ADDR']))
    {
      http_response_code("401");
      header("_error: You are using Tor Network.");
      echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <div align="center" title="TorNetwork経由で投稿することはできません。">
      <h1 style="background-color:#98fb98;">TorNetwork経由で投稿することはできません。</h1>
      </div>'."\n";
      exit;
    }
    else if ($oldip == $_SERVER['REMOTE_ADDR'] && $day == $bday)
    {
      echo '<div align="center" title="連続してコメントを書き込むことはできません。1日以上間隔をあけてください。"><p style="background-color:#98fb98;">連続してコメントを書き込むことはできません。1日以上間隔をあけてください。</p></div>'."\n";
    }
    else if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) || !isset($_SERVER['HTTP_USER_AGENT']) || $_SERVER['HTTP_ACCEPT_LANGUAGE'] == "" || $_SERVER['HTTP_USER_AGENT'] == "" || $_POST["cmt"] == "")
    {
      echo '<div align="center" title="スパムメッセージと判定されました"><h1 style="background-color:#98fb98;">スパムメッセージと判定されました</h1></div>'."\n";
    }
    else 
    {
      if (empty($_POST["name"])) $name = "(名無し)";
      else $name = htmlentities($_POST["name"], ENT_QUOTES);
      $text = htmlentities($text, ENT_QUOTES);
      $text = str_replace('&amp;', '&', str_replace(PHP_EOL, "<br>", $text));
      $textid = str_pad(file_get_contents("./Files/comment.sql.txt") + 1, 5, '0', STR_PAD_LEFT);
      file_put_contents("./Files/comment.sql.txt", $textid);
      try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("create table if not exists activetkcf_comment(
          `textid` varchar(255) DEFAULT NULL,
          `username` varchar(255) DEFAULT NULL,
          `createip` varchar(255) DEFAULT NULL,
          `createtime` varchar(255) DEFAULT NULL,
          `innertext` varchar(255) DEFAULT NULL
        )");
        $stmt = $pdo->prepare("insert into activetkcf_comment(textid, username, createip, createtime, innertext) value(?, ?, ?, ?, ?)");
        $stmt->execute([
          $textid,
          $name,
          $_SERVER['REMOTE_ADDR'],
          time(),
          $text
        ]);
      } catch(PDOException $e) {
        echo "書き込み中にデータベースエラー（PDOエラー）が発生しました。";
      }
      echo '<div align="center" title="成功!"><h1 style="background-color:#98fb98;">書き込みに成功しました！</h1></div>';
    }
  }
  $comment = "";
  $t = 0;
  try {
    $selects = ((new PDO(DSN, DB_USER, DB_PASS))->query("SELECT * FROM activetkcf_comment order by textid desc"));
  } catch (PDOException $e) {
    die("コメントの読み込み中にデータベースエラー（PDOエラー）が発生しました。しばらく時間を空けてから、再度アクセスしてください。");
  }
  foreach ($selects as $value)
  {
    $t++;
    if ($t > 35 && !isset($_GET["get-comment-all"])) break;
    if ($t != 1) $comment .= "        ";
    if ($value["createip"] == "210.168.145.113")
      $value["createip"] = "admin";
    $comment .= "<div style='background-color:#696969;'>";
    $comment .= "<span style='background-color:#000000;color:#e6e6fa;'>" . date("Y/m/d - M (D) H:i:s", $value["createtime"]) . "</span><br>";
    $comment .= "<span style='background-color:#31aae2;'>".$value["username"]."@".$value["createip"]."</span><br>";
    $comment .= "<div style='color:#00fa9a'>".$value["innertext"]."</div></div><br>\n";
  }
  $dec = "このサイトではActiveTKが作成したさまざまなWEBツールを使うことができます。[メモブログ|位置情報特定ツール|HackAll|URL短縮|ファイル解析|QRコード作成|..etc]";
?>
<!--
*******************************************************
**   Home - ActiveTK.cf [https://www.activetk.cf/]   **
** Copyright (c) 2021 ActiveTK. All rights reserved. **
*******************************************************
LastUpdate: 2022/01/06
.2020
[10/24] 本サイトを作成、xfreeを使用して公開。
[11/07] SNS用のmetaタグを作成。
[11/21] 全てのURLをa-tk.cfに短縮。
[12/05] nonceを有効化。
[12/07] 感想フォームを設置。
[12/26] スパムコメント対策を作成。
.2021
[01/02] PHPのバージョンを [PHP7.0.x] から [PHP7.1.x] に変更。
[01/04] スパムメール収集用のコンテンツを作成。
[01/08] はてなブックマークのリンクを作成。
[03/02] a-tk.cfの短縮リンクを削除。
[03/23] StarServer(ライト)に移行。https化。
[04/27] Tor拒否を無効化。感想書き込み時は有効のまま。
[05/03] 一部のリンクをrinu.cfに短縮。
[06/10] コメントをSQLで管理するようにした。
[07/31] PHPのバージョンを [PHP8.x](現在8.07)に変更。
[12/27] DDOS攻撃に伴い、アクセスカウンターの方式を変更。
.2022
[01/06] サイトのデザインをかなり変更。
*******************************************************
-->

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="ActiveTK,activetk.cf,WEBツール,HackAll,Iframe先生,IPアドレス特定博士,ATK_Mail,異名メール君,脆弱性のあるフォーム">
    <title>Home | ActiveTK.cf</title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://www.activetk.cf/icon/index_32_32.ico">
    <meta name="description" content="<?=$dec?>">
    <meta name="copyright" content="Copyright &copy; 2020-2022 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="https://www.activetk.cf/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ActiveTK5929">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="Home | ActiveTK.cf">
    <meta name="twitter:description" content="<?=$dec?>">
    <meta name="twitter:image:src" content="https://www.activetk.cf/icon/index.jpg">
    <meta property="og:title" content="Home | ActiveTK.cf">
    <meta property="og:description" content="<?=$dec?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.activetk.cf/">
    <meta property="og:site_name" content="Home | ActiveTK.cf">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.cf/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="canonical" href="https://www.activetk.cf/">
    <link rel="shortcut icon" href="https://www.activetk.cf/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.cf/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.cf/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.cf/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.cf/icon/index_150_150.ico">
    <script type="application/ld+json" nonce="<?=$nonce?>">{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"https://www.activetk.cf/"}]}</script>
    <script type="text/javascript" nonce="<?=$nonce?>">var Ease={easeInOut:e=>e<.5?4*e*e*e:(e-1)*(2*e-2)*(2*e-2)+1},duration=500;addEventListener("DOMContentLoaded",()=>{document.querySelectorAll('a[href^="#"]').forEach(function(e){e.addEventListener("click",function(t){var n=e.getAttribute("href"),o=document.documentElement.scrollTop||document.body.scrollTop,r=document.getElementById(n.replace("#",""));if(r){t.preventDefault(),t.stopPropagation();var a=pageYOffset+r.getBoundingClientRect().top-115,i=performance.now(),d=function(e){var t=(e-i)/duration;t<1?(scrollTo(0,o+(a-o)*Ease.easeInOut(t)),requestAnimationFrame(d)):window.scrollTo(0,a)};requestAnimationFrame(d)}})})});</script>
    <script type="text/javascript" nonce="<?=$nonce?>" src="https://code.activetk.cf/Hatena.min.js" charset="utf-8" async="async"></script>
    <script type="text/javascript" nonce="<?=$nonce?>" src="https://code.activetk.cf/ActiveTK.min.js" charset="UTF-8"></script>
    <style>a{color:#00ff00 !important;position:relative;display:inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
    <?php if ($issumaho) { ?>
    <script src="https://www.activetk.cf/js/cotrld_76907q706306a0cfa6s9f7m39a8ba02ar6d5254je89ep9c4.js" nonce="<?=$nonce?>"></script>
    <?php } else {  ?>
    <script src="https://www.activetk.cf/js/cotrld.js" nonce="<?=$nonce?>"></script>
    <style>*,:after,:before{-webkit-box-sizing:inherit;box-sizing:inherit}.btn,a.btn,button.btn{font-size:1.6rem;font-weight:700;line-height:1.5;position:relative;display:inline-block;padding:1rem 4rem;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-transition:all .3s;transition:all .3s;text-align:center;vertical-align:middle;text-decoration:none;letter-spacing:.1em;color:#212529;border-radius:.5rem}a.btn--blue.btn--border-double{border:8px double #0090bb}a{position:relative;display:inline-block}</style>
    <?php } ?>
    <script defer src="https://rinu.cf/pv/index.php?token=activetkcfhome&callback=cotrld" nonce="<?=$nonce?>"></script>
  </head>
  <body style="background-color:#000000;">
    <noscript>
      <div title="NO SCRIPT ERROR" style="background-color:#404ff0;color:#ff4500;" align="center">
        <h1>No JavaScript Error.</h1>
      </div>
    </noscript>
    <div align="center" id="home" style="color:#ffffff;">
      <h1>Welcome to ActiveTK.CF ! <a href="https://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="vertical-normal" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a></h1>
      <div title="アクセスカウンター v2" id="pv"></div>
      <br>
<?php if (!$issumaho) { ?>
      <div style="background-color:#404ff0;width:80%;overflow-x:hidden;overflow-y:visible;">
        <h2 style="color:#87ceeb;">【サイト、ブログ、SNS一覧】</h2>
        <hr>
        <div style="display:flex;justify-content:center;flex-wrap:wrap;">
          <a align="left" href="https://blog.activetk.cf/" rel="noopener noreferrer" title="自分のメモ用のブログです。主にネットワーク関連の事を投稿します。" class="btn btn--blue btn--border-double">
            <h4 style="color:#212529;">MemoBlog</h4>
          </a>
          <span style="right:0px;"><br><br>自分のメモ用のブログです。<br>ネットワーク関連の事を投稿します。</span>
        </div>
        <hr>
        <div style="display:flex;justify-content:center;flex-wrap:wrap;">
          <span style="left:0px;"><br><br>どーでも良い事をつぶやきます。</span>
          <a align="right" href="https://rinu.cf/twitter" rel="noopener noreferrer" title="どーでも良い事をつぶやきます。" class="btn btn--blue btn--border-double">
            <h4 style="color:#212529;">Twitter</h4>
          </a>
        </div>
        <hr>
        <div style="display:flex;justify-content:center;flex-wrap:wrap;">
          <a align="left" href="https://rinu.cf/yt" rel="noopener noreferrer" title="検証とかをいろいろしています!" class="btn btn--blue btn--border-double">
            <h4 style="color:#212529;">YouTube</h4>
          </a>
          <span style="right:0px;"><br><br>検証とかをいろいろしています!</span>
        </div>
        <hr>
        <div style="display:flex;justify-content:center;flex-wrap:wrap;">
          <span style="left:0px;"><br>ハッキングデモサイトです。<br>我こそは伝説のハッカーだ!という方は<br>是非挑戦してみてください。</span>
          <a align="right" href="https://hackall.cipher.jp/" rel="noopener noreferrer" title="ハッキングデモサイトです。我こそは伝説のハッカーだ!という方は是非挑戦してみてください。" class="btn btn--blue btn--border-double">
            <h4 style="color:#212529;">HackAll v2</h4>
          </a>
        </div>
        <hr>
        <h2 style="color:#87ceeb;">【無料で使えるツール一覧】</h2>
        <a href="https://tokutei.cf/admin/" target="_blank" rel="noopener noreferrer"><h4>位置情報特定ツール</h4></a><br>位置情報を取得する事ができます。<br>
        <a href="https://rinu.cf/" target="_blank" rel="noopener noreferrer"><h4>URL短縮サービス</h4></a><br>URLを簡単に短縮する事ができます。安全危険判定機能付きです！<br>
        <a href="/WindowsUpdate/" target="_blank" rel="noopener noreferrer"><h4>Windows Update Screen</h4></a><br>WindowsUpdateもどきのスクリーンセーバーです。<br>
        <a href="/ATK-FM/" target="_blank" rel="noopener noreferrer"><h4>ATK-FM</h4></a><br>WEB上で動作する無料で使えるファイルマネージャーです。<br>
        <a href="/imagechange/" target="_blank" rel="noopener noreferrer"><h4>画像変換ツール</h4></a><br>画像の形式を「jpg」から「png」のように変える事ができます。<br>
        <a href="https://copyright.activetk.cf/" target="_blank" rel="noopener noreferrer"><h4>著作物利用許可申請書作成ツール</h4></a><br>3分で著作権の利用許可を申請するテキストを作れます。メールで送信したり、印刷したり、画像を表示したりできます。<br>
        <a href="/imagechange/" target="_blank" rel="noopener noreferrer"><h4>画像変換ツール</h4></a><br>画像の形式を「jpg」から「png」のように変える事ができます。<br>
        <a href="https://www.activetk.cf/zip-decrypt0r/admin.php" target="_blank"><h4>【ATK Zip_Decrypt0r】ZIPファイルのパスワード解析ツール</h4></a><br>ZIPファイルのパスワードを忘れてしまいましたか？本ツールで簡単に解析できます！<br>
        <a href="/tools/parse.php" target="_blank" rel="noopener noreferrer"><h4>ファイル解析ツール</h4></a><br>ファイルの詳細情報を取得できます。URLを指定して解析する事も可能です。<br>
        <a href="https://rinu.cf/encrypt.php" target="_blank" rel="noopener noreferrer"><h4>ファイル暗号化/複合化</h4></a><br>ファイルを簡単に暗号化する事ができます。<br>
        <a href="/tools/QRcode.php" target="_blank" rel="noopener noreferrer"><h4>QRコード作成ツール</h4></a><br>好きな文字列を指定してQRコードを作成できます。<br>
        <a href="https://about.kaihi.cf/" target="_blank" rel="noopener noreferrer"><h4>NextIP</h4></a><br>Web上で動作する匿名性が高い簡易プロキシです。<br>
        <a href="/tools/Rand.php" target="_blank" rel="noopener noreferrer"><h4>【パスワード用】疑似乱数生成ツール</h4></a><br>安全なパスワードを生成します。オープンソースです。<br>
        <a href="https://rinu.cf/dl.php" target="_blank" rel="noopener noreferrer"><h4>URLダウンロードつーる</h4></a><br>iPadなどでファイルを「プレビューせずに」ダウンロードする事ができます<br>
        <a href="/tools/url-encode.php" target="_blank" rel="noopener noreferrer"><h4>URLエンコーダー</h4></a><br>JavaScriptを利用して好きな文字列をURLエンコードをする事ができます。<br>
        <a href="/tools/url-decode.php" target="_blank" rel="noopener noreferrer"><h4>URLデコーダー</h4></a><br>JavaScriptを利用して好きな文字列をURLデコードをする事ができます。<br>
        <a href="/tools/base64-encode.php" target="_blank" rel="noopener noreferrer"><h4>Base64エンコーダー</h4></a><br>JavaScriptを利用して好きな文字列をBase64エンコードをする事ができます。<br>
        <a href="/tools/base64-decode.php" target="_blank" rel="noopener noreferrer"><h4>Base64デコーダー</h4></a><br>JavaScriptを利用して好きな文字列をBase64デコードをする事ができます。<br>
        <a href="/tools/English2Leet.php" target="_blank" rel="noopener noreferrer"><h4>English2Leet</h4></a><br>英語の文字列を、Leetと呼ばれる「ハッカー語」に変換するツールです。<br>
        <a href="/tools/Leet2English.php" target="_blank" rel="noopener noreferrer"><h4>Leet2English</h4></a><br>Leetと呼ばれる「ハッカー語」の文字列を英語に変換するツールです<br>
        <a href="/url/" target="_blank" rel="noopener noreferrer"><h4>IPアドレス特定博士</h4></a><br>詐欺師のIPアドレス特定にでも使ってください。悪用厳禁!!<br>
        <a href="/imei/" target="_blank" rel="noopener noreferrer"><h4>異名メール君</h4></a><br>「異名」でメールを送信する事ができます！(試験段階)<br>
        <a href="/ATK_Mail/" target="_blank" rel="noopener noreferrer"><h4>ATK_Mail</h4></a><br>登録不要!HTMLやJavaScriptで簡単にメールを送信できます。<br>
        <a href="/time/" target="_blank" rel="noopener noreferrer"><h4>簡易現在時刻ビュワー</h4></a><br>現在時刻を大きく表示します。スクリーンセーバーにオススメです。<br>
        <a href="https://www.vector.co.jp/vpack/browse/person/an062133.html" target="_blank" rel="noopener noreferrer"><h4>Vector | ActiveTK.</h4></a><br>ここで便利なアプリなどを公開しています。<br>
        <a href="http://nanisore-oisiino.cf/" target="_blank" rel="noopener noreferrer"><h4>「何それおいしいの」BotのWebサイト</h4></a><br>このサイトに説明は..無いかな..<br>
        <a href="https://rinu.cf/dmz0xvpe7fkk" target="_blank" rel="noopener noreferrer"><h4>WebPad</h4></a><br>拡張機能です。簡易メモ帳的な物です。(語彙力)<br>
        <a href="/Get_IP/" target="_blank" rel="noopener noreferrer"><h4>Get_IP君</h4></a><br>IPアドレスを取得し返すツールです。<br>
        <a href="/iframe/" target="_blank" rel="noopener noreferrer"><h4>Iframe君</h4></a><br>指定したページをiframeで表示します。<br>
        <hr>
      </div>
      <span style="display:none;">連絡は<a href="mailto:sp@activetk.cf">sp@activetk.cf</a>にお願いします！</span>
      <div style="background-color:#87ceeb;color:#080808;width:80%;overflow-x:hidden;overflow-y:visible;">
<?php } else { ?>
      <div style="background-color:#404ff0;width:90%;overflow-x:hidden;overflow-y:visible;">
        <h2 style="color:#87ceeb;">【サイト、ブログ、SNS一覧】</h2>
        <a href="https://blog.activetk.cf/" target="_blank" rel="noopener noreferrer"><h4>メモブログ</h4></a><br>自分のメモ用のブログです。主にネットワーク関連の事を投稿します。<br>
        <a href="https://rinu.cf/twitter" target="_blank" rel="noopener noreferrer"><h4>Twitter | ActiveTK.</h4></a><br>どーでも良い事をつぶやきます。<br>
        <a href="https://rinu.cf/yt" target="_blank" rel="noopener noreferrer"><h4>YouTube | ActiveTK.</h4></a><br>検証とかをいろいろしています!<br>
        <a href="https://hackall.cipher.jp/" target="_blank" rel="noopener noreferrer"><h4>HackAll v2</h4></a><br>ハッキングデモサイトです。我こそは伝説のハッカーだ!という方は是非挑戦してみてください。<br>
        <hr>
        <h2 style="color:#87ceeb;">【無料で使えるツール一覧】</h2>
        <a href="https://tokutei.cf/admin/" target="_blank" rel="noopener noreferrer"><h4>位置情報特定ツール</h4></a><br>位置情報を取得する事ができます。<br>
        <a href="https://rinu.cf/" target="_blank" rel="noopener noreferrer"><h4>URL短縮サービス</h4></a><br>URLを簡単に短縮する事ができます。安全危険判定機能付きです！<br>
        <a href="/SchTasks/JustClock/" target="_blank" rel="noopener noreferrer"><h4>時刻お知らせツール「JustClock」</h4></a><br>あらかじめ時刻を指定しておくと、その時間に音での通知を行います。ついつい「ネットに夢中になってしまう」という方は、是非使用してみてください。<br>
        <a href="/ATK-FM/" target="_blank" rel="noopener noreferrer"><h4>ATK-FM</h4></a><br>WEB上で動作する無料で使えるファイルマネージャーです。<br>
        <a href="https://copyright.activetk.cf/" target="_blank" rel="noopener noreferrer"><h4>著作物利用許可申請書作成ツール</h4></a><br>3分で著作権の利用許可を申請するテキストを作れます。メールで送信したり、印刷したり、画像を表示したりできます。<br>
        <a href="/imagechange/" target="_blank" rel="noopener noreferrer"><h4>画像変換ツール</h4></a><br>画像の形式を「jpg」から「png」のように変える事ができます。<br>
        <a href="https://www.activetk.cf/zip-decrypt0r/admin.php" target="_blank"><h4>【ATK Zip_Decrypt0r】ZIPファイルのパスワード解析ツール</h4></a><br>ZIPファイルのパスワードを忘れてしまいましたか？本ツールで簡単に解析できます！<br>
        <a href="/tools/parse.php" target="_blank" rel="noopener noreferrer"><h4>ファイル解析ツール</h4></a><br>ファイルの詳細情報を取得できます。URLを指定して解析する事も可能です。<br>
        <a href="https://rinu.cf/encrypt.php" target="_blank" rel="noopener noreferrer"><h4>ファイル暗号化/複合化</h4></a><br>ファイルを簡単に暗号化する事ができます。<br>
        <a href="/tools/QRcode.php" target="_blank" rel="noopener noreferrer"><h4>QRコード作成ツール</h4></a><br>好きな文字列を指定してQRコードを作成できます。<br>
        <a href="https://about.kaihi.cf/" target="_blank" rel="noopener noreferrer"><h4>NextIP</h4></a><br>Web上で動作する匿名性が高い簡易プロキシです。<br>
        <a href="/tools/Rand.php" target="_blank" rel="noopener noreferrer"><h4>【パスワード用】疑似乱数生成ツール</h4></a><br>安全なパスワードを生成します。オープンソースです。<br>
        <a href="https://rinu.cf/dl.php" target="_blank" rel="noopener noreferrer"><h4>URLダウンロードつーる</h4></a><br>iPadなどでファイルを「プレビューせずに」ダウンロードする事ができます<br>
        <a href="/tools/url-encode.php" target="_blank" rel="noopener noreferrer"><h4>URLエンコーダー</h4></a><br>JavaScriptを利用して好きな文字列をURLエンコードをする事ができます。<br>
        <a href="/tools/url-decode.php" target="_blank" rel="noopener noreferrer"><h4>URLデコーダー</h4></a><br>JavaScriptを利用して好きな文字列をURLデコードをする事ができます。<br>
        <a href="/tools/base64-encode.php" target="_blank" rel="noopener noreferrer"><h4>Base64エンコーダー</h4></a><br>JavaScriptを利用して好きな文字列をBase64エンコードをする事ができます。<br>
        <a href="/tools/base64-decode.php" target="_blank" rel="noopener noreferrer"><h4>Base64デコーダー</h4></a><br>JavaScriptを利用して好きな文字列をBase64デコードをする事ができます。<br>
        <a href="/tools/English2Leet.php" target="_blank" rel="noopener noreferrer"><h4>English2Leet</h4></a><br>英語の文字列を、Leetと呼ばれる「ハッカー語」に変換するツールです。<br>
        <a href="/tools/Leet2English.php" target="_blank" rel="noopener noreferrer"><h4>Leet2English</h4></a><br>Leetと呼ばれる「ハッカー語」の文字列を英語に変換するツールです<br>
        <a href="/url/" target="_blank" rel="noopener noreferrer"><h4>IPアドレス特定博士</h4></a><br>詐欺師のIPアドレス特定にでも使ってください。悪用厳禁!!<br>
        <a href="/imei/" target="_blank" rel="noopener noreferrer"><h4>異名メール君</h4></a><br>「異名」でメールを送信する事ができます！(試験段階)<br>
        <a href="/ATK_Mail/" target="_blank" rel="noopener noreferrer"><h4>ATK_Mail</h4></a><br>登録不要!HTMLやJavaScriptで簡単にメールを送信できます。<br>
        <a href="/time/" target="_blank" rel="noopener noreferrer"><h4>簡易現在時刻ビュワー</h4></a><br>現在時刻を大きく表示します。スクリーンセーバーにオススメです。<br>
        <a href="https://www.vector.co.jp/vpack/browse/person/an062133.html" target="_blank" rel="noopener noreferrer"><h4>Vector | ActiveTK.</h4></a><br>ここで便利なアプリなどを公開しています。<br>
        <a href="http://nanisore-oisiino.cf/" target="_blank" rel="noopener noreferrer"><h4>「何それおいしいの」BotのWebサイト</h4></a><br>このサイトに説明は..無いかな..<br>
        <a href="https://rinu.cf/dmz0xvpe7fkk" target="_blank" rel="noopener noreferrer"><h4>WebPad</h4></a><br>拡張機能です。簡易メモ帳的な物です。(語彙力)<br>
        <a href="/Get_IP/" target="_blank" rel="noopener noreferrer"><h4>Get_IP君</h4></a><br>IPアドレスを取得し返すツールです。<br>
        <a href="/iframe/" target="_blank" rel="noopener noreferrer"><h4>Iframe君</h4></a><br>指定したページをiframeで表示します。<br>
        <hr>
      </div>
      <span style="display:none;">連絡は<a href="mailto:sp@activetk.cf">sp@activetk.cf</a>にお願いします！</span>
      <div style="background-color:#87ceeb;color:#080808;width:90%;overflow-x:hidden;overflow-y:visible;">
<?php } ?>
        <h2>感想や意見、要望などの書き込みフォーム(節度を守ってお願いします！)</h2>
        <form action="" method="post">
          <input type="text" name="name" size="42" placeholder="名前" required><br>
          <textarea rows="14" name="cmt" placeholder="内容" required></textarea><br>
          <input type="submit" value="書き込む">
        </form>
        <hr>
        <h2>書き込まれた感想一覧</h2>
        <pre>※書き込みの削除したい場合は、<a href="https://rinu.cf/twitter" target="_blank" rel="noopener noreferrer">Twitterのダイレクトチャット</a>にてご連絡ください。</pre>
        <div id="com">
          <?=$comment?>
          <?php if (!isset($_GET["get-comment-all"])) { ?>
<div style='background-color:#696969;'><div style='color:#00fa9a'><a href="?get-comment-all"><input type="button" value="以前のコメントを全て表示"></div></a></div><br>
<?php } echo "        </div>\n"; ?>
      </div>
    </div>
    <a href="#home" style="position:fixed;bottom:20px;right:2px;" title="TOPへ"><img src="./top.jpg" width="84" height="80"></a>
    <div align="right" style="position:fixed;bottom:0px;right:0px;">
      <span style="background-color:#06f5f3;">
        <?php if ($issumaho) echo "(c) ActiveTK."; else echo "Copyright &copy; 2020-2022 ActiveTK. All rights reserved."; ?></span>
    </div>
    <br><br><br>
  </body>
</html>
