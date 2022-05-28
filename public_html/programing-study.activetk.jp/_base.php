<?php

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
  define( "issumaho", $issumaho );

  function GetEcho( $pc, $sm ) {

    if (issumaho)
      echo $sm;
    else
      echo $pc;

  }

  function GetDefaultHeaders() {

?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V1CPYP07HP"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-V1CPYP07HP');</script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2939270978924591" crossorigin="anonymous"></script>
    <script src="https://code.activetk.jp/ActiveTK.min.js" charset="UTF-8"></script>
    <script>$(function(){$('a[href^="#"]').click(function(){let speed=500;let href=$(this).attr("href");let target=$(href=="#"||href==""?'html':href);let position=target.offset().top;$("html, body").animate({scrollTop:position},speed,"swing");return!1})})</script>
 
    <style>
      .main{text-align:center;width:<?=GetEcho("80","90")?>%;}
      .welcomemsg{font-size:<?=GetEcho("50","25")?>px;border-radius:30px;color:#000000;background:linear-gradient(to right,Magenta,yellow,Cyan,Magenta) 0% center/200%;animation:.welcomemsg 2s linear infinite}
      .inpblue{background:linear-gradient(transparent 70%,#66CCFF 0%)}
      .inpgreen{background:linear-gradient(transparent 70%,#00FF00 0%)}
      .inpred{background:linear-gradient(transparent 70%,#FFC0CB 0%)}
      .inpyellow{background:linear-gradient(transparent 70%,#FFFF00 0%)}
      p{font-weight:bold;font-size:22px;}
      .combox{width:150px;height:<?=GetEcho("180","220")?>px;border:1px solid;background-color:#DADDFC;color:#080808;}
      .lang{font-weight:bold;font-size:26px;}
      .titles{font-size:30px;border-radius:30px;background-color:#DADDFC;color:#080808;}
      .code{width:60%;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;}
    </style>
<?php

  }


  // 広告コード取得
  function GetAdHere(string $nonce = "") {

    ?>
      <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2939270978924591" data-ad-slot="8240315429" data-ad-format="auto" data-full-width-responsive="true"></ins>
      <script>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
    <?php return "";
  }

  function GetLast()
  {
    ?>
      <div class="main">
        <div align="center" style="display:flex;-webkit-justify-content:center;justify-content:center;-webkit-align-items:center;align-items: center;">
          <div class="combox"><br><span class="lang"><img src="/images/aws-documentdb.svg" width="64px" height="90px"></span><br><a href="/lang/">プログラミング言語まとめ</a></div>
          <div class="combox"><br><span class="lang"><img src="/images/html.svg" width="64px" height="90px"></span><br><a href="/HTML/">HTMLに関する記事一覧</a></div>
          <div class="combox"><br><span class="lang"><img src="/images/javascript.svg" width="64px" height="90px"></span><br><a href="/JavaScript/">JavaScriptに関する記事一覧</a></div>
          <div class="combox"><br><span class="lang"><img src="/images/php.svg" width="120px" height="90px"></span><br><a href="/PHP/">PHPに関する記事一覧</a></div>
        </div>
      </div>

      <br>

      <div class="main">
        <a href="/" style="color:#00ff00 !important;">ホーム</a>・
        <a href="https://www.activetk.jp/license" style="color:#ffa500 !important;">利用規約</a>・
        <a href="https://www.activetk.jp/privacy" style="color:#ff00ff !important;">プライバシーに関する声明</a>・
        (c) 2022 ActiveTK.
       </div>
     </div>
    <?php
  }

  function GetWelcomeMsg()
  {
    ?>
      <div class="main" style="background-color:#00ffEE;color:#ffffff;">
        <br>
        <div align="center"><span class="welcomemsg">　<b>プログラミング自習室</b>　</span></div>
        <br>
      </div>
    <?php
  }
