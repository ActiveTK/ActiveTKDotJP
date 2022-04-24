<?php
  $title = "画像形式変換ツール";
  $dec = "画像の形式を「jpg」から「png」のように変える事が出来ます。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/image";
  function convert($size)
  {
    $unit=array('Byte','KB','MB','GB','TB','PD');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).$unit[$i];
  }
  if (isset($_GET["download"]))
  {
    $pPath = "/home/activetk/activetk.jp/uploads/".basename($_GET["download"]);
    if (!is_readable($pPath) ||
      empty($p) || $p == "/" // 利用者様のご指摘で追加させていただきました。
    ) { exit("ファイルを読み込めませんでした。注意:一度ダウンロードされたファイルは削除されます。"); }
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
    header('Content-Disposition: attachment; filename="' . basename($pPath) . '"');
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
    <title><?php echo $title; ?> - ActiveTK.jp</title>
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
      <h1><?=$title?></h1>
      <hr size="1" color="#7fffd4">
      <?php
        if (isset($_POST["change"]))
        {
          $phpstarttime = microtime(true);
          $error = "";
          if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            $filename = "/home/activetk/activetk.jp/uploads/upload_" . substr(base_convert(md5(uniqid()), 16, 36), 0, 30) . ".txt";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $filename))
            {
              $size = @filesize($filename);
              $hash = @hash_file('md5', $filename);
              $oldfilename = htmlspecialchars($_FILES["file"]["name"]);
              if ($oldfilename == "") $oldfilename = "NoNameItem-" . substr(base_convert(md5(uniqid()), 16, 36), 0, 8);
              $text = @file_get_contents($filename);
              if($type = @exif_imagetype($filename)) {
                switch($type){
                  case IMAGETYPE_GIF:
                    $filetype = "gif";
                    break;
                  case IMAGETYPE_JPEG:
                    $filetype = "jpg";
                    break;
                 case IMAGETYPE_PNG:
                    $filetype = "png";
                    break;
                  default:
                 $error = "エラー: 指定された種類の画像には対応していません。";
                }
              } else {
                 $error = "エラー: 画像のみアップロード可能です。";
              }
              $oldtype = $filetype;
              if ($oldtype == "png")
                $image = @imagecreatefrompng($filename);
              else if ($oldtype == "jpg")
                $image = @imagecreatefromjpeg($filename);
              else if ($oldtype == "gif")
                $image = @imagecreatefromgif($filename);
              if ($_POST["totype"] == "png")
                $nexttype = "png";
              else if ($_POST["totype"] == "jpg")
                $nexttype = "jpg";
              else if ($_POST["totype"] == "gif")
                $nexttype = "gif";
              else
                $error = "エラー: 出力先の形式が無効です。";
              if ($error == "")
              {
              $fn = pathinfo($oldfilename)['filename'] . "." . $nexttype;
              $fnt = "/home/activetk/activetk.jp/uploads/" . basename(pathinfo($oldfilename)['filename']) . "." . $nexttype;
              if ($_POST["totype"] == "png")
                imagepng($image, $fnt, 9);
              else if ($_POST["totype"] == "jpg")
                imagejpeg($image, $fnt, 9);
              else if ($_POST["totype"] == "gif")
                imagegif($image, $fnt, 9);
              $memory = convert(Memory_get_usage()).", ".Memory_get_usage()."Byte";
              }
              @imagedestroy($image);
              @unlink($filename);
            ?>
        <div align='left'>
          <p>変換結果</p>
          <?php if ($error != "") echo "<p>{$error}</p>"; else { ?>
          <p><a href="https://www.activetk.jp/tools/image?download=<?=$fn?>">ここをクリックするとダウンロードを開始します</a></p>
          <pre>※セキュリティ保護のため、一度ダウンロードすると削除されます。ご注意ください。</pre>
          時刻: <?php echo date("Y/m/d H:i:s")." (".time().")"; ?><br>
          ファイル名: <?=$oldfilename?><br>
          ハッシュ(md5): <?=$hash?><br>
          ファイルサイズ: <?=$size?><br>
          所要時間: <?php echo (microtime(true) - $phpstarttime); ?><br>
          所要メモリー: <?=$memory?>
          <?php } ?>
        </div>
        <hr size='1' color='#7fffd4'>
        <?php
            }
            else echo htmlspecialchars($_FILES["file"]["name"]) . "をアップロード出来ませんでした。";
          }
        }
      ?>
      <form action="" method="POST" enctype="multipart/form-data">
        <p>画像(png,jpg,gif): <input type="file" name="file" required></p>
        <p>変換先: <select name="totype">
          <option value="png">PNG (.png)</option>
          <option value="jpg">JPEG (.jpg)</option>
          <option value="gif">GIF (.gif)</option>
        </select></p><br>
        <input type="submit" name="change" value="変換する！" style="height:60px;width:140px;">
      </form>
    </div>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>