<?php

  define( "Title", "お問い合わせ" );

  if (isset($_POST["license_readme"]) && $_POST["license_readme"] == "ok" && isset($_POST[ 'g-recaptcha-response' ]) && isset($_POST["contact_dec"]) && isset($_POST["contact_name"]) && isset($_POST["contact_mail"]) && isset($_POST["contact_data"]))
  {
    $dec = $_POST["contact_dec"];
    $name = $_POST["contact_name"];
    $mail = $_POST["contact_mail"];
    $datax = $_POST["contact_data"];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
      'secret' => Google_ReCap_ACTIVETKDOTJP_SecretKey,
      'response' => $_POST[ 'g-recaptcha-response' ]
    );
    $context = array(
      'http' => array(
        'method'  => 'POST',
        'header'  => implode("\r\n", array('Content-Type: application/x-www-form-urlencoded',)),
        'content' => http_build_query($data)
      )
    );
    $api_response = file_get_contents($url, false, stream_context_create($context));
    $result = json_decode( $api_response );
    if ( $result->success ) {}
    else {
      die("<p>私はロボットではありませんにチェックを入れてください。</p>");
    }

    if ($dec != "ツールに関する質問" && $dec != "ツールの追加の要望" && $dec != "バグの報告" && $dec != "法的なご相談" && $dec != "その他")
      die("<p>スパムと判定されました。</p>");

    $LogFile = "/home/activetk/data/ActiveTKDotJP/Contact.log";

    $debuginfo = array();

    $debuginfo["Time"] = date("Y/m/d - M (D) H:i:s");
    $debuginfo["Time_Unix"] = microtime(true);

    $debuginfo["IP"] = $_SERVER['REMOTE_ADDR'];
      
    if ( isset( $_SERVER['HTTP_USER_AGENT'] ) )
      $debuginfo["UserAgent"] = $_SERVER['HTTP_USER_AGENT'];
    else
      $debuginfo["UserAgent"] = "";

    $debuginfo["Dec"] = $dec;
    $debuginfo["Name"] = $name;
    $debuginfo["Mail"] = $mail;
    $debuginfo["Data"] = $datax;

    $a = fopen($LogFile, "a");
    @fwrite( $a, json_encode( $debuginfo ) . "\n" );
    fclose( $a );

    NotificationAdmin("お問い合わせ: " . htmlspecialchars($dec),
      "<p>送信時刻: " . date("Y/m/d - M (D) H:i:s") . "</p><p>IPアドレス: " . $_SERVER['REMOTE_ADDR'] . "</p><p>UserAgent: " . $debuginfo["UserAgent"] . "</p>" .
      "<hr color='#363636' size='2'><p>名前: " . htmlspecialchars($name) . "</p><p>返信先メールアドレス: " . htmlspecialchars($mail) . "</p><p>内容</p><pre>" . htmlspecialchars($datax) . "</pre><br>");
    
    ?>
        <meta name="robots" content="noindex, nofollow">
        <body style="background-color:#e6e6fa;">
          <h1>お問い合わせを受け付けました。</h1>
          <p><b>指定されたメールアドレスに返信をお返しすると共に、このデータは、<a href="/privacy">プライバシーに関する声明</a>に基づき、サービスの改善に使用させていただきます。<br>また、返信は一週間程度の時間を要する場合がございますので、ご了承ください。</b></p>
          <h3><a href="/home">ホームへ戻る</a></h3>
        </body>
      <?php
    exit();
  }

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
    <script src="https://www.google.com/recaptcha/api.js" nonce="<?=$nonce?>"></script>
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
      <h1>お問い合わせ - ActiveTK.jp</h1>
      <p>本サイトに関する質問・要望・バグの報告などは、以下のフォームから行えます。</p>
      <br>
      <hr>
	  <form action='' method='POST' id="contact">
        お問い合わせの種類:
        <select name="contact_dec" id="contact_dec" required>
          <option value="ツールに関する質問">ツールに関する質問</option>
          <option value="ツールの追加の要望">ツールの追加の要望</option>
          <option value="バグの報告">バグの報告</option>
          <option value="法的なご相談">法的なご相談</option>
          <option value="その他">その他</option>
        </select>(必須)<br><br>
        お名前又はニックネーム: <input type='text' name='contact_name' style="height:20px;width:200px;" placeholder='お名前' required>(必須)<br>
        ご連絡先のメールアドレス: <input type='email' name='contact_mail' style="height:20px;width:200px;" placeholder='メールアドレス' pattern=".+\.[a-zA-Z0-9][a-zA-Z0-9-]{0,61}[a-zA-Z0-9]" required>(必須)<br><br>
        【お問い合わせ内容】<br>
        <textarea name="contact_data" placeholder="内容をこちらへ入力してください"  style="height:200px;width:320px;"></textarea><br>
        <pre>※本フォーム内に、個人情報を入力しないでください。</pre>
        <br>
        <label><input type="checkbox" name="license_readme" value="ok" style="height:20px;width:20px;" required> 私は、本サイトの<a href="/license" target="_blank">利用規約</a>並びに<a href="/privacy" target="_blank">プライバシーに関する声明</a>を読み、理解しました。(必須)</label><br><br>
        <div class="g-recaptcha" data-sitekey="6Lf4_PgeAAAAACJZqNQYnXLHo2n1lO2MBQoOD81M"></div><br>
        <input type="submit" style="height:60px;width:140px;" value="送信">
        <br>
        報告された情報は<a href="/privacy" target="_blank">プライバシーに関する声明</a>に従って処理され、サービスの改善に使用させていただきます。<br>
        また、入力されたメールアドレスが本件お問い合わせ以外に使用される事は絶対にありません。
      </form>
      <hr>
      <?=Get_Last()?>
    </div>
    <script nonce="<?=nonce?>" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script nonce="<?=nonce?>">function collapse_handler(e){let t=document.getElementById("navbar-collapse");new bootstrap.Collapse(t,{toggle:!0})}document.addEventListener("DOMContentLoaded",()=>{document.getElementById("toggler-button").addEventListener("click",collapse_handler,!1)});</script>
  </body>
</html>