<?php namespace database;
interface database{
	public function get();		
	public function select($query);
	public function delete($query);
	public function update($query);
	public function max();
	public function min();
	public function orderBy($query);
}

