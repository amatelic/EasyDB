<?php namespace EasyDB\database;
use PDO;
/**
* 
*/

class MySqlDB
{
	public $database;
	function __construct( $conf )
	{
		try {
			$this->database = 
				new PDO("mysql:host={$conf['hostname']};dbname={$conf['database']}", $conf['username'], $conf['password'], 
					array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ));	
					
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
