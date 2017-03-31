<?php
class member_login {
    
    private $host = 'localhost';
    private $user = 'root';
    private $passed = 'root';
    private $db = 'test';

    function __construct(){
        $this->_connect_sql();
        $this->_select_db();
    }
    
    function _connect_sql(){
        return @mysql_connect($this->host,$this->user,$this->passed);
    }
    
    function _select_db(){
        mysql_query("SET NAMES 'utf8'");
        return @mysql_select_db($this->db);
    }
    
    function _auth_login(){
        $num_rows = 0;
        $account = $_POST['account'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `php_unit` WHERE account = '{$account}' AND password = '{$password}'";
        $result = mysql_query($sql);
        if($result != FALSE){
            $num_rows = mysql_num_rows($result);
        }
        if($num_rows != 0)
            return TRUE;
        return FALSE;
    }
    
    function login(){
        if($this->_auth_login())
            return 'login';
        return 'not_login';
    }
    
    function display(){
        echo $this->login();
    }
    
}
