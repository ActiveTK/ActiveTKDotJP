<?php
  $kekka = "";
  $nonce = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 36);
  ini_set("display_startup_errors", 0);
  error_reporting(E_ALL);
  header("X-ATK-Comment: Thank you for using!");
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
  function is_safe_browse($url)
  {
    if (strpos($url, 'unsafe.activetk.jp') !== false) return "UnSafeTest - unsafe.activetk.jp";
    try
    {

      $safe_browsing_api_key = "AIzaSyDcQ_L0dnDH3OAJzzC84Sg4Y9cKJydkYfg";
      $safe_browsing_api_url = "https://safebrowsing.googleapis.com/v4/threatMatches:find?key=AIzaSyChMmcSDQiBfT3hHbuDJ6zAuLq4nRqIRq8";
      $safe_browsing_api_body = array(
        "client" => array(
          "clientId" => "BitLinker",
          "clientVersion" => "4.0.0"
        ),
        "threatInfo" => array(
          "threatTypes" => array("MALWARE", "SOCIAL_ENGINEERING", "UNWANTED_SOFTWARE", "POTENTIALLY_HARMFUL_APPLICATION"),
          "platformTypes" => array("ANY_PLATFORM"),
          "threatEntryTypes" => array("URL"),
          "threatEntries" => array(
            array(
              "url" => $url
            )
          )
        )
      );

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $safe_browsing_api_url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($safe_browsing_api_body));
      curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ));
      $ks = curl_exec($ch);
      curl_close($ch);
      $k = json_decode($ks, true);

      if (isset($k["matches"])) {
        ob_start();
        var_dump($k["matches"]);
	$ob = ob_get_contents();
	ob_end_clean();

        $LogFile = "/home/activetk/data/rinu.cf/unsafe.log";

        $debuginfo = array();

        $debuginfo["Time"] = date("Y/m/d - M (D) H:i:s");
        $debuginfo["Time_Unix"] = microtime(true);
        $debuginfo["IP"] = $_SERVER['REMOTE_ADDR'];
        $debuginfo["URL"] = $url;
        $debuginfo["GoogleSafeBrowsing"] = json_encode($k);

        if ( isset( $_SERVER['REQUEST_URI'] ) )
          $debuginfo["PATH"] = $_SERVER['REQUEST_URI'];

        if ( isset( $_GET ) )
          $debuginfo["GET"] = json_encode($_GET);

        if ( isset( $_POST ) )
          $debuginfo["POST"] = json_encode($_POST);

        if ( isset( $_SERVER['HTTP_USER_AGENT'] ) )
          $debuginfo["UserAgent"] = $_SERVER['HTTP_USER_AGENT'];

        if ( isset( $_SERVER['HTTP_REFERER'] ) )
          $debuginfo["Referer"] = $_SERVER['HTTP_REFERER'];

        $a = fopen($LogFile, "a");
        @fwrite($a, json_encode($debuginfo) . "\n");
        fclose($a);

        return "GoogleSafeBrowsing\n" . $ob;;
      }
      else if (isset($k["error"])) {
        ob_start();
        var_dump($k["error"]);
	$ob = ob_get_contents();
	ob_end_clean();
        return "GoogleSafeBrowsing - Error\n" . $ob;;
      }
      else return "None";

    } catch(Exception $e) {
      report($e);
      return "Curl - Unknown Error";
    }
    return "None";
  }
  if ((isset($_POST["q"]) && $_POST["q"] != "") || (isset($_GET["addurlbyphp"]) && $_GET["addurlbyphp"] != ""))
  {
    $code = substr(base_convert(md5(uniqid()), 16, 36), 0, 12);
    if (isset($_POST["foradminmojiretu"])) $code = $_POST["foradminmojiretu"];
    if (isset($_POST["q"])) $url = $_POST["q"];
    else $url = $_GET["addurlbyphp"];
    $url = str_replace("\n", "", $url);
    $url = str_replace("\r", "", $url);
    $url = str_replace("\0", "", $url);
    if (isset($_GET["makefrom"])) $ipa = htmlspecialchars($_GET["makefrom"]);
    else $ipa = $_SERVER['REMOTE_ADDR'];
    try
    {
      $pdo = new PDO(DSN, DB_USER, DB_PASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->exec("create table if not exists urlmin_url(
        code varchar(255),
        tourl varchar(255),
        makeip varchar(255),
        maketime varchar(255),
        usetimes varchar(50),
        lastuse varchar(50)
      )");
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
      if ($anz != "None" && !isset($_POST["foradminmojiretu"]))
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
      <p><a href="https://www.activetk.jp/tools/urlmin/" target="_blank" rel="noopener noreferrer">URL短縮サービス</a>をご利用頂き、誠にありがとうございます。</p>
      <p>あなたが短縮しようとしたURLは Google Safe Browsing によって、安全では無いと判断されました。</p>
      <a href="https://www.activetk.jp/tools/urlmin/" rel="noopener noreferrer"><input type="button" value="戻る"></a>
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
    <base href="https://www.activetk.jp/tools/urlmin/">
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="<?php echo $decp; ?>">
    <meta name="copyright" content="Copyright &copy; 2021 ActiveTK. All rights reserved.">
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
    <meta property="og:url" content="https://www.activetk.jp/tools/urlmin/">
    <meta property="og:site_name" content="<?php echo $title; ?>">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.png">
    <meta property="og:image:width" content="862">
    <meta property="og:image:height" content="360">
    <link rel="canonical" href="https://www.activetk.jp/tools/urlmin/">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <?php if (isset($_POST["q"])) { ?><script src="https://code.activetk.jp/ActiveTK.min.js" nonce="<?=$nonce?>"></script><?php } ?>
    <script defer src="https://rinu.cf/pv/index.php?token=rinucfhome&callback=console.log" nonce="<?=$nonce?>"></script>
    <style>a{color: #00ff00;position: relative;display: inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#e6e6fa;text:#363636;">
    <br>
    <div align='center'>
      <h2>安全危険判定機能付き！URL短縮サービス</h2><br>
      <hr color="#363636" size="2">
      <form action='' method='POST'>
        <input type='text' name='q' size='40' placeholder='ここにURLを入力してください'>
        <?php if (isset($_GET["admin-url"]) && $_GET["admin-url"] == "777759297777") { ?>
        <br>
        <input type='text' name='foradminmojiretu' size='20' placeholder='文字列'>
        <br>
        <?php } ?>
        <input type='submit' value='短縮'>
      </form>
      <hr color="#363636" size="2">
      <div id="kekka">
      <?php if (isset($_POST["q"]) || isset($_GET["q"])) { ?>
      短縮に成功しました!<br>
      <input type='text' size='34' id='kekkatext' value='<?=$kekka?>'>
      <a href='javascript:window.open(_("kekkatext").value,"_blank");'><input type='button' value='開く'></a>
      <a href='javascript:atk.copy(_("kekkatext").value);alert("コピーしました！");'><input type='button' value='コピー'></a>
      <hr color="#363636" size="2">
      <?php } ?>
      </div>
      <p>Thank you for using!</p>
      <br>
    </div>
  </body>
</html>