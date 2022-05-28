<?php

  require_once("/home/activetk/activetk.jp/public_html/programing-study.activetk.jp/_base.php");

?>
<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>JavaScriptで文字列を置き換える方法 | プログラミング自習室 | ActiveTK.jp</title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://programing-study.activetk.jp/images/logo_256x256.ico">
    <meta name="description" content="JavaScriptに関する記事一覧です。">
    <meta property="og:title" content="JavaScriptで文字列を置き換える方法 | プログラミング自習室 | ActiveTK.jp">
    <meta property="og:description" content="JavaScriptに関する記事一覧です。">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="JavaScriptで文字列を置き換える方法 | プログラミング自習室 | ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="/lang/index.png">
    <?=GetDefaultHeaders()?>
  </head>
  <body style="background-color:#e6e6fa;text:#363636;">
    <div align="center">
      <?=GetWelcomeMsg()?>

      <br>

      <div class="main">

        <span class="titles"><span class="inpblue"><b>JavaScriptでreplaceメゾットを使って文字列を置き換える方法</b></span></span>

        <p>JavaScriptで文字列を置き換える方法についてまとめてみました。</p>

        <hr>

        <?=GetAdHere()?>

        <br>
        <hr>

        <div align="center">

          <span class="titles"><span class="inpgreen">replaceメゾットを使用する</span></span>
          <p>文字列に<span class="inpblue">replaceメゾット</span>を実行すると、特定の文字の置き換えができます。</p>
          <p>replaceメゾットの構文は以下の通りです。</p>
          <div class="code" align="left">
            <?=htmlspecialchars("var ReplaceBefore = '置き換え前の文字列';")?><br>
            <?=htmlspecialchars("var ReplaceAfter = ReplaceBefore.replace( '置き換えたい文字', '置き換え後の文字列' );")?><br>
            <?=htmlspecialchars("document.write( '置き換え前: ' + ReplaceBefore );")?><br>
            <?=htmlspecialchars("document.write( '置き換え後: ' + ReplaceAfter );")?><br>
          </div>
          <p>練習として、「Welcome to ActiveTK.jp」という文字列の「to」を「2」に置き換えてみます。</p>
          <div class="code" align="left">
            <?=htmlspecialchars("var ReplaceBefore = 'Welcome to ActiveTK.jp';")?><br>
            <?=htmlspecialchars("var ReplaceAfter = ReplaceBefore.replace( 'to', '2' );")?><br>
            <?=htmlspecialchars("document.write( '置き換え前: ' + ReplaceBefore );")?><br>
            <?=htmlspecialchars("document.write( '置き換え後: ' + ReplaceAfter );")?><br>
          </div>
          <br>
          <div class="code" align="left">
            <?=htmlspecialchars("置き換え前: Welcome to ActiveTK.jp")?><br>
            <?=htmlspecialchars("置き換え後: Welcome 2 ActiveTK.jp")?><br>
          </div>
          <br>
          <p>このように、「to」を「2」に置き換える事ができました！</p>

          <hr>

          <span class="titles"><span class="inpgreen">ループ文で全ての文字列を置き換える</span></span>
          <p>上記のようなコードでは、<span class="inpblue">置き換えたい文字が文字列の中に複数存在する</span>場合に使用できません。</p>
          <p>よって、置き換えたい文字が文字列の中に複数存在する場合には、<span class="inpred">ループ文</span>を使用して置き換えます。</p>
          <p>練習として、「みかん りんご みかん もも」という文字列の「みかん」を「レモン」に置き換えてみます。</p>
          <div class="code" align="left">
            <?=htmlspecialchars("var ReplaceBefore = 'みかん りんご みかん もも';")?><br>
            <?=htmlspecialchars("var ReplaceAfter = '';")?><br>
            <?=htmlspecialchars("var ReplaceStr = 'みかん';")?><br>
            <?=htmlspecialchars("var ReplaceTo = 'レモン';")?><br>
            <br>
            <?=htmlspecialchars("ReplaceAfter = ReplaceBefore;")?><br>
            <?=htmlspecialchars("for(;;) {")?><br>
            &nbsp;&nbsp;<?=htmlspecialchars("if ( ReplaceAfter.replace( ReplaceStr, ReplaceTo ) == ReplaceAfter )")?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<?=htmlspecialchars("break;")?><br>
            &nbsp;&nbsp;<?=htmlspecialchars("else")?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<?=htmlspecialchars("ReplaceAfter = ReplaceAfter.replace( ReplaceStr, ReplaceTo );")?><br>
            <?=htmlspecialchars("}")?><br>
            <br>
            <?=htmlspecialchars("document.write( '置き換え前: ' + ReplaceBefore );")?><br>
            <?=htmlspecialchars("document.write( '置き換え後: ' + ReplaceAfter );")?><br>
          </div>
          <br>
          <div class="code" align="left">
            <?=htmlspecialchars("置き換え前: みかん りんご みかん もも")?><br>
            <?=htmlspecialchars("置き換え後: レモン りんご レモン もも")?><br>
          </div>
          <br>
          <p>このように、複数存在する「みかん」を「レモン」に置き換える事ができました！</p>

          <hr>

          <span class="titles"><span class="inpgreen">まとめ</span></span>
          <p>JavaScriptで文字列の中の特定の文字を置き換えるには、<span class="inpblue">replaceメゾット</span>を使用します。</p>
          <p>また、文字列の中に複数含まれる文字を置き換えるには、<span class="inpblue">ループ文</span>でreplaceメゾットを使用します。</p>

        </div>

        <hr>

      </div>

      <br>
      <?=GetLast()?>
  </body>
</html>
