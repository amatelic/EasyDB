<?php

use EasyDB\database\Mysql;
class MysqlDbTest extends PHPUnit_Framework_TestCase
{
    protected static $dbh;
    public $conf;

    public function setUp()
    {
        $conf = array(
            'hostname' => 'localhost',
            'database' => 'test',
            'table' => 'users',
            'username' => 'root',
            'password' => 'root'
        );
        $this->database = new Mysql($conf); 
        $this->databaseFields = new Mysql($conf, array("email", "age")); 
    }
    public function getConnection()
    {
         
        self::$dbh = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');

        return $this->createDefaultDBConnection(self::$dbh, 'users');    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        $ds1 = $this->createMySQLXMLDataSet('tests/_files/user.xml');
        $compositeDs = new PHPUnit_Extensions_Database_DataSet_CompositeDataSet();
        $compositeDs->addDataSet($ds1);
        return $compositeDs;
    }
    public function testGetsFirstResolt()
    {
        // van get more 
       $Model = $this->getMock('Mysql', array('first', 'get'));
       $Model->expects($this->once())->method('first')
            ->will($this->returnValue([]));
        $Model->first();
        $this->assertEquals(1, count($this->database->first()));
        $this->assertEquals('1', $this->database->first()->id);
        $this->assertEquals("amatelic", $this->database->first()->username);
    }
    public function testGetsFirstResoltWithSpecificFields()
    {
        // van get more 
        $this->assertEquals(1, count($this->databaseFields->first()));
        $this->assertEquals("21", $this->databaseFields->first()->age);
        $this->assertEquals("amatelic93@gmail.com", $this->databaseFields->first()->email);
    }
    public function testGetSpecificValue()
    {
        $this->assertEquals(4, count($this->database->get()));
        $this->assertEquals('tilen', $this->database->get()[3]->username);
        $this->assertEquals("19", $this->database->get()[3]->age);
    }
    public function tearDown()
    {
        $this->database = null; 
        $this->databaseFields = null; 
    }

}