<?php

//共同接口
interface DB{
	function conn();
}

//服务器端(让客户端知道的越少越好)
class DBmysql implements DB{
	public function conn(){
		echo '连上了mysql<br>';
	}
}
class DBsqlite implements DB{
	public function conn(){
		echo '连上了sqlite<br>';
	}
}

class Factory{
	public static function createDB($type){
		if($type=='mysql'){
			return new DBmysql;
		}else if($type=='sqlite'){
			return new DBsqlite;
		}else{
			throw new Exception('Error db type',1);
		}
	}
}

//客户端
//不知道服务器的类名
//只知道对方开放了Factory::createDB方法
//方法允许传递数据库名称
Factory::createDB('mysql')->conn();
Factory::createDB('sqlite')->conn();


