<?php namespace EasyDB\database;
interface Database{
	public function get();		
	public function select($query);
	public function delete($query);
	public function update($query);
	public function max();
	public function min();
	public function orderBy($query);
}

