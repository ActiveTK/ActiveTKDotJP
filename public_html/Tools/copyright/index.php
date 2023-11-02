<?php

  if (isset($_GET["text"]))
  {
    $imagex = imagecreatefrompng("/home/activetk/activetk.jp/public_html/Tools/copyright/white.png");
    imagettftext($imagex, 20, 0, 5, 30, imagecolorallocate($imagex, 0, 0, 0), "/home/activetk/activetk.jp/public_html/Tools/copyright/meiryo.ttc", $_GET["text"]);
    header("Content-Type: image/png");
    imagepng($imagex);
    exit();
  }

  $title = "著作物利用許可申請書作成ツール";
  $dec = "ネット上での著作権侵害が問題になっています。そこで、このツールを作成しました。このツールを使えば3分で著作権の利用許可を申請するテキストを作れます。";
  $root = "https://www.activetk.jp/";
  $url = "https://www.activetk.jp/tools/copyright";
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>
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
    <script type="text/javascript">
    window.printwait = false;
    window.oldtitle = "";
    window.onclick = function() {
      if (window.printwait)
      {
        window.printwait = false;
        _("forprint").textContent = "";
        _("home").style = "display:block;";
        document.getElementsByTagName("title")[0].innerHTML = window.oldtitle;
      }
    }
    function sendmail() {
      if (!_("stext").value)
        return false;
      try {
        window.location.href = "mailto:?subject=" + atk.encode("【著作物利用許可の申請】") + "&body=" + atk.encode(_("stext").value);
      } catch (e) {
        return false;
      }
      return true;
    }
    function image() {
      window.open('https://www.activetk.jp/tools/copyright?text=' + atk.encode(_("stext").value), '_blank');
    }
    function printx() {
      _("home").style = "display:none;";
      try {
        _("forprint").textContent = _("stext").value;
        window.oldtitle = document.getElementsByTagName("title")[0].innerHTML;
        document.getElementsByTagName("title")[0].innerHTML = "著作物利用許可の申請";
        window.printwait = true;
        window.print();
      } catch (e) {
        _("forprint").textContent = "";
        _("home").style = "display:block;";
        document.getElementsByTagName("title")[0].innerHTML = window.oldtitle;
      }
    }
    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1><?=$title?></h1>
      <p>3分で著作権の利用許可を申請するテキストを作れるツールです。著作権侵害、ダメ。絶対！</p>
      <hr size="1" color="#7fffd4">
      <?php if (isset($_POST["go"])) { ?>
      <div align='center'>
        <p>作成に成功しました！！
          <a href="javascript:void(sendmail())">メールで送信</a>
          <a href="javascript:void(printx())">印刷</a>
          <a href="javascript:void(image())">画像を表示</a>
          <hr size="1" color="#7fffd4">
        </p>
        <textarea placeholder="(クリックするとコピーします)" id="stext" style="height:400px;margin:0px;width:500px;" onclick='const a=function(){{let e=_("stext").value;let t=document.createElement("div");t.appendChild(document.createElement("pre")).textContent=e;let n=t.style;n.position="fixed",n.left="-100%",document.body.appendChild(t),document.getSelection().selectAllChildren(t);let o=document.execCommand("copy");document.getElementById("info").innerHTML="コピーしました！";return document.body.removeChild(t),o}};a();'>
【著作物利用許可の申請】
<?=date('Y年m月j日')?>


[申請者名] <?=$_POST["sinnseisya"]."\n"?>
<?php if (isset($_POST["jyuusyo"]) && $_POST["jyuusyo"] != "") { ?>[住所] <?=$_POST["jyuusyo"]."\n"?><?php } ?>
<?php if (isset($_POST["denwa"]) && $_POST["denwa"] != "") { ?>[電話] <?=$_POST["denwa"]."\n"?><?php } ?>
<?php if (isset($_POST["mail"]) && $_POST["mail"] != "") { ?>[メール] <?=$_POST["mail"]."\n"?><?php } ?>

下記のように著作物を利用したく、申請いたします。

【利用したい著作物】
[著作物の名称] <?=$_POST["title"]."\n"?>
[著作権の所有者] <?=$_POST["copyrighter"]."\n"?>
<?php if (isset($_POST["maker"]) && $_POST["maker"] != "") { ?>[著作者名] <?=$_POST["maker"]."\n"?><?php } ?>
<?php if (isset($_POST["url"]) && $_POST["url"] != "") { ?>[URL] <?=$_POST["url"]."\n"?><?php } ?>

【利用方法】
<?php
  if (isset($_POST["use-tp"]) && $_POST["use-tp"] != "") {
    if ($_POST["use-tp"] == "etc" && isset($_POST["use-tp-etc"]) && $_POST["use-tp-etc"] != "")
    { ?><?=$_POST["use-tp-etc"]?>で使用します。<?php }
    else
    { ?><?=$_POST["use-tp"]?>で使用します。<?php }
  } ?>
<?php if (isset($_POST["nexturl"]) && $_POST["nexturl"] != "") { echo "\n"; ?>[使用予定のURL] <?=$_POST["nexturl"]?><?php } ?>


【利用期間】
<?=$_POST["kigen"]?>
<?php if (isset($_POST["last"]) && $_POST["last"] != "NONE") { ?><?="\n"."\n".$_POST["last"]?><?php } ?>
</textarea>
        <span id="info"></span>
        <pre>※クリックするとコピーします</pre>
      </div>
      <hr size='1' color='#7fffd4'>
      <?php } ?>
      <form action="" method="POST">
        申請者名(<span style="color:#ff0000;">必須</span>): <input type="text" name="sinnseisya" size="20" placeholder="申請者名" required><br>
        <br>
        申請者の住所(任意): <input type="text" name="jyuusyo" size="40" placeholder="申請者の住所(○○県△△市 1丁目2-3 456号室)"><br>
        申請者の電話番号(任意): <input type="text" name="denwa" size="30" placeholder="申請者の電話番号" pattern="^(+|)\d{2,4}-\d{3,4}-\d{3,4}"><br>
        申請者のメールアドレス(任意): <input type="text" name="mail" size="40" placeholder="申請者のメールアドレス(mailad@example.com)" pattern="^[a-zA-Z]{1}[0-9a-zA-Z]+[\w\.-]+@[\w\.-]+\.\w{2,}$"><br>
        <br>
        著作物の名称(<span style="color:#ff0000;">必須</span>): <input type="text" name="title" size="30" placeholder="著作物の名称" required><br>
        著作物の所有者(<span style="color:#ff0000;">必須</span>): <input type="text" name="copyrighter" size="30" placeholder="著作権の所有者" required><br>
        著作者名: <input type="text" name="maker" size="30" placeholder="著作者名(製作者名)"><br>
        著作物のURL: <input type="text" name="url" size="70" placeholder="著作物のURL"><br>
        <br>
        利用方法: <select name="use-tp" required>
          <option value="個人のブログ内">個人のブログ内</option>
          <option value="会社のブログ内">会社のブログ内</option>
          <option value="お店の掲示">お店の掲示</option>
          <option value="アプリケーション内">アプリケーション内</option>
          <option value="スクラッチを利用したプログラミング">スクラッチを利用したプログラミング</option>
          <option value="etc">その他(下に入力してください)</option>
        </select>で使用します。<br>
        (上記の質問でその他と答えた場合): <input type="text" name="use-tp-etc" size="70" placeholder="利用目的を明記してください">で使用します。<br>
        利用予定のURL: <input type="text" name="nexturl" size="70" placeholder="利用予定のURL"><br>
        <br>
        利用期間(<span style="color:#ff0000;">必須</span>): <input type="text" name="kigen" size="35" placeholder="無期限、またはn日などと入力してください" required><br>
        <br>
        文末: <select name="last">
          <option value="ご対応のほどよろしくお願いします。">ご対応のほどよろしくお願いします。</option>
          <option value="宜しくお願い致します。">宜しくお願い致します。</option>
          <option value="NONE">(文末のメッセージ無し)</option>
        </select>
        <br>
        <br>
        <input type="submit" name="go" value="作成！" style="height:35px;margin:0px;width:80px;">
      </form>
      <hr size="1" color="#7fffd4">
      <div align="center"><?=Get_Last()?></div>
    </div>
    <pre style="font-size:24px;"><div id="forprint"></div></pre>
    <br>
  </body>
</html>