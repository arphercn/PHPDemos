<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>面向过程责任链</title>
</head>
<body>
<?php 
$msgLevel = $_GET['msgLevel'];
if($msgLevel==1) {
	$moderator = new Moderator;
	$moderator->process();
}else if($msgLevel==2) {
	$admin = new Admin;
	$admin->process();
}else if($msgLevel==3) {
	$police = new Police;
	$police->process();
}

class Moderator {
	public function process() {
		echo '删帖';
	}
}
class Admin {
	public function process() {
		echo '删帖,封掉账号';
	}
}
class Police {
	public function process() {
		echo '抓起来';
	}
}
?>
<form action="process.php">
	<select name="msgLevel" id="">
		<option value="1">粗口</option>
		<option value="2">黄赌毒</option>
		<option value="3">分裂国家</option>
	</select>
	<button type="submit">举报</button>
</form>
</body>
</html>
