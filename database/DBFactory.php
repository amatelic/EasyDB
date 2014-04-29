<?php namespace database;

/**
* Factory class for choosing database connection
*/
class DBFactory
{

	private static $sqlmethod = "mongodb";// Properti for choosing database connection
	public static function table($table, $colums = null){
		//switch statment for choosing database
		switch (self::$sqlmethod) {
			case 'mysql':
				return new Mysql((string)$table, $colums);
				break;
			
			case 'mongodb':
				return new Mongodb((string)$table, $colums);
				break;

			default:
				return die("There are some problems!");
				break;
		}
	}
}