<?php
require_once('member_login.php');
$member = new member_login;
$member->login();

$member->display();