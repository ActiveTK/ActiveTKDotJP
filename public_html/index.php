<?php

  /*!
   *  Home - ActiveTK.jp
   *  (c) 2022 ActiveTK.
   */

  // 設定ファイル読み込み
  require "/home/activetk/require/Config.php";

  // ヘッダー処理
  if ( empty( $_SERVER['HTTPS'] ) && !isset( $_GET["no-ssl"] ) ) {
    header( "Location: https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" );
    die();
  }
  else if ( !isset( $_GET["no-ssl"] ) )
    header( "Strict-Transport-Security: max-age=63072000; includeSubdomains; preload" );
    
  // ads.txt
  if ( isset( $_GET["request"] ) && strtolower( $_GET["request"]) == "ads.txt")
  {
    header("Content-Type: text/plain;charset=UTF8");
    echo "google.com, pub-2939270978924591, DIRECT, f08c47fec0942fa0";
    exit();
  }

  if ($_SERVER['HTTP_HOST'] == "activetk.jp") {
    header( "Location: https://www.activetk.jp{$_SERVER['REQUEST_URI']}" );
    die();
  }
  header( "X-Frame-Options: deny" );
  header( "X-XSS-Protection: 1; mode=block" );
  header( "X-Content-Type-Options: nosniff" );
  header( "X-Permitted-Cross-Domain-Policies: none" );
  header( "Referrer-Policy: same-origin" );

  // スクリプト用のNonce生成関数
  function CreateNonce() {
    $bytes = openssl_random_pseudo_bytes( 18 );
    $str = bin2hex( $bytes );
    $usestr = '1234567890abcdefghijklmnopqrstuvwxyz';
    $str2 = substr( str_shuffle( $usestr ), 0, 12 );
    define( "nonce", substr( str_shuffle( $str . $str2 ) , 0, -12 ) );
    header( "Content-Security-Policy: script-src 'nonce-" . nonce . "' 'strict-dynamic' 'unsafe-eval';" );
  }

  // 管理者への通知
  function NotificationAdmin( string $title = "", string $str = "" ) {
    try{
      $body = '<body style="background-color:#e6e6fa;text:#363636;"><div align="center"><p>【' . htmlspecialchars($title) . '】</p><hr color="#363636" size="2">'. $str .
      '<br><hr color="#363636" size="2"><font style="background-color:#06f5f3;">Copyright &copy; 2022 ActiveTK. All rights reserved.</font></div></body>';
      mb_language("Japanese");
      mb_internal_encoding("UTF-8");
      define( "MAIL_SUBJECT", $title);
      define( "MAIL_BODY", $body);
      define( "MAIL_FROM_ADDRESS", "no-reply@activetk.jp");
      define( "MAIL_FROM_NAME", "no-reply@activetk.jp");
      define( "MAIL_HEADER",
        "Content-Type: text/html; charset=UTF-8 \n".
        "From: " . MAIL_FROM_NAME . "\n".
        "Sender: " . MAIL_FROM_ADDRESS ." \n".
        "Return-Path: " . MAIL_FROM_ADDRESS . " \n".
        "Reply-To: " . MAIL_FROM_ADDRESS . " \n".
        "Content-Transfer-Encoding: BASE64\n");
      @mb_send_mail( ADMIN_MAIL_ADDRESS, MAIL_SUBJECT, MAIL_BODY, MAIL_HEADER, "-f ".MAIL_FROM_ADDRESS );
    }
    catch (Exception $e) { }
  }

  // var_dumpを取得する関数
  function get_vardump($data) {
    ob_start();
    var_dump($data);
    $str = ob_get_contents();
    ob_end_clean();
    return $str;
  }

  // スマホ判定
  if (
      !preg_match( '/' . implode( '|', array( 'Android' ) ) . '/i', $_SERVER['HTTP_USER_AGENT']) &&
      !preg_match( '/' . implode( '|', array( 'iPhone' ) ) . '/i', $_SERVER['HTTP_USER_AGENT']) &&
      !preg_match( '/' . implode( '|', array( 'Windows Phone' ) ) . '/i', $_SERVER['HTTP_USER_AGENT'])
    )
    $issumaho = false;
  else
    $issumaho = true;

  define("Phone", $issumaho);

  function com($ForPC, $ForMobile) {
    if (Phone)
      return $ForMobile;
    else
      return $ForPC;
  }

  // リクエスト処理
  if ( isset( $_GET["request"] ) && $_GET["request"] != "")
  {

    if ( substr( $_GET["request"] , -1) == "/" )
    {
      header( "Location: https://www.activetk.jp/" . strtolower( substr( $_GET["request"], 0, -1 ) ), true, 301 );
      exit();
    }
    else
      define( "request_path", strtolower( $_GET["request"]) );

    // nonce無しのURIだけ処理
    if ( request_path == "tools/justclock" )
    {
      define( "nonce", "" );
      require_once( "./Tools/justclock.php" );
      exit();
    }
    else if ( request_path == "tools/urlmin" )
    {
      define( "nonce", "" );
      require_once( "./Tools/urlmin.php" );
      exit();
    }
    else if ( request_path == "tools/tokutei" )
    {
      define( "nonce", "" );
      require_once( "./Tools/tokutei.php" );
      exit();
    }
    else if ( request_path == "tools/tokutei_easy" )
    {
      define( "nonce", "" );
      require_once( "./Tools/tokutei_easy.php" );
      exit();
    }
    else if ( request_path == "tools/copyright" )
    {
      define( "nonce", "" );
      require_once( "./Tools/copyright/index.php" );
      exit();
    }
    else if ( request_path == "tools/iframe" )
    {
      define( "nonce", "" );
      require_once( "./Tools/iframe.php" );
      exit();
    }
    else if ( request_path == "tools/windowsupdate" )
    {
      define( "nonce", "" );
      require_once( "./Tools/windowsupdate.php" );
      exit();
    }
    else if ( request_path == "tools/nextip" )
    {
      define( "nonce", "" );
      require_once( "./Tools/nextip.php" );
      exit();
    }

    // nonce生成
    CreateNonce();
    $nonce = nonce;

    if ( request_path == "home" )
      require_once( "./home.php" );
    else if ( request_path == "about" )
      require_once( "./about.php" );
    else if ( request_path == "license" )
      require_once( "./license.php" );
    else if ( request_path == "privacy" )
      require_once( "./privacy.php" );
    else if ( request_path == "contact" )
      require_once( "./contact.php" );
    else if ( request_path == "developer" )
      require_once( "./developer.php" );
    else if ( request_path == "donate" )
      require_once( "./donate.php" );
    else if ( request_path == "report" )
    {
      if ( isset( $_GET["fin"] ) )
      {
        ?>
          <meta name="robots" content="noindex, nofollow">
          <body style="background-color:#e6e6fa;">
            <h1>報告を受け付けました。</h1>
            <p><b>エラー(バグ)をご報告いただき、ありがとうございました。<br>このデータは、<a href="/privacy">プライバシーに関する声明</a>に基づき、サービスの改善に使用させていただきます。</b></p>
            <h3><a href="/home">ホームへ戻る</a></h3>
          </body>
      <?php
        exit();

      }

      if ( !isset( $_GET["data"] ) || empty( $_GET["data"] ) )
        die( "<meta name='robots' content='noindex, nofollow'>エラー報告画面で、エラーが発生しました。 -> (HTTP)GET[\"data\"]　が定義されていない、又はnullです。" );

      $LogFile = "/home/activetk/data/ActiveTKDotJP/UserReport.log";

      $debuginfo = array();

      $debuginfo["Time"] = date("Y/m/d - M (D) H:i:s");
      $debuginfo["Time_Unix"] = microtime(true);

      $debuginfo["IP"] = $_SERVER['REMOTE_ADDR'];

      if ( isset( $_SERVER['HTTP_USER_AGENT'] ) )
        $debuginfo["UserAgent"] = $_SERVER['HTTP_USER_AGENT'];
      else
        $debuginfo["UserAgent"] = "";

      $debuginfo["Error"] = $_GET["data"];

      $a = fopen($LogFile, "a");
      @fwrite( $a, json_encode( $debuginfo ) . "\n" );
      fclose( $a );

      NotificationAdmin("エラーページの報告",
      "<p>送信時刻: " . date("Y/m/d - M (D) H:i:s") . "</p><p>IPアドレス: " . $_SERVER['REMOTE_ADDR'] . "</p><p>UserAgent: " . $debuginfo["UserAgent"] . "</p>" .
      "<hr color='#363636' size='2'><pre>" . htmlspecialchars(get_vardump(json_decode($_GET["data"]))) . "</pre><br>");

      header("Location: /report?fin");
      exit();

    }
    else if ( request_path == "pgp" )
      require_once( "./pgp.php" );
    else if ( request_path == "tools/qrcode" )
      require_once( "./Tools/qrcode.php" );
    else if ( request_path == "tools/time" )
      require_once( "./Tools/time.php" );
    else if ( request_path == "tools/image" )
      require_once( "./Tools/image.php" );
    else if ( request_path == "tools/rand" )
      require_once( "./Tools/rand.php" );
    else if ( request_path == "tools/url-encode" )
      require_once( "./Tools/url-encode.php" );
    else if ( request_path == "tools/url-decode" )
      require_once( "./Tools/url-decode.php" );
    else if ( request_path == "tools/base64-encode" )
      require_once( "./Tools/base64-encode.php" );
    else if ( request_path == "tools/base64-decode" )
      require_once( "./Tools/base64-decode.php" );
    else if ( request_path == "tools/english2leet" )
      require_once( "./Tools/english2leet.php" );
    else if ( request_path == "tools/leet2english" )
      require_once( "./Tools/leet2english.php" );
    else if ( request_path == "tools/paintweb" )
      require_once( "./Tools/paintweb.php" );
    else if ( request_path == "tools/download" )
      require_once( "./Tools/download.php" );
    else if ( request_path == "tools/encrypt" )
      require_once( "./Tools/encrypt.php" );
    else if ( request_path == "tools/info" )
      require_once( "./Tools/info.php" );
    else if ( request_path == "tools/speedtest" )
      require_once( "./Tools/speedtest.php" );
    else if ( request_path == "tools/hash" )
      require_once( "./Tools/hash.php" );
    else if ( request_path == "tools/ruijyou" )
      require_once( "./Tools/ruijyou.php" );
    else if ( request_path == "tools/downchecker" )
      require_once( "./Tools/downchecker.php" );
    else if ( request_path == "tools/learn" )
      require_once( "./Tools/learn.php" );
    else if ( request_path == "tools/str2komoji" )
      require_once( "./Tools/str2komoji.php" );
    else if ( request_path == "tools/str2oomoji" )
      require_once( "./Tools/str2oomoji.php" );
    else if ( request_path == "tools/str-count" )
      require_once( "./Tools/str-count.php" );
    else if ( request_path == "tools/whois" )
      require_once( "./Tools/whois.php" );
    else if ( request_path == "tools/nslookup" )
      require_once( "./Tools/nslookup.php" );
    else if ( request_path == "400" )
      require_once( "./Error/400/index.php" );
    else if ( request_path == "403" )
      require_once( "./Error/403/index.php" );
    else if ( request_path == "404" )
      require_once( "./Error/404/index.php" );
    else if ( request_path == "418" )
      require_once( "./Error/418/index.php" );
    else if ( request_path == "500" )
      require_once( "./Error/500/index.php" );
    else
      require_once( "./Error/404/index.php" );
  }
  else
  {
    // nonce生成
    CreateNonce();
    $nonce = nonce;
    require_once( "./welcome.php" );
  }

  // ヘッダー描写
  function Get_Header() {
  ?>

    <div align="left" style="background-color:#6495ed;color:#080808;" id="headtitles">
      <nav class="navbar navbar-expand-lg p-nextchatcolor" style="background-color:#6495ed;color:#080808;z-index:5;position:fixed;top:0px;left:0px;width:100%;height:12% !important;">
        <div class="container-fluid">
          <span class="navbar-brand" title="WebTools">ActiveTK.jp</span>
          <button class="navbar-toggler" id="toggler-button" type="button" data-bs-toggle="collapse" data-bs-target="navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="background-color:#6495ed;color:#080808;">
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" aria-current="page" href="/home">ホーム</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" aria-current="page" href="/about">サービス概要</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="/license">利用規約</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="/privacy">プライバシー</a>
              </li><?php /*
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="/donate">寄付</a>
              </li>
              */ ?>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="https://programing-study.activetk.jp/">自習室</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="/developer?v=2">開発者</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="/contact">お問い合わせ</a>
              </li>
            </ul>
          </div>
        </div>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
      </nav>
    </div>

  <?php
  }

  // 著作権表示
  function Get_Last() {
  ?>

    <p>
      <a href="/home" style="color:#00ff00 !important;">ホーム</a>・
      <a href="/about" style="color:#0403f9 !important;">本サイトについて</a>・
      <a href="/license" style="color:#ffa500 !important;">利用規約</a>・
      <a href="/privacy" style="color:#ff00ff !important;">プライバシーに関する声明</a>・
      <?php /* <a href="/donate" style="color:#4169e1 !important;">寄付</a> */ ?>
      (c) 2022 ActiveTK.</p>

    <?=com("<p>Onion Mirror: http://apzjiwz4762353egpdpyyg7nyv5gmifv46bwkc6gdvp3ei2e74ejidyd.onion/</p>", "")?>

  <?php
  }

  // 共通コード取得
  function Get_Default() {
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V1CPYP07HP"<?php if (defined('nonce') && !empty(nonce)) echo ' nonce="' . nonce . '"'; ?>></script>
    <script<?php if (defined('nonce') && !empty(nonce)) echo ' nonce="' . nonce . '"'; ?>>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-V1CPYP07HP');</script>
    <?php if (!isset($_GET["ahb"]) || $_GET["ahb"] != "r") { ?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2939270978924591" crossorigin="anonymous"<?php if (defined('nonce') && !empty(nonce)) echo ' nonce="' . nonce . '"'; ?>></script>
    <script src="/js/iframe_tracker.js"<?php if (defined('nonce') && !empty(nonce)) echo ' nonce="' . nonce . '"'; ?>></script>
    <script src="/js/ads_hunting-blocker.js"<?php if (defined('nonce') && !empty(nonce)) echo ' nonce="' . nonce . '"'; ?>></script>
    <?php }
  }

  // 広告コード取得

  function GetAdHere( string $ScriptNonce = "", int $TypeOfAd = 0 ) {

    // nonce追加
    $TheNonceStr = "";
    if ( !empty( $ScriptNonce ) )
      $TheNonceStr = ' nonce="' . htmlspecialchars($ScriptNonce) . '"';

    if (isset($_GET["ahb"]) && $_GET["ahb"] == "r") return "";

    if ( $TypeOfAd == 0 )
    {
      ?>
        <div class="ad">
          <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2939270978924591" data-ad-slot="8240315429" data-ad-format="auto" data-full-width-responsive="true"></ins>
          <script<?=$TheNonceStr?>>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
        </div>
      <?php
    } else if ( $TypeOfAd == 1 ) {
      ?>
        <ins class="adsbygoogle" style="display:block;text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2939270978924591" data-ad-slot="8928997988"></ins>
        <script<?=$TheNonceStr?>>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
      <?php
    } else if ( $TypeOfAd == 2 && empty( $nonce ) ) {
      ?>
        <div title="広告">
          <script type="text/javascript">MafRakutenWidgetParam=function() { return{ size:'600x200',design:'slide',recommend:'on',auto_mode:'on',a_id:'3388984', border:'on'};};</script>
          <script type="text/javascript" src="//image.moshimo.com/static/publish/af/rakuten/widget.js"></script>
        </div>
      <?php
    } else if ( $TypeOfAd == 2 && !empty( $nonce ) ) {
      ?>
        <div title="広告">
          <script type="text/javascript" nonce="<?=$nonce?>">
            (function(b,c,f,g,a,d,e){b.MoshimoAffiliateObject=a;
            b[a]=b[a]||function(){arguments.currentScript=c.currentScript
            ||c.scripts[c.scripts.length-2];(b[a].q=b[a].q||[]).push(arguments)};
            c.getElementById(a)||(d=c.createElement(f),d.src=g,
            d.id=a,e=c.getElementsByTagName("body")[0],e.appendChild(d))})
            (window,document,"script","//dn.msmstatic.com/site/cardlink/bundle.js?20220329","msmaflink");
            msmaflink({"n":"Crucial クルーシャル SSD 480GB R:540MB\/s W:500MB\/s 【3年保証・翌日配達送料無料】BX500 SATA 6.0Gb\/s 内蔵2.5インチ 7mm CT480BX500SSD1","b":"","t":"","d":"https:\/\/thumbnail.image.rakuten.co.jp","c_p":"\/","p":["@0_mall\/spd-shop\/cabinet\/ssd\/imgrc0089045992.jpg","@0_gold\/spd-shop\/w600-nekopost-wl.gif","@0_mall\/spd-shop\/cabinet\/04904589\/imgrc0083418866.jpg"],"u":{"u":"https:\/\/item.rakuten.co.jp\/spd-shop\/mcssd480g-bx500\/","t":"rakuten","r_v":""},"v":"2.1","b_l":[{"id":1,"u_tx":"楽天市場で見る","u_bc":"#f76956","u_url":"https:\/\/item.rakuten.co.jp\/spd-shop\/mcssd480g-bx500\/","a_id":3388984,"p_id":54,"pl_id":27059,"pc_id":54,"s_n":"rakuten","u_so":1}],"eid":"HzCgG","s":"xs"});
          </script>
          <div id="msmaflink-HzCgG">リンク</div>
        </div>
      <?php
    }
    else if ( $TypeOfAd == 3 )
    {
      ?>
        <a href="https://af.moshimo.com/af/c/click?a_id=3415664&p_id=2432&pc_id=5315&pl_id=34942&guid=ON" rel="nofollow" referrerpolicy="no-referrer-when-downgrade" target="_blank">
          <img src="https://image.moshimo.com/af-img/0697/000000034942.png" width="300" height="250" style="border:none;">
        </a><img src="https://i.moshimo.com/af/i/impression?a_id=3415664&p_id=2432&pc_id=5315&pl_id=34942" width="1" height="1" style="border:none;">
      <?php
    }

    return "";

  }
