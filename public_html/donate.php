<?php

  define( "Title", "寄付" );

?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="ActiveTK,activetk.jp,WEBツール,HackAll,位置情報特定ツール,IPアドレス特定博士">
    <title><?=Title?> | ActiveTK.jp</title>
    <meta name="author" content="ActiveTK.">
    <meta name="robots" content="All">
    <meta name="favicon" content="https://www.activetk.jp/icon/index_32_32.ico">
    <meta name="description" content="<?=$dec?>">
    <meta name="copyright" content="Copyright &copy; 2020-2022 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="https://www.activetk.jp/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ActiveTK5929">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="<?=Title?> | ActiveTK.jp">
    <meta name="twitter:description" content="<?=$dec?>">
    <meta name="twitter:image:src" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:title" content="<?=Title?> | ActiveTK.jp">
    <meta property="og:description" content="<?=$dec?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.activetk.jp/">
    <meta property="og:site_name" content="<?=Title?> | ActiveTK.jp">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="https://www.activetk.jp/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="https://www.activetk.jp/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://www.activetk.jp/icon/index_150_150.ico">
    <link href="https://www.activetk.jp/css/index.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>a{color:#00ff00;position:relative;display:inline-block;transition:.3s;}a::after{position:absolute;bottom:0;left:50%;content:'';width:0;height:2px;background-color:#31aae2;transition:.3s;transform:translateX(-50%);}a:hover::after{width:100%;}</style>
    <?=Get_Default()?>
    <script type="text/javascript" src="https://code.activetk.jp/ActiveTK.min.js" charset="UTF-8" nonce="<?=$nonce?>"></script>
    <script nonce="<?=$nonce?>">
    
      window.onload = function() {
        _("copyadd").onclick = function() {
          atk.copy(_("bitadd").innerText);
          _("copied").innerText = "コピーしました！";
        }
        _("copymon").onclick = function() {
          atk.copy(_("monadd").innerText);
          _("copied2").innerText = "コピーしました！";
        }
      }

    </script>
  </head>
  <body style="background-color:#e6e6fa;">
    <noscript>
      <div title="NO SCRIPT ERROR" style="background-color:#404ff0;color:#ff4500;" align="center">
        <h1>No JavaScript Error.</h1>
      </div>
    </noscript>
    <?=Get_Header()?>
    <div align="center" class="mainobject" style="position:fixed;overflow:scroll;color:#000000;z-index:1;top:12%;left:0px;width:100%;height:88%;">
      <br>
      <h1>寄付 - ActiveTK.jp</h1>
      <br>
      <p>本サイトでは、全てのサービスを無料で提供しているため、サーバー費用やドメイン料金が赤字となっています。</p>
      <p>サービスを無料で提供し続けるために、寄付をしていただけると幸いです。</p>
      <br>
      <hr>
      <h2>Bitcoin (BTC)</h2>
      <img style="width:200px;height:200px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAYAAABccqhmAAAAAXNSR0IArs4c6QAAGMZJREFUeF7tneF24zoIhLfv/9C9x7mn6XZtC/GZIXI6+9dCwDCMkJNmP/78+fP558b/Pj97w//4+GhFi+Y3ivNsT2ITgaHYM/J59lwRSzcfaO6nmFgAcpB2F9wCkKvPaLUFYI/Odpz1HqF19XzsRBuEhmEByCGnaLpcBN+rFbF084Hm7gmgCLnuglOBI2QnNhGsij0jn74CzCPkCWAeq8dKC0AOMAtADq/u1RaAJOIWgBxgFoAcXt2rLQBJxC0AOcAsADm8ulcPBYDePxVJnBFpFONKzdrdCNX+KJYrcUjxCQHhpaI/aG4WgMJqUDFSNIkFIFdYipcFIIczXk2ApqcWDdICsEdOIW60PvSUJHVdKe9RH3gCKGQTIcrmXkEWeqKRj9BGECpyKyzZcyuKFzmYFPFTcbMAFFbDAuAJ4AuBlYTPE0Bhk9PTjp4wNPRqf/Q6tVIj0FOSCPtKeVsAaBcl7QhRfAVIgixaTgXz114B6IlQfYLSphPx6HRbeiJ049yNS/U7B0X8hGPE5krs1B9+B9BNTKK0ihhpkSwAOeTuUrtVeGkBOODXXUhE76a5lvpeTcWI+iN2d6mdBYBU98SGqBixKQx5eivadIpGoLFMJ1uwUJE3DYtwjNjQ+KL3SJKXgIoCEdCIzRWgqS1tum6caX7Vdoq8aYyEY8SGxmcBOEHuLiTyFWCPwF1q5yvAFdn6x5aoJrEpDHl6K08A01A9FloAcnjRPvi1nwIoGpLumSv1a1ZXf04eja00y+44PQHQSh3YERUjNlfIRwlWCNNLtqJ5UzuaJPVXbUd5SfOm/jwBJBGnREm6WW45zZvaUQCov2o72pA0b+rPApBEnBIl6Wa55TRvakcBoP6q7WhD0rypPwtAEnFKlKSb5ZbTvKkdBYD6q7ajDUnzpv4sAEnEKVGSbpZbTvOmdhQA6q/ajjYkzZv6swAkEadESbpZbjnNm9pRAKi/ajvakDRv6u/XCkA30Ap/oz1HhCax0I84aRzUH8lts7EAHCBHVYUWgfgjNjS+zW4lfxaAK5X8aWsBsABMsckCMAXTc5EngD1eFJMR8pSXvgLk+OwJIIkXJbuvADmgLQAHeFHyKZQ2V87v1bQRqnPvjoP6ozj7CuArwBR3qNJObZ6sgd8BUFRzYzmpObG5kg315ytAEnUKdNLNczk9CT0B5BD3BFB4+uSgn1t9ViDakIrGonvSk7zaX3UTRJWtjn/zR3OIYj17TnhJfVG7ESZ4AqDBUDsCtIIMij0tAJQVdaM8jYDwkvqidhaAwunGApBruhFpPQHQls7ZWQAsAFOMoeJG3zdYAKbKcnmRBcACMEUiC8AUTD8W+QqQxwxZEKApoVe5k3e/1KJ4eQLYM0Yx3aDGCV6M+iVgElXaJEk3z+Wd/qgvC8CbCgAlbaed4mNARSPcIc47xLhx6y5xdvYB9TWcAOimnXZ3IcMd4rxDjBaA2u6yABzg6Qkg91GfhaO2KTt3swBYAJ4IuJGPW4/i0tnI1JcFwAJgAbjwFWL6ApQ2bLWdBcACYAH4zQLwudIHltXyNthPodx0VOy2IzDTGImvyIZSltac+ovyWOH5hwWgrgy0SbrtSMY0RuIrsqENaQE4eLlrAYjoNv+cNkm33XxG3ytpjMRXZGMBiBCaf+4JYB6rcCVtkm67MJGDBTRG4iuysQBECM0/twDMYxWupE3SbRcmYgH4gQAVHIJzt40FoBDx7kam/kjKnb6i+GhD+h2A3wE8EaBkGJGTNkm3XdRgR89pjMRXZGMBiBCaf44nAPp12VFoiqY880dJROPv9jdPgbmVVAAUeStqQLl3lh/db64auVXD2tFPASwAB+PUx/a9quN/ikboJJkFIFfXztpEcmABSL7UigA9e64QRXra0RyIgHXnTTGhIkaufRYAwMBO0LpP5G5/AP6hCW0eRd4WgFx1PQF4AsgxJomXJ4DcdfByMZIbWACShE7i+1ze3QirTEzdeXsCyDHUAmAByDEmiZcF4MYTwPYTa4QdirsdIRI9BbvvtN1xkhdXK52shJORDa05wZJwOYqfcmhYVwtATr2p8NHidZLWAhC14P45+R5AN4csAAuMtBaAfHNVW3SKqScAUD0CWndjdat3J2k9AeRJ6wkgj9mphQVgfsTcVirE76w4pDZXYiyk1XOrTjGleFERpnjh3wSkJyFNkCgteXkTkZbmrWhWxZ4WgFwrEV52c8jvAPwO4AcChID0RKMilWvDudWeAA5eeI8+BegELCrhGZEUMUaxkOek6SI/tCmjfSufd8e4kuBU4rjtRTk0wgT/56AU6OokLADHNKM4V5PWAlCHKK2pBaCuBngnWrzqdyY4AWhoAYDAJa+tlCeeAOrqM9zJArCHpxuTplLL3FC8PAHISjK/MS0eVXaFv/lsv1d6AiCo1V7rLAB1NcA7KRqyu7lI8t0x0ndTJLduG8ohC0B3pQrvb54AcsWzAOzxGgrA6DcBKZgKper8wgVtupEd/bSC2uXaRrdaEb+CXzoEet59UM4OfxXYApBTUwtAjuwr8csCcIDASgXyBFAnRquQfSV+rYKJIg5fAQpRVZCWviijsRTCEW7lK0BuKgoBBQssAAC0MxPadLQRqF1hype2UsTvdwC5klgAcngNV1sAcmBaADwBTDOGjMLEZjqgpvciNAcqRlfyz9paABYXAPqbgFkifK2vHt8owarjiPCg/kb7UgGojmWVODasumMh/qrxj/Ie9ogFIGrdn89Jwbcduos+yqo6lt+MCcm9Gn8LwAnb6Wh9h1M3KroFICfstCktADmc8Ul4BrSvAMkCCKYR0gTvMhWR3KnY0IPJV4AD5GgRSMHfhexnBPzNmJDcKfcsAMlG9hXgmDLVBCRN8C6iSHKvxj+6DnoCSAoHVdrOe3dU9M5YSBNYAPJXN8pLiQB0371XGT+7yd7pj/qqpXK8m4J7dFokmHVPAEPhoB8DKooQl36/ghTgyunzzv5obqRuV2wU3LMAJCuiKEIyhMdySlqqwu/sj+ZG6nbFRsE9C0CyIooiJEOwAAwAIwJnAci/NCWYkdpEvUHieBygvgJE0P58ToGmRe/0R33lELy+WnH4eAJI1kVRhGQIngA8AewQUDQy5fpZeehhMHyZ97Gd5fl/ngCSmNFTkha90x/1lYTw8nLakN12txCA0Y+CUsXpJDv1RXMb2XXHQv2dNTrd73JHF25ARYyKAwmd+qL1GWEy/FFQ2iSKQO+gpjTvVXBWxE8a5IqNBWCPngUgySgFiZIhPJfTOy0RFQvAMWqUD+TQ6qz3Fp8ngIMq0YIrGqiTEIr4qfBRO0Xt6J4WgGQVCdAK0pI4tlS7Y6H+/A5gT0x6L09S/LGc+qqutyeAk+pZAAit17BR1I7u6QkgyQkCNFVFckeO0umOhfrzBOAJ4AuBpb4HQO67RDRUY5giFoVQRUJ29JyKDY2f+iMcIng8Gwh+AYf4VGBiAUi+BKT3t1HBFYUlBFPEaAGoq4SCJxYAC8AUQyn5LABT8E4tojUYfg9gpT8GIuObYuwmcTzeqMJxUFHYKUYlFtEYLQAJkIOltAYWgANg6ShP7RTjNRUcQklKPgsAQfvYhtbAAmABuMxCSj4LwGXonxvQGlgALACXWUjJZwG4DP3rBEAx7tbB8f9OlJid4/NqcVLMSO0UONP4aSykD4hNhK9iz+GnAAqHUZLZ591kyMb3tX6lOGksJHfadCu9MyF9QGwifBV7WgAi1Iue06ZbqYEIFCvFT2MhjUdsInwVe1oAItSLnlsAioB8wbWPNB6xiRBS7GkBiFAvem4BKALSAnAIJJ1uLAB1vBzuZAGoA7obS3LyEpsIIcWeFoAI9aLn3aRVvEQjUNCTSRE/jYU0HrGJ8FXsOfxFIAoYLR75Ci6NUQFmVEDynMZJ7c5ipAI2ypnUm2A4Y1PNo7vkZgE4YAclwwzRsmtoI1M7C0CuQmc4WwBOcKTEJEArJpEcPa6vrsZri4gInCeA41oSXiqwpJOWJwBPAFMqpSDtXU5JcpDcJTcLgAXAAgCnog04TwBT9PleVD3SknF2VDg6IidhmF5ejRfNzxOArwDTpCUjU0RMorSKOEpASGxiAUiAdWFp9UFymyvA6BeBulX/Qv0OTRXNUx3jK/YjZFdgSeJ4BV6kDywAJ5XqLLqCtK8gYLVPUgMFliSOaixm9rMAzKA0uaaz6ArSTqa59DJSAwWWJI5XAGsBKES9s+gK0hZC8bKtSA0UWJI4XgGaBaAQ9c6iK0hbCMXLtiI1UGBJ4ngFaBaAQtQ7i64gbSEUL9uK1ECBJYnjFaC9tQB8kuyCKigKSz4GVJD2FQQ880nfNFfXZyWcKSajuhK8aFt1xz/8JiAlOwEs8mUB2CNEyVJdHwvAvjYWgKijk88tABaAGcpQUfQEMIPu5JrqE2ZzawGwAMzQzwKQ44mvAAesouPbDEEr11CyVwu0rwC+AvxAoJpgngCOZcMCkDvtqLATPit8Kfb0BOAJ4PJQ4gngxhPASv89OHkRoyAfUfzRlLI9U+xJO5fGQv2d2SlOtO49CZY0RtIfIS8tALkxclQEKkZ0T9qQhLTUlyI3evWRNNDH9sPauX8WgBxej9VnRadNR+0ooWnTdZMFlAab0NwsALlDa8h1TwA5MC0AuN93hhaAOiypKA7/YxAF2auLTk9yaqfAhO5J6UOnEerP7wB+IkB7QHKF8QTgCaC6sWf3o41ATztJA/kdQK6BqotOT3JqR09reupSvCjZZ5u3Yh3NzQJQ13NLfQ+AEuKMjHcnypaXQqgqmvfvPWjdaH2omNK8SX6K3CgXhnYr/TkwAZqedNSXorDdUwVthFXu8hYATwBTHKbNqhAVSlqq+lMAFS26i5jSdEl+lHvtdp4AcrRQFMgTwB6BlYTPApDrkWW+9kqb1RNAruCkQTYPtD50mspl9b2a5KfIjYqi3wEcVJ4U9RWkpUWnZCd2d8GS5Ba9iK1+Ad0uHL4C5GihKJCvAL4CfCGg4Bf+KnC3spPRm56Q1I42K8mNnj7RpELe5tOxm3KI4pWT87kxn+ZOYyH1oXgNvwpMi0dVjCRBG5naWQBytKYcIlzIRfZztYIPV+I5sqVYjvrRAnCANFV8RYEUe5ITphsTC0DuWkTxsgBYAJ4IKE5BKmCU0PTUVeROYyECTfGyAFgALAC/+CvXFgALgAXAAnA8QNDxzS8Bc8NfJ170JabfAeRqqlit6Ec8AVDSUrszQLuJSeNXxEn3rL5jKshOcVbEQu/XBGeaN+WCBSDJmO4Cdb6coidMEsKp5RTnqc0LF5HGozWldkMBG/0iEHWosPMEsEeAkI9eAQp7ZmorC8AeJtpXFoADBOhpR4lJm1VRdDKaTnVt4SKKc2EIU1uRutKaUjsLgAVgisxUFKc2Ty6yAHgCmKIMUeBtY0p2SkxFnHRPTwBT1JpaRGpAT3Jq5wnAE8AUmakoTm2eXESFNunm8vLbC8Doz4FJchGilGQkFoVidu85VG/wk9T0JSDBfyUuRFNfdX4Kniv2HP4qcDUoURGqyd7drBQvRWGj5jt6rsCLCk41FyLu0dpVX6cUk89oTwtAslMUTWIByBWBNquidhaAXO0kL99IEVYikQUgR6KVake4R6cbBU88AeS4J/mPOhSFTab1WN55Qkb+aJPQKwcVFQtAkmmdZFcQuntPRSMQ0lY3iAXguAp+B3DCTkLA7mYlMb6iESwAewRo7QiWVNQVh2f7FYCOaMlBI1xOC06LEAYEhK87lrMc3gFLWh9iR+umwNkCkKwgLV7SzXO5YiSksVgAapCjHLIA1OD/2EUBZmF4FgABmLTm1aFYAE4QpcCQAlEydMYYCVV3LJ4ACNP2NrRuCs76CpCsKS1e0o0nAArYwI42UHUolEM0/uHL8O6/BRiBSYEhBVKASeKIbPwOIEJo/jmt+byHuZWU5zR+C8BBXRRgzpU/t8oCkMNrtJrWvC6C/3daSgBGPwlWnXh38vR7AN0FeuepiDYdrR3lLK058UdFXWE3/FFQklxkQ4EmRKIk6oxRhVe079FzgnEk6ivteQehVXB2VAMLwAErLAA5+aCkpQ1JRYX6y6ERr1ac5LQGFgALwBMB2liUfLQhaZzUX9zSuRUWgBxej9Wk6JSYngByBaI404YkXIgyojWP9s1etSiW1M4TgCcATwAX3sxbAJIIUKUlqk9VsTPGCD4aS7Rv9mTqPq1p7Uje0YtMuueZ3VJXgNEXgWjiNEHijwhDVPDO+On15koOBGeFACjETVE7wjGFgEnwsgDsqa0g0aiBCMEsAMeIKmpH6mMBOGF8tYqR4lxpnur4PQHUziMWgByewz8Gym31vVpRBHKfeoexVZEDreuZHT3tusWU+iOHDMWE1pvW1AJwgFyngHkCoNT1FaACOQuABeAyj+hpR09k+j6F+vMEkKRI5wlKiuN3AMmCBsstAHuAKCbtV4DuvwaspR7/LXt6GtDTR1FYhfiR+lDBp3aKGpC8u20oZ5f6Y6Bq0KjSUjAV5KOxWAD21aCYVPNSsZ+CJ+1fBa4GxgKQR5QS6cwTPcmpnUKE8yj2W9C6eQI4qBUFU0E+Ggs97ag/C0B/0//tkdbNAmAB+IEAJZIFwALwWgSSjawYMT0B5O7d3Vc0OhUtR+wk1ykv/Q6gsPKUfPRE7vbnCaCQLGArBU8kXwQCuUlMaIOMglGcaCvFKSnEyabdWCr8EbzoZKqwswAkK6ggkQXg9dcK2lxJ+jyWU18KOwtAsoIWgCRgg+XdWCr8ETQUjUxzswAkK0iBpnbJ8J7Lu/2ROGmMK9mRvC0ABDVgs9JoTUkL0n6YdPsjcdIYV7IjeVsACGrAxgJwDJoCF1AeLFIWgD3aFBNfAZLMpUBTu2R4vgJ8bJ9sH/+jNaAfv53FsdQE4L8G3JdJUaBRI1cTjIoGtbsLXnTyIcJBbK5c3ag/fxHogPV3ITRt2Gq7u+BlATg47DwBeAK4KggWgLo7OT3JqZ0nAE8AV/tf8sUWxZXJE4AngMsvyajSKgh9uXOLNvAE4AmgiEr5bWhDdttZAHJXLQVengCSE8BKb6fPikcbOS81/1soMFGcoNVx0uahON9FAEh+FMvqmm6xD98BKBwSwB6Bnny+awE4RrS6dpS0tN4WgNy1guJsAUgiV91YI3GLJg46OSRTfiy3ABDUjm0olhLujT4GVDikMHoCyN2hq2tHSUvr7QnAE8APBCwAFoAvBKi4URGj/s5EbJU4/A4AHE/VZIjGa/qOozpOSloAcWhCc6M5UH8WgLCU8ws8AXgC8ATwOd8wkyvxS0CqpvRuRwRgEoPUMvrijdqNgquugWLaqI4xKhbNIdq363n1tBFNmBaAZGVpI1M7C0CuQBaA3KRoAcjxS/K9d6r61acrbR5ql4R+avlKsUwF/M8iygV6UFgAklWiJzm1o4VNpvVYTpuH2pEYI5uVYoliPXpuAThBze8AcqNdNfmogFVPKVFeFoAcTzwBRIz657miEajqVzcXbR5ql4R+avlKsUwF7CvANwKkeLR5SHE2GwvAHjlSN4p/ZLdSLFGsvgIk1O8OVwBS8JXu3rR5FCJ8F6FV5E55dGY3wtJXgCTa1WO3BeC4ABaAJDEHyy0AdVhK/ipOcfISoVLEQaG3AFDk/BKwDrmDnUhjRQEpGo/EqYgjyp2Mrd1xUjGiuVfbeQIoRJQ0VuReQWgSpyKOKHcLAEVo3s4CMI9VuJI0VrSpovFInIo4otwtABSheTsLwDxW4UrSWNGmisYjcSriiHK3AFCE5u1+rQCQJpiHtW5ld+MRXFaK8S6xEHGrY9XcTm/9MSAh+hxstatWIvRZZivFeJdYLADJPiGFJTbJsOTLaQ70SyhEGFeK8S6xWACSrUMKS2ySYcmX0xwsAPvSKD6yq96TCLCKhL4CqJBN7GsBqGvk6mbdIqve0wJw0hykEYhNojdbltIcPAHUCceo0BaAA3QUKkYagdi0dHXCCc3BAmABSNDscCm+Alx1nLU/ExxFE6zUkDS/LL6KUTeKgR4iFBOFv1V4GWF9+kLynf9nIMVYVz0OvqLxyNtp2nS0BiM7GosF4GBisgDsQfEEkMMEnz4n/+FrtJ8FIEJo/rmvAAdYWQAsAH8jQPigECm653AK8wSQI7uvAPOnS7RSMZJ3Xzn8DiCqctHzVYC2ABQV9MJ/OU5PQoXgrMJLWhVfAXwFeCKgELfuE7nb31sLAFWVTjt6GtAYaZNQu844O0/ILa/u2nWKA613dw2GEwAlX6ddN4kUhVXkQOLsJp8ib8q96twJ/lvs1XFEe1oAkoxRFFbRCCTObvIp8k6Wc+r6M9rzLAeCf9SsJI5oTwtAkjGKwioagcRpAUiSYXCNIfhHzWoBSL6wy5cztlAU1gIQ465eUS1+Cp5YACwA031ACFjdBNGJphC+aYD+WVidO8E/wssCYAGY5jchYHUTRIS2AOzL2V2D/wAE6HjocudTHgAAAABJRU5ErkJggg==">
      <p><span style="background-color:#00ff7f;color:#080808;"><span id="bitadd">14bspBRZxASfTZvhNoLAXQRvWZ9itR1fL8</span></span> <button value="コピー" id="copyadd" class="noselect">コピー</button> <span id="copied"></span></p>
      <hr>
      <h2>Monero (XMR)</h2>
      <img style="width:200px;height:200px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAYAAABccqhmAAAAAXNSR0IArs4c6QAAH5tJREFUeF7t3duWI8eOA1D3/3+0Z6m9jnVX7oAYUvUYfnQxeQFBBCNLrfr1119//f3Xl/77++/70L9+/VrOJvXz6Lnl4PiA1CX5fNLPbWmS3yM4kpwfPSPxJZa0bCrWlB/JObE5TVsFIEFu8Rkh5hRZpvxUAF43+ZM9XaQbm1cAGKr3DD9JlgrAe706PT2F4ZSf9yt67KECsAvZG78VgNdA3w5KrwCfIeadAIhipandNlXu7mIj+YgfqV0G+VE+QvCkDslH6krv7nJNkL5L7VJrko/0K81PsJ/CJ8mxAnCBWtIsAf3RSpmQOfUjdVUArhFIMJvaWpLYysPbHCsAFYCn3ElEamrT+qQgdQNYHAJVm1s7WXUSG8lnipjJUKQntxBT8klPFPGdrNw/LR/BWTjWDeAApWS4ZXClOeJHiJkMRQXg+rMdgnM3AGH1uk10BUhInw6cxEoIJH7X4fzniSSfNFbyXHoySawpUZdYYiN9nnohK/kINxIM09gVAEFu0UaavOhy1LwCcA1nBeCMB70EFFWdugtKrGTgxG86dUk+aazkuQpABeB/CHQDSCbo4JkKwBmg9Oo31RYR+m4AP3gD2EWEdEgTQk29wBIsdtYlW92tTYqXPLcTD/F9ZJNuWn0HcIRs8HMBVdwKMWUIxY/kkwzllCBN1SlbQoLF6RnJMfV99FwF4AIhafLOZlUAXtM1ESTpl/gVbhwN27OfS46p76PnKgAVgKcckcE4Itijn6eET/KRWOK3AnDdSTmsBFfZDn/8S8BkCGTFFfKKn3QIkwYKFjvrEkL1HcAZgW4AGzYAAXXKRgYujSXDlIjEztNU8BABSuoSod3lV+rWwyLBZ6qn4ufHfQ5AThT5NU5iI42vAFyjlBBccK4AvL4mCIYVgAuUZHAFVPEjJ5M0R/KZ8iOxZCj1ZEziiahP+E18nJ4Rbgg+Uz0VP90AFrstTa4AvH96idgIztJe2WLEj3DjjxQAKV5sdr3tlNiihuJHiCl+psgrsVKCJzlKLBkUiS2xBB/JJx3cJP5UXZIzbQBShNhUAM4oCcEFU7FJCZXkKLFk4CS2xBJ8JB8ZpjQfmQupQ2yiXwOKY7GRQqXxEuvWphvAOmpJL2QIZOAktsSSqiWfCoAgeWBTAegGcEJABq4CMDBwD1x0A7gARUgmbUhOoqnYu/J7NqhH8QSLCsA1inIwHuGuPz8UAHU0YSdreW3WySKEqs0Z15/GsYnZUh8//g+D/LTmNJ8K0v8Q2CWiOrwTdhWACxQ73B3u3cMtHJsYbPVRAagA/EZAiFmbzwikDu+E3a+/5a3NRCT0kbwcS0tIVjgs485MPsaa2DzKR+qSOqQXUznf5pPEPvmQ2sVG8hHeJbGkN1M2FYDFDSAFPhkUeVteAdhzKlcAUqa/+Zwo/20IUeJ0UJJ8HsWqAKwRQ3DfeSWpAKz1a8xaGl8BeA331NopvUiETciSxO4VQJC92Zj6DuAMiJwo6xD/80QyKL0CvEZb+pXadAO4QEDUWE5lOZkSG1m5ZXBl4MQmjSUYCjEl/i4buY4Jn2Rwd/b9p/ViCtc7/sgGIA0TwJLh/jYRkpNbhksw3dV0yS+1mcr5230XPn9SjKdwrQC8YLac7mIjw1MBeH+97wZwc5//df1XmImH3QDOMMlwiw0BD83apfqSX2ozlXM3gOsOTOF6twGc3k9d/s9vAy8rt5BTABM/clLLuijXH1kpE3ymevpJ8ZPeTNnsxEdyFK5u408F4HWLKgBrG5IQPsFU/KY2FYAL5KbAkGbIiZKSRVQ1zfHoOcFQ8pvCR/KR+7Tkc4TN6edpT8V3YrMTH8kn4ULyzCmXuw2yG0A3gGcIyHVDiChXGxmUXTYVgG4AT7mVnFZCKBkcOXElP8mnG8A1Agmu8ozg/Mhm2zuA298CpEUkL8IEDMlnaph2nTCTa29a667aZEsQbiT5pdyQ53blnNSpz0hdd/2qACi879lJcyRCBeCMkmCabj8VAGHjC5sU+F0niqzTb5b88nEhq8SvAFQAnvFEONYN4OB9hwxhYiPNEb8VgArAVgEQEgqZhahpLNkSEpuply+pn+RFj8QSnMVGtrq071K72NzWIZvflI1gmMYS33JtuY0ffSNQBWC9HUJesZHI0h/xkxCqAvAa2QrAIvNSwLoBLAIN5t0ArkFKxC7lM7TnzkT61Q3gANldp7I0JyHYqZxuAK/fEySHgwyuDKn4meqfcKwCUAEQ3v62EUJNidZUrHTgEpEQINN8xHdyZbsTgFR9pPFymkp8aU4ChoCcElPqkviftJGeJi/dPlnDo1jSi4RjU3UJ7iIkUnsFYLFrFYD3X3ItQj5uXgG4uCJNfRIwUS0ZpkfdT9Q5jZVsElOxxpm/6FB62g1gEVQwF9y7AVwAmSh6+rJMhltsgAdfNxEiVgDm2yS4f1UAJEGBJS1CfIuNCIdsAEmsVCQS7JM6ZfNKRVTw0vgiQEfxpBeCe4pz4nss5+QKIAkfgf6MPFO+0/hHz6X57XoBepTv5JAK6SSf1EawT4ZQ6toV+4RF4nss5wrAGh2lWY88VgDWcO4GcI1Awh/havRbAHEs7e4V4HWT0yGYWIs1dnLiCjc0/kStY6cpfNPzVF1jOXcDWKNjKn6JgqdkmRgKjV0BOCOVYiGcSvhDfuXvAqyNyHNrKWIqlvhJGya+b21um5HGlqZ+UwDkZErwS58RvGQTTfsleac5iu9DHlYAEhjXn6kArGM28UQ6XFP9khrSHMV3BeAFSjtV/RD4jffFbgBnBNLhqgAk8nLwTK8An7kvVgAqAM9G8U7Ybv8uwNTci/I+ijV1Kifxv30XPNoatDcJhglek/kk8aVfKcdkA5Cc5dCTfkk+0o8KwOKVYAp4aU4FYA2lCsAaXifrCkAF4CECcpqt0+2fJ5ITTmJVAASla5sKQAWgAgAvYGXzE9HsFWBRpOS0EJfSHHlZJkSQfBKbpAY9caeuG1KX9DSptRuAoH+wAcgnAZMhkA+EiM2jEiUfIVRCzOQZHcqpuoQWcjKJQEosqSvxI8+ISHzS5lHO0guxSfCgfwuQNFCGW2wqAK8VXJqekq4CcEZgSiTSXlQALpATQeoG8FoaEkLJ9pMKtgiZ9FREK+FPBeACWSGCnO5ikxJKyJLUkTzTK8DfV20UDKXvIhpTgzvl58dtALcfBEoHR56ThomNEEhU/jaW1CCxhbwpoQSfn1a74Cy4JnUJXtIv8SM1SCzxM3Z4VgDOLakArF0bZCiE8JMbUpqTiNSRbxlcwUP8VAAOupGcFhWACsD/EBAuyPuGI9E4/XyKq4lw/OoG0A3gEQnlrirklhOvG8D6O5JuAN0AniIwdaJMnXCyXkenF3yib1KkjnxJDSKI4mdMAHZ9IYgUcQTos5Mp+RWWxJKck9Vw8jSV4U5s/kR80l4kfZZnBEOxGRvuBwJ5x40KwLkl0uSUdFOnaTLc8hsHIeZPwyftRVKHPCMYik0F4AIlASMlQjKUn4yVrouJSAgxZQg+iU8aK6lDnhEMxUY4P8aNbgDdAISU6Ys69f1JMZZhFhFNazt67qsCkK6LCahHQDz7+VSs5F3C/xd8UuyPnpNTWfonJ9xRLpM/l5zT2kVsxOa2Xson+deA6UstSUiatqsZkl8F4HWHUgyl7+Jb/CQ2uzh3ykWGW2wqAAfvDo7WTCFYBaAC8AyBKf4Ix8YEqRvAuZ1TDfwTNqTkFJRnUgynfIufxGZs4ORXc6FNN4BuAL8RELImQyDPVABeo5Se7l+9AiSNFxLK286UUOlzUuuRjcSWLUHweeRH4k+9AD3CQvNL+XIUX/xKjqkfOZWTXhzVrQcBfSOQBJtSqAQMUVUZOKlTbGQAJZ8KwDVKCa7p4CZ8TrmRcF5iSe0VAEFy0SYh6iPFrgBUABapd2VeAThATwBKGlABeI3aTmG7jZz2+D+7AXxyNZXVPW2gDO5Uk8WP2CQ5S7/kjit+poRN6pScv82NT/ZUhE36c4vZ3RUgJYI0QwATm5RARy9kpIaUmFN1JU2WnNO+Sy9SXHf1S3KWfolNEkuekcNTeloBuEApJaoQQWyk8RWAM0ppvxKcZeDSfKSn3QCka4s2u4by22QRIgrppt5OSz7Suql+TcWaykd6UQGQri3a7GpgBeC6ERWA18T8qgDcfieg3BeF4HL/SGMd3Q2nYp/8yCmY2IhWCTFkuHa+dU/iyzM7uSH9kv4kdezsabIl3H0paAr8rsIE5F2xKwDXX1Y5JazS05SHcjhUAC7eo3QDOIMhJ+WUjZwwnxQ2GbgKwPtXm5097QbwYqrk1JkabvFTARAErm2SdzbSCxnKVPxkI5HBnfJzh+EnN4CkUDmZ0uEWCopvaU6ydiaxBa8pMp/8yPBM1S6xpnoqYpPk88n3Z4RFBeA1TMkQTp06SewKwDHtBdcKwAWOnwTjuH32FUpyKkssIYvEmjoFJWfJZ9c2JtuFnJzpSSn4SE8/yfkUj6TPd33vBtAN4ISADMXUdpESXp6rAAgCZ5uP/hpw16kj5E3JI75FibsBnFGSXnQDuGaV8FBwjTaAKYJPFZH42UmoRNjkPcGalr83YJKPECzpjVwbTjbJWi75pJtN0nfpqeAsmIkf2gAqANK2i7UK/milDNxa1AqAioTgKsNTAbhAQFZcUWMBPvHTDeD1SimCtKs3cprpcMuWUAFYfAfQDUAo0w3ghEAizhWAawREaAUz8TP2nYAyIqLOYiOCJPlMkVVi7VoX0/ur1P5NnHdubLtqT/w+2myET1OxKgAHaIuKSsMqAK9REuGf6kUyPBI78VsBuOGFEOGbJ1My7LKuTflVQiVklSFIa5W+p/EnxFdiJ5hqvyZqeBSrG0A3ANYeGYIKAMP5r2GC65TYVAAqAMzYhKgn50LWbgDcht+Ggqm8H4o+B7CW6nvW8uspKvSDf3AxrViaKoOSxk+em8pHxGUXPhI7weadQT2KN5VzBeAC6YRgR41a+XkSX55ZyWHVtgLwGrFd/akALK7u8msladYU8DvvyqtD/I59BaAC8A5/Dp/tFeAaoqmBOwQeDabyEWFNBDp5BksnM4lPjm6MBC/xSy8BJZh8FJgSCj9HL74Tm6SBgle6Adw+JwK5Mx/xLRiKn9vaP7nVfTLWFDce+bkT7L9v/o8UKgkmDdWXJqnvCsAaAlODO+WnArDWvwrA+3hFv25JBUoGpRvAGQE5rART6dcnY8kBm1K7G8AickIgGUoJOxXrp13HpC4Zwm4AwqLXNhWARQyFvBWA16AKhhWA9zEUat8JwNR3AsoQyMkkNnISRGDAh4XE79QKlwzFo/co6YvCpBdSu9Q1JRrp6i45ChcEwykbyedudioAa3fKBORHQyl+UhJOEUr8SB2JnwrANbIJhtSbCkAF4IRAuiUQyW42KxG2CkAF4DcCU2R5RFT5EIvET4ZAnkljy2kxZSN1SKzkWif49Apw8G7hdgMQUKfueeJHBlf8fPKEk5x3EjMZOMFQ6kr9iJAIN2VzuI0lfiU/qT2Ntaund/8Y6KclOEW6CsA6hWWYhC/iR7LbFUv8Sn4VgAsEUlCFLOJbFFNspPFJzt0ABNlrm6TvEkX8ip8KQAXgKU+S9w0iEp8k3dQ2lg6TDKqIca8AZwR6BfiSaMlwi00F4BqBCsBreb3F58d/IYicOumg3PpOyHPyMXUyyZYgp1daR3oyrz6Xvo+ZurJJvn8ihsLn6JOAAtgnbWRQZCgFMKlLYgmhpK4KwBkBwV36J1tU6mfXc1K7HIzdAC46JEMqG0lKqArA6+HuBrAmfhWARfmtACwCFpr3ChACt/i+igTg9gtBpk6v90v8xwMVAf+IZ8rPTnxEgGT1E+ynYsmpnNhIDek2Jle/ZBuTfAR38SM8FKG9+0owcZwmmDR1anCn/OzER8hRAXjNogSflBvC511CIjysABzc76U5QqipwZ3yI8ScipWc7kJMqWHqIKoAHKA9RZakqWlzkuGWWKK8KTE/ifNUrArA2kYiuE/xR4S2V4DFLaECcI1ABeD/mQCkp6Cc7p8ky64NQBRclFdspk4C6U2aT+r76EWc5JNez6a4cVuD5CMHiPiRORWujv1dACFCBeCMkhC8ArC+bRwJy+nnFYAzShWAxSuAqKoMt9hUACoAzw7WbgAHK8eUyosfWQWT7acCUAHYLgC7vhNQyJuqWHJHkmfkGiM2siXsxEcEKanj21uLiLHYSO2f5IvkI1cb8XOHTwVAYFuzqQBc4yXDJJjJcIuNdFNyFj+7bAQvOmQqAPMtGmtO+BHnbgAXL7ngj83KoMyz5D2PYxyrALzXiEdPjzWnAnAFr5zuYiMd7wZwgdIuUPsO4PWqnOLTDaAbwDORu5vlqT8PnrykEJWVIUhP4UTYJGfJJ32htuv0EpxTm105i9+d25gIrcTfxUPqVwVg7bSoAKxvLTKoKa5HvmUA5R2A+ElFvQLwoouiYnLi7mzyEQlPP5/6HIDESoZJcE5tduUsfmVwd3JD4lcAKgC/ERCyCOkrAGtbXQXgAgEhoRBMTov05N41BJKP1C75pbGSTSLNOeFC2vcUs9vnpnKW+/2unKVfSZ0POSfvABIwUiJIYQK8gCh+ZODEj9hIrCmbJJ/0pJzqxSdzTjgv+aXCPyF0FYCgQzJwgduHj0isKRvJWcRY7q8VgNdoS08rAMLYC5sp0iXNWUz1X3OJNWUjOVYAzihN8akbwAHzhHRC3qmGycBJPmIjsaZsknx6BRDU1m2kp9s2gNuPAqe/y5Q7067hnnrfkNYua7DgI9QRDHflI7GlBsF5l4Cf8kt876xdMBMbEZJbG/rjoEnx0mQpauepkwCW5lMBeL1OSy8SvqSHQ3LiSn6J+Ijfk41gWAG4QDMBrAKgdHxuJ4fD1KBUAK77UAGoADycTBm4ZBMUwdTTK5GeCsCiAEjDpkB9FEtIJmRNyPLtZ6T2JEfBS2KnfpLn5BnBIq0reU7mQmykrnR27q42U98H8O2GpaD9pOeEdEm+0huJnfpJnpNnBIu0ruQ5GW6xkboqAClKP/g5IV2SvgyTxE79JM/JM4JFWlfynAy32EhdFYAUpR/8nJAuSV+GSWKnfpLn5BnBIq0reU6GW2ykrgpAitIPfk5Il6QvwySxUz/Jc/KMYJHWlTwnwy02UteYANz+YyBxLM0RAB/F+mkfYklqlV9zpU2+fS7JT3AXHpxskn6l8RPMhIfSL7GR/KRfir3EO+JL9MdBpQgBXoggfj6ZjzRniizS4KnaUz8VAOnS2UZwFo6tRX0evwJwgKQ07FakKgDr9BSc173al6xIv8RG8kvrlIMwiV8BqAD8RkCIKffXlKgSXwh+ayP5yHCLjeSX1il1JPFJAMSxJDi1Lh7da04/T/KR1UuIIE1Oh0l8yxBILxIbwVCufsI5sdmJs2x+U72QWhObCsABatJksZkiQgVgjeYVgNd4VQAqAL8R+OSgdAO4RkA2rTXZc+sKQAWgAgB/gk2uNrKdpULrI71mWQGoAFQA/ssCIN8INHV/lZd3u2LJ2pmqc6r8R1otLxylrqnT6yjfd34+9dJW+DPFw11+pnoq/aBvBBJQk3tMOjhJLAG1AiCU2WNTAXiNazorR92qAFwgVAE4osu+n1cAKgAPEUiHUqgqm0RiIyt3kt/pmalBSX51KTmnNlN1yba6a3XfdUqf8t3l++4l4NTATSW8048MgdgI6URIhJgyKOInHdSjWqVfIpDiJ8FC607iyzNTtYsfqbUCcIGSvHSTJu8U0YT0krOQRUiXxpoS2rSORDSTnD+JoWBRAagACE+e2nxzCBIx1GJFyL5ZuwiJ1FoBqAAITyoADxCoALygTqKgj9zt9CMNFJuje/GjlzhyesmVRKZXMBQ/cuqksaZwTuv4z14BPvmtwCnpZcCOGiixU/II6ZP4IgCpjWCavLgUDFO8knw+iY8IpBxy6TskwefOpgIglH1tkxL6KHJK3qnTVAh1VIMQXgcnySfFMBFIrSM5rKT2yKYCkFD4+pkKwBqGKV5C8KPhOv18l0BWAA54IGtwSo6jxkvsNRqfradyPqpBybuL4FMYpnhVAM4MGbsmyLcCy2AIOaTx31y90jqlLsEnEQDJeVd+p9gylBJf+p7UKoMifuV0T+qcFHUR/lubr/5zYAE+baAMXNKwnflUAF6fcMKXXYJUAfjQei8ngQxuBWD/FaUbwOnf0q3hnApJcrrLC9BuAHKsXNh0A7gGbNeJKwL+qHW78kkHV+i1a7grAAfoyybxyY2kV4BeAR5tVTvfE0QbQKrOCcFlSOVUnspZFF1yFj/pqZOcKHKaSj5TfuT0msJZ+CO1S87Sd6lrKucKgHRk0UYauOjyX/NkuFNiSh0irIkfyVn8Cs5TwyQ5Sz5S11TOFQDpyKKNNHDRZQUg/ACP4Dw1TBUAQfvCRgCTYZIGykm1mP5Tc8k5jdUN4IzcFM7Cn14BDhgrxBTSy6BOvelNYn2SCIJXarNreETU5T3Brt5IbOnxyeaTGEqfBbNbP9EVQABKwZEiKgBCh9c2aX/uCHTznfoVgPXefPLwrABcIJCITSp+EmudOvkTFYC1q0R6TZAOVQDeHMq0OTKUMijSQIklZJmykbok1lTtstXd5iM1CO6pH3luCsPEDz2z6x8DpeAkDasASKuvbdL+9AqwtjlIZ0REEz/0jPxpsCTBZJAlYVnBH9nI3TQdil21il+pVfxI7eLnk/kIXyTnlBsyF0l8eSbF+W7TqgC8r+jSMBmwo9NVCH+y+eY6nRIzWe8Fj7Q3yXCLkEzhk/qpALx435AM6cldSrIjAovflAjJwP20fI7we6c3FYA3B0XIkg5cclKKOqf57KpV/FYAXsuAYJhyIxGJqX6lfg43AFFVsdk5TBJfbCRHIdDUaZqs7lN1PvLz02tP+5fgvDOW+N516N39dWAhlNgkRenKJvHFRnL86UMwVWcF4DWSKVdEbMR3BUCYvmgjwFcA1kBNMZVB+eamtbMu8V0BWOMhWQvwFQCC8l+jFNMKwBrOwkt5t9ErwAHuAvQ3TyahjQxlrwD/0SvA1CcBhYhTb02TgZP8ZAhEVcXmUazkFEzrSp6TulIbyUf4I35knU5FU3wnOcozwp87mwrAa2iFdIlNBUAofW0jOK97ffw5jgpAguTiOi2nhaQx1axuAOtrsAyl2Eifp/zIKT3FqeQKKVikB0g3gEV0hXSJTdrAxfRHzUWwUxtJVHAWPxWAMwJjXwiSAL/zxJV8EkKJossQSH5TNulpJrXe5vjJWDvxkdql1oRj6VwkeFQALlBLGion+clGCJU0UJ6RuoR0Py2W5CM2qWALrhUA6cCFjQAmNhI28SODnBJKck5shKgVgGsE0j4fXS+mepH6ucvvk78FEPLKUIrNVKyjhnYDuEYgJaYMnPQ0sUkFW2r9JlcFi14BegV4ypNkKGUoprYNIbjY/KcF4PYLQQSwKRshi5BQGpjGkudkS4g+pHHzjbunOJKPnDqJjfRdeqFb01G8R9wQnG/9CqYiWlL7J20E520fBT5qXkpmKepkIwRPBlfqSokp5BWySu2JjdQuBNceHsVLca4AnBGoAFywQQh1RMpH4vNI7CSW2HzyZJLaKwDXKCVCKxiKjQhtBaAC8BuBlFBymqbXuCPBEYHcFVu3zD9OAGTFPGrMs58LGLKWp/GPyDpFFvEjNewcSomf9Ev8is3UcEsssZG5kL6LH9nq0pxvc7zbANIEJaGEUAKqxKZ16MFLtyPRmGqW5PfsenFUf9rTpF9HuejPKwCvrxKCoxwgFYCDK0AF4IxAKiRCVtn85CVpEkuekdrlsBI/U4dKBeCgswmhpIFChJR0iW/JWUiX+pFaKwCvUZrqe68AFzhXANZIVwFYw0uvdSKQXxWAXcFlRZkiXVLDqTESP/EtfoUYcnKnfpLnpuoSTCWW+EkHVd6RpPE/hT29A0iKSIdbQE3ASWqoAKwjLUMpXqVfEkv8VABerMWnHyUgVgBe01zIK4PSDeD9tbwCUAF4yiIZ1CmBTAdeXqBN+T7yI3gd+dBDR2IlvUk3Pzn0pPbURvC440ry14ElQQFDbFJ1lqGIAIPPCkjOKTET7CWW9ELwSn9/n/oWPI5sflrtH+1XBeCIHtc/l+ZUAK4RkN+2VADOmAnHxkSrAlABeLbyJi9kuwG8L34VgIOZlNOiV4AvnSjwHQYiEo8oIIOxJuf/WI+dpkO1S51jOXcDWKOMNKdXgPdPwQrAa17+pwVgbWSfq3yyJfwJp5fUdWsjhEpwT59J8/nkdpgeBoL9EW4SW7D48R8EOgJCf05gDK1w3z69KgDKin/svi3qws2pnt75+ROvAGvt7QaQnhbyXNILeaYbwGuUpDciLN0ALnCWk0BsugHIiL9/x5V3LZLJt3sqg/rVDUBAFJvk10pTw/QnnihpztKL5B46depM9VQEYOdwTw1u4kcwFL+0ASSEmkpQ/Eh+6TAJiKLO4kcEUoZQ8KgAfGbFnuKG9FT4E70DkOBikyRYAbhGoAKwdnXoBnAgdPISUIZbbCoAa6dOurVIL7oBrPVCrhuCeypIiW/aOisAaydK0ojTM9SMm19DVgAE7WubT/67A+npH3cFWIc8f0IAnFLMqdVZhlLqylE7vhLIEExtAEms9DSVDVJspoZyKpb0Yhd//8g/DJIM2C4AT81LiFABeH1yy7ufKTFOD5mk78JDqSvlz51g/4l/HLQCcG6/kDclXXJSSqxuAOvXzhTXo+2iG8CilIo6JwK1mMa/5hWA11ci6YVgmG4kIqJHQ/poy0z5covH/wGkAOXZoqeCtwAAAABJRU5ErkJggg==">
      <p><span style="background-color:#00ff7f;color:#080808;"><span id="monadd">47bjXrLZ6WNRPe5UKRVAvyFLGUyZ7xNoUKUZzQKZzyqScRMJZ5oxs6VDaQfqLnUv3hQcqwtJZbuSNTKnNchyHeCv8FYEgCp</span></span> <button value="コピー" id="copymon" class="noselect">コピー</button> <span id="copied2"></span></p>
      <hr>
      <h2>Amazonギフト券</h2>
      <p><a href="https://www.amazon.co.jp/dp/B09TVHNLHX" target="_blank">Amazonギフト券</a>をお送りください。(アドレス: <code>w&#101;&#98;ma&#115;&#116;&#101;&#114;&#64;&#97;&#99;&#116;&#105;v&#101;&#116;k&#46;&#106;&#112;</code> )</p>
      <hr>
      <?=Get_Last()?>
    </div>
    <script nonce="<?=nonce?>" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script nonce="<?=nonce?>">function collapse_handler(e){let t=document.getElementById("navbar-collapse");new bootstrap.Collapse(t,{toggle:!0})}document.addEventListener("DOMContentLoaded",()=>{document.getElementById("toggler-button").addEventListener("click",collapse_handler,!1)});</script>
  </body>
</html>