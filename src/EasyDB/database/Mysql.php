<?php namespace EasyDB\database;

use EasyDB\validation\Validation;
/**
* 
*/

class Mysql implements Database
{
	private $db;
	private $validation;
	private $table;
	private $parameters;
	private $querys = [];
	public function __construct($conf, $filds = []){

		$this->table = $conf['table']; //referenc to table
		$this->parameters = ($filds)? implode(",", $filds) : "*"; 
		$this->validation = new Validation(); 
		$this->db = new MysqlDB( $conf );
	}
	//method for gettting the  first row
	public function first()
	{
		$dataQuery = $this->convertQuery();
		return $this->select( $dataQuery )[0];

	}
	//method for  getting all querys
	public function get()
	{
		$data = null;
		if( $this->querys ){
			$data = $this->convertQuery( $this->querys );
		}
		return $this->select( $data );
	}
	public function where($field, $operator, $value)
	{	

		$queryData = ['criteria' => 'where','fiel' => $field, 
						'operator' => $operator, 'value' => $value];
	
		array_push( $this->querys, $queryData );
		return $this;
	}
	public function orwhere($field, $operator, $value)
	{	

		$queryData = ['criteria' => 'where|or','fiel' => $field, 
						'operator' => $operator, 'value' => $value];
	
		array_push( $this->querys, $queryData );
		return $this;
	}
	public function andwhere($field, $operator, $value)
	{	

		$queryData = ['criteria' => 'where|and','fiel' => $field, 
						'operator' => $operator, 'value' => $value];
	
		array_push( $this->querys, $queryData );
		return $this;
	}
	private function select( $data = null ){
		$this->querys = [];
		if ( $data ) {
			return $this->db->query("SELECT {$this->parameters} FROM {$this->table} 
					{$data[0]} ", $data[1]);
		}else{
			return $this->db->query("SELECT {$this->parameters} FROM {$this->table}");			
		}
	
	}
	private function convertQuery( $queryInformation = null )
	{
		$outputString = "";
		$outputArray = [];
		$pattern = [];
		$count = 0;

		if ( !$queryInformation ) {
			return;
		}

		foreach ($queryInformation as  $singleInformation) {
			$count++;
			$pattern = preg_split("/(\|)/", $singleInformation['criteria']);
			$outputString .= ( ($count > 1) ? ' ' : $pattern[0] ) . 
				" {$singleInformation['fiel']}  {$singleInformation['operator']} ? ". 
				( (isset($pattern[1])) ? $pattern[1] : " " );

			array_push($outputArray, $singleInformation['value']);
		}
		return [ $outputString, $outputArray ];

	}
	public function dropTable($table)
	{
		$this->db->query("DROP TABLE {$table}");
	}
	public function delete($fields, $insert){

	}
	public function update($fields, $insert){
		$fields = implode("  = ?, ",is_array($fields)? $fields : [$fields]);
		$insert = is_array($insert)? $insert : [$insert];
		$String = str_repeat("", count($insert));
 		$prepered = preg_replace('/(\,)$/', '', $String);
		$dataQuery = $this->convertQuery( $this->querys );
		$this->querys = [];
		return $this->db->query(" UPDATE  {$this->table} SET " . $fields . " = ? " . $dataQuery[0] , array_merge($insert, $dataQuery[1]));
	}
	public function insert($fields, $insert){

		$fields = implode(",",is_array($fields)? $fields : [$fields]);
		$insert = is_array($insert)? $insert : [$insert];
		$String = str_repeat("?,", count($insert));
 		$prepered = preg_replace('/(\,)$/', '', $String);
		return $this->db->query("INSERT INTO {$this->table}($fields) VALUES ($prepered)", $insert);	

	}
	public function max()
	{
		// $sql = "SELECT MAX(id) AS max FROM BLOG";
		// return $this->db->query($sql);
	}
	public function min()
	{
		// $sql = "SELECT MIN(id) AS min FROM BLOG";
		// return $this->db->query($sql);
	}
	public function orderBy($query)
	{
		//ordering values by DESC or ASC
		// $value = $query[0];
		// $order = $query[1];// value DESC or ASC
		// array_push($this->sql_data, [ 'orders' => "ORDER BY id {$order}"]);
		// return $this;
		
	}
}