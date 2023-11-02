<?php

  $basepath = "/home/activetk/data/ActiveTKDotJP/WebRecorder/";

  // アクセス
  if (isset($_GET["upload"]))
  {
    header("X-Robots-Tag: noindex,nofollow,noarchive");
    if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'bot') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Bot') !== false))
    {
      header("HTTP/1.1 403 ForBidden");
      exit();
    }

    if(isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
        header("Content-Type: text/plain;charset=UTF-8");
        if( filesize($_FILES['file']['tmp_name']) > 1024 * 1024 * 1024)
          die("ERR_FILE_TOO_BIG)");
        $hashs = substr(hash_file('md5', $_FILES['file']['tmp_name']), 0, 8) . dechex(time());
        if (file_exists("{$basepath}{$hashs}"))
          die($hashs);
        if (!mkdir("{$basepath}{$hashs}/"))
          die(json_encode(array("error"=>"ERR_MKDIR_FALSE")));
        if (move_uploaded_file($_FILES['file']['tmp_name'], "{$basepath}{$hashs}/data_"))
        {
          file_put_contents("{$basepath}{$hashs}/date", time());
          file_put_contents("{$basepath}{$hashs}/filesize", filesize("{$basepath}{$hashs}/data_"));
          file_put_contents("{$basepath}{$hashs}/data", gzdeflate(file_get_contents("{$basepath}{$hashs}/data_"), 9));
          unlink("{$basepath}{$hashs}/data_");
          exit($hashs);
        }
    }
    die(json_encode(array("error"=>"ERR_FILE_NOTSELECTED")));

  }
  else if (isset($_GET["download"]))
  {
      header("X-Robots-Tag: noindex,nofollow,noarchive");
      $pt = basename($_GET["download"]);
      if (!preg_match("/^[a-zA-Z0-9]+$/", $pt) || !file_exists("{$basepath}{$pt}"))
      {
        header("HTTP/1.1 404 Not Found");
        header("Message: The requested URL was not found on this server.");
        die("<h1>すみませんが、リクエストされたファイルは存在しません。</h1>\n<p>ファイルがアップロードされていない、又は管理者によって削除された可能性があります。</p>");
      }
      header('Content-Disposition: attachment;');
      header('Connection: close');
      header("Content-Type: audio/mp3;");
      header('Content-Length: ' . (int)file_get_contents("{$basepath}{$pt}/filesize"));
      while (ob_get_level()) { ob_end_clean(); }

      exit(gzinflate(file_get_contents("{$basepath}{$pt}/data")));
  }

  $meurl = "https://www.activetk.jp/";
  $title = "Web Recorder - ActiveTK.jp";
  $decp = "Web上で音声を録音・ダウンロードすることができるツールです。";

