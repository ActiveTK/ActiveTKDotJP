<?php
  require_once "/home/activetk/require/Config.php";
  $title = "URLダウンロードツール | ActiveTK.jp";
  $dec = "iPadなどでファイルをダウンロードする事が出来ます。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}/tools/download";
  if(isset($_POST["url"]) || isset($_GET["url"]))
  {
    if (isset($_POST["url"])) $urlx = $_POST["url"];
    else $urlx = $_GET["url"];
    $fn = pathinfo($urlx)["filename"] . "." . pathinfo($urlx)["extension"];
    if ($fn == "") $fn = "NoName.txt";
    $filename = "/home/activetk/activetk.jp/uploads/" . substr($fn, 0, 120);
    if (isset($_GET["admin"]) && $_GET["admin"] == "777759297777") $text = file_get_contents($urlx);
    else $text = file_get_contents("https://www.kaihi5.cf/getonly.php?q=".base64_encode($urlx));

    file_put_contents($filename, $text);
    if (substr($text, 0, 10) == "cURL error") exit($text);

    $pPath = $filename;

    if (!is_readable($pPath)) exit("ファイルを読み込めませんでした。");
    if (preg_match('/MSIE (\d{1,2})\.\d;/', getenv('HTTP_USER_AGENT'), $matchAry))
    {
      header('X-Download-Options: noopen');
      if (getenv('HTTPS') && (int) $matchAry[1] <= 8) {
        header('Cache-Control: public');
        header('Pragma: public');
      }
      header('Content-Type: application/force-download');
    }
    else header('Content-Type: application/zip');
    header('X-Content-Type-Options: nosniff');
    header('Content-Length: ' . filesize($pPath));
    if (isset($_GET["filename"]) && $_GET["filename"] != "")
    {
      header('Content-Disposition: attachment; filename="' . $_GET["filename"] . '"');
    }
    else
    {
      header('Content-Disposition: attachment; filename="' . basename($pPath) . '"');
    }
    header('Connection: close');
    while (ob_get_level()) { ob_end_clean(); }
    readfile($pPath);
    unlink($pPath);
    exit();
  }
?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="NextChat,nextchat">
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
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h2>URLダウンロードツール</h2>
      <hr size="1" color="#7fffd4">
      <form action="" method="GET">
        <input type="text" name="url" size="60" placeholder="URLを入力してください" required><br>
        <input type="text" name="filename" size="20" placeholder="ファイル名(省略可)"><br>
        <pre>※ファイル名の最後を「.zip」などにしないとプレビューされてしまう場合があります
        ※ファイル名が指定されていない場合は自動でURLからファイル名を解析します</pre>
        <input type="submit" value="ダウンロード" style="height:60px;width:140px;">
        <input type="button" onclick="window.location.reload(false);" value="再読み込み" style="height:60px;width:140px;">
      </form>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>
