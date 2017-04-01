<?php

class Single{
	protected static $instance = null;

	public static function getInstance(){
		if(self::$instance===null){
			self::$instance = new self();
		}
		return self::$instance;
	}
	//方法前加final,则方法不能被覆盖,类前加final,则类不能被集成
	final protected function __construct(){

	}
	//封锁clone
	final protected function __clone(){
		
	}
}

$s1 = Single::getInstance();
$s2 = Single::getInstance();
//注意,2个对象是一个的时候,才全等
if($s1===$s2){
	echo '是一个对象';
}else{
	echo '不是一个对象';
}