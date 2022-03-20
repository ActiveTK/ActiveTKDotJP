<?php
  $title = "ファイル暗号化/複合化";
  $dec = "ファイルを簡単に暗号化/複合化出来ます。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/encrypt";
  function convert($size)
  {
    $unit=array('Byte','KB','MB','GB','TB','PD');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).$unit[$i];
  }
  class CryptionUtil
  {
    public static function encData($plain_data, $password, $iv)
    {
        $method   = 'aes-256-cbc';
        $options  = OPENSSL_RAW_DATA;
        $enc_data = openssl_encrypt($plain_data,$method,$password,$options, $iv);
        return $enc_data;
    }
    public static function decData($enc_data, $password, $iv)
    {
        $method   = 'aes-256-cbc';
        $options  = OPENSSL_RAW_DATA;
        $dec_data = openssl_decrypt($enc_data,$method,$password,$options,$iv);
        return $dec_data;
    }
  }
  if (isset($_GET["download"]))
  {
    $pPath = "/home/activetk/activetk.jp/uploads/".basename($_GET["download"]);
    if (!is_readable($pPath)) { exit("ファイルを読み込めませんでした。<br>注意: プライバシー保護の為、一度ダウンロードされたファイルは自動的に削除されます。"); }
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
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
  <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>ファイル暗号化/複合化</h1>
      <p>たった一回のクリックでファイルを暗号化/複合化できるツールです！<br>アルゴリズムには強度の高いAESの256bit(CBCモード)を使用しているので安心してお使いいただけます！</p>
      <hr size='1' color='#7fffd4'>
        <?php
        if (isset($_POST["enc"]))
        {
          $phpstarttime = microtime(true);
          if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            $filename = "/home/activetk/activetk.jp/uploads/" . substr(base_convert(md5(uniqid()), 16, 36), 0, 30) . ".txt";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $filename))
            {
              $size = @filesize($filename);
              $hash = @hash_file('md5', $filename);
              $oldfilename = htmlspecialchars($_FILES["file"]["name"]);
              if ($oldfilename == "") $oldfilename = "NoNameItem-" . substr(base_convert(md5(uniqid()), 16, 36), 0, 8);
              $text = @file_get_contents($filename);

              // encrypt
              $fn = basename($oldfilename) . ".atk-encrypt";
              $filenext = "/home/activetk/activetk.jp/uploads/" . $fn;
              $ivv = "dsaoinur3ipbjdsk";
              $enc_data = CryptionUtil::encData($text, $_POST["password"], $ivv);
              file_put_contents($filenext, $enc_data);

              $memory = convert(Memory_get_usage()).", ".Memory_get_usage()."Byte";
              @unlink($filename);
            ?>
      <hr size='1' color='#7fffd4'>
      <div align='left'>
        <p>暗号化結果</p>
        <p><a href="https://www.activetk.jp/tools/encrypt?download=<?=$fn?>">ここをクリックするとダウンロードを開始します</a></p>
        <pre>※プライバシー保護の為、一度ダウンロードされたファイルは自動的に削除されます。</pre>
          暗号化時刻: <?php echo date("Y/m/d H:i:s")." (".time().")"; ?><br>
          ファイル名: <?=$oldfilename?><br>
          ハッシュ(md5): <?=$hash?><br>
          ファイルサイズ: <?=$size?><br>
          所要時間: <?php echo (microtime(true) - $phpstarttime); ?><br>
          所要メモリー: <?=$memory?>
      </div>
      <hr size='1' color='#7fffd4'>
        <?php
            }
            else echo $_FILES["file"]["name"] . "をアップロード出来ませんでした。";
          }
        }
        else if (isset($_POST["dec"]))
        {
          $phpstarttime = microtime(true);
          if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            $filename = "/home/activetk/activetk.jp/uploads/" . substr(base_convert(md5(uniqid()), 16, 36), 0, 30) . ".txt";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $filename))
            {
              $size = @filesize($filename);
              $hash = @hash_file('md5', $filename);
              $oldfilename = htmlspecialchars($_FILES["file"]["name"]);
              if ($oldfilename == "") $oldfilename = "NoNameItem-" . substr(base_convert(md5(uniqid()), 16, 36), 0, 8) . ".atk-encrypt";
              $text = @file_get_contents($filename);

              // decrypt
              $fn = substr(basename($oldfilename), 0, -12);
              if ($fn == "") $fn = "NoNameItem-" . substr(base_convert(md5(uniqid()), 16, 36), 0, 8);
              $filenext = "/home/activetk/activetk.jp/uploads/" . $fn;
              $ivv = "dsaoinur3ipbjdsk";
              $dec_data = CryptionUtil::decData($text, $_POST["password"], $ivv);

              file_put_contents($filenext, $dec_data);

              if ($dec_data == "" || filesize($filenext) == 0)
              {
                $error = "エラー: パスワードが違う為、複合化出来ませんでした。";
                unlink($filenext);
              }

              $memory = convert(Memory_get_usage()).", ".Memory_get_usage()."Byte";
              @unlink($filename);
            ?>
      <hr size='1' color='#7fffd4'>
      <div align='left'>
          <p>複合化結果</p>
          <?php if ($error != "") { ?>
          複合化時刻: <?php echo date("Y/m/d H:i:s")." (".time().")"; ?><br>
          <?=$error?>
          <?php } else { ?>
          <p><a href="https://www.activetk.jp/tools/encrypt?download=<?=$fn?>">ここをクリックするとダウンロードを開始します</a></p>
          <pre>※プライバシー保護の為、一度ダウンロードされたファイルは自動的に削除されます。</pre>
          複合化時刻: <?php echo date("Y/m/d H:i:s")." (".time().")"; ?><br>
          ファイル名: <?=$oldfilename?><br>
          ハッシュ(md5): <?=$hash?><br>
          ファイルサイズ: <?=$size?><br>
          一時パス: <?=$filename?><br>
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
        <input type="file" name="file" required><br>
        <input type="password" name="password" size="60" placeholder="パスワードを入力してください" required><br>
        <br>
        <input type="submit" name="enc" value="暗号化" style="height:60px;width:140px;">    <input type="submit" name="dec" value="複合化" style="height:60px;width:140px;">
      </form>
    </div>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>