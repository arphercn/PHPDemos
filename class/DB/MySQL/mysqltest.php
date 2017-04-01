<?php  
      
    require_once 'Mysql.php';  
    require_once 'mysqlconfig.php';  
      
    $db = new mysql();  
    $link = $db->connect();  
    var_dump($link);  
      
      
    $sql='SELECT * FROM goods';  
    $rows = $db->fetchAll($sql);  
    var_dump($rows);

    $sql='SELECT * FROM goods WHERE id=1';  
    $row = $db->fetchOne($sql);  
    var_dump($row);

