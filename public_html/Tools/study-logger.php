<?php

  /*!
   * Study Logger - 学習支援ツール | ActiveTK.jp
   * (c) 2023 ActiveTK. <h@cker.jp>
   * https://www.activetk.jp/tools/study-logger.php
   */

  $title = "Study Logger - 学習支援ツール | ActiveTK.jp";
  $dec = "毎日の勉強時間を記録して現状を分析したり、目標設定をして着実に学習を進めることができるツールです。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/study-logger.php";

  function MetaNote_GetRand( int $len = 32 ) : string {

    $bytes = openssl_random_pseudo_bytes( $len / 2 );
    $str = bin2hex( $bytes );

    $usestr = '1234567890abcdefghijklmnopqrstuvwxyz';
    $str2 = substr( str_shuffle( $usestr ), 0, 12 );

    return substr( str_shuffle( $str . $str2 ) , 0, -12 );

  }

  if (isset($_GET["id"]) && is_string($_GET["id"]) && !empty($_GET["id"])) {

    define( 'DEF_OPENED', $_GET["id"] );

    if (!preg_match('/^[a-zA-Z0-9]+$/', $_GET["id"])) {
      header("HTTP/1.1 403 UnsafeID");
      die( "不正な学習IDです。URLが正しいかご確認ください。" );
    }

    $dbh = new PDO( DSN, DB_USER, DB_PASS );
    try {
      $stmt = $dbh->prepare('select * from StudyLogger where StudyLoggerID = ? and DataType = "CreateNewUser" limit 1;');
      $stmt->execute( [$_GET["id"]] );
      $row = $stmt->fetch( PDO::FETCH_ASSOC );
    } catch ( \Throwable $e ) {
      die( $e->getMessage() );
    }

    if ( isset( $row["DataBlob"] ) )
    {
      $data = json_decode($row["DataBlob"], true);
      $SetDay1 = $data["SetDay1"];
      $SetDay2 = $data["SetDay2"];
    }
    else {
      header("HTTP/1.1 403 UnsafeID");
      die( "不正な学習IDです。URLが正しいかご確認ください。" );
    }

  }

  if (isset($_POST["day1"]) && isset($_POST["day2"])) {

    $rand = MetaNote_GetRand(12);
    
    if (1 == 1) {
      try {

        $dbh = new PDO( DSN, DB_USER, DB_PASS );
        $stmt = $dbh->prepare(
          "insert into StudyLogger (
             StudyLoggerID, DataType, CreateTime, DataBlob
           ) value (
             ?, ?, ?, ?
           )"
        );
        $stmt->execute( [
          $rand,
          "CreateNewUser",
          time(),
          json_encode([
            "SetDay1" => $_POST["day1"],
            "SetDay2" => $_POST["day2"]
          ], JSON_UNESCAPED_UNICODE)
        ] );

      } catch (\Throwable $e) {
        die( $e->getMessage() );
      }

      header("Location: /tools/study-logger?id=" . $rand);
      die();
    }
  }

  if (defined('DEF_OPENED') && isset($_POST["Type"])) {

    if (1 == 1) {
      try {

        $dbh = new PDO( DSN, DB_USER, DB_PASS );
        $stmt = $dbh->prepare(
          "insert into StudyLogger (
             StudyLoggerID, DataType, CreateTime, DataBlob
           ) value (
             ?, ?, ?, ?
           )"
        );
        $stmt->execute( [
          DEF_OPENED,
          $_POST["Type"],
          time(),
          date("Ymd")
        ] );

      } catch (\Throwable $e) {
        die( $e->getMessage() );
      }
    }

    die();
  }

  if (defined('DEF_OPENED') && isset($_GET["get"])) {

    header("Content-Type: application/json;");

    if (1 == 1) {
      try {

        $dbh = new PDO( DSN, DB_USER, DB_PASS );
        $stmt = $dbh->prepare( "select * from StudyLogger where (DataType = 'StartStudy' or DataType = 'StopStudy') and StudyLoggerID = ? and DataBlob = ?;" );
        $stmt->execute( [DEF_OPENED, date("Ymd")] );
        $selects = $stmt->fetchAll( PDO::FETCH_ASSOC );
        if ($selects === false)
          die(json_encode(array()));

        $result = array();
        foreach ($selects as $value)
          $result[$value["CreateTime"]] = $value["DataType"];
        die(json_encode($result, JSON_UNESCAPED_UNICODE));

      } catch (\Throwable $e) {
        die(json_encode(array()));
      }
    }

    die();
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
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $dec; ?>">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $dec; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:site_name" content="<?php echo $title; ?>">
    <meta property="og:locale" content="ja_JP">
    <link rel="canonical" href="<?php echo $url; ?>">
    <link rel="shortcut icon" href="<?=$root?>icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="<?=$root?>icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="<?=$root?>icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="<?=$root?>icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="<?=$root?>icon/index_150_150.ico">
    <script src="https://code.activetk.jp/ActiveTK.min.js" type="text/javascript" charset="UTF-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    
      let url = new URL(window.location.href);
      if(url.searchParams.get('id')) {
        localStorage.setItem('StudyLoggerID', url.searchParams.get('id'));
      } else if (localStorage.getItem('StudyLoggerID')) {
        url.searchParams.set('id', localStorage.getItem('StudyLoggerID'));
        window.location.href = url.href;
      }

      <?php if (isset($_GET["id"])) { ?>
      
      window.addEventListener('DOMContentLoaded', function() {

        var Study;
        _("Click2StartStudy").onclick = function(){ 
          "勉強を開始" == _("Click2StartStudy").value ?
          (
            _("Click2StartStudy").classList.remove("btn-danger"),
            _("Click2StartStudy").classList.add("btn-primary"),
            _("Click2StartStudy").value = "勉強を終了",
            Study = setInterval(
              function() {
                _("todaystudyunix").innerText = (_("todaystudyunix").innerText * 1) + 1e3;
                let t = _("todaystudyunix").innerText;
                _("TodayStudyTotal").innerHTML = "<span style='color:#0000CC;'><b>" + Math.floor(Math.floor(t/1e3)%86400/3600) + "時間" +
                  Math.floor(Math.floor(t/1e3)%86400%3600/60)+"分"+Math.floor(t/1e3)%86400%3600%60+"秒</b></span>"
              }, 990
            ),
            save("StartStudy")
          )
          :
          (
            _("Click2StartStudy").classList.remove("btn-primary"),
            _("Click2StartStudy").classList.add("btn-danger"),
            _("Click2StartStudy").value = "勉強を開始",
            clearInterval(Study),
            save("StopStudy")
          )
        };

        UpdateData();

        <?php
        
          $today = (int)date("d", time());
          $m = (int)date("m", time());

          function GetMoreBackTime($base_day)
          {
            global $m;
            $base_day--;
            if ($base_day <= 0)
              $base_day = "先月";
            else
              $base_day = $m . '/' . $base_day;
            return $base_day;
          }

          $days7 = "'" . GetMoreBackTime($today-6) .
          "', '" . GetMoreBackTime($today-5) .
          "', '" . GetMoreBackTime($today-4) .
          "', '" . GetMoreBackTime($today-3) .
          "', '" . GetMoreBackTime($today-2) .
          "', '" . GetMoreBackTime($today-1) .
          "', '" . GetMoreBackTime($today) .
          "', '" . $m . '/' . ($today) . "'";
        
          $day7 = "";

      try {

        $dbh = new PDO( DSN, DB_USER, DB_PASS );

        for ($n = 7; $n != -1; $n--)
        {
          $day = (new DateTime())->modify('-' . $n . ' days')->format('Ymd');
          $stmt = $dbh->prepare( "select * from StudyLogger where (DataType = 'StartStudy' or DataType = 'StopStudy') and StudyLoggerID = ? and DataBlob = ?;" );
          $stmt->execute( [DEF_OPENED, $day] );
          $selects = $stmt->fetchAll( PDO::FETCH_ASSOC );
          if ($selects === false)
            die(json_encode(array()));
          $Total = 0;
          $LastStart = strtotime('today') - 3600 * 24 * $n;
          $flag_time_start_ended = 0;
          foreach ($selects as $value)
          {
            if ($value["DataType"] == "StartStudy")
            {
              $LastStart = $value["CreateTime"] * 1;
              $flag_time_start_ended = 1;
            }
            else
            {
              $Total += $value["CreateTime"] * 1 - $LastStart;
              $flag_time_start_ended = 0;
            }
          }
          if ($flag_time_start_ended == 1)
            $Total += (strtotime('today') - 3600 * 24 * ($n - 1)) - $LastStart;
          $day7 .= "'" . ($Total / 60) . "', ";
        }

      } catch (\Throwable $e) { }

        ?>

        const myChart1 = new Chart(document.getElementById('7daystudy'), {
          type: 'line',
          data: {
            labels: [
              <?=$days7?>
            ],
            datasets: [ {
              label: '勉強時間(分)',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: [<?=$day7?>],
            } ]
          },
          options: {}
        });
        
      });

      function save(type) {
        $.ajax(
          {
            url: "/tools/study-logger?id=" + localStorage.getItem('StudyLoggerID'),
            type: "post",
            data: {
              Type: type
            }
          }
        )
        .done(function (t) {
          UpdateData();
        })
        .fail(function(t,n,e){alert("勉強時間のデータを保存できませんでした。" + e)})}

      function UpdateData() {
        $.ajax({
          url: "/tools/study-logger?id=" + localStorage.getItem('StudyLoggerID') + "&get=" + Date.now(),
          type: "GET",
          cache: !1,
          contentType: !1,
          dataType:"json"
        }).done(function (t) {

          let TimeStartBuf = "", TimeTotal = 0;
          var d = new Date();
          d.setHours(0, 0, 0, 0);
          TimeStartBuf = d.getTime() / 1000;

          document.getElementById("data").innerHTML = "<tr><th>開始時刻</th><th>終了時刻</th><th>勉強時間</th></tr>";

          for(let b in t) {
            let TimeInfo = getNow(b);
            let DataType = t[b];

            if (DataType == "StartStudy")
              TimeStartBuf = b;
            else {
              var r=document.getElementById("data").tBodies[0].insertRow(-1);
              r.insertCell(0).appendChild(document.createTextNode(getNow(TimeStartBuf))),
              r.insertCell(1).appendChild(document.createTextNode(TimeInfo));
              let g = (b - TimeStartBuf) * 1000;
              TimeTotal += g;
              r.insertCell(2).appendChild(document.createTextNode(Math.floor(Math.floor(g/1e3)%86400/3600) + "時間" +
                  Math.floor(Math.floor(g/1e3)%86400%3600/60)+"分"+Math.floor(g/1e3)%86400%3600%60+"秒"));
              TimeStartBuf = "";
            }
          }
          if (TimeStartBuf != "")
          {
            var r = document.getElementById("data").tBodies[0].insertRow(-1);
            r.insertCell(0).appendChild(document.createTextNode(getNow(TimeStartBuf))),
            r.insertCell(1).appendChild(document.createTextNode("未終了")),
            r.insertCell(2).appendChild(document.createTextNode(""));
            TimeTotal += ((Date.now() / 1000) - TimeStartBuf * 1) * 1000;
            if ("勉強を開始" == _("Click2StartStudy").value)
              _("Click2StartStudy").click();
          }
          _("todaystudyunix").innerText = TimeTotal;
          _("TodayStudyTotal").innerHTML = "<span style='color:#0000CC;'><b>" + Math.floor(Math.floor(TimeTotal/1e3)%86400/3600) + "時間" +
             Math.floor(Math.floor(TimeTotal/1e3)%86400%3600/60)+"分"+Math.floor(TimeTotal/1e3)%86400%3600%60+"秒</b></span>";

        }).fail(function (t, e, o) {
          alert("勉強時間のデータを取得できませんでした。" + o)
        });
      }

      function getNow(ts) {
        var e=new Date(ts*1000);
        return e.getFullYear()+"年"+(e.getMonth()+1)+"月"+e.getDate()+"日"+e.getHours()+"時"+e.getMinutes()+"分"+e.getSeconds()+"秒"
      }

      <?php } ?>

    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>*{box-sizing:border-box}body{-webkit-font-smoothing:antialiased}hgroup{text-align:center;margin-top:4em}h1,h3{font-weight:300}h1{color:#636363}h3{color:#4a89dc}.form{width:380px;margin:4em auto;padding:3em 2em 2em;background:#fafafa;border:1px solid #ebebeb;box-shadow:rgba(0,0,0,.14902) 0 1px 1px 0,rgba(0,0,0,.09804) 0 1px 2px 0}.group{position:relative;margin-bottom:45px}.in{font-size:18px;padding:10px 10px 10px 5px;-webkit-appearance:none;display:block;background:#fafafa;color:#636363;width:100%;border:0;border-radius:0;border-bottom:1px solid #757575}input:focus{outline:0}.la{color:#999;font-size:18px;font-weight:400;position:absolute;pointer-events:none;left:5px;top:10px;transition:all .2s ease}input.used~label,input:focus~label{top:-20px;transform:scale(.75);left:-2px;color:#4a89dc}.bar{position:relative;display:block;width:100%}.bar:after,.bar:before{content:'';height:2px;width:0;bottom:1px;position:absolute;background:#4a89dc;transition:all .2s ease}.bar:before{left:50%}.bar:after{right:50%}input:focus~.bar:after,input:focus~.bar:before{width:50%}.highlight{position:absolute;height:60%;width:75pt;top:25%;left:0;pointer-events:none;opacity:.5}input:focus~.highlight{animation:a .3s ease}@keyframes a{0%{background:#4a89dc}to{width:0;background:transparent}}.button{position:relative;display:inline-block;padding:9pt 24px;margin:.3em 0 1em;width:100%;vertical-align:middle;color:#fff;font-size:1pc;line-height:20px;-webkit-font-smoothing:antialiased;text-align:center;letter-spacing:1px;background:transparent;border:0;border-bottom:2px solid #3160b6;cursor:pointer;transition:all .15s ease}.button:focus{outline:0}.buttonBlue{background:#4a89dc;text-shadow:1px 1px 0 rgba(39,110,204,.5)}.buttonBlue:hover{background:#357bd8}.ripples{position:absolute;top:0;left:0;width:100%;height:100%;overflow:hidden;background:transparent}.ripplesCircle{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);opacity:0;width:0;height:0;border-radius:50%;background:hsla(0,0%,100%,.25)}.ripples.is-active .ripplesCircle{animation:b .4s ease-in}@keyframes b{0{opacity:0}25%{opacity:1}to{width:200%;padding-bottom:200%;opacity:0}}</style>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#000000;overflow-x:hidden;overflow-y:visible;">
    
    <div align="center">

        <div>

            <div class="container marketing">
                <br>

                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                    <h1 class="display-4" id="about"><span style="color:#000000;">Study Logger - 学習支援ツール</span></h1>
                    <p>毎日の勉強時間を記録して現状を分析したり、目標設定をして着実に学習を進めることができるツールです。</p>
                </div>

                <div class="row featurette">

                    <form class="form" action="" id="f" method="POST"<?php if (defined('DEF_OPENED')) echo " style='display:none;'"; ?>>
                        <h3><b>【目標勉強時間】</b></h3>
                        <br>
                        <div class="group">
                            <input type="text" class="in" name="day1"><span class="highlight"></span><span class="bar"></span>
                            <label class="la">平日(分単位で指定)</label>
                        </div>
                        <div class="group">
                            <input type="text" class="in" name="day2"><span class="highlight"></span><span class="bar"></span>
                            <label class="la">祝日(分単位で指定)</label>
                        </div>
                        <button type="button" class="button buttonBlue" onclick="_('f').submit();">
                            学習開始
                            <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                        </button>
                    </form>

                    <?php if (defined('DEF_OPENED')) { ?>
                        <p>学習ID: <?=DEF_OPENED?></p>
                        <p>目標時間: 平日<?=htmlspecialchars($SetDay1)?>分、祝日<?=htmlspecialchars($SetDay2)?>分</p>
                    <?php } ?>

                </div>

                <hr class="featurette-divider">

                <?php if (defined('DEF_OPENED')) { ?>

                <div class="row featurette">

                  <h3><span style="color:#000000;"><b>今日の勉強時間:</b></span> <span id="TodayStudyTotal"></span><span id="todaystudyunix" style="display:none;">0</span></h3>
                  <div align="center">
                    <input type="button" class="btn btn-danger" value="勉強を開始" id="Click2StartStudy" style="height:60px !important;width:140px !important;">
                  </div>

                  <hr class="featurette-divider" style="background-color:#6495ed;">

                  <table border="1" class="table table-striped" id="data">
                    <tr>
                      <th>開始時刻</th>
                      <th>終了時刻</th>
                      <th>勉強時間</th>
                    </tr>
                  </table>

                  <hr class="featurette-divider">

                </div>

                <div class="row featurette">

                  <h3><span style="color:#000000;"><b>過去7日間の勉強時間の推移</b></span></h3>
                  <div align="center">
                    <div style="width:auto;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;">
                      <h2>勉強時間の記録</h2>
                      <canvas id="7daystudy"></canvas>
                    </div>
                  </div>

                </div>

                <hr class="featurette-divider">

                <?php } ?>
            </div>

        </div>

        <div class="container marketing">
            <footer class="pt-4 my-md-5 pt-md-5">
                <div class="row">
                    <div class="col-12 col-md">
                        <small class="d-block mb-3 atext-muted">(c) 2023 ActiveTK.</small>
                    </div>
                    <div class="col-6 col-md">
                        <h5>サイトマップ</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="atext-muted" href="/about">サービス概要</a></li>
                            <li><a class="atext-muted" href="https://github.com/ActiveTK/ActiveTKDotJP">Githubリポジトリ</a></li>
                            <li><a class="atext-muted" href="/contact">お問い合わせ</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>その他</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="atext-muted" href="/license">利用規約</a></li>
                            <li><a class="atext-muted" href="/privacy">プライバシー</a></li>
                            <li><a class="atext-muted" href="https://profile.activetk.jp/">開発者</a></li>
                        </ul>
                    </div>
                    <span style="font-size:1px;" align="right">Thank you for using my website!</span>
                </div>
            </footer>
        </div>

        <br><br>

    </div>

  </body>
</html>
