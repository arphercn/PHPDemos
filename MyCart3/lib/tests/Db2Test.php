<?php

require_once(__DIR__ . '/../Db.class.php');

/**
 * 数据库测试
 * 注意:继承的是._Database_.类
 */
class Db2Test extends PHPUnit_Extensions_Database_TestCase
{
    /**
     * connect Database
     *
     * @return \PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     */
    public function getConnection()
    {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=test", "root", "root");
 
        return $this->createDefaultDBConnection($pdo, "test");
    }
 
    /**
     * Set up fixture
     * 使用xml文件作为测试文件
     * @return \PHPUnit_Extensions_Database_DataSet_XmlDataSet
     */
    public function getDataSet()
    {
        return $this->createXMLDataSet("user.xml");
    }
 
    /**
     * 测试user.xml的行数
     * @return [type] [description]
     */
    public function testGetRowCount()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('user'));
    }

    /**
     * 测试query方法
     * 从数据库中读取,然后和expectedUser.xml比较
     * @return [type] [description]
     */
    public function testQuery()
    {
        $model = new Db();
        $model->query('
            update user set password = :password where username = :username',
            ['password'=>'111111','username'=>'bbbb']
            );

        $queryTable = $this->getConnection()->createQueryTable(
            'user', 'select id,username,password from user'
            );
        $expectedTable = $this->createFlatXmlDataSet("expectedUser.xml")
                              ->getTable("user");
        $this->assertTablesEqual($expectedTable, $queryTable);
    }

}
