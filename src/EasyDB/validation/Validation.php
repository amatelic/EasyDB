<?php namespace EasyDB\validation;


/**
* Validation class
*/
class Validation
{
	private $sql_operators = ['<', '>', '=', 'like', '>=' , '<=', 'or', 'and'];
	public function DBopearators($operator)
	{
		if(in_array($operator, $this->sql_operators)){
			return $operator;
		}
		return false;
	}
	public function DBqueryData($string)
	{
		return htmlspecialchars(trim($string), ENT_QUOTES);
	}
	public function allowedInputValues( $inputs )
	{
		$inputs_array = [];
		/**
		*
		* Filtering all data in array 
		* and checking if array values are empty
		**/
		
		foreach ($inputs as  $value) {
			if ( !empty($value) ) {
				array_push($inputs_array, $value);
			}
		}
		return $inputs_array;
	}
}	