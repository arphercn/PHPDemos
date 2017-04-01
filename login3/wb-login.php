<?php

require_once('API/wbConnectAPI.php');

$oAuth = new SaeTOAuthV2(WB_KEY,WB_SECRET);

$oAuthUrl = $oAuth->getAuthorizeURL(CALLBACK);

header('Location: '.$oAuthUrl);