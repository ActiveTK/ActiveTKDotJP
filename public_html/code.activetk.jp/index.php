<!-- ------------------------------------------------- -->
<!-- Copyright (c) 2020 ActiveTK. All rights reserved. -->
<!-- ------------------------------------------------- -->

<!DOCTYPE html>
<html lang="ja" itemscope="" itemtype="http://schema.org/WebPage" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="ActiveTK,activetk.cf,code.activetk.cf">
    <title>File List of http://code.activetk.cf/</title>
    <base href="http://code.activetk.cf/">
    <meta name="author" content="ActiveTK.">
    <meta name="ROBOTS" content="ALL">
    <meta name="favicon" content="http://activetk.cf/icon/index_32_32.ico">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="description" content="JavaScriptのファイルリストです。">
    <meta name="copyright" content="Copyright &copy; 2020 ActiveTK. All rights reserved.">
    <meta name="thumbnail" content="http://activetk.cf/icon/index.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ActiveTK5929">
    <meta name="twitter:creator" content="@ActiveTK5929">
    <meta name="twitter:title" content="File List of http://code.activetk.cf/">
    <meta name="twitter:description" content="JavaScriptのファイルリストです。">
    <meta name="twitter:image:src" content="http://activetk.cf/icon/index.jpg">
    <meta property="og:title" content="File List of http://code.activetk.cf/">
    <meta property="og:description" content="JavaScriptのファイルリストです。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://code.activetk.cf/">
    <meta property="og:site_name" content="File List of http://code.activetk.cf/">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:image" content="http://activetk.cf/icon/index.jpg">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <link rel="canonical" href="http://code.activetk.cf/">
    <link rel="shortcut icon" href="http://activetk.cf/icon/index_16_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="http://activetk.cf/icon/index_32_32.ico" sizes="32x32">
    <link rel="shortcut icon" href="http://activetk.cf/icon/index_64_64.ico" sizes="64x64">
    <link rel="shortcut icon" href="http://activetk.cf/icon/index_192_192.ico" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="http://activetk.cf/icon/index_150_150.ico">
    <style>a{color: #00ff00;position: relative;display: inline-block;transition: .3s;}a::after {position: absolute;bottom: 0;left: 50%;content: '';width: 0;height: 2px;background-color: #31aae2;transition: .3s;transform: translateX(-50%);}a:hover::after{width: 100%;}</style>
</head>
<body style="background-color:#000000;">
    <div align="center" id="home">
        <font color="#ffffff">
            <h2>File List of [<a href='http://code.activetk.cf/' target='_blank' rel='noopener noreferrer'>http://code.activetk.cf/</a>]</h2>
<?php
$filelist = glob("" .'*.js');
foreach ($filelist as $file) {
	if (is_file($file)) {
		$filetmp = rawurlencode($file);
		print("<a href='{$filetmp}' target='_blank' rel='noopener noreferrer'>" . $file . "</a>");
		echo nl2br("\n");
	}
}
?>
        </font>
    </div>
    <div align="right" style="position: fixed;bottom: 0px;right: 0px;"><font style="background-color:#06f5f3;">Copyright &copy; 2020 ActiveTK. All rights reserved.</font></div>
    <br><br><br>
</body>
</html>