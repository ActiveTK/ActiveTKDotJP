<?php

  $title = "NSLookUP Online - ActiveTK.jp";
  $dec = "Web上でドメインのDNS参照を行えます。DNS参照を行えば、サーバーのIPアドレスなどの情報などを取得できます。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/nslookup";

  function lookup($domain)
  {
    $res = gethostbynamel($domain);
    if ($res === false)
      return "エラーが発生しました。: ドメインが存在しません。";
    $list = "";
    $i = 0;
    foreach( $res as $value ) {
      $i++;
      $list .= "({$i}) " . htmlspecialchars($value) . "\n";
    }
    return $list;
  }
  if (isset($_POST["nslookup"]))
  {
    header("Content-Type: text/plain;charset=UTF-8");
    exit(lookup($_POST["nslookup"]));
  }

  if (isset($_GET["withcurl"]) && isset($_GET["q"]) && is_string($_GET["q"]) && !empty($_GET["q"]))
  {
    header("Content-Type: text/plain;charset=UTF-8");
    exit(htmlspecialchars(lookup(urldecode(base64_decode($_GET["q"])))));
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
    <script src="https://code.activetk.jp/ActiveTK.min.js" type="text/javascript" charset="UTF-8" nonce="<?=nonce?>"></script>
    <script type="text/javascript" nonce="<?=nonce?>">
      function getHost(url) {
        var hostname;
        if (url.indexOf("://") > -1) hostname = url.split('/')[2];
        else hostname = url.split('/')[0];
        hostname = hostname.split(':')[0];
        hostname = hostname.split('?')[0];
        hostname = hostname.replace("www.", "");
        return hostname;
      }
      window.onload = function() {
        _("copy").onclick = function() {
          atk.copy(_("savek").value);
          _("copyk").innerHTML = "コピーしました！";
        }
        _("td").onsubmit = function() {
          try {
            let fdata = new FormData();
            fdata.append("nslookup", getHost(_("save").value));
            $.ajax({
              xhr: function() {
                let xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt){
                  if (evt.lengthComputable)
                     _("savek").value = "送信中。。("+evt.loaded/evt.total*100+"%完了)";
                }, false);
                return xhr;
              },
              url: "",
              type: "POST",
              data: fdata,
              cache: !1,
              contentType: !1,
              processData: !1
            })
            .done(function (t) {
              _("savek").value = t;
            })
            .fail(function (t, e, o) {
               $("#stat").text("解析又は通信に失敗しました。詳細:" + o);
            });
          } catch(e) { 
            console.log(e);
          }
          return false;
        }
      }
      
    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
        <h1>NSLookUP Online - ActiveTK.jp</h1>
        <p>Web上でDNS参照を行えます。</p>
        <hr size="1" color="#7fffd4">
        <form action="" method="POST" id="td">
          <h2>$ nslookup <input type="text" id="save" style="height:40px;width:200px;" placeholder="ActiveTK.jp" style="font-size:2rem;"> ?</h2>
          <input type="submit" value="コマンド実行" style="height:60px;width:140px;">
          <hr size="1" color="#7fffd4">
          ↓↓結果↓↓<br>
          <textarea rows="14" id="savek" style="margin: 0px; height: 140px; width: 580px;">ここに結果が表示されます。</textarea>
          <br>
          <input type="button" value="コピー" id="copy" style="height:60px;width:140px;"><span id="copyk"></span>
        </form>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>
