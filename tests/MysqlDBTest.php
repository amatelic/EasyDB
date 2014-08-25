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

        //Loading  sql script with data
        $command = "mysql -u{$conf['username']} -p{$conf['password']} "
        . "-h {$conf['hostname']} -D {$conf['database']} < ";

        $output = shell_exec($command . 'tests/_files/user.sql');  

        $this->database = new Mysql($conf); 
        $this->databaseFields = new Mysql($conf, array("email", "age")); 
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
    public function testGetSpecificValueWithWhere()
    {
        $quire = $this->database->where("username", "=", "amatelic")->get();
        $this->assertEquals(1, count($quire));
        $this->assertEquals('amatelic', $quire[0]->username);
    }
    public function testInsertNewValue()
    {
        $this->database->insert('username', 'klemen');
        $quire = $this->database->get();
        $this->assertEquals(5, count($quire));
        $this->assertEquals("klemen", $quire[4]->username);

    }
    public function testInsertMultipleNewValue()
    {
        $this->database->insert(['username','age'], ['klemen', '11']);
        $quire = $this->database->get();
        $this->assertEquals(5, count($quire));
        $this->assertEquals("klemen", $quire[4]->username);
        $this->assertEquals(11, $quire[4]->age);

    }
    public function testUpdate()
    {
       $this->database->where("username","=", "amatelic")->update("age","12");
       $this->assertEquals(12, $this->database->first()->age); 
       $this->database->where("username","=", "tilen")->update(["username","age"],["tom","12"]); 
       $this->assertEquals("tom", $this->database->get()[3]->username); 
       $this->assertEquals(12, $this->database->get()[3]->age);  

    }
    public function tearDown()
    {
        $this->database->dropTable("users");
        $this->database = null; 
        $this->databaseFields = null; 
    }

}