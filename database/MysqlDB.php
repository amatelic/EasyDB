<?php namespace database;
use PDO;
/**
* 
*/

class MySqlDB
{
	public $database;
	function __construct()
	{
		try {
			$this->database = 
				new PDO("mysql:host=localhost;dbname=test", "root", "root"
				,array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ));	
					
		} catch (PDOException $e) {
			
		}
	}	
	public function query($sql, $data = null)
	{
		$sth = $this->database->prepare($sql);
		$sth->execute($data);
		return $sth->fetchAll();
	}
}
