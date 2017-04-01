<?php

require_once('API/qqConnectAPI.php');


//访问qq登录页面
$oAuth = new Oauth();
$oAuth->qq_login();