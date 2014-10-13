<?php namespace EasyDB\database;
use EasyDB\validation\Validation;

use MongoClient;
use MongoCollection;

/**
* 
*/
class Mongo
{
	private $db;
	private $database;
	private $collection;
	private $data;
	private $querys = [];

	function __construct($conf, $collection, $param)
	{
		$this->db = new MongoClient($conf['hostname']);
		$this->database = $this->db->selectDB($conf['database']);
		$this->collection = new MongoCollection($this->database, $conf['table']);
		$this->validation = new Validation(); 
	}
	public function first()
	{
		return $this->collection->findOne();
	}
	public function get()
	{
		var_dump($this->querys[0]);
		$data = $this->collection->find([$this->querys[0][0] => $this->querys[0][1]]);
		
		/**
		*
		* iterator  function is use for converting 
		* mongodb couser to an array the false
		* flag is used for geting the array 
		* with numeric values not with mongodb id
		*
		**/
		
		return iterator_to_array($data, false);
	}
	public function where( $field = null, $operator = null, $value = null )
	{
		$input_data = $this->validation->allowedInputValues([$field, $operator, $value]);
		if(count($input_data) === 2){
			array_push($this->querys, $input_data);
		}

		return $this;		

	}
}