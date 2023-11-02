<?php
  $kekka = "";
  $nonce = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 36);
  ini_set("display_startup_errors", 0);
  error_reporting(E_ALL);
  header("X-ATK-Comment: Thank you for using!");

  function CREATE_MIN_CODE() {

    // サービス開始 ～ 2022/12/12
    // return substr(base_convert(md5(uniqid()), 16, 36), 0, 12);

    // 2022/12/13 ～
    return substr(base_convert(sha1(md5(uniqid()).md5(microtime())), 16, 36), 0, 6);

  }

  function hankaku($text) {
    if (preg_match("/^[a-zA-Z0-9]+$/",$text)) return true;
    else return false;
  }
  function IsCode($IDX){
    if (!hankaku($IDX)) return false;
    $dbh = new PDO(DSN, DB_USER, DB_PASS);
    $stmt = $dbh->prepare('select * from urlmin_url where code = ?');
    $stmt->execute([$IDX]);
    $resd = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($resd == false) return false;
    else return true;
  }
  if ((isset($_POST["q"]) && $_POST["q"] != "") || (isset($_GET["addurlbyphp"]) && $_GET["addurlbyphp"] != ""))
  {

    if (isset($_POST["recaptchaResponse"]) && !empty($_POST["recaptchaResponse"])) {
      $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".Google_ReCap_ACTIVETKDOTJP_SecretKey2."&response=".$_POST["recaptchaResponse"]);
      $reCAPTCHA = json_decode($verifyResponse);
      if ($reCAPTCHA->success) { }
      else
        die("reCAPTCHAエラーが発生しました。<br>お使いの端末のJavaScriptを有効にして下さい。");
    } else
      die("reCAPTCHAエラーが発生しました。<br>お使いの端末のJavaScriptを有効にして下さい。");

    $code = CREATE_MIN_CODE();
    if (isset($_POST["q"])) $url = $_POST["q"];
    else $url = $_GET["addurlbyphp"];
    $url = str_replace("\n", "", $url);
    $url = str_replace("\r", "", $url);
    $url = str_replace("\0", "", $url);

    if (strlen($url) == 0)
      die("URLは1文字以上で入力して下さい。");

    if (isset($_GET["makefrom"])) $ipa = htmlspecialchars($_GET["makefrom"]);
    else $ipa = $_SERVER['REMOTE_ADDR'];
    try
    {
      $pdo = new PDO(DSN, DB_USER, DB_PASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      /*
      $pdo->exec("create table if not exists urlmin_url(
        code varchar(255),
        tourl varchar(255),
        makeip varchar(255),
        maketime varchar(255),
        usetimes varchar(50),
        lastuse varchar(50)
      )");
      */
      $stmt = $pdo->prepare("insert into urlmin_url(code, tourl, makeip, maketime, usetimes, lastuse) value(?, ?, ?, ?, ?, ?)");
      $stmt->execute([
        $code,
        $url,
        $ipa, 
        time(),
        "0",
        "NotUsed"
      ]);
      $kekka = "https://rinu.cf/" . $code;
      $anz = is_safe_browse($url);
      if ($anz != "None")
      { ?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>エラー | URL短縮サービス</title>
    <meta name="robots" content="noindex">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <style>a{color: #00ff00;position: relative;display: inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
  </head>
  <body style="background-color:#e6e6fa;text:#363636;">
    <br>
    <div align='center'>
      <h2>危険なURLは短縮できません</h2><br>
      <hr color="#363636" size="2">
      <p><a href="https://www.activetk.jp/tools/urlmin" target="_blank" rel="noopener noreferrer">URL短縮サービス</a>をご利用頂き、誠にありがとうございます。</p>
      <p>あなたが短縮しようとしたURLは Google Safe Browsing によって、安全では無いと判断されました。</p>
      <a href="https://www.activetk.jp/tools/urlmin" rel="noopener noreferrer"><input type="button" value="戻る"></a>
      <hr color="#363636" size="2">
      <pre>URL : <?=$url?></pre>
      <pre align="center" style="width:30%;text-align:left;">詳細 : <?=$anz?></pre>
      <hr color="#363636" size="2">
      <p>Powered by Google Safe Browsing</p>
      <br>
    </div>
  </body>
</html>
        <?php
        exit();
      }
    } catch (\Exception $e) { 
      $kekka = 'すみませんが、URLを短縮できませんでした。。';
      echo $e->getMessage() . PHP_EOL;
    }
  }
  if (isset($_GET["addurlbyphp"])) exit($kekka);
  $title = "安全危険判定機能付き！URL短縮サービス";
  $decp = "安全危険判定機能付きのURL短縮サービスです。";
  ?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="URL,URL短縮,無料,簡単">
    <title>安全危険判定機能付き！URL短縮サービス</title>
    <base href="https://www.activetk.jp/tools/urlmin">
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="<?php echo $decp; ?>">
    <meta name="copyright" content="Copyright &copy; 2023 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ActiveTK5929">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $decp; ?>">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.png">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $decp; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.activetk.jp/tools/urlmin">
    <meta property="og:site_name" content="<?php echo $title; ?>">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.png">
    <meta property="og:image:width" content="862">
    <meta property="og:image:height" content="360">
    <link rel="canonical" href="https://www.activetk.jp/tools/urlmin">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <?php if (isset($_POST["q"])) { ?><script src="https://code.activetk.jp/ActiveTK.min.js" nonce="<?=$nonce?>"></script><?php } ?>
    <script defer src="https://rinu.cf/pv/index.php?token=rinucfhome&callback=console.log" nonce="<?=$nonce?>"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LfQCi8jAAAAAIgnC9Pen1m8Api5zOrFnPLzF2fu" nonce="<?=$nonce?>"></script>
    <script nonce="<?=$nonce?>">
    grecaptcha.ready(function () {
      grecaptcha.execute("6LfQCi8jAAAAAIgnC9Pen1m8Api5zOrFnPLzF2fu", {action: "sent"}).then(function(token) {
        var recaptchaResponse = document.getElementById("recaptchaResponse");
        recaptchaResponse.value = token;
      });
    });
    </script>
    <style>a{color: #00ff00;position: relative;display: inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#e6e6fa;text:#363636;">
    <br>
    <div align='center'>
      <h1>安全危険判定機能付き！URL短縮サービス</h1>
      <p>下のテキストボックスにURLを入力して、「短縮！」を押すと簡単にURLを短くする事ができます。</p>
      <p>Google社の提供するGoogle セーフブラウジングに対応しており、シンプルなUIで簡単かつ安全にURLを短縮できるのが特徴です！</p>
      <br>
      <hr color="#363636" size="2">
      <form action='' method='POST'>
        <input type='text' name='q' style="height:20px;width:500px;" placeholder='ここにURLを入力してください' required>
        <input type="hidden" name="recaptchaResponse" id="recaptchaResponse">
        <input type='submit' value='短縮！' style="height:60px;width:140px;">
      </form>
      <hr color="#363636" size="2">
      <div id="kekka">

      <?php if (isset($_POST["q"]) || isset($_GET["q"])) { ?>
      短縮に成功しました!<?php
        $oldlen = strlen($_POST["q"]);
        if ($oldlen == 0)
          $oldlen = 1;
        $newlen = strlen($kekka);
        echo "(<b>{$oldlen}</b>文字 -> <b>{$newlen}</b>文字、<b>" . round($newlen / $oldlen * 100, 2) . "</b>%の長さです！)";
      ?><br>
      <input type='text' size='34' id='kekkatext' value='<?=$kekka?>'>
      <a href='javascript:void(window.open(_("kekkatext").value, "_blank"))'><input type='button' value='開く' style="height:30px;width:70px;"></a><br>
      <a href='javascript:void(atk.copy(_("kekkatext").value),_("beforecopy").innerText=" コピーしました！");'><input type='button' value='コピー' style="height:30px;width:200px;"></a><span id="beforecopy"></span>
      <hr color="#363636" size="2">
      <?php } ?>

      </div>

      <div>
        <h3>Google セーフブラウジングとは？</h3>
        <p><b>Google セーフブラウジング</b>は、Google社が提供する、URLが安全か危険かを判定できるAPIです。</p>
        <p>本サイトではこのAPIを利用しているため、Google社により「危険」と判断されたURLは短縮する事ができず、「以前は安全だったものの、今は危険に変わってしまったページ」へアクセスする際には警告を表示します。</p>
      </div>

      <div>
        <h3>URLを短縮するメリットとは？</h3>
        <p>日本語を含むURLを表記しようとすると、URLエンコードと呼ばれる非常に長いURLになってしまう事があります。</p>
        <p>例えば、<a href="https://ja.wikipedia.org/wiki/%E7%89%B9%E5%AE%9A%E9%9B%BB%E6%B0%97%E9%80%9A%E4%BF%A1%E5%BD%B9%E5%8B%99%E6%8F%90%E4%BE%9B%E8%80%85%E3%81%AE%E6%90%8D%E5%AE%B3%E8%B3%A0%E5%84%9F%E8%B2%AC%E4%BB%BB%E3%81%AE%E5%88%B6%E9%99%90%E5%8F%8A%E3%81%B3%E7%99%BA%E4%BF%A1%E8%80%85%E6%83%85%E5%A0%B1%E3%81%AE%E9%96%8B%E7%A4%BA%E3%81%AB%E9%96%A2%E3%81%99%E3%82%8B%E6%B3%95%E5%BE%8B" target="_blank">Wikipediaの「特定電気通信役務提供者の損害賠償責任の制限及び発信者情報の開示に関する法律」</a>という項目のURLを表記すると、</p>
        <code style="overflow-wrap:break-word;word-break:break-word;">https://ja.wikipedia.org/wiki/%E7%89%B9%E5%AE%9A%E9%9B%BB%E6%B0%97%E9%80%9A%E4%BF%A1%E5%BD%B9%E5%8B%99%E6%8F%90%E4%BE%9B%E8%80%85%E3%81%AE%E6%90%8D%E5%AE%B3%E8%B3%A0%E5%84%9F%E8%B2%AC%E4%BB%BB%E3%81%AE%E5%88%B6%E9%99%90%E5%8F%8A%E3%81%B3%E7%99%BA%E4%BF%A1%E8%80%85%E6%83%85%E5%A0%B1%E3%81%AE%E9%96%8B%E7%A4%BA%E3%81%AB%E9%96%A2%E3%81%99%E3%82%8B%E6%B3%95%E5%BE%8B</code>
        <p>という長い文字列になってしまい、「%」あたりがかなり怪しげな雰囲気になってしまいます。</p>
        <p>そこで、このURL短縮サービスを利用してURLを短縮すると、次のようになります。</p>
        <code>https://rinu.cf/drk7jm</code>
        <p>この短いURLであれば、先ほどの冗長なURLよりも安心感があり、クリック率の向上が期待できます。</p>
      </div>

      <div>
        <h3>APIについて</h3>
        <p>本ツールのAPIにつきましては、<a href="https://note.activetk.jp/tools/urlmin-api" target="_blank">こちら</a>をご参照ください。</p>
      </div>

      <hr color="#363636" size="2">

      <?=GetAdHere()?>
      <hr color="#363636" size="2">
      <div align="center"><?=Get_Last()?></div>
    </div>
  </body>
</html>
