<?php

  $title = "【学習用】暗記ツール | ActiveTK.jp";
  $dec = "受験生必見！覚えたい単語などを質問と回答のセットで保存し、何度も繰り返し解くことができるツールです。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/learn";

  if (isset($_GET["download"]))
  {
    if (file_exists("/home/activetk/activetk.jp/public_html/Tools/learn_samples/" . basename($_GET["download"])))
    {
      $pPath = "/home/activetk/activetk.jp/public_html/Tools/learn_samples/" . basename($_GET["download"]);
      header('Content-Type: application/octet-stream');
      header('X-Content-Type-Options: nosniff');
      header('Content-Length: ' . filesize($pPath));
      header('Content-Disposition: attachment; filename="' . basename($pPath) . '"');
      header('Connection: close');
      while (ob_get_level()) { ob_end_clean(); }
      readfile($pPath);
      exit;
    }
    else
    {
      require_once( "/home/activetk/activetk.jp/public_html/Error/404/index.php" );
      die();
    }
  }
  else if (isset($_GET["get-json"]))
  {
    $dataarr = explode("\n", str_replace(array("\r\n","\r"), "\n", $_POST["quesdata"]));
    $quesarr = array('Title'=>htmlspecialchars($_POST["title"]), 'CreateTime'=>time(), 'CreateUserName'=>htmlspecialchars($_POST["createuser"]));
    $quesarr['Data'] = array();
    foreach($dataarr as $value)
    {
      if ($value == "")
        continue;
      $value = htmlspecialchars(trim($value));
      $datas = explode(':', $value);
      $ques = $datas[0];
      $ans = $datas[1];
      $quesarr['Data'][$ques] = $ans;
    }
    echo json_encode($quesarr);
    exit();
  }
  else if (isset($_GET["publish"]))
  {
    $dataarr = explode("\n", str_replace(array("\r\n","\r"), "\n", $_POST["quesdata"]));
    $quesarr = array('Title'=>htmlspecialchars($_POST["title"]), 'CreateTime'=>time(), 'CreateUserName'=>htmlspecialchars($_POST["createuser"]));
    $quesarr['Data'] = array();
    foreach($dataarr as $value)
    {
      if ($value == "")
        continue;
      $value = htmlspecialchars(trim($value));
      $datas = explode(':', $value);
      $ques = $datas[0];
      $ans = $datas[1];
      $quesarr['Data'][$ques] = $ans;
    }

    $json = json_encode($quesarr);

    if ( isset( $_SERVER['HTTP_USER_AGENT'] ) )
      $UserAgent = $_SERVER['HTTP_USER_AGENT'];
    else
      $UserAgent = "";

    NotificationAdmin("公開暗記ファイル一覧への追加の申請",
      "<p>送信時刻: " . date("Y/m/d - M (D) H:i:s") . "</p><p>IPアドレス: " . $_SERVER['REMOTE_ADDR'] . "</p><p>UserAgent: " . htmlspecialchars($UserAgent) . "</p>" .
      "<hr color='#363636' size='2'><p>タイトル: " . htmlspecialchars($_POST["title"]) . "</p><p>ユーザー名: " . htmlspecialchars($_POST["createuser"]) . "</p>" . 
      "<hr color='#363636' size='2'><br><pre>" . htmlspecialchars($_POST["quesdata"]) . "</pre><br><hr color='#363636' size='2'><br><pre>" . $json . "</pre><br>");

    exit();
  }
  else if (isset($_GET["create-new"]) && $_GET["create-new"] == "true")
  {
      $title = "暗記ファイルを作成 | " . $title;
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
    <script src="https://code.activetk.jp/ActiveTK.min.js" type="text/javascript" charset="UTF-8" nonce="<?=$nonce?>"></script>
    <script type="text/javascript" nonce="<?=$nonce?>">
    
      window.onload = function() {
        _("ques").onchange = function() {
          $.ajax({
            url: "?get-json",
            type: "POST",
            data: new FormData($("#getnew").get(0)),
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "html",
            timeout: 5000,
          })
          .done(function(data) {
            _("jsondata").value = data;
          })
          .fail(function() { _("jsondata").value = "通信に失敗しました。。。"; });
        };
        _("download").onclick = function() {
          var blob = new Blob([ _("jsondata").value ], { "type" : "text/json" });
          if (window.navigator.msSaveBlob)
            window.navigator.msSaveBlob(blob, _("title").value + ".learn.json");
          else
          {
            var a = document.createElement('a');
            a.download = _("title").value + ".learn.json";
            a.target   = '_blank';
            a.href = window.webkitURL.createObjectURL(blob);
            a.click();
          }
        }
        _("returnback").onclick = function() {
          window.location.href = "?";
        }
        _("publishreq").onclick = function() {
          if (!confirm("この暗記ファイルを公開暗記ファイル一覧へ追加してもよろしいでしょうか？\nなお、公開が認められた場合には誰にでもファイルを閲覧できるようになります。"))
            return;
          $.ajax({
            url: "?publish",
            type: "POST",
            data: new FormData($("#getnew").get(0)),
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "html",
            timeout: 5000,
          })
          .done(function(data) {
            alert("公開暗記ファイル一覧への追加を申請しました！\n取り消しは「お問い合わせ」から行ってください。");
          })
          .fail(function() { alert("通信に失敗しました。。。"); });
        }
      }

    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>暗記ファイルを作成 | 【学習用】暗記ツール | ActiveTK.jp</h1>
      <hr size="1" color="#7fffd4">
      <form action="" method="POST" id="getnew">
        <p>タイトル: <input type='text' style="height:20px;width:500px;" placeholder='タイトルを入力してください' id="title" name="title"></p>
        <p>作者名: <input type='text' style="height:20px;width:500px;" placeholder='作者名を入力してください' id="createuser" name="createuser"></p>
        <p>問題文と答えを、<b>「:」で区切って</b>一行ずつ入力してください。</p>
        <textarea rows="14" id="ques" name="quesdata" style="margin:0px;height:140px;width:542px;" placeholder="問題文1: 問題1の答え
問題文2: 問題2の答え
...というのを繰り返してください。"></textarea>
        <hr size="1" color="#7fffd4">
        ↓↓結果↓↓<br>
        <textarea rows="14" id="jsondata" style="margin:0px;height:140px;width:542px;"></textarea>
        <br>
        <input type="button" value="ダウンロード" id="download" style="height:60px;width:140px;">
        <input type="button" value="公開暗記ファイル一覧への追加を申請" id="publishreq" style="height:60px;width:340px;">
        <br><br>
        <input type="button" value="メインページに戻る" id="returnback" style="height:60px;width:140px;">
      </form>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>
    <?php
      exit();

  } else if (
    (isset($_FILES['learnfile']) && is_uploaded_file($_FILES['learnfile']['tmp_name'])) ||
    (isset($_GET["runas"]) && file_exists("/home/activetk/activetk.jp/public_html/Tools/learn_samples/" . basename($_GET["runas"])))
  ) {

    if (isset($_GET["runas"]))
      $data = json_decode(file_get_contents("/home/activetk/activetk.jp/public_html/Tools/learn_samples/" . basename($_GET["runas"])), true);
    else
      $data = json_decode(file_get_contents($_FILES['learnfile']['tmp_name']), true);

    $title = htmlspecialchars($data["Title"]) . " | " . $title;

      ?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>
    <base href="<?php echo $url; ?>">
    <meta name="robots" content="<?php if (isset($_GET["runas"])) echo "All"; else echo "noindex, nofollow"; ?>">
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
    <script src="https://code.activetk.jp/ActiveTK.min.js" type="text/javascript" charset="UTF-8" nonce="<?=$nonce?>"></script>
    <script type="text/javascript" nonce="<?=$nonce?>">
    
      window.QuestionNum = -1;
      window.CorrectAnsCount = 0;
      <?php
        $listof = array();
        foreach($data["Data"] as $question => $correctans)
          $listof[] = array('Question'=>$question, 'CorrectAns'=>$correctans);
        shuffle($listof);
      ?>
      window.Questions = [<?php foreach($listof as $value) echo '"' . htmlspecialchars($value["Question"]) . '", '; ?>"__FLAG__END"];
      window.Answers = [<?php foreach($listof as $value) echo '"' . htmlspecialchars($value["CorrectAns"]) . '", '; ?>"__FLAG__END"];
      function GetNextQuestion() {
        window.QuestionNum++;
        return window.Questions[window.QuestionNum];
      }
      function GetNextAnswer() {
        return window.Answers[window.QuestionNum];
      }
      function ShowStatus() {
        _("kernel").style.display = "none";
        _("status").style.display = "block";
        _("correctcount").innerText = window.CorrectAnsCount + "問";
        _("queslen").innerText = (window.Questions.length - 1) + "問";
        _("correctpercent").innerText = (window.CorrectAnsCount / (window.Questions.length - 1) * 100) + "%";
      }

      window.onload = function() {

        _("ques").innerText = GetNextQuestion();

        _("testcorrect").onclick = function() {

          if (window.Questions[window.QuestionNum] == "__FLAG__END")
          {
            ShowStatus();
            return;
          }

          if (window.Questions[window.QuestionNum + 1] == "__FLAG__END")
          {
            _("viewnext").value = "結果を表示";
            _("retrythis").disabled = false;
            if (_("ans").value == GetNextAnswer())
            {
              window.CorrectAnsCount++;
              _("retrythis").disabled = true;
              _("status_correct").innerText = "正解です！";
              _("status_notcorrect").innerText = "";
            }
            else
            {
             _("status_correct").innerText = "";
             _("status_notcorrect").innerText = "間違いです..正しい答えは「" + GetNextAnswer() + "」です。";
            }
            _("ans").disabled = true;
            _("testcorrect").disabled = true;
          }
          else
          {
            _("viewnext").value = "次の問題へ";
            _("retrythis").disabled = false;
            if (_("ans").value == GetNextAnswer())
            {
              window.CorrectAnsCount++;
              _("retrythis").disabled = true;
              _("status_correct").innerText = "正解です！";
              _("status_notcorrect").innerText = "";
            }
            else
            {
             _("status_correct").innerText = "";
             _("status_notcorrect").innerText = "間違いです..正しい答えは「" + GetNextAnswer() + "」です。";
            }
            _("ans").disabled = true;
            _("testcorrect").disabled = true;
          }
        }

        _("viewnext").onclick = function() {
          _("retrythis").disabled = true;
          _("ques").innerText = GetNextQuestion();
          _("ans").disabled = false;
          _("testcorrect").disabled = false;
          _("status_correct").innerText = "";
          _("status_notcorrect").innerText = "";
          _("ans").value = "";
          if (window.Questions[window.QuestionNum] == "__FLAG__END")
          {
            ShowStatus();
          }
          else if (window.Questions[window.QuestionNum + 1] == "__FLAG__END")
            _("viewnext").value = "結果を表示";
          else
            _("viewnext").value = "この問題をスキップする";
          _("ans").focus();
        }

        _("retrythis").onclick = function() {
          _("ans").disabled = false;
          _("testcorrect").disabled = false;
          window.QuestionNum--;
          _("ques").innerText = "(再チャレンジ) " + GetNextQuestion();
          _("ans").value = "";
          _("status_correct").innerText = "";
          _("status_notcorrect").innerText = "";
          _("viewnext").value = "この問題をスキップする";
        }

        _("reload").onclick = function() {
          window.location.href = "?";
        }
        _("reload2").onclick = function() {
          window.location.href = "?";
        }

        _("retrythisfile").onclick = function() {
          window.QuestionNum = -1;
          _("ques").innerText = GetNextQuestion();
          _("kernel").style.display = "block";
          _("status").style.display = "none";
        }

      }

    </script>
    <style>.correctans{background:linear-gradient(to right,Magenta,yellow,Cyan,Magenta) 0% center/200%;animation:.welcomemsg 2s linear infinite}</style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>【学習用】暗記ツール | ActiveTK.jp</h1>
      <hr size="1" color="#7fffd4">
      <?php
        echo "<h2>" . htmlspecialchars($data["Title"]) . "</h2>";
        echo "<p>" . htmlspecialchars($data["CreateUserName"]) . "作 - " . date("Y/m/d - M (D) H:i:s", $data["CreateTime"]) . "</p>";
      ?>
      <hr size="1" color="#7fffd4">
      <div id="kernel">
        <p>【問題】</p>
        <span id="ques"></span>
        <p><input type='text' style="height:20px;width:500px;" placeholder='答えを入力してください' id="ans"></p>
        <input type="button" value="回答する" style="height:60px;width:140px;" id="testcorrect">
        <br>
        <hr size="1" color="#7fffd4">
        <span id="status_correct" class="correctans"></span><span id="status_notcorrect"></span>
        <input type="button" value="この問題をスキップする" style="height:60px;width:200px;" id="viewnext">
        <input type="button" value="この問題をやり直す" style="height:60px;width:140px;" id="retrythis" disabled>
        <br>
        <hr size="1" color="#7fffd4">
        <input type="button" value="メインページへ戻る" style="height:60px;width:200px;" id="reload">
      </div>
      <div id="status" style="display:none;">
        <h2><span id="queslen" class="correctans"></span>中、<span id="correctcount" class="correctans"></span>正解でした！</h2>
        <h2>正答率は <span id="correctpercent" class="correctans"></span> です。</h2>
        <hr size="1" color="#7fffd4">
        <input type="button" value="別の問題にチャレンジ！" style="height:60px;width:200px;" id="reload2">
        <input type="button" value="このファイルをやり直す" style="height:60px;width:200px;" id="retrythisfile">
      </div>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>
<?php
    exit();
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
    <?=Get_Default()?>
    <style>a{position:relative;display:inline-block}a,a:after{transition:.3s}a:after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transform:translateX(-50%)}a:hover:after{width:100%}</style>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>【学習用】暗記ツール | ActiveTK.jp</h1>
      <hr size="1" color="#7fffd4">
      <h2>暗記ファイルを読み込む</h2>
      <form action="" method="post" enctype="multipart/form-data">
        暗記ファイル(.learn.json): <input type="file" name="learnfile" accept=".json" required>
        <br>
        <br>
        <input type="submit" value="学習開始！" style="height:60px;width:140px;">
      </form>
      <hr size="1" color="#7fffd4">
      <h2>暗記ファイルの作成は<a href="?create-new=true" target="_blank">[こちら]</a>から行えます(^///^)</h2>
      <hr size="1" color="#7fffd4">
      <h2>【公開暗記ファイル一覧】</h2>
      <p>算数・数学</p>
      <li><a href="?runas=math_10-20_ruijyou.learn.json" target="_blank">10～20の累乗</a></li>
      <li><a href="?runas=math_pi-50len.learn.json" target="_blank">円周率50桁</a></li>
      <p>理科</p>
      <li><a href="?runas=sience_jhs.learn.json" target="_blank">中学理科 火山</a></li>
      <p>社会</p>
      <li><a href="?runas=history_jhs-1.learn.json" target="_blank">中学歴史 ①</a></li>
      <li><a href="?runas=history_jhs-2.learn.json" target="_blank">中学歴史 ②</a></li>
      <p>その他「ゲーム」「アニメ」「娯楽」「趣味」など</p>
      <li><a href="?runas=enjoy_law_shortname.learn.json" target="_blank">法律名略語クイズ</a></li>
      <li><a href="?runas=enjoy_stpr_members.learn.json" target="_blank">すとぷりメンバー当てクイズ！</a></li>
      <li><a href="?runas=web_rem.learn.json" target="_blank">Web暗記</a></li>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>