?>

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="<?=$meurl?>icon/index_32_32.ico">
    <meta name="description" content="<?php echo $decp; ?>">
    <meta name="copyright" content="Copyright &copy; 2023 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="<?=$meurl?>icon/index.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $decp; ?>">
    <meta name="twitter:image:src" content="<?=$meurl?>icon/index.png">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $decp; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?=$meurl?>tools/webrecorder">
    <meta property="og:site_name" content="<?php echo $title; ?>">
    <meta property="og:locale" content="ja_JP">
    <link rel="shortcut icon" href="<?=$meurl?>icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="<?=$meurl?>icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="<?=$meurl?>icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="<?=$meurl?>icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="<?=$meurl?>icon/index_150_150.ico">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    <script src="https://unpkg.com/typewriter-effect@2.18.2/dist/core.js"></script>
    <style>a{color: #00ff00;position: relative;display: inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
   <?=Get_Default()?>
  </head>
  <body style="background-color:#e6e6fa;text:#363636;">
    <br>
    <div align='center'>
      <h1>Web Recorder - ActiveTK.jp</h1>
      <p>Web Recorderは、Web上で音声を録音・ダウンロードすることができるツールです。</p>
      <hr color="#363636" size="2">
      <div id="app">
        <br>
        ファイル形式: <select id="filetype" style="height:24px;">
          <option value="webm">webm形式</option>
          <option value="mp3" disabled>mp3形式</option>
        </select><br><br>
        <button class="btn btn-danger" type="button" v-if="status=='ready'" @click="startRecording" style="height:60px;width:140px;">録音を開始</button>
        <button class="btn btn-primary" type="button" v-if="status=='recording'" @click="stopRecording" style="height:60px;width:140px;">録音を終了</button>
        <br><br>
        <p>現在の状態: <span id="status">準備中(マイクへのアクセス権限が必要です)</span><span id="command_per"></span></p>
        <table border="1" class="table table-striped" id="recorddata" style="width:<?=com("40", "90")?>%;">
          <tr>
            <th>録音時刻</th>
            <th>時間</th>
            <th>ファイルサイズ</th>
            <th>ダウンロードURL</th>
            <th>削除</th>
          </tr>
        </table>
      </div>
      <br>
      <?=GetAdHere()?>
      <hr color="#363636" size="2">
      <div align="center"><?=Get_Last()?></div>
    </div>
    <script>var opt={loop:!0,delay:75,autoStart:!0,cursor:"|",strings:[""]};new Typewriter(document.getElementById("command_per"),opt),window.n=0,window.rcstatus="prepare";for(var i=0,length=localStorage.length;i<length;++i){var unixtime=localStorage.key(i),info=localStorage.getItem(unixtime),date=new Date(1e3*unixtime);if(!isNaN(date.getFullYear())){let t=document.createElement("a");t.text="ダウンロード",t.href="https://www.activetk.jp/tools/webrecorder?download="+info;var e=date;t.download="Record-"+e.getFullYear()+(e.getMonth()+1)+e.getDate()+"_"+e.getHours()+e.getMinutes()+e.getSeconds()+".webm";var tableElem=document.getElementById("recorddata"),trElem=tableElem.tBodies[0].insertRow(-1);trElem.insertCell(0).appendChild(document.createTextNode(getNow(date))),trElem.insertCell(1).appendChild(document.createTextNode("(不明)")),trElem.insertCell(2).appendChild(document.createTextNode("archived")),trElem.insertCell(3).appendChild(t);let n=document.createElement("a");n.text="削除",n.href="javascript:delitem('"+Math.floor(e.getTime()/1e3)+"');",trElem.insertCell(4).appendChild(n)}}function delitem(e){localStorage.removeItem(e),window.location.reload(!1)}function getNow(e){return e||(e=new Date),e.getFullYear()+"年"+(e.getMonth()+1)+"月"+e.getDate()+"日"+e.getHours()+"時"+e.getMinutes()+"分"+e.getSeconds()+"秒"}new Vue({el:"#app",data:{status:"init",recorder:null,audioData:[],audioExtension:""},methods:{startRecording(){this.status="recording",window.rcstatus="recording",this.audioData=[],this.recorder.start(),document.getElementById("status").innerHTML="<font color='#b22222'>●</font>録音中..(0秒経過)",window.n=0,window.interv=setInterval(function(){"recording"!=window.rcstatus?clearInterval(window.interv):(window.n++,document.getElementById("status").innerHTML="<font color='#b22222'>●</font>録音中..("+window.n+"秒経過)")},1e3)},stopRecording(){this.recorder.stop(),window.rcstatus="downloading",this.status="ready",document.getElementById("status").innerHTML="<font color='#00ff00'>●</font>録音完了"},getExtension(e){let t=document.getElementById("filetype").value;const n=e.match(/audio\/([^;]+)/);return n&&(t=n[1]),"."+t}},mounted(){navigator.mediaDevices.getUserMedia({audio:!0}).then(e=>{this.recorder=new MediaRecorder(e),this.recorder.addEventListener("dataavailable",e=>{this.audioData.push(e.data),this.audioExtension=this.getExtension(e.data.type)}),this.recorder.addEventListener("stop",()=>{const e=new Blob(this.audioData),t=URL.createObjectURL(e);let n=document.createElement("a");n.text="ダウンロード",n.href=t;let a=new Date;n.download="Record-"+a.getFullYear()+(a.getMonth()+1)+a.getDate()+"_"+a.getHours()+a.getMinutes()+a.getSeconds()+this.audioExtension;let o=document.createElement("a");o.text="削除",o.href="javascript:delitem('"+Math.floor(a.getTime()/1e3)+"');";var r=document.getElementById("recorddata").tBodies[0].insertRow(-1);r.insertCell(0).appendChild(document.createTextNode(getNow(a))),r.insertCell(1).appendChild(document.createTextNode(window.n+"秒")),r.insertCell(2).appendChild(document.createTextNode(Math.round(e.size/1024)+"KB")),r.insertCell(3).appendChild(n),r.insertCell(4).appendChild(o);const d=new Worker("/js/webrecorder.auto-upload.js?t="+a.getTime());d.postMessage({UnixTime:Math.floor(a.getTime()/1e3),Data_:this.audioData}),d.addEventListener("message",e=>{localStorage.setItem(e.data.result_unixtime_,e.data.result_html_data_)})}),this.status="ready",window.rcstatus="ready",document.getElementById("status").innerHTML="<font color='#00ff00'>●</font>準備完了"}).catch(function(e){document.getElementById("status").innerText=e.name+": "+e.message})}});<?php /*
        var opt = {
          loop: true,
          delay: 75,
          autoStart: true,
          cursor: '|',
          strings: ['']
        };
        new Typewriter(document.getElementById("command_per"), opt);
        window.n = 0;
        window.rcstatus = "prepare";

        for (var i = 0, length = localStorage.length; i < length; ++i) {
          var unixtime = localStorage.key(i);
          var info = localStorage.getItem(unixtime);
          var date = new Date(unixtime * 1000);
          if (!isNaN(date.getFullYear()))
          {
            let a = document.createElement('a');
            a.text = "ダウンロード";
            a.href = "https://www.activetk.jp/tools/webrecorder?download=" + info;
            var e = date;
            a.download = "Record-" + e.getFullYear()+(e.getMonth()+1)+e.getDate()+"_"+e.getHours()+e.getMinutes()+e.getSeconds() + ".webm";
            var tableElem = document.getElementById('recorddata');
            var trElem = tableElem.tBodies[0].insertRow(-1);
            trElem.insertCell(0).appendChild(document.createTextNode(getNow(date)));
            trElem.insertCell(1).appendChild(document.createTextNode("(不明)"));
            trElem.insertCell(2).appendChild(document.createTextNode("archived"));
            trElem.insertCell(3).appendChild(a)

            let a2 = document.createElement('a');
            a2.text = "削除";
            a2.href = "javascript:delitem('"+Math.floor( e.getTime() / 1000 )+"');";

            trElem.insertCell(4).appendChild(a2);
          }
        }

        function delitem(id) {
          localStorage.removeItem(id);
          window.location.reload(false);
        }

        new Vue({
            el: '#app',
            data: {
                status: 'init',
                recorder: null,
                audioData: [],
                audioExtension: ''
            },
            methods: {
                startRecording() {
                    this.status = 'recording';
                    window.rcstatus = 'recording';
                    this.audioData = [];
                    this.recorder.start();
                    document.getElementById("status").innerHTML = "<font color='#b22222'>●</font>録音中..(0秒経過)";
                    window.n = 0;
                    window.interv = setInterval(function(){
                      if (window.rcstatus != "recording")
                        clearInterval(window.interv);
                      else
                      {
                        window.n++;
                        document.getElementById("status").innerHTML = "<font color='#b22222'>●</font>録音中..(" + window.n + "秒経過)";
                      }
                    }, 1000);
                },
                stopRecording() {
                    this.recorder.stop();
                    window.rcstatus = 'downloading';
                    this.status = 'ready';
                    document.getElementById("status").innerHTML = "<font color='#00ff00'>●</font>録音完了";
                },
                getExtension(audioType) {
                    let extension = document.getElementById("filetype").value;
                    const matches = audioType.match(/audio\/([^;]+)/);
                    if(matches) {
                        extension = matches[1];
                    }
                    return '.'+ extension;
                }
            },
            mounted() {
                navigator.mediaDevices.getUserMedia({ audio: true })
                    .then(stream => {
                        this.recorder = new MediaRecorder(stream);
                        this.recorder.addEventListener('dataavailable', e => {
                            this.audioData.push(e.data);
                            this.audioExtension = this.getExtension(e.data.type);
                        });
                        this.recorder.addEventListener('stop', () => {
                            const audioBlob = new Blob(this.audioData);
                            const url = URL.createObjectURL(audioBlob);

                            let a = document.createElement('a');
                            a.text = "ダウンロード";
                            a.href = url;
                            let e = new Date();
                            a.download = "Record-" + e.getFullYear()+(e.getMonth()+1)+e.getDate()+"_"+e.getHours()+e.getMinutes()+e.getSeconds() + this.audioExtension;

                            let a2 = document.createElement('a');
                            a2.text = "削除";
                            a2.href = "javascript:delitem('"+Math.floor( e.getTime() / 1000 )+"');";

                            var tableElem = document.getElementById('recorddata');
                            var trElem = tableElem.tBodies[0].insertRow(-1);
                            trElem.insertCell(0).appendChild(document.createTextNode(getNow(e)));
                            trElem.insertCell(1).appendChild(document.createTextNode(window.n + "秒"));
                            trElem.insertCell(2).appendChild(document.createTextNode(Math.round(audioBlob.size / 1024) + "KB"));
                            trElem.insertCell(3).appendChild(a);
                            trElem.insertCell(4).appendChild(a2);
                            const worker = new Worker('/js/webrecorder.auto-upload.js?t=' + e.getTime());
                            worker.postMessage({
                              UnixTime: Math.floor( e.getTime() / 1000 ),
                              Data_: this.audioData
                            });
                            worker.addEventListener('message', (message) => {
                              localStorage.setItem(message.data.result_unixtime_, message.data.result_html_data_);
                            });
                        });
                        this.status = 'ready';
                        window.rcstatus = 'ready';
                        document.getElementById("status").innerHTML = "<font color='#00ff00'>●</font>準備完了";
                    })
                    .catch(function(err) {
                        document.getElementById("status").innerText = err.name + ": " + err.message;
                    });
            }
        });
        function getNow(e){if(!e)e=new Date;return e.getFullYear()+"年"+(e.getMonth()+1)+"月"+e.getDate()+"日"+e.getHours()+"時"+e.getMinutes()+"分"+e.getSeconds()+"秒"}
    */ ?></script>
  </body>
</html>