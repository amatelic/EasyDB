<?php namespace database;
use validation\Validation as Validation;

/**
* 
*/
class Mysql implements database
{
	private $db;
	private $sql_data = [];
	private $validation;
	private $table;
	private $parameters;
	public function __construct($table, $parameters = null){

		$this->table = $table; //referenc to table
		$this->parameters = $parameters;// referenc to table fields
		$this->validation = new Validation(); 
		$this->db = new MysqlDB();
	}
	//method for gettting the  first row
	public function first()
	{
		$fill = implode(' ', array_fill(0, count($this->sql_data[0]['data']), ' ?'));
		//checking if parameter are set or not
		$colums = empty($this->parameters)?"*": implode(",", $this->parameters);
		$sql = "select {$colums} from {$this->table} {$this->sql_data[0]['method']}
		{$this->sql_data[0]['field']} {$this->sql_data[0]['operator']} {$fill}";
		
		return $this->db->query($sql, [$this->sql_data[0]['data']])[0];
	}
	//method for  getting all querys
	public function get()
	{
		$array_data = [];
		$colums = empty($this->parameters)?"*": implode(",", $this->parameters);
		$sql = "select {$colums} from {$this->table} ";
		foreach ($this->sql_data as $value) {
			if(array_key_exists('orders', $value)){
				$sql .= $value['orders'];
			}else{
				$sql .= "{$value['method']} {$value['field']} {$value['operator']} ? ";
				array_push($array_data, $value['data']);
			}
		}	
		return $this->db->query($sql, $array_data);
	}
	public function select($query){
		$operators = "=";
		$fields = $this->validation->DBqueryData($query[0]);
		$data = $this->validation->DBqueryData($query[1]);
		//checking if there are tri value for the array ('id','=', '1');
		if(count($query) === 3){
			$operators = $this->validation->DBopearators($query[1]);			
			$data = $this->validation->DBqueryData($query[2]);
		}
		array_push($this->sql_data, ['field' => $fields, 
			 'operator' => $operators, 'method' => 'where', 'data' => $data]);
		
		return $this;
	}
	public function delete($query){
		$fields = $this->validation->DBqueryData($query[0]);
		$data = $this->validation->DBqueryData($query[1]);
		$sql = "DELETE FROM {$this->table} WHERE {$fields} = ?";
		return $this->db->query($sql, [$data]);
	}
	public function update($query){
		$fields = $this->validation->DBqueryData($query[0]);
		$data = $this->validation->DBqueryData($query[1]);
		$sql = "UPDATE {$this->table} SET {$fields} = ? ";
		foreach ($this->sql_data as $value) {
		 	$sql .= "{$value['method']} {$value['field']} {$value['operator']} ? ";
		} 
		return $this->db->query($sql, [$data, $this->sql_data[0]['data']]);
	}
	public function max()
	{
		$sql = "SELECT MAX(id) AS max FROM BLOG";
		return $this->db->query($sql);
	}
	public function min()
	{
		$sql = "SELECT MIN(id) AS min FROM BLOG";
		return $this->db->query($sql);
	}
	public function orderBy($query)
	{
		//ordering values by DESC or ASC
		$value = $query[0];
		$order = $query[1];// value DESC or ASC
		array_push($this->sql_data, [ 'orders' => "ORDER BY id {$order}"]);
		return $this;
		
	}

	public function __call($name, $arguments){
		$test = preg_split('/(?=[A-Z])/', $name, -1, PREG_SPLIT_OFFSET_CAPTURE);
		return $test;
	}
}