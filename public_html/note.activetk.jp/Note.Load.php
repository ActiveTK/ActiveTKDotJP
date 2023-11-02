<?php

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
    $PVCount = NoteInfo["pvcount"];

    $buffer = mb_ereg_replace("{{serverside-time}}", $Loader, $buffer);
    $buffer = mb_ereg_replace("{{cached-date}}", $Time, $buffer);
    $buffer = mb_ereg_replace("{{space}}", " ", $buffer);

    return
      "<!DOCTYPE html><!--\n\n  Note.ActiveTK.jp / (c) 2023 ActiveTK.\n\n  Server-Side Time: " . $Loader .
      "\n  Cached Date: " . $Time . "\n  PageTitle: " . NoteInfo["pagetitle"] .
      "\n  PageView Count: " . $PVCount . "\n  ↑なんかこんな感じの表記ってカッコイイよね(厨二病という名の15歳)\n\n-->" . $buffer . "\n";

  }

  ob_start("sanitize_output");

  $title = NoteInfo["pagetitle"];
  $dec = NoteInfo["decinfo"];

  $fp = fopen(NoteInfo["localpath"], "r");
  $line = trim(fgets($fp));
  if (substr($line, 4, 1) == "$")
    switch (trim(substr($line, 5, strlen($line) - 8)))
    {
      case "NoAds":
        define( 'NeedToBlockAds', true );
        break;
      case "NoSearchIndex":
        define( 'NeedToBlockEngine', true );
        break;
      case "LoadMathJS":
        define( 'LoadMathJS', true );
        break;
      case "LoadPrism":
        define( 'LoadPrism', true );
        break;
      default:
        break;
    }
  fclose($fp);

?>
<html lang="ja" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?=$title?> | ActiveTK's Note</title>
    <meta name="author" content="ActiveTK.">
<?php if (!defined('NeedToBlockEngine')) { ?>
    <meta name="robots" content="<?php if (empty($dec)) echo "noindex, follow"; else echo "All"; ?>">
<?php } ?>
    <meta name="description" content="<?=$dec?>">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:title" content="<?=$title?> | ActiveTK's Note">
    <meta property="og:description" content="<?=$dec?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?=$title?> | ActiveTK's Note">
    <meta property="og:locale" content="ja_JP">
    <script src="https://cdn.tailwindcss.com"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V1CPYP07HP"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-V1CPYP07HP');</script>
