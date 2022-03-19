/*!
 * pcinfo.js
 * Copyright 2020 ActiveTK. All rights reserved.
 * Released under the MIT license
 * http://ActiveTK.CF/ActiveTK.JS/readme.txt
 */

window.RTCPeerConnection=window.RTCPeerConnection||window.mozRTCPeerConnection||window.webkitRTCPeerConnection;var pcinfo=new RTCPeerConnection({iceServers:[]}),noop=function(){};pcinfo.createDataChannel(""),pcinfo.createOffer(pcinfo.setLocalDescription.bind(pcinfo),noop),pcinfo.onicecandidate=function(n){n&&n.candidate&&n.candidate.candidate&&(pcinfox=n.candidate.candidate,pcinfo.onicecandidate=noop)};