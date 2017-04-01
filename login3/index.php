<?php
require_once('API/qqConnectAPI.php');
require_once('API/wbConnectAPI.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>第三方登陆</title>
</head>
<body>
	<? if(!isset($_COOKIE['qq_accessToken'])){ ?>
		<a href="http://127.0.0.1/login3/qq-login.php">登录qq</a>
	<? }else{ ?>
		<a href="qq-logout.php">退出qq</a>
		<?
		 $qc = new QC($_COOKIE['qq_accessToken'],$_COOKIE['qq_openID']);
		 $qqInfo = $qc->get_user_info();
		 
		 ?>
		 你好:<?= $qqInfo['nickname'] ?>
		 <br>
		 <img src="<?= $qqInfo['figureurl_qq_2'] ?>" alt="">
	<? } ?>

	<? if(!isset($_COOKIE['wb_accessToken'])){ ?>
		<a href="http://arpher.com/login3/wb-login.php">登录微博</a>
	<? }else{ ?>
		<a href="http://arpher.com/login3/wb-logout.php">退出微博</a>
		<?

		 $oAuth = new SaeTClientV2(WB_KEY, WB_SECRET, $_COOKIE['wb_accessToken']);
		 $wbInfo = $oAuth->show_user_by_id($_COOKIE['wb_uid']);
		 // $wbInfo = $oAuth->update('111111111111');
		 
		 ?>
		 你好:<?= $wbInfo['name'] ?>
		 <br>
		 <img src="<?= $wbInfo['profile_image_url'] ?>" alt="">
	<? } ?>
</body>
</html>