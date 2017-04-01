<?php

//下载地址http://www.ibm.com/developerworks/cn/opensource/os-cn-observerspl/

header('Content-Type: text/html');

function __autoload($className) {
    require_once "$className.class.php";
}

$emailSender = new EmailSender();
$mobileSender = new MobileSender();
$webSender = new WebsiteSender();
$login = new Login();

$user = new User('user1@domain.com', '张三', '13610002000', '123456');

// 创建用户时通过Email和手机短信通知用户
$user->attach($emailSender);
$user->attach($mobileSender);
$user->create($user);
echo '<br>';

// 用户忘记密码后重置密码，还需要通过站内小纸条通知用户
$user->attach($webSender);
$user->resetPassword();
echo '<br>';

// 用户变更了密码，但是不要给他的手机发短信
$user->detach($mobileSender);
$user->changePassword('654321');
echo '<br>';

//用户登录后,显示登陆次数
$user->attach($login);
$user->detach($emailSender);
$user->detach($webSender);
$loginTimes = mt_rand(1, 6);
$user->login($loginTimes);
echo '<br>';
