<?php
//对于修改是封闭的,对于扩展是开放的

//共同接口
interface DB{
	function conn();
}
interface Factory{
	function createDB();
}

//服务器端

//连接数据库
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
//创建数据库
class FactoryMysql implements Factory{
	public function createDB(){
		return new DBmysql;
	}
}
class FactorySqlite implements Factory{
	public function createDB(){
		return new DBsqlite;
	}
}

/*
 *当需要增加数据库时
 */
class DBoracle implements DB{
	public function conn(){
		echo '连接数据库oracle成功<br>';
	}
}
class FactoryOracle implements Factory{
	public function createDB(){
		return new DBoracle;
	}
} 

//客户端
$factory = new FactoryMysql;
$db = $factory->createDB();
$db->conn();

$factory = new FactorySqlite;
$factory->createDB()->conn();

$factory = new FactoryOracle;
$factory->createDB()->conn();

