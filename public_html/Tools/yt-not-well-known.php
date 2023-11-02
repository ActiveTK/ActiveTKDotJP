<?php
  require_once("/home/activetk/require/google-api-php-client/main/vendor/autoload.php");
  const API_KEY = "(secret)";
?>

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="ActiveTK,activetk.jp,WEBツール">
    <title>YouTube 逆順検索ツール | ActiveTK.jp</title>
    <base href="https://www.activetk.jp/tools/time">
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="YouTubeの動画を再生数や高評価が少ない順で検索できます。知名度が低い「隠れた面白い人」を探してみて下さい。">
    <meta name="copyright" content="Copyright &copy; 2023 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="YouTube 逆順検索ツール | ActiveTK.jp">
    <meta name="twitter:description" content="YouTubeの動画を再生数や高評価が少ない順で検索できます。知名度が低い「隠れた面白い人」を探してみて下さい。">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="YouTube 逆順検索ツール | ActiveTK.jp">
    <meta property="og:description" content="YouTubeの動画を再生数や高評価が少ない順で検索できます。知名度が低い「隠れた面白い人」を探してみて下さい。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.activetk.jp/tools/time">
    <meta property="og:site_name" content="YouTube 逆順検索ツール | ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="canonical" href="https://www.activetk.jp/tools/time">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <style>a{color: #00ff00;position: relative;display: inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?=Get_Default()?>
  </head>
  <body style="background-color:#e6e6fa;text:#363636;">
    <form method="GET">
      <div align="center">
        <br>
        <h1>YouTube 逆順検索ツール - ActiveTK.jp</h1>
        <p>YouTubeの動画を再生数や高評価が少ない順で検索できます。</p>
        <p>検索内容: <input type="search" id="q" name="q" placeholder="クエリを入力して下さい。" style="height:35px;width:500px;" value="<?php if ( isset( $_GET["q"] ) ) echo htmlspecialchars($_GET["q"], ENT_QUOTES); ?>" required></p>
        <p>検索順: <select name="sort" style="height:24px;">
          <option value="再生回数が少ない順">再生回数が少ない順</option>
          <option value="高評価が少ない順"<?php if (isset($_GET["sort"]) && $_GET["sort"] == "高評価が少ない順") echo " selected"; ?>>高評価が少ない順</option>
        </select></p>
        <input type="submit" value="検索" style="height:60px;width:140px;"><br><br>
      </div>
    </form>
    <?php
      if (isset($_GET['q']) && $_GET["sort"]) {

        $client = new Google_Client();
        $client->setDeveloperKey(API_KEY);

        $youtube = new Google_Service_YouTube($client);

        $id = '';
        try {
          $searchResponse = $youtube->search->listSearch('id', array(
            'q' => $_GET['q'],
            'maxResults' => 400,
            'order' => 'relevance'
          ));
          $videos = '';
          if ($searchResponse === false || isset($searchResponse['error'])) echo "動画情報が取得できませんでした。";
          else if (count($searchResponse['items']) == 0) echo "検索結果が0件でした。";
          else {
            foreach ($searchResponse['items'] as $searchResult) {
              if ($searchResult['id']['kind'] == "youtube#video")
                $id .= $searchResult['id']['videoId'] . ",";
            }
            $id = substr($id, 0, -1);
          }
        } catch (\Throwable $e) { echo $e; }

        if ($id != "") {
          $listResponse = $youtube->videos->listVideos('id,snippet,statistics,contentDetails', array('id' => $id));
          echo '<table border="1" class="table table-striped" style="width:60%;" align="center"><tr>
			<th>動画の投稿日</th>
			<th>動画タイトル</th>
			<th>チャンネル名</th>
			<th>再生回数</th>
			<th>いいね数</th>
			<th>コメント数</th>
		  </tr>';
          $Video = array();
          $i = 0;
          foreach ($listResponse['items'] as $res)
          {
            if ( $_GET["sort"] == "再生回数が少ない順" )
              $Video[$i] = $res["statistics"]["viewCount"] * 1;
            else
              $Video[$i] = $res["statistics"]["likeCount"] * 1;
            $i++;
          }
          asort($Video);
          $t = 0;
	      foreach ($Video as $VideoID => $PVCount) {
            if (!isset($listResponse["items"][$VideoID]["statistics"]["likeCount"]) || empty($listResponse["items"][$VideoID]["statistics"]["likeCount"]))
              continue;
            $t++;
            if ($t > 50) break;
            $res = $listResponse["items"][$VideoID];
            $res["snippet"]["publishedAt"] = htmlspecialchars($res["snippet"]["publishedAt"]);
            $res["snippet"]["title"] = htmlspecialchars($res["snippet"]["title"]);
            $res["snippet"]["channelTitle"] = htmlspecialchars($res["snippet"]["channelTitle"]);
            $res["statistics"]["viewCount"] = htmlspecialchars($res["statistics"]["viewCount"]);
            $res["statistics"]["likeCount"] = htmlspecialchars($res["statistics"]["likeCount"]);
            $res["statistics"]["commentCount"] = htmlspecialchars($res["statistics"]["commentCount"]);

            echo "<tr>
				<td>{$res["snippet"]["publishedAt"]}</td>
				<td><a href='https://www.youtube.com/watch?v=" . $res["id"] . "' target='_blank'>{$res["snippet"]["title"]}</a></td>
				<td>{$res["snippet"]["channelTitle"]}</td>
				<td>{$res["statistics"]["viewCount"]}</td>
				<td>{$res["statistics"]["likeCount"]}</td>
				<td>{$res["statistics"]["commentCount"]}</td>
            </tr>";
	      }
          echo "</table>";
        }

      }
    ?>
    <div align="center"><?=Get_Last()?></div>
  </body>
</html>
