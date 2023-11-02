/*!
 * KonamiCode.js
 * (c) 2023 ActiveTK. <+activetk.jp>
 * Released under the MIT license
 */

(function(window, undefined) {
  "use strict";

  window.konamicode = {};
  window.konamicode.stat = 0;
  window.konamicode.DefClick2viewhelp = 0;
  window.konamicode.helpviewed = 0;
  window.konamicode.rbuff2 = "";
  window.konamicode.IsNanoOpen = false;

  if (typeof _ === 'undefined')
  {
    window._ = (e) => "null" == typeof document.getElementById(e) ? document.getElementsByName(e) : document.getElementById(e);
  }

  window.konamicode.callback = function() {

    document.body.innerHTML += `
  <div id="shell" style="position:fixed;top:0px;left:0px;background-color:#080808;color:#00BB00;overflow-x:hidden;overflow-y:visible;height:100%;width:100%;z-index:8;">
    <div align="left" style="text-align:left;">
      <pre id="welcomec"></pre>
    </div>
    <div style="font-size:25px;display:none;" id="shellmain">
      <span id="oldtext"></span>
      <span style="color:#00ff00;">root@activetk.jp</span>:<span style="color:#0000ff;" id="cd">` + window.location.pathname + `</span>
      <span id="readable" style="width:60px;">$ㅤ</span><span id="command" name="command" spellcheck="false" contenteditable></span>
    </div>
  </div>`;

    fetch('https://www.activetk.jp/js/typewriter-effect@2.18.2_core.js').then(r=>{return r.text()}).then(t=>{

      eval(t);

      new Typewriter(_("welcomec"), {
        loop: false,
        delay: 75,
        autoStart: false,
        strings: ['']
      })
      .start()
      .deleteAll(1)
      .typeString("ActiveTK.jp Build.2023.04.05\n")
      .pauseFor(50)
      .typeString("(c) 2023 ActiveTK. ＜webmaster@activetk.jp＞")
      .pauseFor(50)
      .callFunction(function(){
        _("shellmain").style = "display:block;";
      });

    });

    window.readalert = 0;
    setInterval(function(){

      if ((!document.activeElement || document.activeElement.id != "command") && window.konamicode.IsNanoOpen === false)
        _("command").focus();

      if (_("command").textContent != "")
        _("readable").innerHTML = "$";
      else if (window.readalert == 0)
      {
        _("readable").innerHTML = "$:" + "<span style='color:#000000;'>_</span>";
        window.readalert = 1;
      }
      else
      {
        _("readable").innerHTML = "$ㅤ";
        window.readalert = 0;
      }

    }, 800);

    _("command").addEventListener('keypress', function(t){
      if (13 == t.keyCode)
      {
        _("command").contenteditable = false;
        var result = RunCommand(_("command").innerText);

        if (result !== false)
        {
          _("oldtext").innerHTML += `<span style="color:#00ff00;">root@activetk.jp</span>:<span style="color:#0000ff;">` + _("cd").innerText + `</span> $<span>` + _("command").innerText + `</span><pre spellcheck="false">` + result + `</pre>`;
          _("command").innerHTML = "";
          _("command").contenteditable = true;
          _("shell").scrollTop = _("shell").scrollHeight;
          _("command").focus();
        }

        if (window.konamicode.DefClick2viewhelp === 1)
        {
          _("click2viewhelp").onclick = function() {
            _("oldtext").innerHTML += `<span style="color:#00ff00;">root@activetk.jp</span>:<span style="color:#0000ff;">` + _("cd").innerText + ` </span>$help<pre spellcheck="false">` + RunCommand("help") + `</pre>`;
            _("shell").scrollTop = _("shell").scrollHeight;
            window.konamicode.DefClick2viewhelp = 0;
          }
        }

        t.preventDefault();
        return false;
      }
      else
        return true;
    });

    window.onerror = function(e) {
      _("oldtext").innerHTML += `<pre spellcheck="false">Fatal Error: ` + e + `</pre>`;
    }

    function RunCommand(command) {

      let com = "", arg = "";
      if ( command.indexOf(' ') != -1)
      {
        com = command.substr(0, command.indexOf(' ')).toLowerCase();
        arg = command.substr(command.indexOf(' ') + 1);
      }
      else
      {
        com = command.toLowerCase();
        arg = "";
      }
      let rbuff = "";

      if (com == "help")
        rbuff = `*****************************************************************************
** Help - ActiveTK.jp
** welCOME to my website!
*****************************************************************************
** $ Get-Tools : 公開しているツールの一覧を表示します。
** $ Get-About : 本サイトの概要を表示します。
** $ Get-License : 利用規約を表示します。
** $ Get-Privacy : プライバシーポリシーを表示します。
** $ Get-Developer : 開発者の情報を表示します。
** $ eval {$js} : 引数のJavaScriptを実行します。
** $ whois {$domain} : 引数のドメインのwhois検索を行います。
** $ curl {$url} : 指定されたURLにHTTPリクエストを送信します。
** $ urlencode {$str} : 引数の文字列をURLエンコードして返します。
** $ urldecode {$str} : 引数のドメインのURLでコードして返します。
** $ clear : コマンドラインを初期状態に戻します。
** $ exit : コマンドラインを終了します。
** $ echo {$str} : 引数の文字列を表示します。
** $ cd {$dir} : 作業ディレクトリを変更します。
** $ base64encode {$str} : 文字列をbase64エンコードします。
** $ base64decode {$str} : 文字列をbase64デコードします。
** $ ping {$domain} : サーバーの応答速度を計測します。
** $ time : 現在時刻を表示します。
** $ nslookup : DNSのlookupを行えます。
** $ nano : エディタを表示します。
** $ pgp : 私のPGP公開鍵を表示します。
** $ endpoint : ブラウザに関する詳細情報を表示します。
*****************************************************************************`;
      else if (com == "")
        rbuff = ``;
      else if (com == "get-tools")
      {
        rbuff = `*****************************************************************************
** Home - ActiveTK.jp
*****************************************************************************
** /tools/urlmin               | URL短縮ツール「rinu.cf」 => URLを貼り付け「短縮」を押すだけで簡単にURLを短縮できます。
** /tools/tokutei              | 位置情報特定ツール => IPアドレスなどを取得できるツールです。
** /tools/whois                | Web Whois => ドメインのwhois参照ができます。
** /tools/qrcode               | QRコード作成ツール => 2次元QRコードを作成できます。
** /tools/webrecorder          | Web Recorder => Web上で音声を録音・ダウンロードできます。
** hackall.cipher.jp           | HackAll => ハッキングデモサイトです。
** /tools/time                 | 簡易現在時刻ビュワー => 画面に大きく現在時刻を表示します。
** /tools/nextip               | NextIP v6 => プライバシー重視のプロキシツールです。
** /tools/markdown             | MarkDown Editor => MarkDownテキストの編集・プレビューが行えます。
** bitcoin.activetk.jp         | Bitcoin関連ツール => 仮想通貨関連のツールです。
** /tools/image                | 画像形式変換ツール => 画像の形式を、「png」から「jpg」のように変更する事ができます。
** /tools/rand                 | 擬似乱数生成ツール => 暗号学的に安全なランダムなパスワード用の文字列を生成できます。
** /tools/justclock            | JustClock => 日時を指定すると、その時刻に音を鳴らします。
** /tools/encrypt              | ファイル暗号化・複合化ツール => ファイルを暗号化・複合化できます。
** /tools/learn                | 【学習用】暗記ツール => 受験生必見！問題を何度も繰り返し解くことができるツールです。
** /tools/copyright            | 著作物利用許可申請書作成ツール => 著作権の利用許可を申請するテキストを作れます。
** file-uploader.cf/           | 匿名ファイル便 v2 => 匿名でファイルをアップロードできます。
** /tools/url-encode           | URLエンコーダー => 指定した文字列をURLエンコードします。
** /tools/url-decode           | URLデコーダー => 指定した文字列をURLデコードします。
** /tools/screenshot           | WebScreenShot => Web上でWebサイトのスクリーンショットを撮影できます。
** /tools/nslookup             | NSLookUP Online => Web上でドメインのDNS参照を行えます。
** /tools/str-count            | 文字数解析 => 指定した文字列の文字数や行数などを表示します。
** tor2web.activetk.jp         | Tor2Web的なやつ => 通常のブラウザから「.onion」ドメインへアクセスできます。
** darkweb-archive.activetk.jp | DarkWeb Archive => ダークウェブ用の魚拓作成ツールです。
** /tools/copyprotect          | Webサイト複製防止スクリプト生成ツール => サイトの無断複製を防止できます。
** /tools/str2oomoji           | 文字列大文字化 => 指定した文字列を大文字にします。
** /tools/str2komoji           | 文字列小文字化 => 指定した文字列を小文字にします。
** /tools/download             | URLダウンロードツール => ファイルを「プレビューせずに」ダウンロードできます。
** /tools/twitter-leaked200    | Twitter Leaked Checker => Twitterアカウントが流出していないか確認できます。
** /tools/hash                 | ハッシュ(md5、sha256、sha364、sha512)計算ツール => 様々な種類のハッシュを計算します。
** /tools/base64-encode        | Base64エンコーダー => 指定した文字列をbase64エンコードします。
** /tools/base64-decode        | Base64デコーダー => 指定した文字列をbase64デコードします。
** /tools/info                 | HTTP情報ビュワー => HTTPヘッダーなどの情報を確認できます。
** /tools/english2leet         | English2Leet => 英語の文字列を、Leetと呼ばれる「ハッカー語」に変換するツールです。
** /tools/leet2english         | Leet2English => Leetと呼ばれる「ハッカー語」の文字列を英語に変換するツールです。
** /tools/paintweb             | ペイントWeb => ページ上で絵を描くことができます。
** /tools/iframe               | Iframe君 => 指定されたページをiframeで表示します。
** /tools/windowsupdate        | Windows Update => WindowsUpdate風のスクリーンセーバーです。
** /tools/ruijyou              | 累乗計算ツール => Web上で累乗の計算を行う事ができるツールです。
** /tools/sin-cos-tan          | sin/cos/tan近似計算ツール => Web上でsin/cos/tanを計算できます。
** /tools/beki-integration     | 冪函数の定積分近似計算ツール => Web上で冪函数の定積分の近似値を計算できます。
*****************************************************************************`;
      }
      else if (com == "get-about")
      {
        rbuff = `*****************************************************************************
** サービス概要 - ActiveTK.jp
*****************************************************************************
**【概要】
** 本サイト「activetk.jp」では、簡単に、安全で、無料で使える便利なツールを提供する事を目標としています。
** 本サイト内の全てのツールは、特に指定が無い場合、全て無料でご利用いただけます。
** また、本サイトは全て安全安心のオープンソースです。
** ソースコードは[https://github.com/ActiveTK/ActiveTKDotJP]からご覧いただけます。
*****************************************************************************
**【沿革】
** 2020/10/24 本サイトを作成、xfreeを使用してactivetk.cfで公開。
** 2020/11/07 SNS用のmetaタグを作成。
** 2020/11/21 全てのURLをa-tk.cfに短縮。
** 2020/12/05 nonceを有効化。
** 2020/12/07 感想フォームを設置。
** 2020/12/26 スパムコメント対策を作成。
** 2021/01/08 はてなブックマークのリンクを作成。
** 2021/03/02 a-tk.jpの短縮リンクを削除。
** 2021/03/23 StarServer(ライト)に移行。https化。
** 2021/04/27 Tor拒否を無効化。感想書き込み時は有効のまま。
** 2021/05/03 一部のリンクをrinu.cfに短縮。
** 2021/06/10 コメントをSQLで管理するように変更。
** 2021/12/27 DDOS攻撃に伴い、アクセスカウンターの方式を変更。
** 2022/01/06 サイトのデザインをかなり変更。
** 2022/03/18 activetk.jpへ移動。UIの大幅な変更。OSS化。
** 2022/04/16 Onion版の「ActiveTK.jp#Onion」を作成。
** 2022/04/30 「ActiveTK.jp」がGoogle アドセンスに合格。
** 2022/08/13 「ActiveTK.jp#Onion」のURLを変更。
** 2022/12/30 「ActiveTK's Note」を作成。
** 2023/03/07 curl版のActiveTK.jpを作成。
*****************************************************************************
**【相互リンク / お勧めのサイト】
** https://rinu.cf/tsumuri   : tsumuri's website : tsumuriさんが作成・更新しているウェブサイトです。
** https://rinu.cf/256server : 256server         : 256大好き!さんが作成・更新しているウェブサイトです。
*****************************************************************************`;
      }
      else if (com == "get-license")
      {
        rbuff = `*****************************************************************************
** 利用規約 - ActiveTK.jp
*****************************************************************************
**【制定】2022年03月19日
*****************************************************************************
**【概要】
** ActiveTK.jpは、簡単に、安全で、無料で使える便利なツールを提供する事を目標とした、インターネット上でのWebツールを提供 するサービスです。
** この理念に基づき、目標を達成するためには、利用者様と我々ActiveTK.jpの開発者の関係や合意事項などについてを明確にする必要があると考えています。
** 本利用規約は、できるだけ分かりやすく、簡単な表現を使用しているので、最後まで目を通していただけると幸いです。
*****************************************************************************
** 第一章 本利用規約について
**   第一条 本利用規約への同意
**     お客様は本Webサイト「ActiveTK.jp」が提供するツール等(以下、本サービスといいます)をご利用いただくにあたり、本利用 規約に全て同意していただく必要があります。
**     本利用規約に全て又は一部同意できない場合には、速やかにタブを閉じてください。
**   第二条 本利用規約の適用の開始
**     本利用規約は日本時間の2022年03月20日00時00分より適用されるものとします。
**   第三条 本利用規約の変更
**     本サービスの管理者は、本利用規約をいつでも改変若しくは削除することのできるものとします。
**     また、管理者が利用規約変更した後に利用者様が再度サービスをご利用される場合には、新しい利用規約に全て同意する必要 があります。
** 第二章 サービスの内容
**   第四条 サービスについて
**     本サービスは、インターネット上での便利なツールを提供するものです。
**     インターネットへ接続できる回線や端末、ブラウザ等はお客様が用意していただく必要がございます。
** 第三章 免責事項及びツールの利用によって発生する責任の所在
**   第五条 利用者の過失による責任
**     利用者様の過失又は故意若しくは悪用によって発生した全ての問題や第三者様とのトラブル、エラーに関する責任に対し、自 己の費用と責任をもってこれを解決するものとし、
**     管理者、開発者並びに開発関係者は一切の責任を負わないものとします。
**   第六条 サービス提供の拒否
**     本サービスによって何等かの問題が発生した場合に、利用者様に重大または故意の過失があった場合や、開発者若しくは開発 関係者が悪質と判断した場合には、
**     利用者様にIPアドレスに基づくアクセス拒否等の手段で、一方的に本サービスのご利用を拒否させていただく可能性がありま す。
**   第七条 サービス停止
**     管理者側の一方的な都合で本サービスの提供を停止した場合や、本利用規約第三章第六条の規定に基づいたサービス提供の拒 否により本サービスご利用できなくなった事によって発生した、
**     全ての問題やトラブル、エラーに関する責任に対し、管理者、開発者並びに開発関係者は一切の責任を負わないものとします 。
**   第八条 本サービスによって得られる情報や電磁的記録などの正確性
**     本サービスの利用によって得られる情報や電磁的記録などは、一部又は全てが正確ではない可能性があります。
**     ただし、管理者及び開発者は常に得られる情報の正確性の向上に努めなければならないものとします。
**   第九条 管理者が被った損害
**     本第三章の規定にもかかわらず、管理者、開発者並びに開発関係者が紛争に巻き込まれ、損失が発生した場合、
**     管理者、開発者並びに開発関係者は利用者様に対してその発生した損失の相当額分の損害賠償請求を行うことができるものと します。
**   第十条 管理者の過失
**     サービス管理者側に著しく利用者様の権利を侵害するような重大な過失があり、利用者様が損失を被った場合の損害賠償請求 額の限度は、
**     その損失と本サービスの関連性について立証が可能な範囲の損失の相当額までとします。
** 第四章 附則事項
**   第十一条 解釈
**     本利用規約は日本法に基づき解釈されるものとし、本サービスに関して訴訟の必要が生じた場合には東京地方裁判所を第一審 の専属的合意管轄裁判所とします。
*****************************************************************************`;
      }
      else if (com == "get-privacy")
      {
        rbuff = `*****************************************************************************
** プライバシーに関する声明 - ActiveTK.jp
*****************************************************************************
**【制定】2022年03月20日
**【改定】2022年04月28日
**【改定】2022年05月03日
*****************************************************************************
** 第一章 本サービスで収集する情報
**   第一条 サービスの提供に伴ってサーバーへアップロードされる情報
**     サービスの提供に伴い、ユーザーが入力したテキストや選択したファイルをサーバーへアップロードして、処理を行う事がご ざいます。
**     これらの情報は、処理並びにユーザーへのサービスの提供が終了した時点で、サーバーから消去する事をお約束します。
**   第二条 Cookieの不使用
**     本サービスは、第三条並びに第四条の規定によるCookieを省いた、一切のCookieを使用しません。
**   第三条 Google社のサービス「Google アナリティクス」
**     本サイトでは、サービスの運営状況の確認や改善を目的に、Google社の提供する、Google アナリティクスを利用しています。
**     Google アナリティクスは、アクセス情報の収集のためにCookieを使用しています。
**     また、この情報は匿名で収集されており、個人を特定するものではありません。
**     詳しい内容については、Google アナリティクスの利用規約並びにプライバシーポリシーをご覧ください。
**   第四条 広告
**     本サイトでは、Google社の広告サービス「Google アドセンス」を利用しています。
**     これにより、Google社などの第三者配信事業者や広告ネットワークがCookieを使用し、アクセス情報などに基づいて広告を配 信する場合があります。
**     また、これらのパーソナライズ広告はGoogle社の広告設定より無効化する事が可能です。
**   第五条 アクセス数カウンター
**     本サイトでは、アクセス数カウンターを設置しています。
**     これにより、アクセス数のカウントを目的としてユーザーのIPアドレス及びアクセス回数の情報がサーバーに保存されますが 、これは個人の特定に利用されるものではありません。
** 第二章 情報の削除
**   第六条 削除の申し立て
**     ユーザーは、管理者に対して、サーバーからアクセスログを省いた自らがアップロードした全てのデータの削除を申し立てる 事ができるものとします。
** 第三章 ユーザーの意思に基づくデータの利用
**   第七条 報告データの利用
**     ユーザーが、バグの報告やエラーページの報告を行った場合には、当該データをサービスの改善に使用させていただきます。
**     なお、バグやエラーの特定を円滑に進めるために、報告を行ったユーザーのIPアドレス、ユーザーエージェント情報及びアク セスしたURLなどのデータを収集する場合がございます。
**   第八条 お問い合わせ
**     本サイトの「お問い合わせページ」でご記入頂いた情報は、サービスの改善に使用させていただきます。
**     また、入力されたメールアドレスが本件お問い合わせ以外に使用される事は絶対にございません。
*****************************************************************************`;
      }
      else if (com == "get-developer")
      {
        rbuff = `*****************************************************************************
** Developer - ActiveTK.jp
** (c) 2023 ActiveTK. <webmaster@activetk.jp>
*****************************************************************************
** $> /Whoami
** 【ActiveTK.】
//    ##       ####   ######    ####    ##   ##  #######  ######   ###  ##
//   ####     ##  ##  # ## #     ##     ##   ##   ##   #  # ## #    ##  ##
//  ##  ##   ##         ##       ##      ## ##    ## #      ##      ## ##
//  ##  ##   ##         ##       ##      ## ##    ####      ##      ####
//  ######   ##         ##       ##       ###     ## #      ##      ## ##
//  ##  ##    ##  ##    ##       ##       ###     ##   #    ##      ##  ##
//  ##  ##     ####    ####     ####       #     #######   ####    ###  ##
**
** サイバーセキュリティやダークウェブなどに興味がある学生です。
** 趣味はプログラミングと法律勉強です。
** 得意な分野はWeb開発からダークウェブの調査やBitcoinの追跡まで多岐に渡ります。
*****************************************************************************
** $> /MySkills
** 内容        | 得意度(☆☆☆☆☆) | 具体例
** Web開発     | ★★★★★        | HTMLやJavaScript、CSSを利用したウェブサイト制作
** バックエンド開発 | ★★★★☆        | PHPでのサーバーサイド構築
** アプリ開発     | ★★★★☆        | C#でのWindowsアプリ(.NET)開発
** SQL管理     | ★★★★☆        | PHPを用いたMySQLのDB操作など
*****************************************************************************
** $> /Works
** 仕事のご依頼は[mailto:webmaster@activetk.jp]までお願い致します。料金やお支払い方法はご相談下さい。
** Webサイトの制作やアプリ開発、Bitcoinの追跡などをお受けできます。
** なお、法執行機関からのご依頼は無償でお受けします。
*****************************************************************************
** $> /Accounts
** Twitter @ActiveTK5929
** Github /ActiveTK
** Mail webmaster@activetk.jp
** Telegram ActiveTK
** Keybase activetk
** Element @psnt00:matrix.org
*****************************************************************************
** $> /PGP
** Moved: https://rinu.cf/pgp
*****************************************************************************
** $> /Donate
** Bitcoin (BTC): 1hackerMy1mcFbMu32ZuiQCvkqQMFnNvX
** Monero (XMR): 47bjXrLZ6WNRPe5UKRVAvyFLGUyZ7xNoUKUZzQKZzyqScRMJZ5oxs6VDaQfqLnUv3hQcqwtJZbuSNTKnNchyHeCv8FYEgCp
** Ethereum (ETH): 0x123456107c4f6304fb6080138aAb8D18b0Ed42E4
*****************************************************************************`;
      }
      else if (com == "eval")
        rbuff = eval(arg);
      else if (com == "urlencode")
        rbuff = encodeURIComponent(arg);
      else if (com == "urldecode")
        rbuff = decodeURIComponent(arg);
      else if (com == "base64encode")
        rbuff = btoa(arg);
      else if (com == "base64decode")
        rbuff = atob(arg);
      else if (com == "sudo")
        rbuff = `Fatal Error: Sudo kenngenn nannte watasite tamaru ka`;
      else if (com == "rm")
        rbuff = `Do not remove my important files without asking!!!`;
      else if (com == "whois")
      {
        fetch('https://www.activetk.jp/tools/whois?whoiswithphp=' + encodeURIComponent(arg))
        .then(r=>{return r.text()})
        .then(t=>{
          _("oldtext").innerHTML += `<span style="color:#00ff00;">root@activetk.jp</span><span style="color:#0000ff;">` + _("cd").innerText + ` </span>$<span>` + command + `</span><pre spellcheck="false">` + t + `</pre>`;
          _("command").innerHTML = "";
          _("command").contenteditable = true;
          _("shell").scrollTop = _("shell").scrollHeight;
          _("command").focus();
        });
        return false;
      }
      else if (com == "curl")
      {
        fetch('https://www.activetk.jp/tools/nextip?withcurl&q=' + encodeURIComponent(btoa(arg)))
        .then(r=>{return r.text()})
        .then(t=>{
          _("oldtext").innerHTML += `<span style="color:#00ff00;">root@activetk.jp</span>:<span style="color:#0000ff;">` + _("cd").innerText + ` </span>$<span>` + command + `</span><pre spellcheck="false">` + t + `</pre>`;
          _("command").innerHTML = "";
          _("command").contenteditable = true;
          _("shell").scrollTop = _("shell").scrollHeight;
          _("command").focus();
        });
        return false;
      }
      else if (com == "nslookup")
      {
        fetch('https://www.activetk.jp/tools/nslookup?withcurl&q=' + encodeURIComponent(btoa(arg)))
        .then(r=>{return r.text()})
        .then(t=>{
          _("oldtext").innerHTML += `<span style="color:#00ff00;">root@activetk.jp</span>:<span style="color:#0000ff;">` + _("cd").innerText + ` </span>$<span>` + command + `</span><pre spellcheck="false">` + t + `</pre>`;
          _("command").innerHTML = "";
          _("command").contenteditable = true;
          _("shell").scrollTop = _("shell").scrollHeight;
          _("command").focus();
        });
        return false;
      }
      else if (com == "exit")
      {
        _("shellmain").innerHTML = `<span style="color:#00ff00;">root@activetk.jp</span>:<span style="color:#0000ff;">` + _("cd").innerText + ` </span>$<span spellcheck="false">` + command + `</span><br><span id="byby"></span>`;
        new Typewriter(_("byby"), {
          loop: false,
          delay: 75,
          autoStart: false,
          cursor: '|',
          strings: ['']
        })
        .start()
        .deleteAll(1)
        .typeString("Bye bye・・・・\n")
        .pauseFor(2000)
        .callFunction(function(){
          _("shell").style = "display:none;";
          window.konamicode.stat == 0;
        });
      }
      else if (com == "clear")
         _("oldtext").innerHTML = "";
      else if (com == "echo")
        rbuff = arg;
      else if (com == "cd")
      {
        if (arg == "")
          return _("cd").innerText;
        _("oldtext").innerHTML += `<span style="color:#00ff00;">root@activetk.jp</span>:<span style="color:#0000ff;">` + _("cd").innerText + `</span> $<span>` + _("command").innerText + `</span><pre spellcheck="false"></pre>`;
        _("command").innerHTML = "";
        _("command").contenteditable = true;
        _("shell").scrollTop = _("shell").scrollHeight;
        _("command").focus();
        _("cd").innerText = new URL(arg, "https://www.activetk.jp" + _("cd").innerText).pathname;
        return false;
      }
      else if (com == "ping")
      {
        window.konamicode.rbuff2 = "";
        var i=0,over_flag=0,time_cumul=0,TIMEOUT_ERROR=0,delta_time=0,fqdn=arg,url;window.konamicode.rbuff2="HTTP ping for "+fqdn+"\n";var ping_loop=setInterval(function(){if(url="https://"+fqdn+"/a30Fkezt_77"+Math.random().toString(36).substring(7),i<5){var e=new XMLHttpRequest;i++,e.seq=i,over_flag++,e.date1=Date.now(),e.timeout=9e3,e.onreadystatechange=function(){4==e.readyState&&0==TIMEOUT_ERROR&&(over_flag--,e.seq>1&&(delta_time=Date.now()-e.date1,time_cumul+=delta_time,window.konamicode.rbuff2+="http_seq="+(e.seq-1)+" time="+delta_time+"ms\n"))},e.ontimeout=function(){TIMEOUT_ERROR=1},e.open("GET",url,!0),e.send()}if(i>4&&over_flag<1){

          _("oldtext").innerHTML += `<span style="color:#00ff00;">root@activetk.jp</span>:<span style="color:#0000ff;">` + _("cd").innerText + ` </span>$<span>` + command + `</span><pre spellcheck="false">` + window.konamicode.rbuff2 + `</pre>`;
          _("command").innerHTML = "";
          _("command").contenteditable = true;
          _("shell").scrollTop = _("shell").scrollHeight;
          _("command").focus();

          clearInterval(ping_loop);var t=Math.round(time_cumul/(i-1));window.konamicode.rbuff2+="\n"+(i-1)+"回の平均応答時間: "+t+"ms\n"}1==TIMEOUT_ERROR&&(clearInterval(ping_loop),window.konamicode.rbuff2+="タイムアウトしました。",

          _("oldtext").innerHTML += `<span style="color:#00ff00;">root@activetk.jp</span>:<span style="color:#0000ff;">` + _("cd").innerText + ` </span>$<span>` + command + `</span><pre spellcheck="false">` + window.konamicode.rbuff2 + `</pre>`,
          _("command").innerHTML = "",
          _("command").contenteditable = true,
          _("shell").scrollTop = _("shell").scrollHeight,
          _("command").focus()

          )},100);
        return false;
      }
      else if (com == "time")
      {
        let e = new Date;
        rbuff = "現在時刻: <span style='color:#33bbff;'>"+e.getFullYear()+"年"+(e.getMonth()+1)+"月"+e.getDate()+"日"+e.getHours()+"時"+e.getMinutes()+"分"+e.getSeconds()+"秒</span>";
      }
      else if (com == "nano" || com == "notepad")
      {
        rbuff = "";
        document.body.innerHTML += `
  <div id="nano" style="position:fixed;top:10%;left:10%;background-color:#708090;color:#ffffff;overflow-x:hidden;overflow-y:visible;height:80%;width:80%;z-index:9;">
    <p>Nano / ActiveTK.jp <input type="button" id="ExitNano" value="Nanoを終了"></p>
    <textarea style="left:2.5%;width:95%;height:75%;" id="nanotextarea"></textarea>
  </div>`;
        _("ExitNano").onclick = function() {
          _("nano").style.display = "none";
        }
        _("nanotextarea").focus();
        window.konamicode.IsNanoOpen = true;
      }
      else if (com == "ls" || com == "dir")
      {
        if (_("cd").innerText == "/")
          rbuff = `/`;
      }
      else if (com == "pgp")
        rbuff = `
-----BEGIN PGP PUBLIC KEY BLOCK-----
Comment: User-ID:	ActiveTK. <webmaster@activetk.jp>
Comment: Created:	2022/03/29 11:13
Comment: Type:	4,096-bit RSA (secret key available)
Comment: Usage:	Signing, Encryption, Certifying User-IDs, SSH Authentication
Comment: Fingerprint:	214430038FE34F3BEC7C128B24319222EC4A45B2


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
Gg==
=yEXf
-----END PGP PUBLIC KEY BLOCK-----`;
      else if (com == "endpoint")
      {
        window.endpointjs(function( result ) {
          setTimeout(function(){InsertTable(result)}, 100);
        });

        function InsertTable(result) {
          let resultbuf = "";
          if (!result.PublicIP)
            setTimeout(function(){InsertTable(result)}, 100);
          else
            for(let key in result) {
              if (typeof result[key] === 'object')
                for(let key2 in result[key])
                  resultbuf += key + "." + key2 + ": " + result[key][key2] + "\n";
              else
                resultbuf += key + ": " + result[key] + "\n";
            }

          _("oldtext").innerHTML += `<span style="color:#00ff00;">root@activetk.jp</span>:<span style="color:#0000ff;">` + _("cd").innerText + ` </span>$<span>` + command + `</span><pre spellcheck="false">` + resultbuf + `</pre>`,
          _("command").innerHTML = "",
          _("command").contenteditable = true,
          _("shell").scrollTop = _("shell").scrollHeight,
          _("command").focus();
        }

        return false;
      }
      else
      {
        rbuff = "No such a command;";
        if (window.konamicode.helpviewed === 0)
        {
          rbuff += "See <span id='click2viewhelp' style='color:#0000ff;'>`help`</span>;";
          window.konamicode.helpviewed = 1;
        }
        window.konamicode.DefClick2viewhelp = 1;
      }

      return rbuff;
    }

    _("command").focus();

    return true;
  }

  window.addEventListener("keydown", (e)=>{
    switch(e.keyCode)
    {
      case 38:
        (window.konamicode.stat === 0 || window.konamicode.stat === 1) && (window.konamicode.stat++);
        break;
      case 40:
        (window.konamicode.stat === 2 || window.konamicode.stat === 3) && (window.konamicode.stat++);
        break;
      case 37:
        (window.konamicode.stat === 4 || window.konamicode.stat === 6) && (window.konamicode.stat++);
        break;
      case 39:
        (window.konamicode.stat === 5 || window.konamicode.stat === 7) && (window.konamicode.stat++);
        break;
      // Shift
      case 16:
        break;
      case 66:
        (window.konamicode.stat === 8 && window.konamicode.stat++);
        break;
      case 65:
        (window.konamicode.stat === 9 && window.konamicode.stat++ && window.konamicode.callback());
        break;
      default:
        break;
    }
  });


}(window));

