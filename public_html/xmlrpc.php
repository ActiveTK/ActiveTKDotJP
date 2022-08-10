<?php

  /*!
   * H0nypot XMLRPC Script
   * (c) 2022 ActiveTK. <webmaster@activetk.jp>
   * Released under the MIT license
   */

  http_response_code( 200 );
  header( "Content-Type: text/xml;charset=UTF-8" );
  header( "WebType: Honeypot;type=xmlrpc" );

  $Request = array();
  $Request["Time"] = time();
  $Request["IPAddress"] = $_SERVER["REMOTE_ADDR"];
  $Request["Method"] = $_SERVER["REQUEST_METHOD"];
  $Request["Protocol"] = $_SERVER["SERVER_PROTOCOL"];
  $Request["FilePath"] = $_SERVER["REQUEST_URI"];

  $Request["Headers"] = array();
  foreach ( getallheaders() as $name => $value )
    $Request["Headers"][$name] = $value;

  $Request["Body"] = file_get_contents( "php://input" );

  $Log = json_encode( $Request, JSON_UNESCAPED_UNICODE );
  file_put_contents( "/home/activetk/data/ActiveTKDotJP/CyberAttack.log", $Log . "\n", FILE_APPEND );

  function GetDump( $obj ) {
    ob_start();
    var_dump($obj);
    $d = ob_get_contents();
    ob_end_clean();
    return $d;
  }

/*
  try{
    mb_language("Japanese"); mb_internal_encoding("UTF-8");
    mb_send_mail( "notification@activetk.jp", "【ハニーポット】xmlrpc.phpへの攻撃を確認しました",

      '<body style="background-color:#e6e6fa;text:#363636;">'.
        '<div align="center"><p>【ハニーポット】xmlrpc.phpへの攻撃を確認しました</p></div>'.
        '<hr color="#363636" size="2">'.
        '<p>ハニーポットへのアクセスは以下の通りです。</p>'.
        '<pre align="left">'.
          str_replace( "\n", "<br>", htmlspecialchars( GetDump( $Request ), ENT_QUOTES ) ).
        '</pre>'.
        '<br><hr color="#363636" size="2">'.
        '<div align="center"><font style="background-color:#06f5f3;">Copyright &copy; 2022 ActiveTK. All rights reserved.</font></div>'.
      '</body>',

      "Content-Type: text/html; charset=UTF-8\nFrom: no-reply@activetk.jp\nSender: no-reply@activetk.jp\n".
      "Return-Path: no-reply@activetk.jp\nReply-To: no-reply@activetk.jp\nContent-Transfer-Encoding: BASE64\n",
       "-f no-reply@activetk.jp" );
  } catch (\Throwable $e) { }
*/

?>
<<?="?"?>xml version="1.0"<?="?"?>>
<methodResponse>
  <params>
    <param>
      <value><string>THIS IS A HONYPOT XMLRPC</string></value>
      <value><string>Bad News, Your IPaddress has been logged.</string></value>
    </param>
  </params>
</methodResponse>