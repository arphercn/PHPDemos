<?php
require_once('API/qqConnectAPI.php');


echo 'get到的code值是'.$_GET['code'];

//请求accessToken
$oAuth = new Oauth();
$accessToken = $oAuth->qq_callback();
$openID =  $oAuth->get_openid();

echo 'accessToken为'.$accessToken.'<br>';
echo 'openID为'.$openID.'<br>';


setcookie('qq_accessToken',$accessToken,time()+86400);
setcookie('qq_openID',$openID,time()+86400);

echo '现在把$_COOKIE值设为';
var_dump($_COOKIE);

header('Location: index.php');
