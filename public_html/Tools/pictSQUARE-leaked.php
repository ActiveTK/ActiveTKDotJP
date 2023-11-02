<?php

  $title = "pictSQUARE Leaked Checker for samples - ActiveTK.jp";
  $dec = "2023年にpictBLandとpictSQUAREにおいて、情報漏洩が発生しました。本ツールではどのような情報が流失しているのか確認できます。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/pictsquare-leaked";

  function ShowErrorMessage()
  {
    ?>
        <h2 style='color:#b22222;font-size:2rem;'>Error: Invailed Email</h2>
        <p>正しくメールアドレスを入力して下さい。</p>
        <hr size="10" color="#7fffd4">
    <?php
      exit();
  }

  if ( isset( $_POST["checkid"] ) )
  {
    header( "Content-Type: text/html;charset=UTF-8" );
    if ( !is_string( $_POST["checkid"] ) || empty( $_POST["checkid"] ) )
      ShowErrorMessage();
    $Mail = trim( $_POST["checkid"] );
    if ( !preg_match('/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i', $Mail) )
      ShowErrorMessage();

    $dbh = new PDO( DSN, DB_USER, DB_PASS );
    try {
      $stmt = $dbh->prepare('select * from LakedpictSQUARE where mail = ? limit 1;');
      $stmt->execute( [$Mail] );
      $row = $stmt->fetch( PDO::FETCH_ASSOC );
    } catch ( \Throwable $e ) {
      ShowErrorMessage();
    }

    if (isset($row["mail"]) && !empty($row["mail"])) {
      
      $Leaked = "メールアドレス";
      $Leaked .= "、パスワード(" . ( strlen($row["password"]) == 32 ? "md5ハッシュ値の状態" : substr($row["password"], 0, 4) . "****" ) . ")";
      if (!empty($row["tel"]))
        $Leaked .= "、電話番号(" . substr($row["tel"], 0, 7) . "****)";
      if (!empty($row["delivary_name"]))
        $Leaked .= "、配送先情報";
      if (!empty($row["twitter_token_secret"]))
        $Leaked .= "、twitterトークン";

      ?>

        <h2 style='color:#b22222;font-size:2rem;'>Record Found - Pwned!!</h2>
        <p>指定されたアカウントの情報漏洩が確認されました。</p>
        <p>流失している情報には、<?=htmlspecialchars($Leaked)?>などが含まれます。</p>
        <p>今後、パスワードの使いまわしを狙った攻撃なども考えられますので、早急に各種サービスのパスワードを変更して下さい。</p>
        <hr size="10" color="#7fffd4">
      <?php
    } else {
      ?>
        <h2 style='color:#00FF00;font-size:2rem;'>Good News - Not Pwned</h2>
        <p>指定されたアカウントの情報漏洩は確認"されません"でしたので、ご安心下さい。</p>
        <p>ただし、本ツールが調査できるのは流失したデータベースの一部ですので、犯人が保有している元のデータベースに含まれていないとは言い切れません。<br>
           今後も、インターネットにおいては容易に個人情報を入力しないようにご注意下さい。</p>
        <hr size="10" color="#7fffd4">
      <?php }
    exit();
  }

