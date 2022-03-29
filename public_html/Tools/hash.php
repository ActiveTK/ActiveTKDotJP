<?php
  $title = "ハッシュ(md5、sha256、sha364、sha512)計算ツール | ActiveTK.jp";
  $dec = "オンラインで様々な種類のハッシュを計算します。JavaScriptで処理されるのでサーバーにアップロードする必要が無く、安全です。";
  $root = "https://www.activetk.jp/";
  $url = "{$root}tools/hash";
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
    
     /*
        MD5
	    Copyright (C) 2007 MITSUNARI Shigeo at Cybozu Labs, Inc.
    	license:new BSD license
    	how to use
	    CybozuLabs.MD5.calc(<ascii string>);
	    CybozuLabs.MD5.calc(<unicode(UTF16) string>, CybozuLabs.MD5.BY_UTF16);

	    ex. CybozuLabs.MD5.calc("abc") == "900150983cd24fb0d6963f7d28e17f72";
    */
var CybozuLabs={MD5:{int2hex8_Fx:function(t){return this.int2hex8(65536*t[1]+t[0])},update_Fx:function(t,h){var a,r,e,c,o,d,C,A,i,s,_,n,b,f,u,l,x,F,z,v,g,m,p,y,B,D,L,M,S,Y,I,T,U,w=this.a_[0],E=this.a_[1],N=this.b_[0],O=this.b_[1],R=this.c_[0],V=this.c_[1],j=this.d_[0],k=this.d_[1];1==h?(a=t.charCodeAt(0)|t.charCodeAt(1)<<8,x=t.charCodeAt(2)|t.charCodeAt(3)<<8,r=t.charCodeAt(4)|t.charCodeAt(5)<<8,F=t.charCodeAt(6)|t.charCodeAt(7)<<8,e=t.charCodeAt(8)|t.charCodeAt(9)<<8,z=t.charCodeAt(10)|t.charCodeAt(11)<<8,c=t.charCodeAt(12)|t.charCodeAt(13)<<8,v=t.charCodeAt(14)|t.charCodeAt(15)<<8,o=t.charCodeAt(16)|t.charCodeAt(17)<<8,g=t.charCodeAt(18)|t.charCodeAt(19)<<8,d=t.charCodeAt(20)|t.charCodeAt(21)<<8,m=t.charCodeAt(22)|t.charCodeAt(23)<<8,C=t.charCodeAt(24)|t.charCodeAt(25)<<8,p=t.charCodeAt(26)|t.charCodeAt(27)<<8,A=t.charCodeAt(28)|t.charCodeAt(29)<<8,y=t.charCodeAt(30)|t.charCodeAt(31)<<8,i=t.charCodeAt(32)|t.charCodeAt(33)<<8,B=t.charCodeAt(34)|t.charCodeAt(35)<<8,s=t.charCodeAt(36)|t.charCodeAt(37)<<8,D=t.charCodeAt(38)|t.charCodeAt(39)<<8,_=t.charCodeAt(40)|t.charCodeAt(41)<<8,L=t.charCodeAt(42)|t.charCodeAt(43)<<8,n=t.charCodeAt(44)|t.charCodeAt(45)<<8,M=t.charCodeAt(46)|t.charCodeAt(47)<<8,b=t.charCodeAt(48)|t.charCodeAt(49)<<8,S=t.charCodeAt(50)|t.charCodeAt(51)<<8,f=t.charCodeAt(52)|t.charCodeAt(53)<<8,Y=t.charCodeAt(54)|t.charCodeAt(55)<<8,u=t.charCodeAt(56)|t.charCodeAt(57)<<8,I=t.charCodeAt(58)|t.charCodeAt(59)<<8,l=t.charCodeAt(60)|t.charCodeAt(61)<<8,T=t.charCodeAt(62)|t.charCodeAt(63)<<8):(a=t.charCodeAt(0),x=t.charCodeAt(1),r=t.charCodeAt(2),F=t.charCodeAt(3),e=t.charCodeAt(4),z=t.charCodeAt(5),c=t.charCodeAt(6),v=t.charCodeAt(7),o=t.charCodeAt(8),g=t.charCodeAt(9),d=t.charCodeAt(10),m=t.charCodeAt(11),C=t.charCodeAt(12),p=t.charCodeAt(13),A=t.charCodeAt(14),y=t.charCodeAt(15),i=t.charCodeAt(16),B=t.charCodeAt(17),s=t.charCodeAt(18),D=t.charCodeAt(19),_=t.charCodeAt(20),L=t.charCodeAt(21),n=t.charCodeAt(22),M=t.charCodeAt(23),b=t.charCodeAt(24),S=t.charCodeAt(25),f=t.charCodeAt(26),Y=t.charCodeAt(27),u=t.charCodeAt(28),I=t.charCodeAt(29),l=t.charCodeAt(30),T=t.charCodeAt(31)),E+=(O&V|~O&k)+x+55146,E+=(w+=(N&R|~N&j)+a+42104)>>16,U=(E&=65535)>>9|(w&=65535)<<7&65535,E=w>>9|E<<7&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)&O|~E&V)+F+59591,k+=(j+=(w&N|~w&R)+r+46934)>>16,U=(k&=65535)>>4|(j&=65535)<<12&65535,k=j>>4|k<<12&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)&E|~k&O)+z+9248,V+=(R+=(j&w|~j&N)+e+28891)>>16,U=(R&=65535)>>15|(V&=65535)<<1&65535,V=V>>15|R<<1&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)&k|~V&E)+v+49597,O+=(N+=(R&j|~R&w)+c+52974)>>16,U=(N&=65535)>>10|(O&=65535)<<6&65535,O=O>>10|N<<6&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)&V|~O&k)+g+62844,E+=(w+=(N&R|~N&j)+o+4015)>>16,U=(E&=65535)>>9|(w&=65535)<<7&65535,E=w>>9|E<<7&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)&O|~E&V)+m+18311,k+=(j+=(w&N|~w&R)+d+50730)>>16,U=(k&=65535)>>4|(j&=65535)<<12&65535,k=j>>4|k<<12&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)&E|~k&O)+p+43056,V+=(R+=(j&w|~j&N)+C+17939)>>16,U=(R&=65535)>>15|(V&=65535)<<1&65535,V=V>>15|R<<1&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)&k|~V&E)+y+64838,O+=(N+=(R&j|~R&w)+A+38145)>>16,U=(N&=65535)>>10|(O&=65535)<<6&65535,O=O>>10|N<<6&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)&V|~O&k)+B+27008,E+=(w+=(N&R|~N&j)+i+39128)>>16,U=(E&=65535)>>9|(w&=65535)<<7&65535,E=w>>9|E<<7&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)&O|~E&V)+D+35652,k+=(j+=(w&N|~w&R)+s+63407)>>16,U=(k&=65535)>>4|(j&=65535)<<12&65535,k=j>>4|k<<12&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)&E|~k&O)+L+65535,V+=(R+=(j&w|~j&N)+_+23473)>>16,U=(R&=65535)>>15|(V&=65535)<<1&65535,V=V>>15|R<<1&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)&k|~V&E)+M+35164,O+=(N+=(R&j|~R&w)+n+55230)>>16,U=(N&=65535)>>10|(O&=65535)<<6&65535,O=O>>10|N<<6&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)&V|~O&k)+S+27536,E+=(w+=(N&R|~N&j)+b+4386)>>16,U=(E&=65535)>>9|(w&=65535)<<7&65535,E=w>>9|E<<7&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)&O|~E&V)+Y+64920,k+=(j+=(w&N|~w&R)+f+29075)>>16,U=(k&=65535)>>4|(j&=65535)<<12&65535,k=j>>4|k<<12&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)&E|~k&O)+I+42617,V+=(R+=(j&w|~j&N)+u+17294)>>16,U=(R&=65535)>>15|(V&=65535)<<1&65535,V=V>>15|R<<1&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)&k|~V&E)+T+18868,O+=(N+=(R&j|~R&w)+l+2081)>>16,U=(N&=65535)>>10|(O&=65535)<<6&65535,O=O>>10|N<<6&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)&k|V&~k)+F+63006,E+=(w+=(N&j|R&~j)+r+9570)>>16,U=(E&=65535)>>11|(w&=65535)<<5&65535,E=w>>11|E<<5&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)&V|O&~V)+p+49216,k+=(j+=(w&R|N&~R)+C+45888)>>16,U=(k&=65535)>>7|(j&=65535)<<9&65535,k=j>>7|k<<9&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)&O|E&~O)+M+9822,V+=(R+=(j&N|w&~N)+n+23121)>>16,U=(V&=65535)>>2|(R&=65535)<<14&65535,V=R>>2|V<<14&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)&E|k&~E)+x+59830,O+=(N+=(R&w|j&~w)+a+51114)>>16,U=(N&=65535)>>12|(O&=65535)<<4&65535,O=O>>12|N<<4&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)&k|V&~k)+m+54831,E+=(w+=(N&j|R&~j)+d+4189)>>16,U=(E&=65535)>>11|(w&=65535)<<5&65535,E=w>>11|E<<5&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)&V|O&~V)+L+580,k+=(j+=(w&R|N&~R)+_+5203)>>16,U=(k&=65535)>>7|(j&=65535)<<9&65535,k=j>>7|k<<9&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)&O|E&~O)+T+55457,V+=(R+=(j&N|w&~N)+l+59009)>>16,U=(V&=65535)>>2|(R&=65535)<<14&65535,V=R>>2|V<<14&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)&E|k&~E)+g+59347,O+=(N+=(R&w|j&~w)+o+64456)>>16,U=(N&=65535)>>12|(O&=65535)<<4&65535,O=O>>12|N<<4&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)&k|V&~k)+D+8673,E+=(w+=(N&j|R&~j)+s+52710)>>16,U=(E&=65535)>>11|(w&=65535)<<5&65535,E=w>>11|E<<5&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)&V|O&~V)+I+49975,k+=(j+=(w&R|N&~R)+u+2006)>>16,U=(k&=65535)>>7|(j&=65535)<<9&65535,k=j>>7|k<<9&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)&O|E&~O)+v+62677,V+=(R+=(j&N|w&~N)+c+3463)>>16,U=(V&=65535)>>2|(R&=65535)<<14&65535,V=R>>2|V<<14&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)&E|k&~E)+B+17754,O+=(N+=(R&w|j&~w)+i+5357)>>16,U=(N&=65535)>>12|(O&=65535)<<4&65535,O=O>>12|N<<4&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)&k|V&~k)+Y+43491,E+=(w+=(N&j|R&~j)+f+59653)>>16,U=(E&=65535)>>11|(w&=65535)<<5&65535,E=w>>11|E<<5&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)&V|O&~V)+z+64751,k+=(j+=(w&R|N&~R)+e+41976)>>16,U=(k&=65535)>>7|(j&=65535)<<9&65535,k=j>>7|k<<9&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)&O|E&~O)+y+26479,V+=(R+=(j&N|w&~N)+A+729)>>16,U=(V&=65535)>>2|(R&=65535)<<14&65535,V=R>>2|V<<14&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)&E|k&~E)+S+36138,O+=(N+=(R&w|j&~w)+b+19594)>>16,U=(N&=65535)>>12|(O&=65535)<<4&65535,O=O>>12|N<<4&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)^V^k)+m+65530,E+=(w+=(N^R^j)+d+14658)>>16,U=(E&=65535)>>12|(w&=65535)<<4&65535,E=w>>12|E<<4&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)^O^V)+B+34673,k+=(j+=(w^N^R)+i+63105)>>16,U=(k&=65535)>>5|(j&=65535)<<11&65535,k=j>>5|k<<11&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)^E^O)+M+28061,V+=(R+=(j^w^N)+n+24866)>>16,U=(R&=65535)>>16|(V&=65535)<<0&65535,V=V>>16|R<<0&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)^k^E)+I+64997,O+=(N+=(R^j^w)+u+14348)>>16,U=(N&=65535)>>9|(O&=65535)<<7&65535,O=O>>9|N<<7&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)^V^k)+F+42174,E+=(w+=(N^R^j)+r+59972)>>16,U=(E&=65535)>>12|(w&=65535)<<4&65535,E=w>>12|E<<4&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)^O^V)+g+19422,k+=(j+=(w^N^R)+o+53161)>>16,U=(k&=65535)>>5|(j&=65535)<<11&65535,k=j>>5|k<<11&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)^E^O)+y+63163,V+=(R+=(j^w^N)+A+19296)>>16,U=(R&=65535)>>16|(V&=65535)<<0&65535,V=V>>16|R<<0&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)^k^E)+L+48831,O+=(N+=(R^j^w)+_+48240)>>16,U=(N&=65535)>>9|(O&=65535)<<7&65535,O=O>>9|N<<7&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)^V^k)+Y+10395,E+=(w+=(N^R^j)+f+32454)>>16,U=(E&=65535)>>12|(w&=65535)<<4&65535,E=w>>12|E<<4&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)^O^V)+x+60065,k+=(j+=(w^N^R)+a+10234)>>16,U=(k&=65535)>>5|(j&=65535)<<11&65535,k=j>>5|k<<11&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)^E^O)+v+54511,V+=(R+=(j^w^N)+c+12421)>>16,U=(R&=65535)>>16|(V&=65535)<<0&65535,V=V>>16|R<<0&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)^k^E)+p+1160,O+=(N+=(R^j^w)+C+7429)>>16,U=(N&=65535)>>9|(O&=65535)<<7&65535,O=O>>9|N<<7&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=((O&=65535)^V^k)+D+55764,E+=(w+=(N^R^j)+s+53305)>>16,U=(E&=65535)>>12|(w&=65535)<<4&65535,E=w>>12|E<<4&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=((E&=65535)^O^V)+S+59099,k+=(j+=(w^N^R)+b+39397)>>16,U=(k&=65535)>>5|(j&=65535)<<11&65535,k=j>>5|k<<11&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=((k&=65535)^E^O)+T+8098,V+=(R+=(j^w^N)+l+31992)>>16,U=(R&=65535)>>16|(V&=65535)<<0&65535,V=V>>16|R<<0&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=((V&=65535)^k^E)+z+50348,O+=(N+=(R^j^w)+e+22117)>>16,U=(N&=65535)>>9|(O&=65535)<<7&65535,O=O>>9|N<<7&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=(V^(65535-k|(O&=65535)))+x+62505,E+=(w+=(R^(65535-j|N))+a+8772)>>16,U=(E&=65535)>>10|(w&=65535)<<6&65535,E=w>>10|E<<6&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=(O^(65535-V|(E&=65535)))+y+17194,k+=(j+=(N^(65535-R|w))+A+65431)>>16,U=(k&=65535)>>6|(j&=65535)<<10&65535,k=j>>6|k<<10&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=(E^(65535-O|(k&=65535)))+I+43924,V+=(R+=(w^(65535-N|j))+u+9127)>>16,U=(V&=65535)>>1|(R&=65535)<<15&65535,V=R>>1|V<<15&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=(k^(65535-E|(V&=65535)))+m+64659,O+=(N+=(j^(65535-w|R))+d+41017)>>16,U=(N&=65535)>>11|(O&=65535)<<5&65535,O=O>>11|N<<5&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=(V^(65535-k|(O&=65535)))+S+25947,E+=(w+=(R^(65535-j|N))+b+22979)>>16,U=(E&=65535)>>10|(w&=65535)<<6&65535,E=w>>10|E<<6&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=(O^(65535-V|(E&=65535)))+v+36620,k+=(j+=(N^(65535-R|w))+c+52370)>>16,U=(k&=65535)>>6|(j&=65535)<<10&65535,k=j>>6|k<<10&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=(E^(65535-O|(k&=65535)))+L+65519,V+=(R+=(w^(65535-N|j))+_+62589)>>16,U=(V&=65535)>>1|(R&=65535)<<15&65535,V=R>>1|V<<15&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=(k^(65535-E|(V&=65535)))+F+34180,O+=(N+=(j^(65535-w|R))+r+24017)>>16,U=(N&=65535)>>11|(O&=65535)<<5&65535,O=O>>11|N<<5&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=(V^(65535-k|(O&=65535)))+B+28584,E+=(w+=(R^(65535-j|N))+i+32335)>>16,U=(E&=65535)>>10|(w&=65535)<<6&65535,E=w>>10|E<<6&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=(O^(65535-V|(E&=65535)))+T+65068,k+=(j+=(N^(65535-R|w))+l+59104)>>16,U=(k&=65535)>>6|(j&=65535)<<10&65535,k=j>>6|k<<10&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=(E^(65535-O|(k&=65535)))+p+41729,V+=(R+=(w^(65535-N|j))+C+17172)>>16,U=(V&=65535)>>1|(R&=65535)<<15&65535,V=R>>1|V<<15&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=(k^(65535-E|(V&=65535)))+Y+19976,O+=(N+=(j^(65535-w|R))+f+4513)>>16,U=(N&=65535)>>11|(O&=65535)<<5&65535,O=O>>11|N<<5&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),E+=(V^(65535-k|(O&=65535)))+g+63315,E+=(w+=(R^(65535-j|N))+o+32386)>>16,U=(E&=65535)>>10|(w&=65535)<<6&65535,E=w>>10|E<<6&65535,E+=O,(w=U+N)>65535&&(w&=65535,E++),k+=(O^(65535-V|(E&=65535)))+M+48442,k+=(j+=(N^(65535-R|w))+n+62005)>>16,U=(k&=65535)>>6|(j&=65535)<<10&65535,k=j>>6|k<<10&65535,k+=E,(j=U+w)>65535&&(j&=65535,k++),V+=(E^(65535-O|(k&=65535)))+z+10967,V+=(R+=(w^(65535-N|j))+e+53947)>>16,U=(V&=65535)>>1|(R&=65535)<<15&65535,V=R>>1|V<<15&65535,V+=k,(R=U+j)>65535&&(R&=65535,V++),O+=(k^(65535-E|(V&=65535)))+D+60294,O+=(N+=(j^(65535-w|R))+s+54161)>>16,U=(N&=65535)>>11|(O&=65535)<<5&65535,O=O>>11|N<<5&65535,O+=V,(N=U+R)>65535&&(N&=65535,O++),O&=65535,U=this.a_[0]+=w,this.a_[1]+=E,U>65535&&(this.a_[0]-=65536,this.a_[1]++),this.a_[1]&=65535,U=this.b_[0]+=N,this.b_[1]+=O,U>65535&&(this.b_[0]-=65536,this.b_[1]++),this.b_[1]&=65535,U=this.c_[0]+=R,this.c_[1]+=V,U>65535&&(this.c_[0]-=65536,this.c_[1]++),this.c_[1]&=65535,U=this.d_[0]+=j,this.d_[1]+=k,U>65535&&(this.d_[0]-=65536,this.d_[1]++),this.d_[1]&=65535},int2hex8:function(t){var h,a,r="",e="0123456789abcdef";for(h=0;h<4;h++)r+=e.charAt((a=t>>>8*h)>>4&15),r+=e.charAt(15&a);return r},update_std:function(t,h){var a,r,e,c,o,d,C,A,i,s,_,n,b,f,u,l,x=this.a_,F=this.b_,z=this.c_,v=this.d_;1==h?(a=t.charCodeAt(0)|t.charCodeAt(1)<<8|t.charCodeAt(2)<<16|t.charCodeAt(3)<<24,r=t.charCodeAt(4)|t.charCodeAt(5)<<8|t.charCodeAt(6)<<16|t.charCodeAt(7)<<24,e=t.charCodeAt(8)|t.charCodeAt(9)<<8|t.charCodeAt(10)<<16|t.charCodeAt(11)<<24,c=t.charCodeAt(12)|t.charCodeAt(13)<<8|t.charCodeAt(14)<<16|t.charCodeAt(15)<<24,o=t.charCodeAt(16)|t.charCodeAt(17)<<8|t.charCodeAt(18)<<16|t.charCodeAt(19)<<24,d=t.charCodeAt(20)|t.charCodeAt(21)<<8|t.charCodeAt(22)<<16|t.charCodeAt(23)<<24,C=t.charCodeAt(24)|t.charCodeAt(25)<<8|t.charCodeAt(26)<<16|t.charCodeAt(27)<<24,A=t.charCodeAt(28)|t.charCodeAt(29)<<8|t.charCodeAt(30)<<16|t.charCodeAt(31)<<24,i=t.charCodeAt(32)|t.charCodeAt(33)<<8|t.charCodeAt(34)<<16|t.charCodeAt(35)<<24,s=t.charCodeAt(36)|t.charCodeAt(37)<<8|t.charCodeAt(38)<<16|t.charCodeAt(39)<<24,_=t.charCodeAt(40)|t.charCodeAt(41)<<8|t.charCodeAt(42)<<16|t.charCodeAt(43)<<24,n=t.charCodeAt(44)|t.charCodeAt(45)<<8|t.charCodeAt(46)<<16|t.charCodeAt(47)<<24,b=t.charCodeAt(48)|t.charCodeAt(49)<<8|t.charCodeAt(50)<<16|t.charCodeAt(51)<<24,f=t.charCodeAt(52)|t.charCodeAt(53)<<8|t.charCodeAt(54)<<16|t.charCodeAt(55)<<24,u=t.charCodeAt(56)|t.charCodeAt(57)<<8|t.charCodeAt(58)<<16|t.charCodeAt(59)<<24,l=t.charCodeAt(60)|t.charCodeAt(61)<<8|t.charCodeAt(62)<<16|t.charCodeAt(63)<<24):(a=t.charCodeAt(0)|t.charCodeAt(1)<<16,r=t.charCodeAt(2)|t.charCodeAt(3)<<16,e=t.charCodeAt(4)|t.charCodeAt(5)<<16,c=t.charCodeAt(6)|t.charCodeAt(7)<<16,o=t.charCodeAt(8)|t.charCodeAt(9)<<16,d=t.charCodeAt(10)|t.charCodeAt(11)<<16,C=t.charCodeAt(12)|t.charCodeAt(13)<<16,A=t.charCodeAt(14)|t.charCodeAt(15)<<16,i=t.charCodeAt(16)|t.charCodeAt(17)<<16,s=t.charCodeAt(18)|t.charCodeAt(19)<<16,_=t.charCodeAt(20)|t.charCodeAt(21)<<16,n=t.charCodeAt(22)|t.charCodeAt(23)<<16,b=t.charCodeAt(24)|t.charCodeAt(25)<<16,f=t.charCodeAt(26)|t.charCodeAt(27)<<16,u=t.charCodeAt(28)|t.charCodeAt(29)<<16,l=t.charCodeAt(30)|t.charCodeAt(31)<<16),F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=(F=(z=(v=(x=F+((x+=a+3614090360+(F&z|~F&v))<<7|x>>>25))+((v+=r+3905402710+(x&F|~x&z))<<12|v>>>20))+((z+=e+606105819+(v&x|~v&F))<<17|z>>>15))+((F+=c+3250441966+(z&v|~z&x))<<22|F>>>10))+((x+=o+4118548399+(F&z|~F&v))<<7|x>>>25))+((v+=d+1200080426+(x&F|~x&z))<<12|v>>>20))+((z+=C+2821735955+(v&x|~v&F))<<17|z>>>15))+((F+=A+4249261313+(z&v|~z&x))<<22|F>>>10))+((x+=i+1770035416+(F&z|~F&v))<<7|x>>>25))+((v+=s+2336552879+(x&F|~x&z))<<12|v>>>20))+((z+=_+4294925233+(v&x|~v&F))<<17|z>>>15))+((F+=n+2304563134+(z&v|~z&x))<<22|F>>>10))+((x+=b+1804603682+(F&z|~F&v))<<7|x>>>25))+((v+=f+4254626195+(x&F|~x&z))<<12|v>>>20))+((z+=u+2792965006+(v&x|~v&F))<<17|z>>>15))+((F+=l+1236535329+(z&v|~z&x))<<22|F>>>10))+((x+=r+4129170786+(F&v|z&~v))<<5|x>>>27))+((v+=C+3225465664+(x&z|F&~z))<<9|v>>>23))+((z+=n+643717713+(v&F|x&~F))<<14|z>>>18))+((F+=a+3921069994+(z&x|v&~x))<<20|F>>>12))+((x+=d+3593408605+(F&v|z&~v))<<5|x>>>27))+((v+=_+38016083+(x&z|F&~z))<<9|v>>>23))+((z+=l+3634488961+(v&F|x&~F))<<14|z>>>18))+((F+=o+3889429448+(z&x|v&~x))<<20|F>>>12))+((x+=s+568446438+(F&v|z&~v))<<5|x>>>27))+((v+=u+3275163606+(x&z|F&~z))<<9|v>>>23))+((z+=c+4107603335+(v&F|x&~F))<<14|z>>>18))+((F+=i+1163531501+(z&x|v&~x))<<20|F>>>12))+((x+=f+2850285829+(F&v|z&~v))<<5|x>>>27))+((v+=e+4243563512+(x&z|F&~z))<<9|v>>>23))+((z+=A+1735328473+(v&F|x&~F))<<14|z>>>18))+((F+=b+2368359562+(z&x|v&~x))<<20|F>>>12))+((x+=d+4294588738+(F^z^v))<<4|x>>>28))+((v+=i+2272392833+(x^F^z))<<11|v>>>21))+((z+=n+1839030562+(v^x^F))<<16|z>>>16))+((F+=u+4259657740+(z^v^x))<<23|F>>>9))+((x+=r+2763975236+(F^z^v))<<4|x>>>28))+((v+=o+1272893353+(x^F^z))<<11|v>>>21))+((z+=A+4139469664+(v^x^F))<<16|z>>>16))+((F+=_+3200236656+(z^v^x))<<23|F>>>9))+((x+=f+681279174+(F^z^v))<<4|x>>>28))+((v+=a+3936430074+(x^F^z))<<11|v>>>21))+((z+=c+3572445317+(v^x^F))<<16|z>>>16))+((F+=C+76029189+(z^v^x))<<23|F>>>9))+((x+=s+3654602809+(F^z^v))<<4|x>>>28))+((v+=b+3873151461+(x^F^z))<<11|v>>>21))+((z+=l+530742520+(v^x^F))<<16|z>>>16))+((F+=e+3299628645+(z^v^x))<<23|F>>>9))+((x+=a+4096336452+(z^(~v|F)))<<6|x>>>26))+((v+=A+1126891415+(F^(~z|x)))<<10|v>>>22))+((z+=u+2878612391+(x^(~F|v)))<<15|z>>>17))+((F+=d+4237533241+(v^(~x|z)))<<21|F>>>11))+((x+=b+1700485571+(z^(~v|F)))<<6|x>>>26))+((v+=c+2399980690+(F^(~z|x)))<<10|v>>>22))+((z+=_+4293915773+(x^(~F|v)))<<15|z>>>17))+((F+=r+2240044497+(v^(~x|z)))<<21|F>>>11))+((x+=i+1873313359+(z^(~v|F)))<<6|x>>>26))+((v+=l+4264355552+(F^(~z|x)))<<10|v>>>22))+((z+=C+2734768916+(x^(~F|v)))<<15|z>>>17))+((F+=f+1309151649+(v^(~x|z)))<<21|F>>>11))+((x+=o+4149444226+(z^(~v|F)))<<6|x>>>26))+((v+=n+3174756917+(F^(~z|x)))<<10|v>>>22))+((z+=e+718787259+(x^(~F|v)))<<15|z>>>17))+((F+=s+3951481745+(v^(~x|z)))<<21|F>>>11),this.a_=this.a_+x&4294967295,this.b_=this.b_+F&4294967295,this.c_=this.c_+z&4294967295,this.d_=this.d_+v&4294967295},fillzero:function(t){for(var h="",a=0;a<t;a++)h+="\0";return h},main:function(t,h,a,r,e){if(1==e){for(var c=8*h;h>=64;)r[a](t,e),t=t.substr(64),h-=64;t+="",h>=56?(t+=this.fillzero(63-h),r[a](t,e),t=this.fillzero(56)):t+=this.fillzero(55-h),t+=String.fromCharCode(255&c,c>>>8&255,c>>>16&255,c>>>24),t+="\0\0\0\0",r[a](t,e)}else{for(c=16*h;h>=32;)r[a](t,e),t=t.substr(32),h-=32;t+="",h>=28?(t+=this.fillzero(31-h),r[a](t,e),t=this.fillzero(28)):t+=this.fillzero(27-h),t+=String.fromCharCode(65535&c,c>>>16),t+="\0\0",r[a](t,e)}},VERSION:"1.0",BY_ASCII:0,BY_UTF16:1,calc_Fx:function(t,h){var a=2==arguments.length&&h==this.BY_UTF16?2:1;return this.a_=[8961,26437],this.b_=[43913,61389],this.c_=[56574,39098],this.d_=[21622,4146],this.main(t,t.length,"update_Fx",this,a),this.int2hex8_Fx(this.a_)+this.int2hex8_Fx(this.b_)+this.int2hex8_Fx(this.c_)+this.int2hex8_Fx(this.d_)},calc_std:function(t,h){var a=2==arguments.length&&h==this.BY_UTF16?2:1;return this.a_=1732584193,this.b_=4023233417,this.c_=2562383102,this.d_=271733878,this.main(t,t.length,"update_std",this,a),this.int2hex8(this.a_)+this.int2hex8(this.b_)+this.int2hex8(this.c_)+this.int2hex8(this.d_)}}};new function(){CybozuLabs.MD5.calc=navigator.userAgent.match(/Firefox/)?CybozuLabs.MD5.calc_Fx:CybozuLabs.MD5.calc_std};

    /**
 * A JavaScript implementation of the SHA family of hashes - defined in FIPS PUB 180-4, FIPS PUB 202,
 * and SP 800-185 - as well as the corresponding HMAC implementation as defined in FIPS PUB 198-1.
 *
 * Copyright 2008-2021 Brian Turek, 1998-2009 Paul Johnston & Contributors
 * Distributed under the BSD License
 * See http://caligatio.github.com/jsSHA/ for more information
 *
 * Two ECMAScript polyfill functions carry the following license:
 *
 * Copyright (c) Microsoft Corporation. All rights reserved.
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at http://www.apache.org/licenses/LICENSE-2.0
 *
 * THIS CODE IS PROVIDED ON AN *AS IS* BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, EITHER EXPRESS OR IMPLIED,
 * INCLUDING WITHOUT LIMITATION ANY IMPLIED WARRANTIES OR CONDITIONS OF TITLE, FITNESS FOR A PARTICULAR PURPOSE,
 * MERCHANTABLITY OR NON-INFRINGEMENT.
 *
 * See the Apache Version 2.0 License for specific language governing permissions and limitations under the License.
 */
