/*!
 * EndPoint.js
 * Copyright 2023 ActiveTK. All rights reserved.
 * Released under the MIT license
 */

"use strict";
(function(window, undefined) {

  window.endpointjs = function( ...callback ) {

    let result = {};
    result.Browser = {};
    result.Headers = {};

    // ユーザーエージェント
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
    });

    // WebRTC
    window.RTCPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
    let rtc = new RTCPeerConnection({iceServers:[]}), noop = function(){};
    rtc.createDataChannel('');
    rtc.createOffer(rtc.setLocalDescription.bind(rtc), noop);
    rtc.onicecandidate = function(ice) {
      if (ice && ice.candidate && ice.candidate.candidate) {
        result.WebRTCInfo = ice.candidate.candidate;
        try {
          result.PrivateIPaddress = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/.exec(ice.candidate.candidate)[1];
        } catch { }
        rtc.onicecandidate = noop;
      }
    }

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

    // callback実行
    for (let i = 0 ; i < callback.length ; i++)
    {
      if (typeof callback[i] === 'function')
        callback[i](result);
      else
        console.error(i + "番目の引数に関数以外が指定されました。");
    }

  }

}(window));
