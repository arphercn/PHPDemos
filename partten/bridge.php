<?php
//用桥接模式 通过不同的方式发送不同类型的消息
abstract class Msg{
	protected $sendClass;

	public function __construct($sendClass){
		$this->sendClass = $sendClass;
	}

	abstract public function createMsg($msg);

	public function send($user,$msg){
		$content = $this->createMsg($msg);
		$this->sendClass->send($user,$content);
	}
}

class Website{
	public function send($user,$content){
		echo '发站内信给 '.$user.' 内容是: '.$content.'<br>';
	}	
}
class Email{
	public function send($user,$content){
		echo '发email给 '.$user.' 内容是: '.$content.'<br>';
	}	
}
class Moblie{
	public function send($user,$content){
		echo '发短信给 '.$user.' 内容是: '.$content.'<br>';
	}	
}

class NoticeMsg extends Msg{
	public function createMsg($msg){
		return '提示信息,'.$msg;
	}
}
class WarningMsg extends Msg{
	public function createMsg($msg){
		return '警告信息,'.$msg;
	}
}


//用站内信发送普通信息
$msg = new NoticeMsg(new Website());
$msg->send('小明','您已经修改了密码.');

//用邮箱发送普通信息
$msg2 = new NoticeMsg(new Email());
$msg2->send('李刚','您已提交密码修改申请,请等待.');

//用手机发送警告信息
$msg3 = new WarningMsg(new Moblie());
$msg3->send('韩梅梅','汇款前请详细核实对方的真实信息!');