<?php if (!defined('NeedToBlockAds')) { ?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2939270978924591" crossorigin="anonymous"></script>
<?php } ?>
<?php if (defined('LoadMathJS')) { ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-AMS-MML_HTMLorMML" async></script>
<?php } ?>
<?php if (defined('LoadPrism')) { ?>
    <script type="text/javascript" src="https://www.activetk.jp/js/prism.js"></script>
    <link rel="stylesheet" href="https://www.activetk.jp/css/prism.css">
<?php } ?>
    <script src="https://code.activetk.jp/ActiveTK.min.js"></script>
    <script src="https://code.activetk.jp/archive-today.blocker.js" defer></script>
    <script>$(function(){$('a[href^="#"]').click(function(){let speed=500;let href=$(this).attr("href");let target=$(href=="#"||href==""?'html':href);let position=target.offset().top;$("html, body").animate({scrollTop:position},speed,"swing");return!1})});function setDarkmode(){localStorage.setItem("_note_darkmode","true"),document.bgColor="#000000",document.fgColor="#00bb00",document.querySelector('meta[name="theme-color"]').setAttribute("content","#000000");var e=[...document.getElementsByClassName("inpblue")];for(let t=0;t<e.length;t++)e[t].classList.contains("onlyWhitemodeEffect")||e[t].classList.add("inpblue4dark"),e[t].classList.remove("inpblue");var t=[...document.getElementsByClassName("inpred")];for(let e=0;e<t.length;e++)t[e].classList.add("inpred4dark"),t[e].classList.remove("inpred");var s=[...document.getElementsByClassName("blacka")];for(let e=0;e<s.length;e++)s[e].classList.contains("onlyWhitemodeEffect")||(s[e].classList.add("blacka4dark"),s[e].classList.remove("blacka"));var a=[...document.getElementsByTagName("a")];for(let e=0;e<a.length;e++)a[e].classList.contains("onlyWhitemodeEffect")||a[e].classList.add("adefault");_("switch").classList.remove("bg-indigo-500"),_("switch").classList.add("bg-indigo-200"),_("svgdata").setAttribute("stroke","black")}function setWhitemode(){localStorage.setItem("_note_darkmode","false"),document.bgColor="#ffffff",document.fgColor="#000000",document.querySelector('meta[name="theme-color"]').setAttribute("content","#ffffff");var e=[...document.getElementsByClassName("inpblue4dark")];for(let t=0;t<e.length;t++)e[t].classList.add("inpblue"),e[t].classList.remove("inpblue4dark");var t=[...document.getElementsByClassName("inpred4dark")];for(let e=0;e<t.length;e++)t[e].classList.add("inpred"),t[e].classList.remove("inpred4dark");var s=[...document.getElementsByClassName("blacka4dark")];for(let e=0;e<s.length;e++)s[e].classList.contains("onlyWhitemodeEffect")||(s[e].classList.add("blacka"),s[e].classList.remove("blacka4dark"));var a=[...document.getElementsByTagName("a")];for(let e=0;e<a.length;e++)a[e].classList.contains("adefault")&&a[e].classList.remove("adefault");_("switch").classList.remove("bg-indigo-200"),_("switch").classList.add("bg-indigo-500"),_("svgdata").setAttribute("stroke","currentcolor")}window.clickCount=0,window.addEventListener("DOMContentLoaded",function(){var e=[...document.getElementsByClassName("titles")];for(let t=0;t<e.length;t++)e[t].innerHTML="<span class='empty'></span>"+e[t].innerHTML;"true"===localStorage.getItem("_note_darkmode")?setDarkmode():setWhitemode(),_("switch").onclick=function(){window.clickCount++,window.clickCount>3&&alert("高速でテーマの切り替え繰り返すと、光感受性発作の危険があるよ！！\n(by ActiveTK. 2023.09.23←プログラムを書いた日付をハードコードすると楽しい)"),"true"===localStorage.getItem("_note_darkmode")?setWhitemode():setDarkmode()},_("button").addEventListener("click",e=>{_("bars").classList.toggle("hidden"),_("xmark").classList.toggle("hidden"),_("menu").classList.toggle("translate-x-full")})}),setInterval(function(){window.clickCount=0},5e3);</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://note.activetk.jp/index.min.css?ver=4" rel="stylesheet">
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

    <div id="main" class="py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-md px-4 md:px-8">

        <h1 class="text-3xl font-bold" align="center">
          <span class="inpblue onlyWhitemodeEffect"><?=$title?></span>
        </h1>

        <br>

        <div style="height:45px;">
          <div style="float:left;">
            作成日時 <?=date("Y/m/d H:i", NoteInfo["publishtime"])?><br>
            最終更新 <?=date("Y/m/d H:i", NoteInfo["lastwritetime"])?>
          </div>
          <div id="switch" style="float:right;" class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-indigo-500 text-white shadow-lg md:h-14 md:w-14 md:rounded-xl">
            <svg id="svgdata" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
          </div>
        </div>

        <br>

        <?php
          if (empty($dec)) echo '<span class="titles"><span class="inpyellow"><b>この記事は非公開(現在執筆途中)です</b></span></span>';
        ?>    

        <?php require_once(NoteInfo["localpath"]); ?>

        <hr>
        <?=GetAdHere()?>
        <hr>

      </div>
    </div>
    <?=Get_Last()?>
  </body>
</html>