/*!
 * EndPoint.js
 * Copyright 2023 ActiveTK. All rights reserved.
 * Released under the MIT license
 */

(function(window, undefined) {

  window.endpointjs = function( ...callback ) {

    let result = {};
    result.Browser = {};
    result.Headers = {};

    result.UserAgent = navigator.userAgent;

    // IPアドレス取得
    fetch("https://project.activetk.jp/endpoint/")
    .then(response => response.json())
    .then(data => {
      result.PublicIP = data.PublicIP;
      result.Host = data.Host;
      result.RealIP = data.RealIP;
      result.IsItTor = data.IsItTor;
      result.Headers.UserAgent = data.UserAgent;
      result.Headers.AcceptLanguage = data.AcceptLang;
      result.Headers.AcceptEncoding = data.AcceptEncode;
      result.Headers.UserAgentClientHints = data.UserAgentClientHints;
    })
    .then(() => {
      function end(){
        // WebRTC処理の終了
        getBrowserInfo();
        runCallback();
      }
      // WebRTC
      window.RTCPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
      if(!window.RTCPeerConnection){
        end();
        return;
      }
      let rtc = new RTCPeerConnection({iceServers:[]}), noop = function(){};
      rtc.createDataChannel('');
      rtc.createOffer(rtc.setLocalDescription.bind(rtc), noop);
      rtc.onicecandidate = function(ice) {
        if (ice && ice.candidate && ice.candidate.candidate) {
          result.WebRTCInfo = ice.candidate.candidate;
          try {
            result.PrivateIPaddress = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/.exec(ice.candidate.candidate)[1];
          } catch (e) { }
          rtc.onicecandidate = noop;
        }
      }
      end();
    });
    function getBrowserInfo() {
      // ブラウザについての情報を取得
      result.Browser.CodeName = location.appCodeName;
      result.Browser.Name = navigator.appName;
      result.Browser.Version = navigator.appVersion;
      result.Browser.Language = navigator.language;
      result.Browser.Platform = navigator.platform;
      result.Browser.Referrer = document.referrer;
      result.Browser.ScreenWidth = screen.width;
      result.Browser.ScreenHeight = screen.height;
      result.Browser.ScreenColorDepth = screen.colorDepth + "bit";
      result.Browser.ViewPortWidth  =  window.innerWidth;
      result.Browser.ViewPortHeight  =  window.innerHeight;
      result.Browser.DevicePixelRatio  =  window.devicePixelRatio;
      result.Browser.HasPointer  =  navigator.pointerEnabled;
      result.Browser.MaxTouchPoints  =  navigator.maxTouchPoints;
    }
    function runCallback(){
      // callback実行
      for (let i = 0 ; i < callback.length ; i++)
      {
        if (typeof callback[i] === 'function')
          callback[i](result);
        else
          console.error(i + "番目の引数に関数以外が指定されました。");
      }
    }
  }
}(window));

