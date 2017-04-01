<?php
// http://jarbob.com/2016/07/15/PHP-mysql-PDO-%E5%92%8Cmysql%E7%B1%BB%E7%9A%84%E5%B0%81%E8%A3%85/
// 测试失败
require_once "i_DAo.interface.php";
// require_once "MySqlDB.class.php";
require_once "PDODB.class.php";
require_once "Model.php";

$config = array(
            'host' => 'localhost',
            'user' => 'root',
            'password' => 'root',
            'dbname' => 'test'
        );

$model = new PDODB($config);

$sql = 'select * from goods';
$res = $model->fetchAll($sql);
var_dump($res);