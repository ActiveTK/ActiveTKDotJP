<?php

  /*!
   * HTTPステータスコード 418 を表示します。
   */

  http_response_code( 418 );
  header( "HTTP/1.1 418 I am a teapot." );
  header( "Content-Type: text/html;charset=UTF-8" );

  $title = "【418】I’m a teapot.";

  $ErrorInfo = array();
  $ErrorInfo["Type"] = "HTTP.ERR_NOT_FOUND";
  $ErrorInfo["Title"] = $title;

  if ( isset( $_SERVER['REQUEST_URI'] ) )
    $ErrorInfo["Path"] = $_SERVER['REQUEST_URI'];

  if ( isset( $_GET ) )
    $ErrorInfo["GET"] = json_encode($_GET);

?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="ROBOTS" content="noindex, nofollow">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <title><?=$title?></title>
    <style>*,:after,:before{-webkit-box-sizing:inherit;box-sizing:inherit}.btn,a.btn,button.btn{font-size:1.6rem;font-weight:700;line-height:1.5;position:relative;display:inline-block;padding:1rem 4rem;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-transition:all .3s;transition:all .3s;text-align:center;vertical-align:middle;text-decoration:none;letter-spacing:.1em;color:#212529;border-radius:.5rem}a.btn--blue.btn--border-double{border:8px double #0090bb}a{color:#c71585;position:relative;display:inline-block}a,a:after{transition:.3s}a:after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transform:translateX(-50%)}a:hover:after{width:100%}a.btn--orange{color:#000;background-color:#eb6100;border-bottom:5px solid #b84c00}a.btn--orange:hover{margin-top:3px;color:#000;background:#f56500;border-bottom:2px solid #b84c00}a.btn--lime{color:#000;background-color:#0f0;border-bottom:5px solid #0f0}a.btn--lime:hover{margin-top:3px;color:#000;background:#0f0;border-bottom:2px solid #0f0}a.btn--shadow{-webkit-box-shadow:0 3px 5px rgba(0,0,0,.3);box-shadow:0 3px 5px rgba(0,0,0,.3)}a.btn--darkblue.btn--border-solid{border:2px solid #00008b;height:20px;width:auto;font-size:1rem!important;font-weight:300!important;line-height:1!important}a.btn--red.btn--border-inset{border:6px inset #b9000e;font-size:.8rem!important;font-weight:300!important;line-height:1!important}</style>

  </head>
  <body style="background-color:#6495ed;color:#080808;">
    <div id="animearea" style="position:fixed;left:0px;width:100%;height:100%;"></div>
    <div style="position:fixed;left:0px;top:0px;width:100%;background-color:transparent;z-index:1;">
      <br>
      <div align="center">
        <span style="background-color:#e6e6fa;text:#363636;text-align:center;vertical-align:middle;">
          <h1>【418】I’m a teapot.</h1>
        </span>
      </div>
      <div align="center" style="width:95%;">
        <hr size="1" color="#7fffd4">
        <div align="center" style="width:70%;vertical-align:middle;text-align:center;">
          <b>ご迷惑をおかけしてしまい、申し訳ございません。</b><br>
          <b>このエラーは、<a href="https://ja.wikipedia.org/wiki/Hyper_Text_Coffee_Pot_Control_Protocol" target="_blank">HTCPCP</a>のページへHTTPリクエストを受け付けた場合に発生します。</b><br><br>
          <a href="/home" class="btn btn--lime btn--cubic btn--shadow">ホームへ戻る</a>
          <a href="/report?data=<?=rawurlencode(json_encode($ErrorInfo))?>" class="btn btn--orange btn--cubic btn--shadow">エラーを報告</a>
        </div>
      </div>
      <hr size="1" color="#7fffd4">
      <div align="center"><?=Get_Last()?></div>
    </div>

    <script type="text/javascript" src="https://code.activetk.jp/particles.min.js" nonce="<?=$nonce?>"></script>

    <script nonce="<?=$nonce?>">
    
    particlesJS("animearea",{particles:{number:{value:40,density:{enable:true,value_area:200}},shape:{type:"star",stroke:{width:0,color:"#ffcc00"}},color:{value:"#ffffff"},opacity:{value:1,random:false,anim:{enable:false,speed:10,opacity_min:0.1,sync:false}},size:{value:5,random:true,anim:{enable:false,speed:40,size_min:0.1,sync:false}},line_linked:{enable:true,distance:150,color:"#ffffff",opacity:0.4,width:1},move:{speed:12,straight:false,direction:"none",out_mode:"bounce"}},interactivity:{detect_on:"canvas",events:{onhover:{enable:true,mode:"repulse"},onclick:{enable:true,mode:"push"}},modes:{grab:{distance:400,line_linked:{opacity:1}},repulse:{distance:200},bubble:{distance:400,size:40,opacity:8,duration:2,speed:3},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:true,resize:true});

    </script>

  </body>
</html>

