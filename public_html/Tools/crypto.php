<?php

  // error_reporting(0);

  $title = "【BTC/ETH/XMR】仮想通貨チャート | ActiveTK.jp";
  $dec = "現時点での仮想通貨のチャートです。リアルタイムでの取引には適しておりませんので、ご注意下さい。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/crypto";

  if (!isset($_SERVER['HTTP_USER_AGENT']))
    $_SERVER['HTTP_USER_AGENT'] = "";

  $data = file( "/home/activetk/data/ActiveTKDotJP/CryptoChart.log", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
  $data = array_reverse( $data );

  if (isset($_GET["fromsystem"]))
  {
    header("Content-Type: text/plain;");
    for ($g = 0; $g < 100; $g++) {
      if ( !empty(trim($data[$g])) && isset(json_decode($data[$g], true)["Plice"]["Bitcoin"]) ) {
        echo json_decode($data[$g], true)["Plice"]["Bitcoin"];
        break;
      }
    }
    die();
  }

  $base_date = (int)date("H", json_decode($data[0], true)["UnixTime"]) + 1;
  function GetMoreBackDate($base_hour)
  {
    $base_hour--;
    if ($base_hour < 0)
      $base_hour = 24 + $base_hour;
    return $base_hour;
  }

  function com2($ForPC, $ForMobile) {
    if (Phone)
      return $ForMobile;
    else
      return $ForPC;
  }

  function GetPliceByNum($i)
  {
    global $data;
    return json_decode($data[$i], true)["Plice"];
  }

  $btclist = "";
  $ethlist = "";
  $xmrlist = "";
  for ($count = 4; $count > 0; $count--)
    $btclist .= GetPliceByNum($count)["Bitcoin"] . ", ";
  for ($count = 4; $count > 0; $count--)
    $ethlist .= GetPliceByNum($count)["Ethereum"] . ", ";
  for ($count = 4; $count > 0; $count--)
    $xmrlist .= GetPliceByNum($count)["Monero"] . ", ";

  $btclist24h = "";
  $ethlist24h = "";
  $xmrlist24h = "";
  for ($count = 24; $count > 0; $count--)
    $btclist24h .= GetPliceByNum($count)["Bitcoin"] . ", ";
  for ($count = 24; $count > 0; $count--)
    $ethlist24h .= GetPliceByNum($count)["Ethereum"] . ", ";
  for ($count = 24; $count > 0; $count--)
    $xmrlist24h .= GetPliceByNum($count)["Monero"] . ", ";

  $btclist7day = "";
  $ethlist7day = "";
  $xmrlist7day = "";
  for ($count = 168; $count > 0; $count--)
    if ($count == 1 || $count % 24 == 0)
      $btclist7day .= GetPliceByNum($count)["Bitcoin"] . ", ";
  for ($count = 168; $count > 0; $count--)
    if ($count == 1 || $count % 24 == 0)
      $ethlist7day .= GetPliceByNum($count)["Ethereum"] . ", ";
  for ($count = 168; $count > 0; $count--)
    if ($count == 1 || $count % 24 == 0)
      $xmrlist7day .= GetPliceByNum($count)["Monero"] . ", ";

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>【BTC/ETH/XMR】仮想通貨チャート - ActiveTK.jp</h1>

      <hr size="1" color="#7fffd4">
      <h3>【過去4時間の推移】</h3>
      <?=com2('<div align="center" style="display:flex;-webkit-justify-content:center;justify-content:center;-webkit-align-items:center;align-items: center;">', '')?>
        <div style="width:auto;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;">
          <h2>BitCoin / BTC</h2>
          <canvas id="cryptoc"></canvas>
        </div>
        <div style="width:auto;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;">
          <h2>Ethereum / ETH</h2>
          <canvas id="cryptoe"></canvas>
        </div>
        <div style="width:auto;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;">
          <h2>Monero / XMR</h2>
          <canvas id="cryptox"></canvas>
        </div>
      <?=com2('</div>', '')?>

      <hr size="1" color="#7fffd4">
      <h3>【過去24時間の推移】</h3>
      <?=com2('<div align="center" style="display:flex;-webkit-justify-content:center;justify-content:center;-webkit-align-items:center;align-items: center;">', '')?>
        <div style="width:auto;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;">
          <h2>BitCoin / BTC</h2>
          <canvas id="crypt24h-btc"></canvas>
        </div>
        <div style="width:auto;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;">
          <h2>Ethereum / ETH</h2>
          <canvas id="crypt24h-eth"></canvas>
        </div>
        <div style="width:auto;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;">
          <h2>Monero / XMR</h2>
          <canvas id="crypt24h-xmr"></canvas>
        </div>
      <?=com2('</div>', '')?>

      <hr size="1" color="#7fffd4">
      <h3>【過去7日間の推移】</h3>
      <?=com2('<div align="center" style="display:flex;-webkit-justify-content:center;justify-content:center;-webkit-align-items:center;align-items: center;">', '')?>
        <div style="width:auto;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;">
          <h2>BitCoin / BTC</h2>
          <canvas id="crypt7day-btc"></canvas>
        </div>
        <div style="width:auto;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;">
          <h2>Ethereum / ETH</h2>
          <canvas id="crypt7day-eth"></canvas>
        </div>
        <div style="width:auto;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;">
          <h2>Monero / XMR</h2>
          <canvas id="crypt7day-xmr"></canvas>
        </div>
      <?=com2('</div>', '')?>

    </div>
    <br>
    <?php if (!isset($_GET["without_lastmessage"])) { ?>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
    <?php } ?>
    <script>
      const myChart1 = new Chart(document.getElementById('cryptoc'), {
        type: 'line',
          data: {
            labels: [
              '<?=GetMoreBackDate($base_date - 2)?>時',
              '<?=GetMoreBackDate($base_date - 1)?>時',
              '<?=GetMoreBackDate($base_date)?>時',
              '<?=$base_date?>時'
            ],
            datasets: [
            {
              label: 'Bitcoin',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: [<?=$btclist?>],
            },
          ]
        },
        options: {}
      });
      const myChart2 = new Chart(document.getElementById('cryptox'), {
        type: 'line',
          data: {
            labels: [
              '<?=GetMoreBackDate($base_date-2)?>時', '<?=GetMoreBackDate($base_date-1)?>時', '<?=GetMoreBackDate($base_date)?>時', '<?=$base_date?>時'
            ],
            datasets: [
            {
              label: 'Monero',
              backgroundColor: 'rgb(0, 106, 182)',
              borderColor: 'rgb(0, 106, 182)',
              data: [<?=$xmrlist?>],
            },
          ]
        },
        options: {}
      });
      const myChart3 = new Chart(document.getElementById('cryptoe'), {
        type: 'line',
          data: {
            labels: [
              '<?=GetMoreBackDate($base_date-2)?>時', '<?=GetMoreBackDate($base_date-1)?>時', '<?=GetMoreBackDate($base_date)?>時', '<?=$base_date?>時'
            ],
            datasets: [
            {
              label: 'Ethereum',
              backgroundColor: 'rgb(59, 175, 117)',
              borderColor: 'rgb(59, 175, 117)',
              data: [<?=$ethlist?>],
            },
          ]
        },
        options: {}
      });

      const myChart24h1 = new Chart(document.getElementById('crypt24h-btc'), {
        type: 'line',
          data: {
            labels: [
              <?php
                $i = 23;
                while(true)
                {
                  $i--;
                  if ($i == 0) break;
                  echo "'" . GetMoreBackDate($base_date - $i) . "時', ";
                }
              ?>
              '<?=GetMoreBackDate($base_date)?>時',
              '<?=$base_date?>時'
            ],
            datasets: [
            {
              label: 'Bitcoin',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: [<?=$btclist24h?>],
            },
          ]
        },
        options: {}
      });
      const myChart24h2 = new Chart(document.getElementById('crypt24h-eth'), {
        type: 'line',
          data: {
            labels: [
              <?php
                $i = 23;
                while(true)
                {
                  $i--;
                  if ($i == 0) break;
                  echo "'" . GetMoreBackDate($base_date - $i) . "時', ";
                }
              ?>
              '<?=GetMoreBackDate($base_date)?>時',
              '<?=$base_date?>時'
            ],
            datasets: [
            {
              label: 'Ethereum',
              backgroundColor: 'rgb(59, 175, 117)',
              borderColor: 'rgb(59, 175, 117)',
              data: [<?=$ethlist24h?>],
            },
          ]
        },
        options: {}
      });
      const myChart24h3 = new Chart(document.getElementById('crypt24h-xmr'), {
        type: 'line',
          data: {
            labels: [
              <?php
                $i = 23;
                while(true)
                {
                  $i--;
                  if ($i == 0) break;
                  echo "'" . GetMoreBackDate($base_date - $i) . "時', ";
                }
              ?>
              '<?=GetMoreBackDate($base_date)?>時',
              '<?=$base_date?>時'
            ],
            datasets: [
            {
              label: 'Monero',
              backgroundColor: 'rgb(0, 106, 182)',
              borderColor: 'rgb(0, 106, 182)',
              data: [<?=$xmrlist24h?>],
            },
          ]
        },
        options: {}
      });

      const myChart7day1 = new Chart(document.getElementById('crypt7day-btc'), {
        type: 'line',
          data: {
            labels: [
              <?=$days7?>
            ],
            datasets: [
            {
              label: 'Bitcoin',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: [<?=$btclist7day?>],
            },
          ]
        },
        options: {}
      });
      const myChart7dayh2 = new Chart(document.getElementById('crypt7day-eth'), {
        type: 'line',
          data: {
            labels: [
              <?=$days7?>
            ],
            datasets: [
            {
              label: 'Ethereum',
              backgroundColor: 'rgb(59, 175, 117)',
              borderColor: 'rgb(59, 175, 117)',
              data: [<?=$ethlist7day?>],
            },
          ]
        },
        options: {}
      });
      const myChart7dayh3 = new Chart(document.getElementById('crypt7day-xmr'), {
        type: 'line',
          data: {
            labels: [
              <?=$days7?>
            ],
            datasets: [
            {
              label: 'Monero',
              backgroundColor: 'rgb(0, 106, 182)',
              borderColor: 'rgb(0, 106, 182)',
              data: [<?=$xmrlist7day?>],
            },
          ]
        },
        options: {}
      });
    </script>
 
  </body>
</html>