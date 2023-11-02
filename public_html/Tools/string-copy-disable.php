<?php
  $title = "文字列のコピー無効化ツール | ActiveTK.jp";
  $dec = "文字列にUnicodeの制御文字(LRO/RLO)を混在させて、コピーできないようにします。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/string-copy-disable";
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
    <script src="https://code.activetk.jp/ActiveTK.min.js" nonce="<?=$nonce?>"></script>
    <script nonce="<?=$nonce?>">
      window.onload = function() {
        _("copy").onclick = function() {
          atk.copy(_("savek").value);
          _("copyk").innerHTML = "コピーしました！";
        };
        _("clear").onclick = function() {
          _("save").value = "";
        };
        _("td").onsubmit = function() {
          try {
            let result = "";
            for (const line of _("save").value.split("\n"))
              result += ActiveTKDotJP_DISABLE_COPY(line) + "\n";
            _('savek').value = result;
          }
          catch (e) {
            console.error(e);
          }
          return false;
        }
      }
      function ActiveTKDotJP_DISABLE_COPY(str)
      {
        let strEncArr = [...str];
        let result = "";
        let flg = 0;
        let r = Math.floor( Math.random() * 11 );
        for (const chr of strEncArr) {
          result += chr;
          flg++;
          if (flg == r)
          {
            result += atk.decode("%E2%80%AE");
            break;
          }
        }
        for (const chr of strEncArr.reverse().slice(0, strEncArr.length - flg))
          result += chr;
        return result + atk.decode("%E2%80%AD");
      }
      function ActiveTKDotJP_DISABLE_COPY_OLD(str)
      {
        let strEncArr = atk.encode(str).split('%');
        let strEncArrWithRand = [];
        let flg = 0;
        for (const HexStr of strEncArr) {
          console.log(HexStr);
          strEncArrWithRand[strEncArrWithRand.length] = HexStr;
          flg++;
          if (flg % 2 == 0)
          {
            strEncArrWithRand[strEncArrWithRand.length] = "E2";
            strEncArrWithRand[strEncArrWithRand.length] = "80";
            strEncArrWithRand[strEncArrWithRand.length] = "AD";
          }
          else if (flg % 3 == 0)
          {
            strEncArrWithRand[strEncArrWithRand.length] = "E2";
            strEncArrWithRand[strEncArrWithRand.length] = "80";
            strEncArrWithRand[strEncArrWithRand.length] = "AE";
          }
        }
        let result = "";
        for (const HexStr of strEncArrWithRand)
          if (!isNaN(parseInt(HexStr.slice(0, 2), 16)))
            result += "%" + HexStr;
        console.log(result);
        return atk.decode(result);
      }
    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
        <h1>文字列のコピー無効化ツール | ActiveTK.jp</h1>
        <p><?=$dec?></p>
        <p>行数が多いほど部分的なコピーが難しくなります。</p>
        <form action="" method="POST" id="td">
          <textarea rows="14" id="save" style="margin: 0px; height: 140px; width: 542px;">昭和四十五年法律第四十八号 著作権法
著作権法（明治三十二年法律第三十九号）の全部を改正する。
（目的）
第一条　この法律は、著作物並びに実演、レコード、放送及び有線放送に関し著作者の権利及びこれに隣接する権利を定め、これらの文化的所産の公正な利用に留意しつつ、著作者等の権利の保護を図り、もつて文化の発展に寄与することを目的とする。
（定義）
第二条　この法律において、次の各号に掲げる用語の意義は、当該各号に定めるところによる。
一　著作物　思想又は感情を創作的に表現したものであつて、文芸、学術、美術又は音楽の範囲に属するものをいう。
二　著作者　著作物を創作する者をいう。
三　実演　著作物を、演劇的に演じ、舞い、演奏し、歌い、口演し、朗詠し、又はその他の方法により演ずること（これらに類する行為で、著作物を演じないが芸能的な性質を有するものを含む。）をいう。
四　実演家　俳優、舞踊家、演奏家、歌手その他実演を行う者及び実演を指揮し、又は演出する者をいう。
五　レコード　蓄音機用音盤、録音テープその他の物に音を固定したもの（音を専ら影像とともに再生することを目的とするものを除く。）をいう。
六　レコード製作者　レコードに固定されている音を最初に固定した者をいう。
七　商業用レコード　市販の目的をもつて製作されるレコードの複製物をいう。
七の二　公衆送信　公衆によつて直接受信されることを目的として無線通信又は有線電気通信の送信（電気通信設備で、その一の部分の設置の場所が他の部分の設置の場所と同一の構内（その構内が二以上の者の占有に属している場合には、同一の者の占有に属する区域内）にあるものによる送信（プログラムの著作物の送信を除く。）を除く。）を行うことをいう。</textarea>
          <br>
          <input type="submit" value="実行" style="height:60px;width:140px;">
          <input type="button" value="クリア" id="clear" style="height:60px;width:140px;">
          <hr size="1" color="#7fffd4">
          ↓↓結果↓↓<br>
          <textarea rows="14" id="savek" style="margin: 0px; height: 140px; width: 542px;"></textarea>
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
