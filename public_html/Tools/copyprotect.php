<?php
  $title = "Webサイト複製防止スクリプト生成ツール | ActiveTK.jp";
  $dec = "Webサイトの無断複製を防止できるJavaScriptを簡単に生成できます。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/copyprotect";
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

      function getHost(url) {
        var hostname;
        if (url.indexOf("://") > -1) hostname = url.split('/')[2];
        else hostname = url.split('/')[0];
        hostname = hostname.split(':')[0];
        hostname = hostname.split('?')[0];
        hostname = hostname.replace("www.", "");
        return hostname;
      }
       window.onload = function() {
         _("copy").onclick = function() {
           atk.copy(_("savek").value),
           _("copyk").innerHTML = "コピーしました！"
         };
         _("td").onsubmit = function() {
           let t = btoa(encodeURIComponent(_('save').value.replace(/\n/g, '<br>')));
           let s = btoa(encodeURIComponent(getHost(_('url').value)));
           if (_("enc").checked)
             _('savek').value = `var _0x1e85d5=_0xac99;window.cp='` + s + `',window.cpe='` + t + `';function _0xac99(_0x3aecaa,_0x2e640e){var _0x40b52b=_0x40b5();return _0xac99=function(_0x15110b,_0x389c09){_0x15110b=_0x15110b-0xdb;var _0x3d0fc0=_0x40b52b[_0x15110b];return _0x3d0fc0;},_0xac99(_0x3aecaa,_0x2e640e);}(function(_0x28fef4,_0x507f58){var _0x4ba24d=_0xac99,_0x51bc4d=_0x28fef4();while(!![]){try{var _0x27b60a=-parseInt(_0x4ba24d(0xdf))/0x1*(parseInt(_0x4ba24d(0xdc))/0x2)+parseInt(_0x4ba24d(0xde))/0x3*(-parseInt(_0x4ba24d(0xe1))/0x4)+parseInt(_0x4ba24d(0xdd))/0x5*(-parseInt(_0x4ba24d(0xe2))/0x6)+parseInt(_0x4ba24d(0xe6))/0x7*(-parseInt(_0x4ba24d(0xe0))/0x8)+-parseInt(_0x4ba24d(0xe8))/0x9*(-parseInt(_0x4ba24d(0xea))/0xa)+-parseInt(_0x4ba24d(0xe4))/0xb*(parseInt(_0x4ba24d(0xe9))/0xc)+parseInt(_0x4ba24d(0xe3))/0xd;if(_0x27b60a===_0x507f58)break;else _0x51bc4d['push'](_0x51bc4d['shift']());}catch(_0x5ebc95){_0x51bc4d['push'](_0x51bc4d['shift']());}}}(_0x40b5,0x60f9d),document[_0x1e85d5(0xe5)](_0x1e85d5(0xdb),function(){var _0x3bc523=_0x1e85d5;decodeURIComponent(btoa(window['location'][_0x3bc523(0xeb)]))!=window['cp']&&document[_0x3bc523(0xe7)](decodeURIComponent(atob(window['cpe'])));}));function _0x40b5(){var _0x4b1445=['92540KSvSPW','host','DOMContentLoaded','6sYMyTb','5UgfKcP','3zOvJRz','169577bwQSBJ','8zOBdPB','2044716LSbUIz','1277808NtISmv','24526827gLoDvd','11KPkjdL','addEventListener','2096507BFeUPV','write','360GzcSBX','3926964FAHSEF'];_0x40b5=function(){return _0x4b1445;};return _0x40b5();}`;
           else
             _('savek').value = `document.addEventListener("DOMContentLoaded", function() {
  (decodeURIComponent(btoa(window.location.host)) != "` + s + `") &&
  document.write(decodeURIComponent(atob("` + t + `")))
});`;
           return false
         };
       }

    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#080808;color:#00BB00;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
      <h1>Webサイト複製防止スクリプト生成ツール | ActiveTK.jp</h1>
      <p>Webサイトの無断複製を防止できるJavaScriptを簡単に生成できます。</p>
      <hr size="1" color="#7fffd4">
      <form action="" method="POST" id="td">
        <br>Webサイトを公開しているURL又はドメイン(wwwも必要): <br>
        <input type='text' id="url" style="height:20px;width:500px;" placeholder='ここにURLを入力してください' value="https://www.example.com/"><br>
        <br>無断複製された際に表示するメッセージ: <br>
        <textarea rows="14" id="save" style="margin: 0px; height: 140px; width: 672px;">本ページは、無断で複製されたサイトです！
無断でのウェブサイトの複製は、著作権法上の例外を省き法律で固く禁止されています。
もしもあなたがサイトの閲覧者である場合、管理者 hogehoge@example.com までご報告願います。</textarea>
        <br>
        <p><input type="checkbox" id="enc"> JavaScriptを難読化 <img id="whatistld" title="JavaScriptの挙動の理解を困難にします。" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAVpJREFUOE+lkzFLA0EQhd/bECsLSS9COklEGxHEuyj+AkEkSaNooaXY2YidnViqYCGIOcW/YHE5m3RKEtBCwT+Qyi7JjtwdF85zL0HcatmZ/Zh584YAiNhZvW7kutnxdQAWSCsIiXgAvGz36+Fxc6ETz/c/DwCl21ZZK55QMBVPiu5CfCoth2616ERvA4Bda+vkJ0K9CPSsCVavFJT/HgAsp3VK4X48USCuVymuWHevi9T9pyREKGdeuXhAu9acBNQzgJwRcP82z36vYaiiA+g52rX2NoArU5l+C5p6Ik0TADtccprnStSuUTSIiz5cZnhkimvqC9pO+x2C/K8eM2rZ25iuWzet4zQAiI9UgA/0lR4JGNbCKEDYwhARRwECEdPGGGjS7eU5llmDcEaArYRO4RjTjBTuAPbq1cKlf006dWCkaBdMVg4Z4hIsJaf0w8pR8F/LFEH+us7f5QCpydq+57sAAAAASUVORK5CYII="></p>

        <input type="submit" value="スクリプトを生成" style="height:60px;width:140px;">
        <hr size="1" color="#7fffd4">
        ↓↓結果↓↓<br>
        <textarea rows="14" id="savek" style="margin: 0px; height: 140px; width: 542px;"></textarea>
        <br>
        <input type="button" value="コピー" id="copy" style="height:60px;width:140px;"><span id="copyk"></span>
        <br><pre>こちらのコードをScriptタグ内に張り付けてください。なお、インラインでの配置を推奨します。</pre>
      </form>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div style="background-color:#6495ed;color:#0f0f0f;"><div id="footer" style="align:center;text-align:center;">
      <br><hr style="width:60%;">
      <div align="center"><?=Get_Last()?></div>
      <hr style="width:60%;">
    </div>
    <br>
  </body>
</html>