!function(r,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(r="undefined"!=typeof globalThis?globalThis:r||self).jsSHA=t()}(this,(function(){"use strict";var r=function(t,n){return(r=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(r,t){r.__proto__=t}||function(r,t){for(var n in t)Object.prototype.hasOwnProperty.call(t,n)&&(r[n]=t[n])})(t,n)};var t="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",n="ARRAYBUFFER not supported by this environment",e="UINT8ARRAY not supported by this environment";function i(r,t,n,e){var i,o,u,s=t||[0],f=(n=n||0)>>>3,a=-1===e?3:0;for(i=0;i<r.length;i+=1)o=(u=i+f)>>>2,s.length<=o&&s.push(0),s[o]|=r[i]<<8*(a+e*(u%4));return{value:s,binLen:8*r.length+n}}function o(r,o,u){switch(o){case"UTF8":case"UTF16BE":case"UTF16LE":break;default:throw new Error("encoding must be UTF8, UTF16BE, or UTF16LE")}switch(r){case"HEX":return function(r,t,n){return function(r,t,n,e){var i,o,u,s;if(0!=r.length%2)throw new Error("String of HEX type must be in byte increments");var f=t||[0],a=(n=n||0)>>>3,h=-1===e?3:0;for(i=0;i<r.length;i+=2){if(o=parseInt(r.substr(i,2),16),isNaN(o))throw new Error("String of HEX type contains invalid characters");for(u=(s=(i>>>1)+a)>>>2;f.length<=u;)f.push(0);f[u]|=o<<8*(h+e*(s%4))}return{value:f,binLen:4*r.length+n}}(r,t,n,u)};case"TEXT":return function(r,t,n){return function(r,t,n,e,i){var o,u,s,f,a,h,c,w,v=0,l=n||[0],E=(e=e||0)>>>3;if("UTF8"===t)for(c=-1===i?3:0,s=0;s<r.length;s+=1)for(u=[],128>(o=r.charCodeAt(s))?u.push(o):2048>o?(u.push(192|o>>>6),u.push(128|63&o)):55296>o||57344<=o?u.push(224|o>>>12,128|o>>>6&63,128|63&o):(s+=1,o=65536+((1023&o)<<10|1023&r.charCodeAt(s)),u.push(240|o>>>18,128|o>>>12&63,128|o>>>6&63,128|63&o)),f=0;f<u.length;f+=1){for(a=(h=v+E)>>>2;l.length<=a;)l.push(0);l[a]|=u[f]<<8*(c+i*(h%4)),v+=1}else for(c=-1===i?2:0,w="UTF16LE"===t&&1!==i||"UTF16LE"!==t&&1===i,s=0;s<r.length;s+=1){for(o=r.charCodeAt(s),!0===w&&(o=(f=255&o)<<8|o>>>8),a=(h=v+E)>>>2;l.length<=a;)l.push(0);l[a]|=o<<8*(c+i*(h%4)),v+=2}return{value:l,binLen:8*v+e}}(r,o,t,n,u)};case"B64":return function(r,n,e){return function(r,n,e,i){var o,u,s,f,a,h,c=0,w=n||[0],v=(e=e||0)>>>3,l=-1===i?3:0,E=r.indexOf("=");if(-1===r.search(/^[a-zA-Z0-9=+/]+$/))throw new Error("Invalid character in base-64 string");if(r=r.replace(/=/g,""),-1!==E&&E<r.length)throw new Error("Invalid '=' found in base-64 string");for(o=0;o<r.length;o+=4){for(f=r.substr(o,4),s=0,u=0;u<f.length;u+=1)s|=t.indexOf(f.charAt(u))<<18-6*u;for(u=0;u<f.length-1;u+=1){for(a=(h=c+v)>>>2;w.length<=a;)w.push(0);w[a]|=(s>>>16-8*u&255)<<8*(l+i*(h%4)),c+=1}}return{value:w,binLen:8*c+e}}(r,n,e,u)};case"BYTES":return function(r,t,n){return function(r,t,n,e){var i,o,u,s,f=t||[0],a=(n=n||0)>>>3,h=-1===e?3:0;for(o=0;o<r.length;o+=1)i=r.charCodeAt(o),u=(s=o+a)>>>2,f.length<=u&&f.push(0),f[u]|=i<<8*(h+e*(s%4));return{value:f,binLen:8*r.length+n}}(r,t,n,u)};case"ARRAYBUFFER":try{new ArrayBuffer(0)}catch(r){throw new Error(n)}return function(r,t,n){return function(r,t,n,e){return i(new Uint8Array(r),t,n,e)}(r,t,n,u)};case"UINT8ARRAY":try{new Uint8Array(0)}catch(r){throw new Error(e)}return function(r,t,n){return i(r,t,n,u)};default:throw new Error("format must be HEX, TEXT, B64, BYTES, ARRAYBUFFER, or UINT8ARRAY")}}function u(r,i,o,u){switch(r){case"HEX":return function(r){return function(r,t,n,e){var i,o,u="0123456789abcdef",s="",f=t/8,a=-1===n?3:0;for(i=0;i<f;i+=1)o=r[i>>>2]>>>8*(a+n*(i%4)),s+=u.charAt(o>>>4&15)+u.charAt(15&o);return e.outputUpper?s.toUpperCase():s}(r,i,o,u)};case"B64":return function(r){return function(r,n,e,i){var o,u,s,f,a,h="",c=n/8,w=-1===e?3:0;for(o=0;o<c;o+=3)for(f=o+1<c?r[o+1>>>2]:0,a=o+2<c?r[o+2>>>2]:0,s=(r[o>>>2]>>>8*(w+e*(o%4))&255)<<16|(f>>>8*(w+e*((o+1)%4))&255)<<8|a>>>8*(w+e*((o+2)%4))&255,u=0;u<4;u+=1)h+=8*o+6*u<=n?t.charAt(s>>>6*(3-u)&63):i.b64Pad;return h}(r,i,o,u)};case"BYTES":return function(r){return function(r,t,n){var e,i,o="",u=t/8,s=-1===n?3:0;for(e=0;e<u;e+=1)i=r[e>>>2]>>>8*(s+n*(e%4))&255,o+=String.fromCharCode(i);return o}(r,i,o)};case"ARRAYBUFFER":try{new ArrayBuffer(0)}catch(r){throw new Error(n)}return function(r){return function(r,t,n){var e,i=t/8,o=new ArrayBuffer(i),u=new Uint8Array(o),s=-1===n?3:0;for(e=0;e<i;e+=1)u[e]=r[e>>>2]>>>8*(s+n*(e%4))&255;return o}(r,i,o)};case"UINT8ARRAY":try{new Uint8Array(0)}catch(r){throw new Error(e)}return function(r){return function(r,t,n){var e,i=t/8,o=-1===n?3:0,u=new Uint8Array(i);for(e=0;e<i;e+=1)u[e]=r[e>>>2]>>>8*(o+n*(e%4))&255;return u}(r,i,o)};default:throw new Error("format must be HEX, B64, BYTES, ARRAYBUFFER, or UINT8ARRAY")}}var s=4294967296,f="Cannot set numRounds with MAC";function a(r,t){var n,e,i=r.binLen>>>3,o=t.binLen>>>3,u=i<<3,s=4-i<<3;if(i%4!=0){for(n=0;n<o;n+=4)e=i+n>>>2,r.value[e]|=t.value[n>>>2]<<u,r.value.push(0),r.value[e+1]|=t.value[n>>>2]>>>s;return(r.value.length<<2)-4>=o+i&&r.value.pop(),{value:r.value,binLen:r.binLen+t.binLen}}return{value:r.value.concat(t.value),binLen:r.binLen+t.binLen}}function h(r){var t={outputUpper:!1,b64Pad:"=",outputLen:-1},n=r||{},e="Output length must be a multiple of 8";if(t.outputUpper=n.outputUpper||!1,n.b64Pad&&(t.b64Pad=n.b64Pad),n.outputLen){if(n.outputLen%8!=0)throw new Error(e);t.outputLen=n.outputLen}else if(n.shakeLen){if(n.shakeLen%8!=0)throw new Error(e);t.outputLen=n.shakeLen}if("boolean"!=typeof t.outputUpper)throw new Error("Invalid outputUpper formatting option");if("string"!=typeof t.b64Pad)throw new Error("Invalid b64Pad formatting option");return t}function c(r,t,n,e){var i=r+" must include a value and format";if(!t){if(!e)throw new Error(i);return e}if(void 0===t.value||!t.format)throw new Error(i);return o(t.format,t.encoding||"UTF8",n)(t.value)}var w=function(){function r(r,t,n){var e=n||{};if(this.t=t,this.i=e.encoding||"UTF8",this.numRounds=e.numRounds||1,isNaN(this.numRounds)||this.numRounds!==parseInt(this.numRounds,10)||1>this.numRounds)throw new Error("numRounds must a integer >= 1");this.o=r,this.u=[],this.h=0,this.v=!1,this.l=0,this.A=!1,this.p=[],this.m=[]}return r.prototype.update=function(r){var t,n=0,e=this.U>>>5,i=this.R(r,this.u,this.h),o=i.binLen,u=i.value,s=o>>>5;for(t=0;t<s;t+=e)n+this.U<=o&&(this.T=this.F(u.slice(t,t+e),this.T),n+=this.U);this.l+=n,this.u=u.slice(n>>>5),this.h=o%this.U,this.v=!0},r.prototype.getHash=function(r,t){var n,e,i=this.C,o=h(t);if(this.H){if(-1===o.outputLen)throw new Error("Output length must be specified in options");i=o.outputLen}var s=u(r,i,this.S,o);if(this.A&&this.g)return s(this.g(o));for(e=this.L(this.u.slice(),this.h,this.l,this.B(this.T),i),n=1;n<this.numRounds;n+=1)this.H&&i%32!=0&&(e[e.length-1]&=16777215>>>24-i%32),e=this.L(e,i,0,this.k(this.o),i);return s(e)},r.prototype.setHMACKey=function(r,t,n){if(!this.Y)throw new Error("Variant does not support HMAC");if(this.v)throw new Error("Cannot set MAC key after calling update");var e=o(t,(n||{}).encoding||"UTF8",this.S);this.K(e(r))},r.prototype.K=function(r){var t,n=this.U>>>3,e=n/4-1;if(1!==this.numRounds)throw new Error(f);if(this.A)throw new Error("MAC key already set");for(n<r.binLen/8&&(r.value=this.L(r.value,r.binLen,0,this.k(this.o),this.C));r.value.length<=e;)r.value.push(0);for(t=0;t<=e;t+=1)this.p[t]=909522486^r.value[t],this.m[t]=1549556828^r.value[t];this.T=this.F(this.p,this.T),this.l=this.U,this.A=!0},r.prototype.getHMAC=function(r,t){var n=h(t);return u(r,this.C,this.S,n)(this.N())},r.prototype.N=function(){var r;if(!this.A)throw new Error("Cannot call getHMAC without first setting MAC key");var t=this.L(this.u.slice(),this.h,this.l,this.B(this.T),this.C);return r=this.F(this.m,this.k(this.o)),r=this.L(t,this.C,this.U,r,this.C)},r}(),v=function(r,t){this.I=r,this.M=t};function l(r,t){var n;return t>32?(n=64-t,new v(r.M<<t|r.I>>>n,r.I<<t|r.M>>>n)):0!==t?(n=32-t,new v(r.I<<t|r.M>>>n,r.M<<t|r.I>>>n)):r}function E(r,t){return new v(r.I^t.I,r.M^t.M)}var A=[new v(0,1),new v(0,32898),new v(2147483648,32906),new v(2147483648,2147516416),new v(0,32907),new v(0,2147483649),new v(2147483648,2147516545),new v(2147483648,32777),new v(0,138),new v(0,136),new v(0,2147516425),new v(0,2147483658),new v(0,2147516555),new v(2147483648,139),new v(2147483648,32905),new v(2147483648,32771),new v(2147483648,32770),new v(2147483648,128),new v(0,32778),new v(2147483648,2147483658),new v(2147483648,2147516545),new v(2147483648,32896),new v(0,2147483649),new v(2147483648,2147516424)],b=[[0,36,3,41,18],[1,44,10,45,2],[62,6,43,15,61],[28,55,25,21,56],[27,20,39,8,14]];function d(r){var t,n=[];for(t=0;t<5;t+=1)n[t]=[new v(0,0),new v(0,0),new v(0,0),new v(0,0),new v(0,0)];return n}function p(r){var t,n=[];for(t=0;t<5;t+=1)n[t]=r[t].slice();return n}function y(r,t){var n,e,i,o,u,s,f,a,h,c=[],w=[];if(null!==r)for(e=0;e<r.length;e+=2)t[(e>>>1)%5][(e>>>1)/5|0]=E(t[(e>>>1)%5][(e>>>1)/5|0],new v(r[e+1],r[e]));for(n=0;n<24;n+=1){for(o=d(),e=0;e<5;e+=1)c[e]=(u=t[e][0],s=t[e][1],f=t[e][2],a=t[e][3],h=t[e][4],new v(u.I^s.I^f.I^a.I^h.I,u.M^s.M^f.M^a.M^h.M));for(e=0;e<5;e+=1)w[e]=E(c[(e+4)%5],l(c[(e+1)%5],1));for(e=0;e<5;e+=1)for(i=0;i<5;i+=1)t[e][i]=E(t[e][i],w[e]);for(e=0;e<5;e+=1)for(i=0;i<5;i+=1)o[i][(2*e+3*i)%5]=l(t[e][i],b[e][i]);for(e=0;e<5;e+=1)for(i=0;i<5;i+=1)t[e][i]=E(o[e][i],new v(~o[(e+1)%5][i].I&o[(e+2)%5][i].I,~o[(e+1)%5][i].M&o[(e+2)%5][i].M));t[0][0]=E(t[0][0],A[n])}return t}function m(r){var t,n,e=0,i=[0,0],o=[4294967295&r,r/s&2097151];for(t=6;t>=0;t--)0===(n=o[t>>2]>>>8*t&255)&&0===e||(i[e+1>>2]|=n<<8*(e+1),e+=1);return e=0!==e?e:1,i[0]|=e,{value:e+1>4?i:[i[0]],binLen:8+8*e}}function U(r){return a(m(r.binLen),r)}function R(r,t){var n,e=m(t),i=t>>>2,o=(i-(e=a(e,r)).value.length%i)%i;for(n=0;n<o;n++)e.value.push(0);return e.value}return function(t){function n(r,n,e){var i=this,u=6,s=0,a=e||{};if(1!==(i=t.call(this,r,n,e)||this).numRounds){if(a.kmacKey||a.hmacKey)throw new Error(f);if("CSHAKE128"===i.o||"CSHAKE256"===i.o)throw new Error("Cannot set numRounds for CSHAKE variants")}switch(i.S=1,i.R=o(i.t,i.i,i.S),i.F=y,i.B=p,i.k=d,i.T=d(),i.H=!1,r){case"SHA3-224":i.U=s=1152,i.C=224,i.Y=!0,i.g=i.N;break;case"SHA3-256":i.U=s=1088,i.C=256,i.Y=!0,i.g=i.N;break;case"SHA3-384":i.U=s=832,i.C=384,i.Y=!0,i.g=i.N;break;case"SHA3-512":i.U=s=576,i.C=512,i.Y=!0,i.g=i.N;break;case"SHAKE128":u=31,i.U=s=1344,i.C=-1,i.H=!0,i.Y=!1,i.g=null;break;case"SHAKE256":u=31,i.U=s=1088,i.C=-1,i.H=!0,i.Y=!1,i.g=null;break;case"KMAC128":u=4,i.U=s=1344,i.X(e),i.C=-1,i.H=!0,i.Y=!1,i.g=i.O;break;case"KMAC256":u=4,i.U=s=1088,i.X(e),i.C=-1,i.H=!0,i.Y=!1,i.g=i.O;break;case"CSHAKE128":i.U=s=1344,u=i.j(e),i.C=-1,i.H=!0,i.Y=!1,i.g=null;break;case"CSHAKE256":i.U=s=1088,u=i.j(e),i.C=-1,i.H=!0,i.Y=!1,i.g=null;break;default:throw new Error("Chosen SHA variant is not supported")}return i.L=function(r,t,n,e,i){return function(r,t,n,e,i,o,u){var s,f,a=0,h=[],c=i>>>5,w=t>>>5;for(s=0;s<w&&t>=i;s+=c)e=y(r.slice(s,s+c),e),t-=i;for(r=r.slice(s),t%=i;r.length<c;)r.push(0);for(r[(s=t>>>3)>>2]^=o<<s%4*8,r[c-1]^=2147483648,e=y(r,e);32*h.length<u&&(f=e[a%5][a/5|0],h.push(f.M),!(32*h.length>=u));)h.push(f.I),0==64*(a+=1)%i&&(y(null,e),a=0);return h}(r,t,0,e,s,u,i)},a.hmacKey&&i.K(c("hmacKey",a.hmacKey,i.S)),i}return function(t,n){if("function"!=typeof n&&null!==n)throw new TypeError("Class extends value "+String(n)+" is not a constructor or null");function e(){this.constructor=t}r(t,n),t.prototype=null===n?Object.create(n):(e.prototype=n.prototype,new e)}(n,t),n.prototype.j=function(r,t){var n=function(r){var t=r||{};return{funcName:c("funcName",t.funcName,1,{value:[],binLen:0}),customization:c("Customization",t.customization,1,{value:[],binLen:0})}}(r||{});t&&(n.funcName=t);var e=a(U(n.funcName),U(n.customization));if(0!==n.customization.binLen||0!==n.funcName.binLen){for(var i=R(e,this.U>>>3),o=0;o<i.length;o+=this.U>>>5)this.T=this.F(i.slice(o,o+(this.U>>>5)),this.T),this.l+=this.U;return 4}return 31},n.prototype.X=function(r){var t=function(r){var t=r||{};return{kmacKey:c("kmacKey",t.kmacKey,1),funcName:{value:[1128353099],binLen:32},customization:c("Customization",t.customization,1,{value:[],binLen:0})}}(r||{});this.j(r,t.funcName);for(var n=R(U(t.kmacKey),this.U>>>3),e=0;e<n.length;e+=this.U>>>5)this.T=this.F(n.slice(e,e+(this.U>>>5)),this.T),this.l+=this.U;this.A=!0},n.prototype.O=function(r){var t=a({value:this.u.slice(),binLen:this.h},function(r){var t,n,e=0,i=[0,0],o=[4294967295&r,r/s&2097151];for(t=6;t>=0;t--)0==(n=o[t>>2]>>>8*t&255)&&0===e||(i[e>>2]|=n<<8*e,e+=1);return i[(e=0!==e?e:1)>>2]|=e<<8*e,{value:e+1>4?i:[i[0]],binLen:8+8*e}}(r.outputLen));return this.L(t.value,t.binLen,this.l,this.B(this.T),r.outputLen)},n}(w)}));

      window.onload = function() {
        _("gethash").onclick = function() {

          _("md5").value = CybozuLabs.MD5.calc(_("save").value);
          
          var shaObj = new jsSHA("SHA3-256","TEXT",{encoding:"UTF8"});
          shaObj.update(_("save").value);
          _("sha3_256").value = shaObj.getHash("HEX").toLowerCase();

          var shaObj = new jsSHA("SHA3-384","TEXT",{encoding:"UTF8"});
          shaObj.update(_("save").value);
          _("sha3_384").value = shaObj.getHash("HEX").toLowerCase();

          var shaObj3 = new jsSHA("SHA3-512","TEXT",{encoding:"UTF8"});
          shaObj3.update(_("save").value);
          _("sha3_512").value = shaObj3.getHash("HEX").toLowerCase();

        }
      }

    </script>
    <?=Get_Default()?>
  </head>
  <body style="background-color:#6495ed;color:#080808;overflow-x:hidden;overflow-y:visible;">
    <noscript><div title="NO SCRIPT ERROR" style="background-color:#404ff0;" align="center"><font color="#ff4500"><h1>No JavaScript Error.</h1></font></div></noscript>
    <div align="center" id="home">
        <h1>ハッシュ(md5、sha3-256、sha3-364、sha3-512)計算ツール | ActiveTK.jp</h1>
        <form action="" method="POST" id="td">
          <textarea rows="14" id="save" style="margin: 0px; height: 140px; width: 542px;" placeholder="// ハッシュ化したい文字列を入力してください"></textarea>
          <br>
          <input type="button" id="gethash" value="ハッシュ計算" style="height:60px;width:140px;">
          <hr size="1" color="#7fffd4">
          ↓↓結果↓↓<br>
          MD5: <input type="text" id="md5" style="margin: 0px; height: 50px; width: 542px;" readonly><br>
          SHA3-256: <input type="text" id="sha3_256" style="margin: 0px; height: 50px; width: 542px;" readonly><br>
          SHA3-384: <input type="text" id="sha3_384" style="margin: 0px; height: 50px; width: 542px;" readonly><br>
          SHA3-512: <input type="text" id="sha3_512" style="margin: 0px; height: 50px; width: 542px;" readonly><br>
        </form>
    </div>
    <br>
    <hr size="1" color="#7fffd4">
    <div align="center"><?=Get_Last()?></div>
    <br>
  </body>
</html>