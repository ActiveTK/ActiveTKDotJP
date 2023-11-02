<?php

  $title = "Home";
  $dec = "情報セキュリティ関連やサイバー犯罪の調査、便利ツールの紹介などを行うブログです。ActiveTK.が執筆しています。";

  define("LOAD_START_TIME", microtime(true));

  function sanitize_output($buffer) {
    $buffer = preg_replace_callback('/<pre.*?<\/pre>/is', function($matches) {
      return '_______here___pre__start' . base64_encode(urlencode($matches[0])) . '_______here___pre__end';
    }, $buffer);
    $buffer = preg_replace_callback('/<script.*?<\/script>/is', function($matches) {
      return '_______here___scr__start' . base64_encode(urlencode($matches[0])) . '_______here___scr__end';
    }, $buffer);
    $buffer = preg_replace(array('/\>[^\S]+/s', '/[^\S]+\</s', '/(\s)+/s' ), array('>', '<', '\\1'), $buffer);
    $buffer = preg_replace_callback('/_______here___pre__start.*?_______here___pre__end/is', function($matches) {
      return urldecode(base64_decode(substr(substr($matches[0], 24), 0, -22)));
    }, $buffer);
    $buffer = preg_replace_callback('/_______here___scr__start.*?_______here___scr__end/is', function($matches) {
      return urldecode(base64_decode(substr(substr($matches[0], 24), 0, -22)));
    }, $buffer);
    if (substr($buffer, 0, 15) == "<!DOCTYPE html>")
      $buffer = substr($buffer, 15);

    $Time = (new DateTime('now', new DateTimeZone('GMT')))->format('Y-m-d H:i:sP');
    $Loader = (microtime(true) - LOAD_START_TIME) . "s";
    $PVCount = "(only dev mode)";

    $buffer = mb_ereg_replace("{{serverside-time}}", $Loader, $buffer);
    $buffer = mb_ereg_replace("{{cached-date}}", $Time, $buffer);
    $buffer = mb_ereg_replace("{{space}}", " ", $buffer);

    return
      "<!DOCTYPE html><!--\n\n  Note.ActiveTK.jp / (c) 2023 ActiveTK.\n\n  Server-Side Time: " . $Loader .
      "\n  Cached Date: " . $Time . "\n  PageTitle: Home | ActiveTK's Note" .
      "\n  Development: front=Tailwind, back=PHP+MySQL\n  ↑なんかこんな感じの表記ってカッコイイよね(厨二病という名の15歳)\n\n  ところでなぜ君はソースコードを見ているんだい？\n\n-->" . $buffer . "\n";
  }

  ob_start("sanitize_output");

