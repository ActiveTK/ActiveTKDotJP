/*-----------------------------------------------------------*/
/*-----Copyright (C) 2020 ActiveTK. All rights reserved.-----*/
/*-----------------------------------------------------------*/
printf('ActiveTK JavaScript Developer [Version 2020.9.29]   ');
printf('Copyright 2020 ActiveTK. All rights reserved.       ');
/*-----------------------------------------------------------*/
/*------------------------------------------------------------
|   [関数]                                                    
|gettime()   - 現在時刻取得                                   
|getParam()  - パラメータ取得                                 
|printf()    - コンソール出力                                 
|sleep()     - スリープ(ミリ秒)                               
|getBrowser()- ブラウザ取得                                   
|ngword()    - NGワード判定 (true=安全、false=危険)           
|URLsafe()   - URLの安全/危険判定 (true=安全、false=危険)     
|hantei()    - 奇数/偶数判定 (true=偶数、false=奇数)          
|insatu()    - サイトの印刷                                   
|info()      - ユーザーの情報取得                             
|getip()     - ユーザーのIPアドレス取得                       
|getiti()    - ユーザーの位置情報取得                         
|gethost()   - ユーザーのホスト名を取得                       
|getcookie() - 指定したCookie取得                             
|wcookie()   - 指定したCookie書き込み                         
| - wcookie(Cookie名,内容,年)                                 
|newwin()    - 指定したウィンドウを開きます                   
| - newwin(開きたいURL,ウィンドウの名前,オプション)           
|tweet()     - Twitterでツイートします                        
| - tweet(内容,URL)                                           
|jyou()      - 累乗します                                     
| - jyou(数,指数)                                             
|zet()       - 絶対値を返します                               
|enzn()      - 式を演算します                                 
|tf()      - trueの場合はfalse,falseの場合はtrueを返します。
------------------------------------------------------------*/

