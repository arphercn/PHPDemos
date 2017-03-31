<?php
require_once('unit.php');
require_once('member_login.php');
class test_member_login {

    function __construct(){
        $this->unit = new unit;
        $this->member = new member_login;
        $this->index();
    }
    
    function index()
    {
        $this->_set_post();
        $this->test_connect();
        $this->test_select_db();
        $this->test_auth_login();
        echo $this->unit->report();
    }
    
    /* _set_post()
     *  這東西就是一般所謂的假資料。很多人都把假資料用完就丟。
     *  卻從不知道假資料可以放在這用來做測試使用。
     *  真可惜了沒有資源再利用。
     */
    function _set_post()
    {
        $_POST['account'] = 'admin'; //測試用的帳號
        $_POST['password'] = '123456'; //測試用的密碼
    }
    
    function test_connect(){
        $this->unit->run($this->member->_connect_sql(),'is_true','测试数据库连接');
    }
    
    function test_select_db(){
        $this->unit->run($this->member->_select_db(),'is_true','测连接数据库名称');
    }
    
    function test_auth_login()
    {
        mysql_close();
        $member = new member_login;
        $this->unit->run($member->_auth_login(),'is_true','测试账号密码是否正确');
    }
    
}
$test = new test_member_login;
