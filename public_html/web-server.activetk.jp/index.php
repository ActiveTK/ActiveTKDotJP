<?php

  function aais_android() {
    if (!preg_match('/'.implode('|', array('Android')).'/i', $_SERVER['HTTP_USER_AGENT'])) return "no";
    else return "yes";
  }
  function aais_iphone() {
    if (!preg_match('/'.implode('|', array('iPhone')).'/i', $_SERVER['HTTP_USER_AGENT'])) return "no";
    else return "yes";
  }
  function aais_winphone() {
    if (!preg_match('/'.implode('|', array('Windows Phone')).'/i', $_SERVER['HTTP_USER_AGENT'])) return "no";
    else return "yes";
  }
  if (aais_android() == "no" && aais_iphone() == "no" && aais_winphone() == "no")
    $issumaho = false;
  else
    $issumaho = true;
  define( "issumaho", $issumaho );

  function GetEcho( $pc, $sm ) {

    if (issumaho)
      echo $sm;
    else
      echo $pc;

  }

  function GetAdHere(string $nonce = "") {
    ?>
      <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2939270978924591" data-ad-slot="8240315429" data-ad-format="auto" data-full-width-responsive="true"></ins>
      <script>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
    <?php return "";
  }

  $title = "【WordPressが動く】レンタルサーバーまとめ | 値段や評判を一覧で分かりやすく解説";
  $dec = "WordPressが動作するレンタルサーバーの値段やスペック、評判まとめ";

