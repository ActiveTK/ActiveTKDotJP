<?php

  $title = "Twitter Leaked Checker - ActiveTK.jp";
  $dec = "2021年後半に2億人超のアカウント情報がTwitterから流失したとみられており、本ツールではその流失した情報にご自身のアカウントが含まれているか確認できます。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/twitter-leaked200";

  function ShowErrorMessage()
  {
    ?>
        <h2 style='color:#b22222;font-size:2rem;'>Error: Too Short</h2>
        <p>TwitterのID(スクリーンネーム)は4文字以上で入力して下さい。</p>
        <hr size="10" color="#7fffd4">
    <?php
      exit();
  }

  if ( isset( $_POST["checkid"] ) )
  {
    header( "Content-Type: text/html;charset=UTF-8" );
    if ( !is_string( $_POST["checkid"] ) || empty( $_POST["checkid"] ) )
      ShowErrorMessage();
    $UID = basename( trim( $_POST["checkid"] ) );
    if ( substr( $UID, 0, 1 ) == "@" )
      $UID = substr( $UID, 1 );
    $UID = htmlspecialchars( $UID );

    if ( strlen( $UID ) < 4 )
      ShowErrorMessage();

    $Query = $UID . "\r";
    $Leaked = false;
    if ( stripos( file_get_contents("/home/activetk/data/ActiveTKDotJP/v-accounts.txt"), $UID . "\r" ) !== false )
      $Leaked = true;

    if ( !$Leaked && strtolower( $UID ) != "activetk5929" )
    {
      $f = "/home/activetk/data/ActiveTKDotJP/TwitterLeakedAccounts2/" . substr( strtolower( $UID ), 0, 2 ) . "/" . substr( strtolower( $UID ), 2, 2 ) . ".txt";
      if ( file_exists( $f ) )
      {
        $NowReading = 0;
        $DataPerLimit = 1024 * 10;
        $FileSize = filesize( $f );
        while( true )
        {
          if ( ( $NowReading + $DataPerLimit ) >= $FileSize )
            $DataTmp = file_get_contents( $f, false, null, $NowReading, $FileSize );
          else
            $DataTmp = file_get_contents( $f, false, null, $NowReading, $NowReading + $DataPerLimit );
          $NowReading += $DataPerLimit;
          if ( stripos( $DataTmp, $Query ) !== false )
          {
            $Leaked = true;
            break;
          }
          if ( $NowReading >= $FileSize )
            break;
        }
      }
    }

    if ( $Leaked ) {
      ?>
        <h2 style='color:#b22222;font-size:2rem;'>Record Found - Pwned!!</h2>
        <p>指定されたTwitterアカウント(<?=$UID?>)の情報漏洩が確認されました。</p>
        <p>流失している情報には、アカウント名やメールアドレス、スクリーンネーム、アカウントの作成日時などが含まれます。</p>
        <p>今後、詐欺メールなどが届く可能性もありますので、不審なメールは開かないことなどを徹底して下さい。</p>
        <hr size="10" color="#7fffd4">
      <?php
    } else {
      ?>
        <h2 style='color:#00FF00;font-size:2rem;'>Good News - Not Powned</h2>
        <p>指定されたTwitterアカウント(<?=$UID?>)の情報漏洩は確認"されません"でしたので、ご安心下さい。</p>
        <p>ただし、本ツールが調査できるのは約2億人分のデータが含まれるデータベースですので、4億人分の情報が含まれていると言われている元のデータベースに含まれていないとは言い切れません。<br>
           今後も、インターネットにおいては容易に個人情報を入力しないようにご注意下さい。</p>
        <hr size="10" color="#7fffd4">
      <?php }
    exit();
  }


    /*! 重すぎるので10人に一人しかアクセスできない謎仕様を実装
    if ( mt_rand( 1, 10 ) != 1 )
    {
      ?>
        <h2 style='color:#b22222;font-size:2rem;'>Error: Timeout</h2>
        <p>申し訳ございません、現在アクセスの急激な増加により確認ができない状態となっています。</p>
        <p>本日の午後2時までには復旧しますので、少々お待ちください(ブックマークして頂けますと幸いです)。</p>
        <hr size="10" color="#7fffd4">
      <?php
      exit();
    }
    */

  /*
  $expires = 36000;
  header('Last-Modified: Mon Jan 09 2023 00:00:00 GMT');
  header('Expires: ' . gmdate('D, d M Y H:i:s T', time() + $expires));
  header('Cache-Control: private, max-age=' . $expires);
  header('Pragma: ');
  */
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
    <script type="text/javascript">
      window.onload = function() {
        new Typewriter(_("per1"), {
          loop: true,
          delay: 75,
          autoStart: true,
          cursor: '|',
          strings: ['']
        });
        new Typewriter(_("per2"), {
          loop: true,
          delay: 75,
          autoStart: true,
          cursor: '|',
          strings: ['']
        });
        _("save").focus();
        _("td").onsubmit = function() {
          try {
            _("status_loading").style.display = "block";
            _("status_complete").style.display = "none";
            _("result").style.display = "none";
            let fdata = new FormData();
            fdata.append("checkid", _("save").value);
            // window.__query_starttime = performance.now();
            $.ajax({
              url: "",
              type: "POST",
              data: fdata,
              cache: !1,
              contentType: !1,
              processData: !1
            })
            .done(function (t) {
              _("result").innerHTML = t;
              _("status_loading").style.display = "none";
              _("status_complete").style.display = "block";
              _("result").style.display = "block";
            })
            .fail(function (t, e, o) {
              _("status_loading").style.display = "none";
              _("status_complete").style.display = "none";
              _("result").innerHTML = `<h2 style='color:#b22222;font-size:2rem;'>Error: Timeout</h2>
        <p>申し訳ございません。確認に時間がかかりすぎたため、自動的にタイムアウトされました。</p>
        <p>漏洩したリストの最後の方にアカウントが存在しているか、そもそも存在していないと推測されます。</p>
        <p>極度に心配する必要はありませんが、今後詐欺メールなどが届く可能性もありますので、不審なメールは開かないことなどを徹底して下さい。</p>
        <hr size="10" color="#7fffd4">`;
              _("result").style.display = "block";
            });
          } catch(e) {
            _("status_loading").style.display = "none";
            _("status_complete").style.display = "none";
            _("result").innerHTML = `<h2 style='color:#b22222;font-size:2rem;'>Error: Timeout</h2>
      <p>申し訳ございません。確認に時間がかかりすぎたため、自動的にタイムアウトされました。</p>
      <p>漏洩したリストの最後の方にアカウントが存在しているか、そもそも存在していないと推測されます。</p>
      <p>極度に心配する必要はありませんが、今後詐欺メールなどが届く可能性もありますので、不審なメールは開かないことなどを徹底して下さい。</p>
      <hr size="10" color="#7fffd4">`;
            _("result").style.display = "block";
          }
          return false;
        }
      }
      
    </script>
    <style>
      @font-face {
        font-family: 'KikaiChokokuJISMd';
        src: url(https://www.activetk.jp/font/KikaiChokokuJIS-Md.otf);
      }
      body {
        font-family: KikaiChokokuJISMd;
      }
      .btn {
        height: 60px;
        width: 170px;
        font-size: 1.6rem;
        line-height: 1.5;
        position: relative;
        display: inline-block;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
        text-align: center;
        vertical-align: middle;
        text-decoration: none;
        letter-spacing: 0.1em;
        border-radius: 0.5rem;
        color: #000;
        background-color: #6495ed;
        border-bottom: 5px solid #ccc100;
      }
      .btn:hover {
        margin-top: 3px;
        color: #000;
        background: #6495ed;
        border-bottom: 2px solid #74a5f0;
      }
    </style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#080808;color:#00BB00">
    <noscript>
      <div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center">
        <font color="#ff4500"><h1>お使いのブラウザのJavaScriptが無効です。有効にして下さい。</h1></font>
      </div>
    </noscript>
    <div align="center" id="home">
      <h1>Twitter Leaked Checker - ActiveTK.jp</h1>
      <div title="本ツールについて" style="background-color:#90ee90;color:#000000;width:<?=com("60", "80")?>%;">
        <hr size="10" color="#7fffd4">
        <div><h2>Twitter Leaked Checker</h2></div>
        2021年に2億人超のアカウント情報がTwitterから流失したとみられています。<br>
        本ツールではご自身のアカウントがそのデータベースに含まれているか確認できます。
        <hr size="10" color="#7fffd4">
      </div>
      <form action="" method="POST" id="td" style="width:<?=com("60", "80")?>%;">
        <h2>$ Pwned-Check <input type="text" id="save" style="height:40px;width:200px;" placeholder="@ActiveTK5929" style="font-size:2rem;"></h2>
        <input type="submit" value="<?=com("check twttr", "check")?>" class="btn btn--yellow btn--cubic">
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