?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>
    <base href="<?php echo $url; ?>">
    <meta name="robots" content="All">
    <meta name="favicon" content="<?=$root?>icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="<?php echo $dec; ?>">
    <meta name="thumbnail" content="<?=$root?>icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $dec; ?>">
    <meta name="twitter:image:src" content="<?=$root?>icon/index.jpg">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $dec; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:site_name" content="<?php echo $title; ?>">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="<?=$root?>icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="canonical" href="<?php echo $url; ?>">
    <link rel="shortcut icon" href="<?=$root?>icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="<?=$root?>icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="<?=$root?>icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="<?=$root?>icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="<?=$root?>icon/index_150_150.ico">
    <script src="https://code.activetk.jp/ActiveTK.min.js" type="text/javascript" charset="UTF-8"></script>
    <script src="https://unpkg.com/typewriter-effect@2.18.2/dist/core.js"></script>
    <script type="text/javascript">let url=new URL(window.location.href);try{url.searchParams.get("nocache")||(url.searchParams.set("nocache",Date.now()),window.location.href=url.href)}catch(a){url.searchParams.set("nocache",Date.now()),window.location.href=url.href}window.onload=function(){new Typewriter(_("per1"),{loop:!0,delay:75,autoStart:!0,cursor:"|",strings:[""]}),new Typewriter(_("per2"),{loop:!0,delay:75,autoStart:!0,cursor:"|",strings:[""]}),_("save").focus(),_("td").onsubmit=function(){try{_("status_loading").style.display="block",_("status_complete").style.display="none",_("result").style.display="none";let e=new FormData;e.append("checkid",_("save").value),$.ajax({url:"",type:"POST",data:e,cache:!1,contentType:!1,processData:!1}).done(function(e){_("result").innerHTML=e,_("status_loading").style.display="none",_("status_complete").style.display="block",_("result").style.display="block"}).fail(function(e,t,s){_("status_loading").style.display="none",_("status_complete").style.display="none",_("result").innerHTML='<h2 style=\'color:#b22222;font-size:2rem;\'>Error: Timeout</h2>\n        <p>申し訳ございません。確認に時間がかかりすぎたため、自動的にタイムアウトされました。</p>\n        <p>漏洩したリストの最後の方にアカウントが存在しているか、そもそも存在していないと推測されます。</p>\n        <p>極度に心配する必要はありませんが、今後詐欺メールなどが届く可能性もありますので、不審なメールは開かないことなどを徹底して下さい。</p>\n        <hr size="10" color="#7fffd4">',_("result").style.display="block"})}catch(e){_("status_loading").style.display="none",_("status_complete").style.display="none",_("result").innerHTML='<h2 style=\'color:#b22222;font-size:2rem;\'>Error: Timeout</h2>\n      <p>申し訳ございません。確認に時間がかかりすぎたため、自動的にタイムアウトされました。</p>\n      <p>漏洩したリストの最後の方にアカウントが存在しているか、そもそも存在していないと推測されます。</p>\n      <p>極度に心配する必要はありませんが、今後詐欺メールなどが届く可能性もありますので、不審なメールは開かないことなどを徹底して下さい。</p>\n      <hr size="10" color="#7fffd4">',_("result").style.display="block"}return!1}};</script>
    <style>@font-face{font-family:KikaiChokokuJISMd;src:url(https://activetk.jp/font/KikaiChokokuJIS-Md.otf)}body{font-family:KikaiChokokuJISMd}.btn{height:60px;width:170px;font-size:1.6rem;line-height:1.5;position:relative;display:inline-block;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-transition:all .3s;transition:all .3s;text-align:center;vertical-align:middle;text-decoration:none;letter-spacing:.1em;border-radius:.5rem;color:#000;background-color:#6495ed;border-bottom:5px solid #ccc100}.btn:hover{margin-top:3px;color:#000;background:#6495ed;border-bottom:2px solid #74a5f0}</style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#080808;color:#00BB00">
    <noscript>
      <div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center">
        <font color="#ff4500"><h1>お使いのブラウザのJavaScriptが無効です。有効にして下さい。</h1></font>
      </div>
    </noscript>
    <div align="center" id="home">
      <h1>pictSQUARE Leaked Checker for samples - ActiveTK.jp</h1>
      <div title="本ツールについて" style="background-color:#90ee90;color:#000000;width:<?=com("60", "80")?>%;">
        <hr size="10" color="#7fffd4">
        <div><h2>pictSQUARE Leaked Checker for samples</h2></div>
        2023年にpictBLandとpictSQUAREにおいて、情報漏洩が発生しました。<br>
        本ツールでは5000件分のレコードの中に情報が含まれているかを確認できます(全てではありません)。
        <hr size="10" color="#7fffd4">
      </div>
      <form action="" method="POST" id="td" style="width:<?=com("60", "80")?>%;">
        <h2>$ Pwned-Check <input type="email" id="save" style="height:40px;width:200px;" placeholder="登録したメールアドレス" style="font-size:2rem;"></h2>
        <input type="submit" value="確認" class="btn btn--yellow btn--cubic">
        <div id="status">
          <p id="status_loading" style="display:none;">Status: Checking..<span id="per1"></span></p>
          <p id="status_complete" style="display:none;">Status: Complete!<span id="per2"></span></p>
        </div>
        <hr size="10" color="#7fffd4">
      </form>
      <div id="result" style="width:<?=com("60", "80")?>%;"></div>
    </div>
    <br>
    <div style="background-color:#6495ed;color:#0f0f0f;">
      <div id="footer" style="align:center;text-align:center;">
        <br>
        <?php if (!Phone) { ?>
        <hr style="width:<?=com("60", "80")?>%;">
        <pre class="tyoukokufont">※<a href="https://ja.wikipedia.org/wiki/Coinhive%E4%BA%8B%E4%BB%B6" target="_blank">Coinhive事件</a>の勝訴時に利用された、<a href="https://font.kim/" target="_blank">機械彫刻用標準書体フォント</a>を使用しています</pre>
        <hr style="width:<?=com("60", "80")?>%;">
        <?php } ?>
        <?=Get_Last()?>
        <?php if (Phone) { ?><br><?php } ?>
      </div>
    </div>
    <br>
  </body>
</html>