<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>面向过程责任链</title>
</head>
<body>
<?php 
$msgLevel = isset($_GET['msgLevel'])?intval($_GET['msgLevel']):0;

$moderator = new Moderator;
$moderator->process($msgLevel);

class Moderator {
	protected $power = 1;
	protected $superior = 'Admin';
	public function process($msgLevel) {
		if($msgLevel <= $this->power) {
			echo '删帖';
		} else {
			$superior = new $this->superior;
			$superior->process($msgLevel);
		}
	}
}
class Admin {
	protected $power = 2;
	protected $superior = 'Police';
	public function process($msgLevel) {
		if($msgLevel <= $this->power) {
			echo '删帖,封掉账号';
		} else {
			$superior = new $this->superior;
			$superior->process($msgLevel);
		}
	}
}
class Police {
	protected $power = 99;
	protected $superior = '';
	public function process($msgLevel) {
		if($msgLevel <= $this->power) {
			echo '抓起来';
		} else {
			$superior = new $this->superior;
			$superior->process($msgLevel);
		}
	}
}
?>
<form action="partten.php">
	<select name="msgLevel" id="">
		<option value="1">粗口</option>
		<option value="2">黄赌毒</option>
		<option value="3">分裂国家</option>
	</select>
	<button type="submit">举报</button>
</form>
</body>
</html>
