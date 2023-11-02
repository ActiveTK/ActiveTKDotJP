<?php
  $title = "「もしかして」ジェネレーター | ActiveTK.jp";
  $dec = "好きな文字列で検索エンジンの「もしかして」ページを作成できます。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/moshikasite.php";

  function MetaNote_GetRand( int $len = 32 ) : string {

    $bytes = openssl_random_pseudo_bytes( $len / 2 );
    $str = bin2hex( $bytes );

    $usestr = '1234567890abcdefghijklmnopqrstuvwxyz';
    $str2 = substr( str_shuffle( $usestr ), 0, 12 );

    return substr( str_shuffle( $str . $str2 ) , 0, -12 );

  }

  if (isset($_POST["save-image"])) {
    if (!is_string($_POST["save-image"]) || strlen($_POST["save-image"]) > 1024 * 1024 * 3 || !preg_match('/^data:image\/jpeg;base64,/', $_POST["save-image"]))
      die();
    $rand = MetaNote_GetRand(12);
    $fp = "/home/activetk/activetk.jp/public_html/Tools/moshikasite/" . $rand . ".jpg";
    @file_put_contents($fp, @base64_decode(str_replace(' ', '+', str_replace('data:image/jpeg;base64,', '', $_POST["save-image"]))));
    die($rand);
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
    <meta name="thumbnail" content="<?php
       if (!isset($_GET["data-id"]) || empty($_GET["data-id"]) || !file_exists("/home/activetk/activetk.jp/public_html/Tools/moshikasite/".urlencode( basename( $_GET["data-id"] ) ) . ".jpg"))
         echo $root . "icon/index.jpg";
       else
         echo "https://www.activetk.jp/Tools/moshikasite/" . urlencode( basename( $_GET["data-id"] ) ) . ".jpg";
    ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $dec; ?>">
    <meta name="twitter:image:src" content="<?php
       if (!isset($_GET["data-id"]) || empty($_GET["data-id"]) || !file_exists("/home/activetk/activetk.jp/public_html/Tools/moshikasite/".urlencode( basename( $_GET["data-id"] ) ) . ".jpg"))
         echo $root . "icon/index.jpg";
       else
         echo "https://www.activetk.jp/Tools/moshikasite/" . urlencode( basename( $_GET["data-id"] ) ) . ".jpg";
    ?>">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $dec; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:site_name" content="<?php echo $title; ?>">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="<?php
       if (!isset($_GET["data-id"]) || empty($_GET["data-id"]) || !file_exists("/home/activetk/activetk.jp/public_html/Tools/moshikasite/".urlencode( basename( $_GET["data-id"] ) ) . ".jpg"))
         echo $root . "icon/index.jpg";
       else
         echo "https://www.activetk.jp/Tools/moshikasite/" . urlencode( basename( $_GET["data-id"] ) ) . ".jpg";
    ?>">
    <link rel="canonical" href="<?php echo $url; ?>">
    <link rel="shortcut icon" href="<?=$root?>icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="<?=$root?>icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="<?=$root?>icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="<?=$root?>icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="<?=$root?>icon/index_150_150.ico">
    <script src="https://code.activetk.jp/ActiveTK.min.js" type="text/javascript" charset="UTF-8"></script>
    <script type="text/javascript">function CreateImage(){_("result").innerHTML="画像を生成しています..。<br>";var e=new Image;e.src="https://www.activetk.jp/icon/search_based.png",$(e).on("load",function(){const t=_("imagegoeshere"),a=t.getContext("2d");t.width=e.width,t.height=e.height,a.drawImage(e,0,0),a.font="18px sans-serif",a.fillStyle="#E8EAED",a.textBaseline="left",a.textAlign="left",a.fillText(_("q").value,34,43),a.font="18px sans-serif",a.fillStyle="#8AB4F8",a.textBaseline="left",a.textAlign="left",a.fillText(_("a").value,130,187),_("result").innerHTML="画像の生成が完了しました！<br>右クリック/長押しで保存できます。<br>";try{var n=new Image;n.src="https://www.activetk.jp/icon/search_based_white.png",$(n).on("load",function(){const e=_("imagegoeshere2"),t=e.getContext("2d");e.width=n.width,e.height=n.height,t.drawImage(n,0,0),t.font="18px sans-serif",t.fillStyle="#000000",t.textBaseline="left",t.textAlign="left",t.fillText(_("q").value,34,43),t.font="19px sans-serif",t.fillStyle="#0000FF",t.textBaseline="left",t.textAlign="left",t.fillText(_("a").value,126,202);let a=new FormData;a.append("save-image",e.toDataURL("image/jpeg")),$.ajax({url:"",type:"POST",data:a,cache:!1,contentType:!1,processData:!1}).done(function(e){_("result").innerHTML+="<a href='https://twitter.com/intent/tweet?text="+atk.encode("#もしかしてジェネレーター\nhttps://www.activetk.jp/tools/moshikasite?data-id="+e)+"' target='_blank'>Twitterでツイートする</a><br>"}).fail(function(e,t,a){console.log(a)})})}catch(e){console.log(e)}})}</script>
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
                    <h1 class="display-4" id="about"><span style="color:#f06770;">「もしかして」</span><span style="color:#000000;">ジェネレーター - ActiveTK.jp</span></h1>
                    <p>好きな文字列で検索エンジンの「もしかして」ページを作成できます。</p>
                </div>

                <div class="row featurette">
                    <form class="form" onsubmit="return CreateImage();">
                        <h3><b>【コラ画像を生成】</b></h3>
                        <br>
                        <div class="group">
                            <input type="text" class="in" id="q"><span class="highlight"></span><span class="bar"></span>
                            <label class="la">検索内容</label>
                        </div>
                        <div class="group">
                            <input type="text" class="in" id="a"><span class="highlight"></span><span class="bar"></span>
                            <label class="la">「もしかして」の内容</label>
                        </div>
                        <p id="used" style="display: none; color: #ff4500; "></p>
                        <button type="button" class="button buttonBlue" onclick="CreateImage();">
                            画像を生成
                            <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                        </button>
                    </form>

                    <div>
                      <p id="result">生成結果はここに表示されます。<br></p>
                      <canvas id="imagegoeshere" width="100" height="100"></canvas>
                      <canvas id="imagegoeshere2" width="100" height="100"></canvas>
                    </div>
                </div>

                <hr class="featurette-divider">
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