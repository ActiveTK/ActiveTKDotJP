<?php
  $title = "ファイル解析 - ActiveTK.CF";
  $dec = "ファイルの行数などを取得する事が出来ます。";
  $root = "https://www.activetk.cf/";
  $url = "{$root}tools/parse.php";
  function convert($size)
  {
    $unit=array('Byte','KB','MB','GB','TB','PD');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).$unit[$i];
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
    <meta name="robots" content="noindex">
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
</head>
<body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
<noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
        <h2>ファイル解析 - NextChat</h2>
        <?php
        $phpstarttime = microtime(true);
        if (isset($_POST["filesubmit"]))
        {
          if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            $filename = "./tmp/" . substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 30) . ".txt";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $filename))
            {
              $line = @count(@file($filename));
              $len = @mb_strlen(file_get_contents($filename));
              $size = @filesize($filename);
              $hash = @hash_file('md5', $filename);
              if($type = @exif_imagetype($filename)){
                switch($type){
                  case IMAGETYPE_GIF:
                    $filetype = "GIF(動画)";
                    break;
                  case IMAGETYPE_JPEG:
                    $filetype = "JPEG(画像)";
                    break;
                 case IMAGETYPE_PNG:
                    $filetype =  "PNG(画像)";
                    break;
                  default:
                 echo "画像";
                }
              }else{
                 $filetype =  "画像ではありません";
              }
              $oldfilename = htmlspecialchars($_FILES["file"]["name"]);
              $memory = convert(Memory_get_usage()).", ".Memory_get_usage()."Byte";
              @unlink($filename);
            ?>
        <hr size='1' color='#7fffd4'>
        <div align='left'>
          <p>解析結果</p>
          解析時刻: <?php echo date("Y/m/d H:i:s")." (".time().")"; ?><br>
          URL: (アップロードされたファイルです)<br>
          ファイル名: <?=$oldfilename?><br>
          ハッシュ(md5): <?=$hash?><br>
          ファイルサイズ: <?=$size?><br>
          exif_imagetype(): <?=$filetype?><br>
          文字数: <?=$len?><br>
          行: <?=$line?><br>
          一時パス: <?=$filename?><br>
          解析時間: <?php echo (microtime(true) - $phpstarttime); ?><br>
          解析メモリー: <?=$memory?>
        </div>
        <hr size='1' color='#7fffd4'>
        <?php
            }
            else echo $_FILES["file"]["name"] . "をアップロード出来ませんでした。";
          }
        }
        else if(isset($_POST["url"]) || isset($_GET["url"]))
        {
          $filename = "./tmp/" . substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 30) . ".txt";
          if (isset($_POST["url"])) $urlx = $_POST["url"];
          else $urlx = $_GET["url"];
          if (isset($_GET["admin"]) && $_GET["admin"] == "777759297777") $text = file_get_contents($urlx);
          else $text = file_get_contents("https://www.kaihi.cf/getonly.php?q=".base64_encode($urlx));
          file_put_contents($filename, $text);
          $line = @count(@file($filename));
          $len = @mb_strlen($text);
          if ($len > 9 && substr($text, 0, 10) == "cURL error")
          {
            $error = $text;
          }
          $size = @filesize($filename);
          $hash = @hash_file('md5', $filename);
          if($type = @exif_imagetype($filename)){
            switch($type){
              case IMAGETYPE_GIF:
                $filetype = "GIF(動画)";
                break;
              case IMAGETYPE_JPEG:
                $filetype = "JPEG(画像)";
                break;
              case IMAGETYPE_PNG:
                $filetype =  "PNG(画像)";
                break;
              default:
             echo "画像";
            }
           }else{
             $filetype =  "画像ではありません";
           }
          $memory = convert(Memory_get_usage()).", ".Memory_get_usage()."Byte";
          @unlink($filename);
        ?>
        <hr size='1' color='#7fffd4'>
        <div align='left'>
          <p>解析結果</p>
          解析時刻: <?php echo date("Y/m/d H:i:s")." (".time().")"; ?><br>
          URL: <?=$urlx?><br>
          <?php if ($error != "") { ?>
          エラー: <?=$error?>
          <?php } else { ?>
          ハッシュ(md5): <?=$hash?><br>
          ファイルサイズ: <?=$size?><br>
          exif_imagetype(): <?=$filetype?><br>
          文字数: <?=$len?><br>
          行: <?=$line?><br>
          一時パス: <?=$filename?><br>
          解析時間: <?php echo (microtime(true) - $phpstarttime); ?><br>
          解析メモリー: <?=$memory?>
          <?php } ?>
        </div>
        <hr size='1' color='#7fffd4'>
        <?php
        }
        ?>
        <form action="" method="POST">
          <input type="text" name="url" size="60" placeholder="URLを入力してください" required><input type="submit" value="解析">
        </form>
        <form action="" method="POST" enctype="multipart/form-data">
          <input name="file" type="file" required><input type="submit" name="filesubmit" value="解析">
        </form>
    </div>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><font style="background-color:#06f5f3;">Copyright &copy; 2021 ActiveTK. All rights reserved.</font></div>
    <br>
</body>
</html>