?>

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?=$title?> | ActiveTK's Note</title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="description" content="<?=$dec?>">
    <meta property="og:title" content="<?=$title?> | ActiveTK's Note">
    <meta property="og:description" content="<?=$dec?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?=$title?> | ActiveTK's Note">
    <meta property="og:locale" content="ja_JP">
    <meta name="theme-color" content="#ffffff">
    <script src="https://cdn.tailwindcss.com"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V1CPYP07HP"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-V1CPYP07HP');</script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2939270978924591" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.activetk.jp/ActiveTK.min.js" charset="UTF-8"></script>
    <script>$(function(){$('a[href^="#"]').click(function(){let speed=500;let href=$(this).attr("href");let target=$(href=="#"||href==""?'html':href);let position=target.offset().top;$("html, body").animate({scrollTop:position},speed,"swing");return!1})})</script>
    <link href="https://note.activetk.jp/index.min.css?ver=4" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>function setDarkmode(){localStorage.setItem("_note_darkmode","true"),document.bgColor="#000000",document.fgColor="#00bb00",document.querySelector('meta[name="theme-color"]').setAttribute("content","#000000");var e=[...document.getElementsByClassName("inpblue")];for(let t=0;t<e.length;t++)e[t].classList.contains("onlyWhitemodeEffect")||e[t].classList.add("inpblue4dark"),e[t].classList.remove("inpblue");var t=[...document.getElementsByClassName("inpred")];for(let e=0;e<t.length;e++)t[e].classList.add("inpred4dark"),t[e].classList.remove("inpred");var a=[...document.getElementsByClassName("blacka")];for(let e=0;e<a.length;e++)a[e].classList.contains("onlyWhitemodeEffect")||(a[e].classList.add("blacka4dark"),a[e].classList.remove("blacka"));var s=[...document.getElementsByTagName("a")];for(let e=0;e<s.length;e++)s[e].classList.contains("onlyWhitemodeEffect")||s[e].classList.add("adefault")}function setWhitemode(){localStorage.setItem("_note_darkmode","false"),document.bgColor="#ffffff",document.fgColor="#000000",document.querySelector('meta[name="theme-color"]').setAttribute("content","#ffffff");var e=[...document.getElementsByClassName("inpblue4dark")];for(let t=0;t<e.length;t++)e[t].classList.add("inpblue"),e[t].classList.remove("inpblue4dark");var t=[...document.getElementsByClassName("inpred4dark")];for(let e=0;e<t.length;e++)t[e].classList.add("inpred"),t[e].classList.remove("inpred4dark");var a=[...document.getElementsByClassName("blacka4dark")];for(let e=0;e<a.length;e++)a[e].classList.contains("onlyWhitemodeEffect")||(a[e].classList.add("blacka"),a[e].classList.remove("blacka4dark"));var s=[...document.getElementsByTagName("a")];for(let e=0;e<s.length;e++)s[e].classList.contains("adefault")&&s[e].classList.remove("adefault")}window.clickCount=0,window.addEventListener("DOMContentLoaded",function(){var e=[...document.getElementsByClassName("titles")];for(let t=0;t<e.length;t++)e[t].innerHTML="<span class='empty'></span>"+e[t].innerHTML;"true"===localStorage.getItem("_note_darkmode")?setDarkmode():setWhitemode(),_("button").addEventListener("click",e=>{_("bars").classList.toggle("hidden"),_("xmark").classList.toggle("hidden"),_("menu").classList.toggle("translate-x-full")})});</script>
    <?=ShowBasicCSS()?>
  </head>
  <body>
    <header class="flex h-20 items-center p-6" style="background-color:#6495ed;color:#080808;">
      <h1 class="text-2xl">ActiveTK's Note</h1>
      <nav style="z-index: 2;">
        <button id="button" type="button" class="fixed top-6 right-6 z-10">
          <i id="bars" class="fa-solid fa-bars fa-2x"></i>
          <i id="xmark" class="fa-solid fa-xmark fa-2x hidden text-white"></i>
        </button>
        <ul id="menu" class="fixed top-0 left-0 z-0 w-full translate-x-full bg-blue-500 text-center text-xl font-bold text-white transition-all ease-linear">
          <li class="p-3"><a href="/" class="blacka onlyWhitemodeEffect">ホーム (/)</a></li>
          <li class="p-3"><a href="https://www.activetk.jp/about" class="blacka onlyWhitemodeEffect">サービス概要 (/about)</a></li>
          <li class="p-3"><a href="https://www.activetk.jp/license" class="blacka onlyWhitemodeEffect">利用規約 (/license)</a></li>
          <li class="p-3"><a href="https://www.activetk.jp/privacy" class="blacka onlyWhitemodeEffect">プライバシー (/privacy)</a></li>
          <li class="p-3"><a href="https://www.activetk.jp/developer?v=2" class="blacka onlyWhitemodeEffect">管理者 (/developer)</a></li>
          <li class="p-3"><a href="https://www.activetk.jp/contact" class="blacka onlyWhitemodeEffect">お問い合わせ (/contact)</a></li>
        </ul>
      </nav>
    </header>

    <div class="py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-md px-4 md:px-8">

        <h1 class="text-3xl font-bold" align="center">
          <span class="inpblue onlyWhitemodeEffect"><?=$title?> - ActiveTK's Note</span>
        </h1>

        <br>

        <p>情報セキュリティ関連やサイバー犯罪の調査、便利ツールの紹介を行うブログです。</p>
        <p>内容について何かご質問がありましたら<a href="https://www.activetk.jp/contact">お問い合わせ</a>からご連絡下さい。</p>

        <br>

        <div>
          <div>
            <hr>
            <?php

              // echo "<p>人気の記事</p>";
              echo "<p>オススメの記事</p>";
              $Notes = array();
              $AlReadyShowed = array();
              try {
                // $Notes = $dbh->query('select * from noteblog where not decinfo = "" order by pvcount desc limit 5;');
                $Notes = $dbh->query('select * from noteblog where httppath = "darknet/separated-identity" or httppath = "tools/fast-prime-factors" or httppath = "hacks/file-uploader" or httppath = "darknet/why-lockbit-v2" or httppath = "hacks/onion-search";');
                if ($Notes !== false) { }
                else die("SQLの実行中にエラーが発生しました。");
              } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }
              foreach($Notes as $value)
              {
                $AlReadyShowed[] = $value["localpath"];
                echo '          '.comx("<li>","").'<a href="/' . $value["httppath"] . '" class="blacka">' . $value["pagetitle"] . '</a>'.comx("</li>","<br><br>");
              }

              echo "<br><p>最近の投稿</p>";
              $WhereQuery = "";
              foreach($AlReadyShowed as $localpath)
                $WhereQuery .= " and not localpath = '" . $localpath . "'";
              $Notes = array();
              try {
                $Notes = $dbh->query('select * from noteblog where not decinfo = ""'.$WhereQuery.' order by lastwritetime desc limit 5;');
                if ($Notes !== false) { }
                else die("SQLの実行中にエラーが発生しました。");
              } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }
              foreach($Notes as $value)
                echo '          '.comx("<li>","").'<a href="/' . $value["httppath"] . '" class="blacka">' . $value["pagetitle"] . '</a>'.comx("</li>","<br><br>");

            ?><br>
            <hr>
            <?php

              echo "<p>セキュリティ関連 - /hacks</p>";
              $Notes = array();
              try {
                $Notes = $dbh->query('select * from noteblog where not decinfo = "" and httppath like "hacks/%" and writer = "ActiveTK.";');
                if ($Notes !== false) { }
                else die("SQLの実行中にエラーが発生しました。");
              } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }
              foreach($Notes as $value)
                echo '          '.comx("<li>","").'<a href="/' . $value["httppath"] . '" class="blacka">' . $value["pagetitle"] . '</a>'.comx("</li>","<br><br>");

              echo "<br><p>ダークウェブ関連 - /darknet</p>";
              $Notes = array();
              try {
                $Notes = $dbh->query('select * from noteblog where not decinfo = "" and httppath like "darknet/%" and writer = "ActiveTK.";');
                if ($Notes !== false) { }
                else die("SQLの実行中にエラーが発生しました。");
              } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }
              foreach($Notes as $value)
                echo '          '.comx("<li>","").'<a href="/' . $value["httppath"] . '" class="blacka">' . $value["pagetitle"] . '</a>'.comx("</li>","<br><br>");

              echo "<br><p>便利ツールの紹介 - /tools</p>";
              $Notes = array();
              try {
                $Notes = $dbh->query('select * from noteblog where not decinfo = "" and httppath like "tools/%" and writer = "ActiveTK.";');
                if ($Notes !== false) { }
                else die("SQLの実行中にエラーが発生しました。");
              } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }
              foreach($Notes as $value)
                echo '          '.comx("<li>","").'<a href="/' . $value["httppath"] . '" class="blacka">' . $value["pagetitle"] . '</a>'.comx("</li>","<br><br>");

              echo "<br><p>Windows関連 - /windows</p>";
              $Notes = array();
              try {
                $Notes = $dbh->query('select * from noteblog where not decinfo = "" and httppath like "windows/%" and writer = "ActiveTK.";');
                if ($Notes !== false) { }
                else die("SQLの実行中にエラーが発生しました。");
              } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }
              foreach($Notes as $value)
                echo '          '.comx("<li>","").'<a href="/' . $value["httppath"] . '" class="blacka">' . $value["pagetitle"] . '</a>'.comx("</li>","<br><br>");

              echo "<br><p>プログラミング関連 - /php /javascript /csharp</p>";
              $Notes = array();
              try {
                $Notes = $dbh->query('select * from noteblog where not decinfo = "" and (httppath like "php/%" or httppath like "javascript/%" or httppath like "csharp/%") and writer = "ActiveTK.";');
                if ($Notes !== false) { }
                else die("SQLの実行中にエラーが発生しました。");
              } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }
              foreach($Notes as $value)
                echo '          '.comx("<li>","").'<a href="/' . $value["httppath"] . '" class="blacka">' . $value["pagetitle"] . '</a>'.comx("</li>","<br><br>");

              echo "<br><p>その他 - /etc</p>";
              $Notes = array();
              try {
                $Notes = $dbh->query('select * from noteblog where not decinfo = "" and httppath like "etc/%" and writer = "ActiveTK.";');
                if ($Notes !== false) { }
                else die("SQLの実行中にエラーが発生しました。");
              } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }
              foreach($Notes as $value)
                echo '          '.comx("<li>","").'<a href="/' . $value["httppath"] . '" class="blacka">' . $value["pagetitle"] . '</a>'.comx("</li>","<br><br>");
              echo "<br><hr><br><p>リア友が執筆した記事</p>";
              $Notes = array();
              try {
                $Notes = $dbh->query('select * from noteblog where not decinfo = "" and not writer = "ActiveTK.";');
                if ($Notes !== false) { }
                else die("SQLの実行中にエラーが発生しました。");
              } catch (\Throwable $e) { die("SQLエラーが発生しました。"); }
              foreach($Notes as $value)
                echo '          '.comx("<li>","").'<a href="/' . $value["httppath"] . '" class="blacka">' . $value["pagetitle"] . '</a>'.comx("</li>","<br><br>");

          ?>
          </div>
        </div>

        <br>
        <hr>

      </div>
    </div>

    <?=Get_Last()?>

  </body>
</html>
