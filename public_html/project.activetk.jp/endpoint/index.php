<?php

  header( "Content-Type: application/json;charset=UTF-8" );
  header( "X-Robots-Tag: noindex, nofollow" );

  if ( !isset( $_SERVER['REMOTE_ADDR'] ) )
    $_SERVER['REMOTE_ADDR'] = "";
  if ( !isset( $_SERVER['HTTP_USER_AGENT'] ) )
    $_SERVER['HTTP_USER_AGENT'] = "";
  if ( !isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) )
    $_SERVER['HTTP_ACCEPT_LANGUAGE'] = "";
  if ( !isset( $_SERVER['HTTP_ACCEPT_ENCODING'] ) )
    $_SERVER['HTTP_ACCEPT_ENCODING'] = "";

  function ReverseIPOctets( $inputip ) {
    $ipoc = explode( ".", $inputip );
    return $ipoc[3] . "." . $ipoc[2] . "." . $ipoc[1] . "." . $ipoc[0];
  }

  function IsTorExitPoint() {
    if ( @gethostbyname( @ReverseIPOctets( $_SERVER['REMOTE_ADDR'] ) . ".dnsel.torproject.org" ) == "127.0.0.2" )
      return true;
    else
      return false;
  }

  // 参考: http://doremi.s206.xrea.com/php/tips/ip.html
  function getRealIPadd() {
    $ip = array();

    function getsvr($key) {
        return(isset($_SERVER[$key]) ? $_SERVER[$key] : '');
    }
    if (preg_match('/^\d+(?:\.\d+){3}$/D', getsvr('HTTP_SP_HOST')))
        $ip[] = $_SERVER['HTTP_SP_HOST'];
    if (preg_match('/.*\s(\d+(?:\.\d+){3})/', getsvr('HTTP_VIA'), $match))
        $ip[] = $match[1];
    if (preg_match('/^\d+(?:\.\d+){3}/', getsvr('HTTP_CLIENT_IP'), $match))
        $ip[] = $match[0];
    if (preg_match('/^([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})/i', getsvr('HTTP_CLIENT_IP'), $match))
        $ip[] = implode('.', array(hexdec($match[1]), hexdec($match[2]), hexdec($match[3]), hexdec($match[4])));
    if (preg_match('/.*\s(\d+(?:\.\d+){3})/', getsvr('HTTP_FORWARDED'), $match))
        $ip[] = $match[1];
    if (preg_match('/^\d+(?:\.\d+){3}/', getsvr('HTTP_X_FORWARDED_FOR'), $match))
        $ip[] = $match[0];
    if (preg_match('/^\d+(?:\.\d+){3}$/D', getsvr('HTTP_FROM')))
        $ip[] = $_SERVER['HTTP_FROM'];

    $addr = '';
    foreach ($ip as $value)
        if (!preg_match('/^(?:10|172\.16|192\.168|127\.0|0\.|169\.254)\./', $value) and $addr=$value) break;

    return($addr ? $addr : $_SERVER['REMOTE_ADDR']);
  }

  $headers = getallheaders();
  if (!isset($headers["Sec-Ch-Ua"]))
    $headers["Sec-Ch-Ua"] = "";

  echo json_encode(
    array(
      "PublicIP" => $_SERVER['REMOTE_ADDR'],
      "Host" => @gethostbyaddr($_SERVER['REMOTE_ADDR']),
      "RealIP" => @getRealIPadd(),
      "UserAgent" => $_SERVER['HTTP_USER_AGENT'],
      "AcceptLang" => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
      "AcceptEncode" => $_SERVER['HTTP_ACCEPT_ENCODING'],
      "IsItTor" => @IsTorExitPoint(),
      "UserAgentClientHints" => $headers["Sec-Ch-Ua"],
    )
  , JSON_UNESCAPED_UNICODE);

  exit();
