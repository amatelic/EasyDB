<?php namespace EasyDB\database;
interface Database{
	public function get();		
	public function insert($insert, $insert);
	public function delete($fields, $insert);
	public function update($fields, $insert);
	public function max();
	public function min();
	public function orderBy($query);
}

