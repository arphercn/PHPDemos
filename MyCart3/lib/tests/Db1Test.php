<?php

require_once(__DIR__ . '/../Db.class.php');

class Db1Test extends PHPUnit_Framework_TestCase
{
    public function testQuery()
    {

        $model = new Db();
        $this->assertEquals([['id'=>2,'name'=>'dog','num'=>22]], 
            $model->query('select * from goods where id = :id',['id'=>2]));

        $this->assertEquals(0, 
            $model->query('update goods set num = :num where name = :name',
                ['num'=>'33','name'=>'cat']));

    }
        
}

