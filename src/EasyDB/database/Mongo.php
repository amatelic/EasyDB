<?php namespace EasyDB\database;
use validation\Validation as Validation;

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

	function __construct($collection, $collums)
	{
		$this->db = new \MongoClient();
		$this->database = $this->db->selectDB('mongodb');
		$this->collection = new MongoCollection($this->database, $collection);
	}
	public function first()
	{
		return $this->collection->findOne();
	}
}