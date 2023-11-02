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
    <meta name="ROBOTS" content="noindex">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="位置情報特定ツール v2です。スマホを盗まれてしまった場合などに利用してください。GPS情報やIPアドレスを取得する事が出来ます。やり方は簡単、特定したい相手にリンクをクリックさせるだけ！悪用厳禁!!">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?=$title?> - ActiveTK.jp">
    <meta name="twitter:description" content="位置情報特定ツール v2です。スマホを盗まれてしまった場合などに利用してください。GPS情報やIPアドレスを取得する事が出来ます。やり方は簡単、特定したい相手にリンクをクリックさせるだけ！悪用厳禁!!">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="<?=$title?> - ActiveTK.jp">
    <meta property="og:description" content="位置情報特定ツール v2です。スマホを盗まれてしまった場合などに利用してください。GPS情報やIPアドレスを取得する事が出来ます。やり方は簡単、特定したい相手にリンクをクリックさせるだけ！悪用厳禁!!">
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
    <?php if(isset($_POST['info'])) { ?>
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
    <style>
    
      .inpblue{background:linear-gradient(transparent 70%,#66CCFF 0%)}
      .inpgreen{background:linear-gradient(transparent 70%,#00FF00 0%)}
      .inpred{background:linear-gradient(transparent 70%,#FFC0CB 0%)}
      .inpyellow{background:linear-gradient(transparent 70%,#FFFF00 0%)}
      p{font-weight:bold;font-size:18px;}
    
    </style>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center">
      <h1><span class="inpgreen">位置情報特定ツール v2</span></h1>
      <div title="アクセスカウンター" id="pv" style="display:none;"></div>
      <div title="ツールの概要" style="background-color:#90ee90;border-radius:30px;text-align:center;width:60%;">
        <h3>【ツールの概要】</h3>
      </div>
      <p>本ツールは、<span class="inpblue">相手にリンク(URL)を開かせる事でIPアドレスやGPS情報などを取得できるツール</span>です。</p>
      <p><span class="inpred">スマホを盗まれた場合</span>や、<span class="inpred">詐欺にあった場合</span>などに使用してみてください。悪用厳禁！</p>

      <div title="使用方法" style="background-color:#90ee90;border-radius:30px;text-align:center;width:60%;">
        <h3>【使用方法】</h3>
      </div>

      <form action='' method='POST' id='createlink'>
        <p><span class="inpgreen">手順1</span></p>
        <p>まず、下のテキストボックスに<span class="inpblue">「特定した後に相手にアクセスさせたいURL」</span>を入力し、「リンクを作成」を押して下さい。</p>
        <p>なお、意味が分からなければ空欄でも大丈夫です。(デフォルトはGoogle)</p>
        リダイレクト先のURL: <input type='url' name='info' placeholder='https://www.google.com' size='42'>
        <input type="submit" value="リンクを作成" style="height:60px;width:140px;">
      </form>

      <?php
        if(isset($_POST['info']))
        {
          if (empty($_POST['info']))
            $_POST['info'] = "https://www.google.com/";
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

      <hr size="1" color="#7fffd4">
      <p><span class="inpgreen">手順2</span></p>
      
      <p><a href="https://tokutei.cf/license.php" target="_blank" rel="noopener noreferrer"><font style="background-color:#228b22;color:#7fffd4;">[本ツールの利用規約]</font></a>に全て同意してください。</p>
      悪用対策です。本ツールを詐欺などに利用しないでください。

      <hr size="1" color="#7fffd4">

      <p><span class="inpgreen">手順3</span></p>
      <p>特定したい相手を <a href="<?=$aitenourl?>" target="_blank" rel="noopener noreferrer" id="tokuteiurl"><font style="background-color:#228b22;color:#7fffd4;">[特定用URL]</font></a> にアクセスさせます。
      <input value='URLをコピー' type='button' id="copyurl"></p>
      このURLを、相手へTwitterのDM機能やLineなどで送信してください。
      
      <hr size="1" color="#7fffd4">

      <p><span class="inpgreen">手順4</span></p>
      <p><a href="https://tokutei.cf/view?q=<?=(secret code)" target="_blank" rel="noopener noreferrer"><font style="background-color:#228b22;color:#7fffd4;">[特定結果確認ページ]</font></a>にアクセスします。</p>
      
      相手がまだURLへアクセスしていない場合、「404 お探しのページは見つかりませんでした」と表示される場合があります。<br>
      その場合、ページをブックマークしておき少し時間を空けるか、URLを相手に再送してみてください。

      <br>

      <hr size="1" color="#7fffd4">
      <?=GetAdHere()?>
      <?php } ?>

    </div>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
  </body>
</html>