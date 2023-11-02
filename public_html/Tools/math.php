<?php
  $title = "MarkDown Editor - ActiveTK.jp";
  $dec = "オンラインでMathテキストの編集・プレビューが行えます。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/markdown";
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
    <script type="text/javascript" src="https://code.activetk.jp/ActiveTK.min.js" charset="UTF-8"></script>
    <script src="https://cdn.jsdelivr.net/gh/markedjs/marked/marked.min.js"></script>
    <script type="text/javascript">var olddata="",maenodata="",starttitle="<?=$title?>";var starttitlev=starttitle;function marknew(){_("markdowndata").innerHTML=marked.parse(_("naka").value)}function getTitle(){return _("naka").value.slice(0,_("naka").value.indexOf("\n")).slice(2)||"Untitled"}function dl(){var e=new Blob([_("naka").value],{type:"text/plain"});if(window.navigator.msSaveBlob)window.navigator.msSaveBlob(e,getTitle()+"_"+(new Date).getFullYear()+((new Date).getMonth()+1)+(new Date).getDate()+"-"+(new Date).getHours()+(new Date).getMinutes()+(new Date).getSeconds()+".md");else{var t=document.createElement("a");t.download=getTitle()+"_"+(new Date).getFullYear()+((new Date).getMonth()+1)+(new Date).getDate()+"-"+(new Date).getHours()+(new Date).getMinutes()+(new Date).getSeconds()+".md",t.href=window.URL.createObjectURL(e),t.click()}}$(document).ready(function(){let e=document.getElementById("file"),t=new FileReader;e.addEventListener("change",()=>{for(file of e.files)t.readAsText(file,"UTF-8"),t.onload=(()=>{_("naka").value=t.result,_("file").value=null;starttitle=getTitle()+" - "+starttitlev,$("title").html(starttitle);})}),starttitle=getTitle()+" - "+starttitle,$("title").html(starttitle),marknew(),$("#naka").on("change",function(){olddata=maenodata,maenodata=_("naka").value;starttitle=getTitle()+" - "+starttitlev;_("back").disabled=!olddata,$("title").html("*"+starttitle),marknew()})}),document.onkeydown=function(e){if(event.ctrlKey&&83==event.keyCode)return dl(),event.keyCode=0,!1};</script>
    <script type="text/javascript">!function(e){e.fn.linedtextarea=function(t){var i=e.extend({},e.fn.linedtextarea.defaults,t),n=function(e,t,n){for(;e.height()-t<=0;)n==i.selectedLine?e.append("<div class='lineno lineselect'>"+n+"</div>"):e.append("<div class='lineno'>"+n+"</div>"),n++;return n};return this.each(function(){var t,s=e(this);s.attr("wrap","off"),s.css({resize:"none"});var a=s.outerWidth();s.wrap("<div class='linedtextarea'></div>");var r=s.parent().wrap("<div class='linedwrap' style='width:"+a+"px'></div>").parent();r.prepend("<div class='lines' style='width:50px'></div>");var d=r.find(".lines");d.height(s.height()+6),d.append("<div class='codelines'></div>");var l=d.find(".codelines");if(t=n(l,d.height(),1),-1!=i.selectedLine&&!isNaN(i.selectedLine)){var c=parseInt(s.height()/(t-2)),h=parseInt(c*i.selectedLine)-s.height()/2;s[0].scrollTop=h}var p=d.outerWidth(),o=parseInt(r.css("border-left-width"))+parseInt(r.css("border-right-width"))+parseInt(r.css("padding-left"))+parseInt(r.css("padding-right")),v=a-o,f=a-p-o-20;s.width(f),r.width(v);var u=null;s.scroll(function(t){if(null===u){var i=this;u=setTimeout(function(){l.empty();var t=e(i)[0].scrollTop,s=Math.floor(t/15+1),a=t/15%1;n(l,d.height(),s),l.css({"margin-top":15*a*-1+"px"}),u=null},150)}}),s.resize(function(t){var i=e(this)[0];d.height(i.clientHeight+6)})})},e.fn.linedtextarea.defaults={selectedLine:-1,selectedClass:"lineselect"}}(jQuery);</script>
    <style>.linedwrap{border:1px solid silver;padding:3px}.linedtextarea{padding:0;margin:0}.linedtextarea textarea,.linedwrap .codelines .lineno{font-size:10pt;font-family:monospace;line-height:15px!important}.linedtextarea textarea{padding-right:.3em;padding-top:.3em;border:0}.linedwrap .lines{margin-top:0;width:50px;float:left;overflow:hidden;border-right:1px solid silver;margin-right:10px}.linedwrap .codelines{padding-top:5px}.linedwrap .codelines .lineno{color:#aaa;padding-right:.5em;padding-top:0;text-align:right;white-space:nowrap}.linedwrap .codelines .lineselect{color:red}</style>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <form action="" method="POST" onsubmit="save();return false;">
      <h2>MarkDown Editor<?=com(" - ActiveTK.jp", "")?></h2>
      <textarea class="lined" id="naka" style="text-align:left;position:fixed;overflow-wrap:break-word;overflow-x:scroll;overflow-y:visible;width:52%;height:<?=com("75", "70")?>%;background-color:#000000;color:#ffffff;margin:5px 5px;"># Hello MarkDown!

これはMarkdown記法のサンプルです。

右側の枠にプレビューが表示されます。

<hr>

<b>hogehoge.js</b>
```javascript
(function(){
  return void(0);
})
```
<hr>

# 見出し1
## 見出し2
### 見出し3
#### 見出し4
##### 見出し5
###### 見出し6

<hr>

- 1
    - 1.1
- 2
    - 2.1
    - 2.2
- 3

<hr>

</textarea>
      <br>
      <div style="text-align:left;position:fixed;bottom:<?=com("2", "17")?>%;left:55%;height:<?=com("92", "70")?>%;width:40%;background-color:#e6e6fa;text:#363636;overflow-x:hidden;overflow-y:visible;">
        <p><b>MarkDown Viewer #2022.10.31 / (c) 2022 ActiveTK.</b></p>
        <hr>
        <div id="markdowndata">
        </div>
      </div>
      <div style="position:fixed;bottom:3%;left:40px;">
        <input type="button" value="ダウンロード" style="width:120px;height:40px;" onclick="dl()">
        <input type="button" value="一つ戻す" id="back" onclick='_("naka").value=olddata;this.disabled=true;' disabled>
        <input type="button" value="置き換え" onclick='let e=_("naka").value,n=window.prompt("置き換えるテキストを入力してください"),o=window.prompt("置き換え後のテキストを入力してください");if(n != null && n != undefined){for(p=e.replace(n,o);p!==e;)e=e.replace(n,o),p=p.replace(n,o);_("naka").value=p}'>
        <input type="button" value="文字数取得" onclick="_('info').innerHTML='現在、'+_('naka').value.length+'文字です。';">
        <span id="info"></span>
        <br>
        <?=com("データを","")?>読み込み: <input id="file" type="file" name="file" accept="text/*,.md" multiple>
        <?=com('
        <br><br>
        <a href="/home" style="color:#00ff00 !important;">ホーム</a>・
        <a href="/about" style="color:#0403f9 !important;">本サイトについて</a>・
        <a href="/license" style="color:#ffa500 !important;">利用規約</a>・
        (c) 2022 ActiveTK.', "")?>
      </div>
    </form>
    <script>$(function(){$(".lined").linedtextarea();});</script>
  </body>
</html>