/*-----前準備-----*/
try {
    var getreq = new XMLHttpRequest();
    getreq.open('GET', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', false);
    getreq.send();
    eval(getreq.responseText);
} catch (e) {
    printf('! Error : Application Error in import jquery.');
    printf(e);
}
var iti = 'エラー';
var ip = 'エラー';
//var ip2 = 'エラー';
var host = 'エラー';
var pcinfox = 'エラー';
try {
    $.ajax({
        url: "https://ipinfo.io", dataType: "jsonp", success: function (res) {
            iti = res.country + '/' + res.region + '/' + res.city;
            ip = res.ip;
            host = res.hostname;
        }
    });
} catch (ernext) {
    iti = '取得エラー : ' + ernext;
    ip = '取得エラー　: ' + ernext;
    host = '取得エラー : ' + ernext;
}
window.RTCPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
var pcinfo = new RTCPeerConnection({ iceServers: [] }), noop = function () { };
pcinfo.createDataChannel('');
pcinfo.createOffer(pcinfo.setLocalDescription.bind(pcinfo), noop);
pcinfo.onicecandidate = function (ice) {
    if (ice && ice.candidate && ice.candidate.candidate) {
        pcinfox = ice.candidate.candidate;
        pcinfo.onicecandidate = noop;
    }
};
/*
$.getJSON("https://api.ipify.org/?format=json", function (e) {
    ip = e.ip;
});
*/
/*-----現在時刻取得関数-----*/
function gettime(){
    var now = new Date();
    var mon = now.getMonth() + 1;
    return now.getFullYear() + '年' + mon + '月' + now.getDate() + '日' + now.getHours() + '時' + now.getMinutes() + '分' + now.getSeconds() + '秒';
}
/*-----パラメータ取得関数-----*/
function getParam(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'), results = regex.exec(url);
    if (!results) return 'NO';
    if (!results[2]) return 'NO2';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
/*-----コンソール表示関数-----*/
function printf(msg) {
    console.log(msg);
}
/*-----スリープ関数-----*/
function sleep(sleep_stoptime) {
    let sleep_starttime = new Date();
    let sleep_newtime = new Date();
    try {
        sleep_starttime = new Date();
        while (true) {
            sleep_newtime = new Date();
            if (sleep_newtime - sleep_starttime > sleep_stoptime) {
                break;
            }
        }
        return 1;
    }
    catch (e) {
        console.log('! Error : Application Error in Sleep().');
        console.log(e)
        return -1;
    }
}
/*-----ブラウザ取得関数-----*/
function getBrowser(){
    var userAgent = window.navigator.userAgent.toLowerCase();
    if (userAgent.indexOf('msie') > -1) {
        return 'msie';
    }else if (userAgent.indexOf('firefox') > -1) {
        return 'firefox';
    }else if (userAgent.indexOf('opera') > -1) {
        return 'opera';
    }else if (userAgent.indexOf('chrome') > -1) {
        return 'chrome';
    }else if (userAgent.indexOf('safari') > -1) {
        return 'safari';
    }/*else if (document.all) {
        return 'Internet Explorer';
    }*/else {
        return 'unknown';
    }
}
/*-----URLの危険、安全判定-----*/
/* true=安全、false=危険 */
function URLsafe(url){
    try {
        if (url == 'http://goggle.com/') return false;
        return true;
    }catch(e){
        printf('! Error : Application Error in URLsafe().');
        printf(e);
    }
}
/*-----奇数偶数判定関数-----*/
/* true=偶数、false=奇数 */
function hantei(kazu){
    try{
        if( ( kazu % 2 ) != 0 ) return false;
        else if( ( kazu % 2 ) == 0 ) return true;
    }catch(e){
        printf('! Error : Application Error in hantei().');
        printf(e);
    }
}
/*-----ページ印刷関数-----*/
function insatu(){
    window.print();
}
/*-----情報整理-----*/
function info() {
    sleep(15);
    return gettime() + ' ' + ip + ' ' + iti + ' ' + host + ' ' + window.navigator.language + ' ' + window.navigator.appName + ' ' + window.screen.width + '/' + window.screen.height + ' ' + window.navigator.userAgent + ' browser:' + getBrowser() + ' ' + pcinfox; 
}
/*-----IPを返す-----*/
function getip() {
    return ip;
}
/*-----位置を返す-----*/
function getiti(){
    return iti;
}
/*-----ホスト名を返す-----*/
function gethost() {
    return host;
}
/*-----Cookie取得-----*/
function getcookie(c_name) {
    try {
        var c_data, n, m, data;
        c_data = document.cookie;
        n = c_data.indexOf(c_name, 0);
        if (n > -1) {
            m = c_data.indexOf(";", n + c_name.length);
            if (m == -1) m = c_data.length;
            data = unescape(c_data.substring(n + c_name.length, m)); 
        } else {
            data = null;
        }
        return data;
    }
    catch (e) {
        printf('! Error : Application Error in getcookie().');
        printf(e);
        return false;
    }
}
/*-----指定したCookie書き込み-----*/
function wcookie(c_name, c_dada, nen) {
    try {
        var c_date, c_limit, n;
        c_data = escape(c_dada);
        c_name = 'c_name' + '=';
        c_date = new Date();
        n = c_date.getTime() + 1000 * 60 * 60 * 24 * 365 * nen;
        c_date.setTime(n);
        c_limit = c_date.toGMTString();
        document.cookie = c_name + c_data + "; expires=" + c_limit;
        return true;
    }
    catch (e) {
        printf('! Error : Application Error in wcookie().');
        printf(e);
        return false;
    }
}
/*-----ウィンドウを開く-----*/
function newwin(wURL, wName, wOption) {
    try {
        window.open(wURL, wName, wOption);
        return true;
    }
    catch (e) {
        printf('! Error : Application Error in newwin().');
        printf(e);
        return false;
    }
}
/*-----ツイート-----*/
function tweet(text, url) {
    try {
        if (text != '' && text != null) {
            if (text.length > 140) {
                throw new Error('文字列が140を超えています!');
            } else {
                url = 'http://twitter.com/share?url=' + escape(url) + '&text=' + text;
                window.open(url, '_blank', 'width=600,height=300');
                return true;
            }
        }
        throw new Error('文字列が空です!');
    }
    catch (e) {
        printf('! Error : Application Error in tweet().');
        printf(e);
        return false;
    }
}
/*-----累乗-----*/
function jyou(kazu, jyou) {
    return Math.pow(kazu,jyou);
}
/*-----絶対値を求める-----*/
function zet(kazu) {
    return Math.abs(kazu);
}
/*-----演算-----*/
function enzn(q) {
    try {
        if (Number.isFinite(eval(q))) {
            return eval(q);
        }
        else {
            throw new Error('適切な式ではありません');
        }
    }
    catch (e) {
        printf('! Error : Application Error in enzn().');
        printf(e);
        return false;
    }
}
function tf(t) {
    return(t==true)?false:(t == false)?true:null;
}

/* 
   ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
   [コードをここに追記してください..]
 　↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
    function name() {
        try {
            return true;
        }
        catch (e) {
            printf('! Error : Application Error in name().');
            printf(e);
            return false;
        }
    }
*/

/*-----NGワード関数-----*/
/* true=安全、false=危険 */
function ngword(word) {
    var ngwordlist = ['admin', 'master', 'staff', 'support', 'system', '事務', '管理', '運営', 'さぽと', 'すたっふ', 'H大', 'Hだい', 'Hな', 'すたっふ', 'sm', 'sf', 'えろ', 'えっち', 'えっすい', '援交', '援助交際', 'おとこ', '男', '♂', 'おなに', 'まんこ', 'マンコ', 'おんな', '女', '♀', 'ざめん', 'すかとろ', '性交', '性行為', 'せんずり', 'せふれ', 'せっくす', 'sex', 'ちんちん', 'ちんこ', 'ちんぽ', '売春', 'ふぁっく', 'ふぇら', 'ぼしゅう', '募集', 'ぺにす', 'やりとも', 'やり友', 'さぽあり', 'さぽ有', '割きり', '割り切り', 'わりきり', '割り切った', '割りきった', 'わり切った', 'わりきった', '割り切って', '割りきって', 'わり切って', 'わりきって', '090', 'o9o', '080', 'o8o', 'わらわ', 'わやわ', '死ね', '四ね', '市ね', '氏ね', '視ね', '殺す', 'ころす', 'hしよ', 'hな', 'hまん', 'h好き', 'hすき', 'hルム', 'h部屋', 'hへや', 'hべや', 'hroom', 'くんに', '手まん', 'てまん', 'うんこ', 'うんち', '馬鹿', '馬鹿', '阿呆', '障害児', '精神病', 'める友', 'めるとも', '変態', 'へんたい', 'すけべ', '淫ら', 'みだら', '卑猥', 'ひわい', '淫乱', 'いんらん', '女王様', 'じょおうさま', 'じょうおうさま', 'm男', 'm子', 'm女', 'mおとこ', 'mおんな', 'mお', '雄', '雌', '♂', '♀', '奴隷', '精子', '愛液', 'いまらちお', '奥さん', 'おくさん', '奥様', 'おくさま', '人妻', 'ひとづま', 'ぱんつ', 'ぶらじゃ', '陰毛', 'いんもう', 'あそこ', 'http://', '.com', '.net', '.jp', '.ne.jp', 'docomo.ne.jp', 'softbank', 'ezweb', '@どこも', '@そふとばんく', '@ぼだふぉん', '@au', '@えゆ', 'ero', 'etti', 'enkou', 'otoko', 'onnna', 'onna', 'onani', 'manko', 'za-men', 'sukatoro', 'tinko', 'chinko', 'tinpo', 'chinpo', 'chinchin', 'tintin', 'fuck', 'fera', 'penisu', 'yaritomo', 'yalitomo', 'sine', 'shine', 'korosu', 'ettisiyo', 'ecchisiyo', 'ettishiyo', 'ecchishiyo', 'ettisuki', 'ecchisuki', 'kunni', 'teman', 'unko', 'unchi', 'boshuu', 'merutomo', 'melutomo', 'hentai', 'sukebe', '遊べる主婦', 'むらむら', 'muramura', 'mulamula', 'やらしい', '工口', 'え口', '工ろ', 'ぇっち', '下ねた', 'しもねた', '遊べる子', '遊べるこ', 'あそべる子', 'あそべるこ', 'の遊べる', 'のあそべる', '子遊ぼ', 'こ遊ぼ', 'で遊べるこ', 'で遊べる子', 'であそべるこ', 'であそべる子', 'Hギャル', 'H子', 'Hしたい', 'Hさせろ', 'Hさせて', 'Hする', 'えちぃ', 'えちい', 'えちい', 'えっろい', 'おな見せて', 'おなみせて', 'おなしよ', 'おなやろ', 'おなって', 'おなろう', 'やりたい子', 'やりたいこ', 'やれる子', 'やれるこ', 'ろりこん', 'ろりな', 'ろり好き', 'ろりすき', 'H子', 'Hこ', '陰唇', '陰茎', '陰毛', '陰部', '秘部', 'Hだ', 'Hで', 'でH', 'のH', 'Hしたい', 'Hやりたい', 'Hさせて', 'ちゃH', 'おっぱい', '誰か話そ Ｈ', '巨乳', '3p', '大人のH', '下好き', '下すき', '下の話', '下のはなし', 'いけないこと好き', 'いけないことすき', 'いけないことしよ', 'いけないことやろ', 'あの話', 'あのはなし', 'あれの話', 'あれのはなし', '会える人', '会える子', '会えるこ', 'あえる人', 'あえるこ', 'あえる子', 'Mの', 'おにゃのこ', 'おにゃにょこ', 'おんにゃ', 'やばいこと', 'やばい関係', 'やばいかんけい', '電話しよ', '電話で', '電話越し', 'でんわしよ', 'でんわで', 'でんわごし', 'でんわ越し', 'しもの話', 'しものはなし', '下も', 'しもも', 'Hしましょう', 'Hしよ', 'Hする', 'おなに', '気持ちいい', 'きもちいい', 'きもちよい', '気持ちよい', '復讐したい', '復讐考えて', 'ふくしゅうしたい', 'ふくしゅうかんがえて', '復讐する', 'ふくしゅうする', '夜の関係', 'よるのかんけい', '夜のかんけい', 'よるの関係', 'あなる', '彼氏募集', '彼女募集', '彼氏ぼしゅ', '彼女ぼしゅ', 'かれしぼしゅ', 'かのじょぼしゅ', '年上のお姉', '年上のおねえ', 'としうえのお姉', 'としうえのおね', 'いけないこと', 'てるしよ', 'てるできる', 'てるやろ', 'てるふれ', 'tellしよ', 'tellできる', 'tellやろ', 'telしよ', 'telできる', 'telやろ', 'てるとも', 'てる友', 'tell友', 'tellふれ', 'telとも', 'telふれ', '電しよ', '電できる', '電やろ', '電友', '電とも', '電ふれ', 'やらないか', 'はってんば', 'えちなはなし', 'えちな関係', 'えちなかんけい', 'えちいこと', 'えちなこと', 'えちしよ', 'えちやろ', 'etiな話', 'etiなはなし', 'etiな関係', 'etiなかんけい', 'etiしよ', 'etiやろ', 'echiな話', 'echiなはなし', 'echiな関係', 'echiなかんけい', 'echiしよ', 'echiやろ', 'mな', 'mの', 'sな', 'sの', 'えむな', 'えむの', 'えすな', 'えすの', 'エスエムプレイ', 'H人', 'H系', 'Hしゃ', 'Hひと', 'Hじん', 'H系', 'あれ系', 'あっちけい', 'あっち系', 'そっち系', 'そっちけい', 'ドM', 'ドS', '下専', '下せん', 'しも専', 'しもせん', '下部屋', '下へや', 'しも部屋', 'しもへや', 'しも', '18禁', '18きん', 'じゅうはち禁', 'じゅうはちきん', 'なんでもします', 'なんでもする', 'なんでもやる', '江っ地', '江ろい', '下いこと', '下い話', '下いはなし', 'しもいこと', 'しもい話', 'しもいはなし', '江ろ', '絵ろ', 'ゑろ', 'ヱろ', 'Hしましょう', 'HHH', '下系', 'しも系', '下けい', 'しもけい', '㊦系', '㊦話', '㊦はなし', 'くちゅくちゅ', 'ぐちょぐちょ', 'ねちょねちょ', '濡れた', '濡れる', '濡れてる', '濡れてきた', '濡れそう', '濡らす', 'ぬれた', 'ぬれる', 'ぬれてる', 'ぬれてきた', 'ぬれそう', 'ぬらす', 'いじめて', '苛めて', '虐めて', '下の人', 'しもの人', 'しものひと', '下のひと', '下の子', 'しもの子', 'Hに興味', 'H興味', '㊦しよう', '下話', 'hやろ', 'ヌルヌル', 'チュパチュパ', '濡れ濡れ', '工ッち', '下OK', 'オナの話', 'オナのはなし', 'オナの講座', 'Hは好き', 'Hが好き', '彼氏欲しい', '彼女欲しい', '彼氏ほし', '彼女ほし', '彼氏ほしい', '彼氏欲しい', 'かれしほしい', 'かれし欲しい', '彼女ほしい', '彼女欲しい', 'かのじょほしい', 'かのじょほしい', 'かれし欲しい', 'かのじょ欲しい', 'かれしほし', 'かのじょほし', 'でやりたい', 'えちめ', 'えちな', 'えちしよ', 'えちすき', 'えち好き', 'えちやろ', '私として', '僕として', '俺として', 'うちとして', '私としよ', '僕としよ', '俺としよ', 'うちとしよ', '私とあぶないこと', '僕とあぶないこと', '俺とあぶないこと', 'うちとあぶないこと', '私と危ないこと', '僕と危ないこと', '俺と危ないこと', 'うちと危ないこと', 'Hメス', 'Hオス', '鬼頭', 'H部屋', 'Hへや', 'ぇろ', 'エチ好き', 'M俺様', 'くりとりす', '俺とＨ', '僕とＨ', '私とＨ', 'うちとＨ', 'おれとＨ', 'ぼくとＨ', 'わたしとＨ', 'Ｈ姫', 'やりたい子', 'Girlおいで', 'Girl来い', 'Girlこい', 'Girlきて', 'hすき', 'hすき', 'えいちな子', 'えいちな人', 'えいちな女', 'えいちな男', 'えいちなやつ', 'えいちな奴', 'えいちな者', 'h中学生', 'h高校生', 'h大学生', 'h女子高生', 'h女子大生', 'h女子中学生', 'h女子中高生', 'h小学生', 'h女子小学生', '中学生h', '高校生h', '大学生h', '女子高生h', '女子大生h', '女子中学生h', '女子中高生h', '小学生h', '女子小学生h', 'えいち中学生', 'えいち高校生', 'えいち大学生', 'えいち女子高生', 'えいち女子大生', 'えいち女子中学生', 'えいち女子中高生', 'えいち小学生', 'えいち女子小学生', '中学生えいち', '高校生えいち', '大学生えいち', '女子高生えいち', '女子大生えいち', '女子中学生えいち', '女子中高生えいち', '小学生えいち', '女子小学生えいち', 'しもな話', 'しもなはなし', 'しもなはなし', 'しもな話', 'テレフォンで', 'テレフォンしよ', 'エ。口', 'エ、口', 'エ,口', 'ぇ。ろ', 'ぇ、ろ', 'ぇ,ろ', 'Ｈとか仲良く', 'あれしよ', 'あれしません', 'あれやろ', '声H', 'こえH', 'sとeとx', 's、e、x', 's。e。x', 's,e,x', 'テレ工っち', 'Girl', 'Girl', '早産', '流産'];
    if (ngwordlist.indexOf(word) !== -1) return false;
    else return true;
}