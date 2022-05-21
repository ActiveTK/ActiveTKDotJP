/*!
 * ads_hunting-blocker.js
 * Protect Your AdSense Account from Ads Hunters.
 * (c) 2022 ActiveTK. <+activetk.jp>
 * Released under the MIT license
 */

  window.ahb = {};

  // �L���̃N���b�N��
  window.ahb.ClickCount = 0;

  // �L���̃N���b�N������
  window.ahb.ClickCountMax = 5;

  // ���Z�b�g�̃C���^�[�o��(�b�Ŏw��)
  // �Ⴆ�΁A 60 * 60 * 24 * 3�ł����3���ԕێ�
  window.ahb.ResetInterval = 60 * 60 * 24 * 3;

  // �L���̃N���b�N�񐔂�Cookie����擾
  window.ahb.GetClickCount = function()
  {
    for(var c of document.cookie.split(';')) {
      var s = c.split('=');
      if( s[0] == 'cc')
        return (s[1] * 1);
    }
  }

  // �L���̃N���b�N�񐔂�Cookie�ɕۑ�
  window.ahb.SaveClickCount = function()
  {
    document.cookie = "ahb=" + window.ahb.ClickCount + ";max-age=" + window.ahb.ResetInterval;
  }

  // �L���̃N���b�N�񐔂������񐔂𒴂��Ă����ꍇ�Ɂu�L����\���p�����[�^�v��t�^���ă��_�C���N�g
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

  // �ǂݍ��ݎ��ɍL���̃N���b�N�񐔂��擾�������͈͂��`�F�b�N
  window.ahb.GetClickCount();
  window.ahb.CheckClick();

  // �N���b�N�����m
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
