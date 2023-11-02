<?php
  $title = "位置情報特定ツール v2";
?>

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?=$title?> - ActiveTK.jp</title>
    <meta name="ROBOTS" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="位置情報特定ツール(住所特定ツール) v2です。スマホを盗まれてしまった場合などに利用してください。GPS情報やIPアドレスを取得する事が出来ます。やり方は簡単、特定したい相手にリンクをクリックさせるだけ！悪用厳禁!!">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?=$title?> - ActiveTK.jp">
    <meta name="twitter:description" content="位置情報特定ツール(住所特定ツール) v2です。スマホを盗まれてしまった場合などに利用してください。GPS情報やIPアドレスを取得する事が出来ます。やり方は簡単、特定したい相手にリンクをクリックさせるだけ！悪用厳禁!!">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="<?=$title?> - ActiveTK.jp">
    <meta property="og:description" content="位置情報特定ツール(住所特定ツール) v2です。スマホを盗まれてしまった場合などに利用してください。GPS情報やIPアドレスを取得する事が出来ます。やり方は簡単、特定したい相手にリンクをクリックさせるだけ！悪用厳禁!!">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.activetk.jp/tools/tokutei">
    <meta property="og:site_name" content="<?=$title?> - ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <script src="https://code.activetk.cf/ActiveTK.min.js" type="text/javascript" charset="UTF-8"></script>
    <?php if(isset($_POST['info']) && $_POST['info'] != "") { ?>
    <script>
      window.onload=function(){_("copyurl").onclick=function(){copy(_("tokuteiurl").href);alert("コピーしました！");}}
      function copy(e){let t=document.createElement("div");t.appendChild(document.createElement("pre")).textContent=e;let n=t.style;n.position="fixed",n.left="-100%",document.body.appendChild(t),document.getSelection().selectAllChildren(t);let o=document.execCommand("copy");return document.body.removeChild(t),o}
    </script>
    <?php } ?>
    <?php if ($issumaho) {
      ?><script src="https://www.activetk.jp/js/cotrld_76907q706306a0jpa6s9f7m39a8ba02ar6d5254je89ep9c4.js"></script><?php
        } else { 
      ?><script src="https://www.activetk.jp/js/cotrld.js"></script><?php
    } ?>
    <script defer src="https://rinu.cf/pv/index.php?token=activetkcftokutei&callback=cotrld"></script>
    <?=Get_Default()?>
    <style>a{color:#c71585;position:relative;display:inline-block}a,a:after{transition:.3s}a:after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transform:translateX(-50%)}a:hover:after{width:100%}</style>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center">
      <h1>位置情報特定ツール v2</h1>
      <div title="アクセスカウンター" id="pv" style="display:none;"></div>
      <p>相手にリンクを開かせる事でIPアドレスなどを取得できるツールです。スマホを盗まれた場合や、詐欺にあった場合などに使用してみてください。</p>
      <p>本ツールの使い方が分からない場合、<a href="tokutei_easy" target="_blank">解説付きバージョン</a>をご利用ください。</p>
      <hr size="1" color="#7fffd4">
      <form action='' method='POST'>
        <input type='text' name='info' placeholder='リダイレクト先のURLを入力してください' size='42' required>
        <input type="submit" value="リンクを作成">
      </form>
      <?php
        if(isset($_POST['info']) && $_POST['info'] != "")
        {
          $i = 0;
	  $flg = rand(1, 10000000);
          $header = array(
            "User-Agent: Googlebot",
          );
          $options =array(
            'http' =>array(
              'method' => "GET",
              'header' => implode("\r\n", $header),
             )
          );
          $aitenourl = 
            file_get_contents("https://rinu.cf/?addurlbyphp=https%3A%2F%2Ftokutei.cf%2F%3Furl%3D" . 
            rawurlencode(rawurlencode($_POST['info'])) . "%26flg%3D" . htmlspecialchars($flg) . "&makefrom=" . $_SERVER['REMOTE_ADDR'], false, stream_context_create($options));
      ?>
	  <h4><font color="#ffd700">使用方法 - How to use</font></h4>
      1. <a href="https://tokutei.cf/license.php" target="_blank" rel="noopener noreferrer"><font style="background-color:#228b22;color:#7fffd4;">[本ツールの利用規約]</font></a>に全て同意してください。(悪用対策)<br><br>
      2. 相手を <a href="<?=$aitenourl?>" target="_blank" rel="noopener noreferrer" id="tokuteiurl"><font style="background-color:#228b22;color:#7fffd4;">[ここ]</font></a> にアクセスさせます。<input value='URLをコピー' type='button' id="copyurl"><br><br>
      3. <a href="https://tokutei.cf/view?q=(secret code)?>" target="_blank" rel="noopener noreferrer"><font style="background-color:#228b22;color:#7fffd4;">[ここ]</font></a>にアクセスします。<br>
      <br>
      <hr size="1" color="#7fffd4">
      <?php GetAdHere(); } ?>
    </div>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
  </body>
</html>