<?php
	//包含这个类image.class.php
	include "image.class.php";

	$img = new Image("./images");


	echo $img->thumb("dx.jpg", 250, 250, "th_")."<br>";

	
	echo $img->watermark("dx.jpg", "php.gif", 9, "wa_")."<br>";	


	//  122   104   104  108
	echo $img->cut("cx.png", 122, 104, 104, 108); 
