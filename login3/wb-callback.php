<?php
require_once('API/wbConnectAPI.php');

$code = $_GET['code'];


$keys['code'] = $code;
$keys['redirect_uri'] = CALLBACK;

//请求accessToken
$oAuth = new SaeTOAuthV2(WB_KEY,WB_SECRET);

$accessTokenArray = $oAuth->getAccessToken( $type = 'code',$keys);
$access_token = $accessTokenArray['access_token'];
$uid = $accessTokenArray['uid'];


setcookie('wb_accessToken',$access_token,time()+86400);
setcookie('wb_uid',$uid,time()+86400);

header('Location: index.php');