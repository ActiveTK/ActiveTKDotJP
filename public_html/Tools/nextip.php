<?php

  /////////////////////////////////////////////////
  /*!
   * NextIP v6 | PHP/HTML/JS/CSS
   * Copyright 2022 ActiveTK. All rights reserved.
  */
  /////////////////////////////////////////////////

  // 設定
  $meurl = (((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ) ? "https://" : "http://").$_SERVER['HTTP_HOST']."/";
  $starttitle = "NextIP v6";
  $decp = "NextIP v6です。フィルタリング回避ができます。システム的にはWeb上で動作するプライバシー重視のプロキシツールです。やり方は簡単！アクセスしたいURLを貼るだけです！！是非使用してみてください！";
  $startua = "Mozilla/5.0 (Linux; AccessBot 6.0; PHP; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121";

  // クロスオリジン許可
  header('Access-Control-Allow-Origin: *');

  // nonce生成
  $nonce = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 36);

  // 指定されたヘッダー取得
  function curl_headers($response){
    $headers = array();
    foreach (explode("\r\n", $response) as $i => $line)
      if ($i === 0)
        $headers['HTTP'] = $line;
      else
      {
        list ($key, $value) = explode(': ', $line);
        $headers[$key] = $value;
      }
    return $headers;
  }

  // アクセス
  if (isset($_POST["q"]) && $_POST["q"] != "" || isset($_GET["q"]))
  {

    // 直指定
    if (isset($_POST["q"]))
      $url = $_POST["q"];

    // リソースへのアクセス
    else
      $url = base64_decode(urldecode($_GET["q"]));

    // ユーザーエージェント

    // 指定されている場合
    if (isset($_POST["ua"]))
      $ua = $_POST["ua"];

    // 指定されていない場合
    if (empty($ua))
      $ua = $startua;

    // URL簡易化オプション
    if (isset($_POST["htt"]) && $_POST["htt"] == "http")
      $url = "https://" . $url;
    else if (isset($_POST["htt"]) && $_POST["htt"] == "https")
      $url = "https://" . $url;
    else if (isset($_POST["htt"]) && $_POST["htt"] == "ftp")
      $url = "ftp://" . $url;

    // セキュリティチェック
    if (!filter_var($url, FILTER_VALIDATE_URL))
    {
      header("HTTP/1.1 404 Not Found");
      die("セキュリティエラーが発生しました。");
    }

    // js無効化
    if (isset($_POST["js"]) && $_POST["js"] == "false" || mb_substr(strtoupper($url), 0, 37) == "HTTPS://DATAIL.CHIEBUKURO.YAHOO.CO.JP")
    {
      // nonceを有効化する
      header("Content-Security-Policy: script-src 'nonce-{$nonce}' 'strict-dynamic'");
    }

    // curlオブジェクト作成
    $curl = curl_init($url);

    // ヘッダー部分も取得
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLINFO_HEADER_OUT, true);

    // POSTでアクセス
    if (isset($_POST["meta"]) && $_POST["meta"] == "post")
      curl_setopt($curl, CURLOPT_POST, TRUE);
    else
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');

    // SSLチェック無効化
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // ユーザーエージェント指定
    curl_setopt($curl, CURLOPT_USERAGENT, $ua);

    // REFERER指定
    curl_setopt($curl, CURLOPT_REFERER, $meurl);   

    // プロキシ使用
    if ($_POST["prk"] == "prk-not-use")
    {
        curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, TRUE);
        curl_setopt($curl, CURLOPT_PROXYPORT, $prkp);
        curl_setopt($curl, CURLOPT_PROXY, 'https://' . $prks);
    }

    // Basic認証
    curl_setopt($curl, CURLOPT_USERPWD, "$USERNAME:$PASSWORD");

    // 自動リダイレクト
    if (isset($_POST["outr"]) && $_POST["outr"] == "true")
    {
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
      curl_setopt($curl, CURLOPT_AUTOREFERER, true);
    }

    // 実行
    $html = curl_exec($curl);

    // ヘッダー取得
    $head = curl_getinfo($curl, CURLINFO_HEADER_OUT);
    $info = curl_getinfo($curl);

    if (isset($_POST["baseurl"]) && $_POST["baseurl"] == "last")
      $url = curl_getinfo($curl, CURLINFO_EFFECTIVE_URL);

    // エラー処理
    if($errno = curl_errno($curl)) {
      $error_message = curl_strerror($errno);
      header("HTTP/1.1 404 Not found");
      echo "cURL error ({$errno}):\n {$error_message}";
      curl_close($curl);
      exit;
    }

    // ヘッダー部分
    $header = htmlspecialchars(substr($html, 0, $info["header_size"]));

    // 本文部分
    $html = substr($html, $info["header_size"]);

    // オブジェクト破棄
    curl_close($curl);

    // テキストモード
    if (isset($_POST["mode"]) && $_POST["mode"] == "text") {
      ?>
      <html>
        <head>
          <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no'>
          <title>SourceCode of <?=htmlspecialchars($url)?></title>
          <meta name='author' content='ActiveTK.'>
          <meta name='ROBOTS' content='noindex'>
          <meta name='favicon' content='{$iconpath}'>
          <style>a{color: #00ff00;position: relative;display: inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
        </head>
        <body style='background-color:#e6e6fa;color:#363636;overflow-x:hidden;overflow-y:visible;'>
          <p align='center' style='color: #00008b;'>SourceCode of <a href='<?=htmlspecialchars($url)?>' target='_blank' rel='noopener noreferrer'><?=htmlspecialchars($url)?></a></p>
          <pre><?=$header?></pre><br>
          <pre>
          <?php
            echo htmlspecialchars($html);
          ?>
          </pre>
        </body>
      </html>
      <?php
    }
    else {

      // ヘッダーを配列にする
      $headerx = curl_headers($header);

      // ファイルのタイプを指定
      header("Content-Type: ".$headerx["Content-Type"]);

      // HTMLだった場合にのみプレビュー
      if (strpos($headerx["Content-Type"], 'text/html') === false)
        exit($html);

      // YouTube
      if (strpos($url, 'https://www.youtube.com/watch?v=') !== false && !isset($_POST["youtube"]))
      {
        $videocode = substr(strstr($url, 'watch?v='), 8);
        if (strpos($videocode, '&') !== false) $videocode = substr($videocode, 0, strcspn($videocode, '&'));
        exit('<script defer src="https://rinu.cf/pv/index.php?token=kaihi5cfuseyoutube&callback=console.log" nonce="'.$nonce.'"></script><div align="center"><p>プライバシー保護モードYouTube</p><iframe width="85%" height="90%" src="https://www.youtube-nocookie.com/embed/'.$videocode.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>');
      }
    ?>
<base href="<?=$url?>">
<meta name="robots" content="noindex, nofollow">
<script type="text/javascript" nonce="<?=$nonce?>">
  function NextURL(e){
    let t=document.createElement("form");t.style="Display: none;",t.action="<?=$meurl?>",t.method="POST",document.body.appendChild(t);
    let o=document.createElement("input");o.type="text",o.name="q",o.value=e,t.appendChild(o),t.submit()
  }
  window.addEventListener("DOMContentLoaded",function(){<?=$at?>let e=document.getElementsByTagName("a"),t=0;for(t=0;t<e.length;t++){let o=null;try{o=e[t].href,e[t].href="javascript:NextURL(`"+e[t].href+"`);",e[t].target="",e[t].rel="noopener noreferrer"}catch(e){}}let o=document.getElementsByTagName("img"),n=0;for(n=0;n<o.length;n++){let t=null;try{"http"==(t=o[n].src).slice(0,4)?o[n].src="<?=$meurl?>?q="+encodeURIComponent(btoa(t)):o[n].src="<?=$meurl?>?q="+encodeURIComponent(btoa(location.protocol+"://"+location.host+"/"+t))}catch(e){}}let l=document.getElementsByTagName("script"),s=0;for(s=0;s<l.length;s++){let t=null;try{(t=l[s].src)&&("http"==t.slice(0,4)?l[s].src="<?=$meurl?>?q="+encodeURIComponent(btoa(t)):l[s].src="<?=$meurl?>?q="+encodeURIComponent(btoa(location.protocol+"://"+location.host+"/"+t)))}catch(e){}}let a=document.getElementsByTagName("link"),c=0;for(c=0;c<a.length;c++)try{let t=a.href;if(("stylesheet"==toLowerCase(a[c].rel)||"text/css"==toLowerCase(a[c].type))&&a[c].href)if("http"==t.slice(0,4)){let e=new XMLHttpRequest,o=document.getElementsByTagName("body")[0];e.open("GET","<?=$meurl?>?q="+encodeURIComponent(btoa(t)),!0),e.send(null),e.onreadystatechange=function(){4==e.readyState&&200==e.status&&(o.style&&""!=o.style?o.style=o.style+e.responseText:o.style=e.responseText)}}else if("//"==t.slice(0,2)){let e=new XMLHttpRequest,o=document.getElementsByTagName("body")[0];e.open("GET","<?=$meurl?>?q="+encodeURIComponent(location.protocol+"://"+btoa(t)),!0),e.send(null),e.onreadystatechange=function(){4==e.readyState&&200==e.status&&(o.style&&""!=o.style?o.style=o.style+e.responseText:o.style=e.responseText)}}else{let e=new XMLHttpRequest,o=document.getElementsByTagName("body")[0];e.open("GET","<?=$meurl?>?q="+encodeURIComponent(btoa(location.protocol+"://"+location.host+"/"+t)),!0),e.send(null),e.onreadystatechange=function(){4==e.readyState&&200==e.status&&(o.style&&""!=o.style?o.style=o.style+e.responseText:o.style=e.responseText)}}}catch(e){}});</script>
<script defer src="https://rinu.cf/pv/index.php?token=kaihi5cfuse&callback=console.log" nonce="<?=$nonce?>"></script>
<!-- Main -->
<?=$html?>
<!-- /Main -->
    <?php
      exit();
    }
  }

  $meurl = "https://www.activetk.jp/";
  $title = "NextIP v6 | ActiveTK.jp";

?>

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>
    <base href="<?=$meurl?>">
    <meta name="author" content="ActiveTK.">
    <meta name="ROBOTS" content="ALL">
    <meta name="favicon" content="<?=$meurl?>icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="<?php echo $decp; ?>">
    <meta name="copyright" content="Copyright &copy; 2021 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="<?=$meurl?>icon/index.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ActiveTK5929">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $decp; ?>">
    <meta name="twitter:image:src" content="<?=$meurl?>icon/index.png">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $decp; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?=$meurl?>">
    <meta property="og:site_name" content="<?php echo $title; ?>">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="<?=$meurl?>icon/index.png">
    <meta property="og:image:width" content="862">
    <meta property="og:image:height" content="360">
    <link rel="canonical" href="<?=$meurl?>">
    <link rel="shortcut icon" href="<?=$meurl?>icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="<?=$meurl?>icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="<?=$meurl?>icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="<?=$meurl?>icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="<?=$meurl?>icon/index_150_150.ico">
    <script type="text/javascript" src="https://code.activetk.jp/ActiveTK.min.js"></script>
    <script defer src="https://rinu.cf/pv/index.php?token=kaihi5cfhome&callback=console.log"></script>
    <script type="text/javascript">onload=function(){$("#m").click(function(){let n=_("more").style;"none"==n.display?(n.display="block",_("si").innerHTML="&lt; 詳細設定を非表示にする"):(n.display="none",_("si").innerHTML="&gt; 詳細設定を表示")})};</script>
    <style>a{color: #00ff00;position: relative;display: inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#e6e6fa;text:#363636;">
    <br>
    <div align='center'>
      <h1>NextIP v6 - ActiveTK.jp</h1><br>
      <p>NextIPは、Web上で動作するプライバシー重視のプロキシツールです。<br>ユーザーが指定したウェブサイトへユーザーに代わってHTTPリクエストを送ります。</p>
      <form action='' method='POST'>
        <select name="htt">
          <option value="none">(None)</option>
          <option value="http">http://</option>
          <option value="https">https://</option>
          <option value="ftp">ftp://</option>
        </select>
        <input type='text' name='q' size='40' placeholder='ここにURLを入力してください'>
        <input type='submit' value='アクセス'>
        <br><br>
          プレビュー形式 : <select name="mode">
            <option value="html">HTML</option>
            <option value="text">テキスト</option>
          </select><br>
          <div id="m">
            <p style="cursor:pointer;color:#4169e1;" id="si">&gt; 詳細設定を表示</p>
          </div>
          <div id="more" style="display:none;clear:both;">
          JavaScript : <select name="js">
            <option value="true">有効</option>
            <option value="false">無効</option>
          </select>
          <br>
          自動リダイレクト : <select name="outr">
            <option value="true">する</option>
            <option value="false">しない</option>
          </select><br>
          解析のベースURL : <select name="baseurl">
            <option value="last">最終URL</option>
            <option value="mine">指定URL</option>
          </select><br>
          メゾット : <select name="meta">
            <option value="get">GET</option>
            <option value="post">POST</option>
          </select><br>
          UserAgent : <input type='text' name='ua' size='20' placeholder='UserAgent' value=''><br>
          BASIC認証 : <input type='text' name='user' size="8" placeholder='ユーザー名'>
          <input type='password' name='pass' size="8" placeholder='パスワード'><br>
          プロキシ : <select name="prk">
            <option>使用しない</option>
            <option value="prk-not-use">使用する</option>
          </select><br>
          <input type='text' name='prk-server' size="8" placeholder='サーバー'>
          <input type='text' name='prk-port' size="8" placeholder='ポート'>
          </div><br>
      </form>
      <br>
      <hr color="#363636" size="2">
      <?=GetAdHere()?>
      <hr color="#363636" size="2">
      <div align="center"><?=Get_Last()?></div>
    </div>
  </body>
</html>