?>

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"> -->
    <title><?=$title?> | ActiveTK.jp</title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="description" content="<?=$dec?>">
    <meta property="og:title" content="<?=$title?> | ActiveTK.jp">
    <meta property="og:description" content="<?=$dec?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?=$title?> | ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V1CPYP07HP"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-V1CPYP07HP');</script>
    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2939270978924591" crossorigin="anonymous"></script> -->
    <script>$(function(){$('a[href^="#"]').click(function(){let speed=500;let href=$(this).attr("href");let target=$(href=="#"||href==""?'html':href);let position=target.offset().top;$("html, body").animate({scrollTop:position},speed,"swing");return!1})})</script>
    <link href="https://www.activetk.jp/css/index.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <style>
      .main{text-align:center;width:<?=GetEcho("80","90")?>%;}
      .welcomemsg{font-size:<?=GetEcho("50","25")?>px;border-radius:30px;color:#000000;background:linear-gradient(to right,Magenta,yellow,Cyan,Magenta) 0% center/200%;animation:.welcomemsg 2s linear infinite}
      .inpblue{background:linear-gradient(transparent 70%,#66CCFF 0%)}
      .inpgreen{background:linear-gradient(transparent 70%,#00FF00 0%)}
      .inpred{background:linear-gradient(transparent 70%,#FFC0CB 0%)}
      .inpyellow{background:linear-gradient(transparent 70%,#FFFF00 0%)}
      p{font-weight:bold;font-size:22px;}
      .combox{width:150px;height:<?=GetEcho("180","220")?>px;border:1px solid;background-color:#DADDFC;color:#080808;}
      .lang{font-weight:bold;font-size:26px;}
      .titles{font-size:30px;border-radius:30px;background-color:#DADDFC;color:#080808;}
      .code{width:60%;height:auto;border:1px solid;background-color:#DADDFC;color:#080808;}
      .blacka{color:#000000 !important;}
    </style>
  </head>
  <body style="background-color:#e6e6fa;text:#363636;">

    <div align="left" style="background-color:#6495ed;color:#080808;">
      <nav class="navbar navbar-expand-lg" style="background-color:#6495ed;color:#080808;z-index:5;top:0px;left:0px;width:100%;height:12% !important;">
        <div class="container-fluid">
          <span class="navbar-brand" title="WebTools">ActiveTK.jp</span>
          <button class="navbar-toggler" id="toggler-button" type="button" data-bs-toggle="collapse" data-bs-target="navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="background-color:#6495ed;color:#080808;">
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" aria-current="page" href="https://www.activetk.jp/home">ホーム</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" aria-current="page" href="https://www.activetk.jp/about">サービス概要</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="https://www.activetk.jp/license">利用規約</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="https://www.activetk.jp/privacy">プライバシー</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="https://www.activetk.jp/developer?v=2">管理者</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active p-index__nav_item" href="https://www.activetk.jp/contact">お問い合わせ</a>
              </li>
            </ul>
          </div>
        </div>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
      </nav>
    </div>

    <br><br><br>

    <div align="center">

      <div class="main">

        <span class="titles"><span class="inpblue"><b><?=$title?></b></span></span>

        <p><?=$dec?></p>

        <hr>

        <div align="left">
          <li><a href="#first" class="blacka">WordPressでサイトを作るには何が必要？まず初めに</a></li>
          <li><a href="#list" class="blacka">2022年時点での値段、スペック、その他一覧表</a></li>
          <li><a href="#time" class="blacka">契約期間はどれくらいが良いのか</a></li>
          <!--
          <li><a href="#conoha" class="blacka">長期契約ならコスパ最強！ConoHa WING</a></li>
          <li><a href="#starserver" class="blacka">無料プランも提供！スターサーバー</a></li>
          -->
          <li><a href="#end" class="blacka">まとめ</a></li>
        </div>

        <hr>

        <div align="left">

          <span class="titles" id="first"><span class="inpgreen">WordPressでサイトを作るには何が必要？まず初めに</span></span>
          <br><br>
          <p>世界的に有名なブログ制作CMSの<span class="inpblue">WordPress</span>の利用には、<br>
            PHPとSQLが動作するウェブサーバーが必要です。</p>
          <p>WordPressでブログやホームページを作ってみたいという方は、ぜひ<span class="inpblue">国内のレンタルサーバー</span>を利用しましょう。<br>
            ただし、国内のレンタルサーバー業者は数多くいるため、選ぶのが難しいです。<br>
            また、そもそもWordPressが動くのか不安な方も多いのではないかと思います。<br>
            そこで本サイトでは、国内の大手レンタルサーバーの値段、スペック、評判などをまとめました。</p>
          <hr>

          <span class="titles" id="list"><span class="inpgreen">2022年時点での値段、スペック、その他一覧表</span></span>
          <br><br>
          <div align="left">
            <table border="1" style="border-collapse:collapse;" class="table table-striped">
              <tr class="code"><td>サービス名</td><td>プラン</td><td>初期費用</td><td>値段</td><td>データ容量</td><td>WordPress</td><td>その他</td></tr>

              <tr><td><a href="https://www.star.ne.jp?ref=NAstx9hh" target="_blank"><b>スターサーバー</b></a></td><td>エコノミー</td><td><del>1,650円</del><br>無料</td><td>月額138円</td><td>20GB</td><td>動作不可能</td><td>気軽に使える格安プランです。<br>ただし、MySQLがないため、WordPressが動きません。</td></tr>
              <tr><td><a href="https://www.star.ne.jp?ref=NAstx9hh" target="_blank"><b>スターサーバー</b></a></td><td>ライト</td><td><del>1,650円</del><br>無料</td><td>月額220円～</td><td>160GB</td><td>動作可能</td><td>WordPressで初めてサイトを作るのにオススメです。<br>また、現在キャンペーンにつき初期費用無料です。</td></tr>
              <tr><td><a href="https://www.star.ne.jp?ref=NAstx9hh" target="_blank"><b>スターサーバー</b></a></td><td>スタンダード</td><td><del>1,650円</del><br>無料</td><td>月額440円～</td><td>200GB</td><td>動作可能</td><td>WordPressで本格的にサイトを作りたい方にオススメです。<br>こちらも現在キャンペーンにつき初期費用無料です。</td></tr>
              <tr><td><a href="https://www.star.ne.jp?ref=NAstx9hh" target="_blank"><b>スターサーバー</b></a></td><td>ハイスピード</td><td>無料</td><td><del>月額550円～</del><br>月額275円～</td><td>320GB</td><td>動作可能</td><td>既に一定のアクセス数がある、またはアクセス数が見込める方にオススメです。<br>現在月額費用半額キャンペーン中です。</td></tr>
              <tr><td><a href="https://www.star.ne.jp?ref=NAstx9hh" target="_blank"><b>スターサーバー</b></a></td><td>エンタープライズ</td><td><del>5,500円</del><br>無料</td><td><del>月額2090円～</del><br>月額1045円～</td><td>500GB</td><td>動作可能</td><td>ECサイトを構築したり、独自のPHPアプリを作る場合にオススメです。<br>会社や学校のホームページなど安定性が求められる場合にご活用下さい。</td></tr>

              <?php function Conoha() { ?>//af.moshimo.com/af/c/click?a_id=3388985&p_id=2312&pc_id=4967&pl_id=30490&url=https%3A%2F%2Fwww.conoha.jp%2Fwing%2F%3Fbanner_id%3Dd05_media%26utm_source%3Dmoshimo%26utm_medium%3Dmedia%26utm_campaign%3Dothers%26utm_content%3Dtext<? } ?>

              <tr><td><a href="<?=Conoha()?>" target="_blank" rel="nofollow" referrerpolicy="no-referrer-when-downgrade"><b>ConoHa WING</b><img src="//i.moshimo.com/af/i/impression?a_id=3388985&p_id=2312&pc_id=4967&pl_id=30490" width="1" height="1" style="border:none;" alt=""></a></td>
                <td>ベーシック</td><td>無料</td><td>月額911円<br>※12か月契約の場合</td><td>300GB</td><td>動作可能</td><td>初めてのWebサイトにオススメです。<br>3か月契約なら1,210円/月、36か月契約なら493円/月となります。</td></tr>
              <tr><td><a href="<?=Conoha()?>" target="_blank" rel="nofollow" referrerpolicy="no-referrer-when-downgrade"><b>ConoHa WING</b><img src="//i.moshimo.com/af/i/impression?a_id=3388985&p_id=2312&pc_id=4967&pl_id=30490" width="1" height="1" style="border:none;" alt=""></a></td>
                <td>スタンダード</td><td>無料</td><td>月額2,145円<br>※12か月契約の場合</td><td>400GB</td><td>動作可能</td><td>人気No.1の標準プランです。<br>3か月契約なら2,530円/月、36か月契約なら1,925円/月となります。</td></tr>
              <tr><td><a href="<?=Conoha()?>" target="_blank" rel="nofollow" referrerpolicy="no-referrer-when-downgrade"><b>ConoHa WING</b><img src="//i.moshimo.com/af/i/impression?a_id=3388985&p_id=2312&pc_id=4967&pl_id=30490" width="1" height="1" style="border:none;" alt=""></a></td>
                <td>プレミアム</td><td>無料</td><td>月額4,290円<br>※12か月契約の場合</td><td>500GB</td><td>動作可能</td><td>大規模サイトや企業サイトにオススメです。<br>3か月契約なら5,060円/月、36か月契約なら3,850円/月となります。</td></tr>

              <?php function LoliPop() { ?>//af.moshimo.com/af/c/click?a_id=3715195&p_id=3129&pc_id=7263&pl_id=41184&url=https%3A%2F%2Flolipop.jp%2F%3Futm_source%3Dmoshimo%26utm_medium%3Daffiliate<?php } ?>

              <tr><td><a href="<?=LoliPop()?>" rel="nofollow" referrerpolicy="no-referrer-when-downgrade"><b>ロリポップ</b></a><img src="//i.moshimo.com/af/i/impression?a_id=3715195&p_id=3129&pc_id=7263&pl_id=41184" width="1" height="1" style="border:none;" alt=""></td>
                <td>エコノミー</td><td><del>1,650円</del><br>無料</td><td>月額99円～</td><td>100GB</td><td>動作不可能</td><td>専用メールアドレスが利用できます。<br>ただし、WordPressは動きません。</td></tr>
              <tr><td><a href="<?=LoliPop()?>" rel="nofollow" referrerpolicy="no-referrer-when-downgrade"><b>ロリポップ</b></a><img src="//i.moshimo.com/af/i/impression?a_id=3715195&p_id=3129&pc_id=7263&pl_id=41184" width="1" height="1" style="border:none;" alt=""></td>
                <td>ライト</td><td><del>1,650円</del><br>無料</td><td>月額220円～</td><td>200GB</td><td>動作可能</td><td>趣味のホームページなどにオススメです。<br>また、現在キャンペーンにつき初期費用無料です。</td></tr>
              <tr><td><a href="<?=LoliPop()?>" rel="nofollow" referrerpolicy="no-referrer-when-downgrade"><b>ロリポップ</b></a><img src="//i.moshimo.com/af/i/impression?a_id=3715195&p_id=3129&pc_id=7263&pl_id=41184" width="1" height="1" style="border:none;" alt=""></td>
                <td>スタンダード</td><td><del>1,650円</del><br>無料</td><td>月額440円～</td><td>300GB</td><td>動作可能</td><td>趣味からビジネス用途まで使えます。<br>こちらも現在キャンペーンにつき初期費用無料です。/td></tr>
              <tr><td><a href="<?=LoliPop()?>" rel="nofollow" referrerpolicy="no-referrer-when-downgrade"><b>ロリポップ</b></a><img src="//i.moshimo.com/af/i/impression?a_id=3715195&p_id=3129&pc_id=7263&pl_id=41184" width="1" height="1" style="border:none;" alt=""></td>
                <td>ハイスピード</td><td>無料</td><td>月額550円～</td><td>400GB</td><td>動作可能</td><td>大量アクセスでも高速表示できます。<br>一定数のPVがある場合にオススメです。</td></tr>
              <tr><td><a href="<?=LoliPop()?>" rel="nofollow" referrerpolicy="no-referrer-when-downgrade"><b>ロリポップ</b></a><img src="//i.moshimo.com/af/i/impression?a_id=3715195&p_id=3129&pc_id=7263&pl_id=41184" width="1" height="1" style="border:none;" alt=""></td>
                <td>エンタープライズ</td><td>無料</td><td>月額2200円～</td><td>1200GB</td><td>動作可能</td><td>大規模なサイトや法人サイトの制作案件向けです。<br>安定性が求められる場合にご活用下さい。</td></tr>

            </table>
          </div>
          <hr>

          <span class="titles" id="time"><span class="inpgreen">契約期間はどれくらいが良いのか</span></span>
          <br><br>
          <p>レンタルサーバーは原則として<span class="inpblue">一定期間の契約</span>となります。<br>
            多くのレンタルサーバー業者は「1か月」「3か月」「半年」「1年」など複数のプランを用意していますが、どれくらいの期間で契約するのが良いのでしょうか。</p>
          <p>私は、初心者の方に<span class="inpred">「1年」での契約</span>をオススメしています。<br>
            その理由は、<span class="inpblue">1、2か月で挫折してしまった時に「勿体ない」と感じるから</span>です。<br>
            ブログやホームページの運営は、まだ公開すらしていないほど短期間で挫折されてしまう方が多いです。<br>
            だからこそ、プレッシャーを与えるという意味で1年での契約がオススメです。</p>
          <p>また、<span class="inpred">長期契約すると大幅に月額料金が安くなるレンタルサーバーがある</span>のもメリットです。<br>
            今回紹介させて頂いた中のサービスですと、「<a href="<?=Conoha()?>" target="_blank" rel="nofollow" referrerpolicy="no-referrer-when-downgrade"><b>ConoHa WING</b><img src="//i.moshimo.com/af/i/impression?a_id=3388985&p_id=2312&pc_id=4967&pl_id=30490" width="1" height="1" style="border:none;" alt=""></a>」の「ベーシック」は3か月契約なら1,210円/月、36か月契約なら493円/月となります。</p>
          <hr>

          <!--
          <span class="titles" id="conoha"><span class="inpgreen">長期契約ならコスパ最強！ConoHa WING</span></span>
          <br><br>
          <p>※現在執筆中</p>
          <br><br>
          <hr>

          <span class="titles" id="starserver"><span class="inpgreen">無料プランも提供！スターサーバー</span></span>
          <br><br>
          <p>※現在執筆中</p>
          <br><br>
          <hr>
          -->

          <span class="titles" id="end"><span class="inpgreen">まとめ</span></span>
          <br><br>
          <p>本サイトでは、国内の大手レンタルサーバーの値段、スペック、評判などをまとめました。</p>
          <p>国内には何種類ものレンタルサーバーがありますので、少しでも選ぶ参考になっていれば幸いです。</p>

        </div>

        <hr>

      </div>


      <br>

      <div class="main">
        <a href="/" style="color:#00ff00 !important;">ホーム</a>・
        <a href="https://www.activetk.jp/license" style="color:#ffa500 !important;">利用規約</a>・
        <a href="https://www.activetk.jp/privacy" style="color:#ff00ff !important;">プライバシーに関する声明</a>・
        (c) 2022 ActiveTK.
       </div>
     </div>

  </body>
</html>