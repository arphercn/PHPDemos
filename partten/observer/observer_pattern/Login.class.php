<?php

class Login implements SplObserver {

    public function update(SplSubject $subject) {
        if (func_num_args() === 2) {
            $userInfo = func_get_arg(1);

            if($userInfo['loginTimes'] < 4){
            	 echo "你好{$userInfo['username']}" .
            	"这是你第{$userInfo['loginTimes']}次安全登录", '<br>';
            }else{
            	echo "你好{$userInfo['username']}" .
            	"这是你第{$userInfo['loginTimes']}次登录,请检查你的账户安全异常!", '<br>';
            }
           
        }
    }

}