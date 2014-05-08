<?php 
namespace EasyDB\validation;


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
}	