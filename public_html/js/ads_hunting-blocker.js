/*!
 * ads_hunting-blocker.js
 * Protect Your AdSense Account from Ads Hunters.
 * (c) 2022 ActiveTK. <+activetk.jp>
 * Released under the MIT license
 */

  window.ahb = {};

  // 広告のクリック回数
  window.ahb.ClickCount = 0;

  // 広告のクリック制限回数
  window.ahb.ClickCountMax = 5;

  // リセットのインターバル(秒で指定)
  // 例えば、 60 * 60 * 24 * 3であれば3日間保持
  window.ahb.ResetInterval = 60 * 60 * 24 * 3;

  // 広告のクリック回数をCookieから取得
  window.ahb.GetClickCount = function()
  {
    for(var c of document.cookie.split(';')) {
      var s = c.split('=');
      if( s[0] == 'cc')
        return (s[1] * 1);
    }
  }

  // 広告のクリック回数をCookieに保存
  window.ahb.SaveClickCount = function()
  {
    document.cookie = "ahb=" + window.ahb.ClickCount + ";max-age=" + window.ahb.ResetInterval;
  }

  // 広告のクリック回数が制限回数を超えていた場合に「広告非表示パラメータ」を付与してリダイレクト
  window.ahb.CheckClick = function()
  {
    if (window.ahb.ClickCount > window.ahb.ClickCountMax)
    {
      var url = new URL(window.location.href);
      if (url.searchParams.get("ahb") != "r")
      {
        url.searchParams.append('ahb','r');
	window.location.href = url;
      }
    }
  }

  // 読み込み時に広告のクリック回数を取得し制限範囲かチェック
  window.ahb.GetClickCount();
  window.ahb.CheckClick();

  // クリックを検知
  window.addEventListener('DOMContentLoaded', function() {

    setTimeout(function(){
      $('#aswift_1').iframeTracker({
        blurCallback: function(event) {
          window.ahb.ClickCount++;
          window.ahb.SaveClickCount();
          window.ahb.CheckClick();
        }
      });
    }, 5000);

  });
