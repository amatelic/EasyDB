<?php
function __autoload($class_name) {
	require_once("$class_name.php");
}
use \database\DBFactory as DB;
$test = DB::table("users")->first();
var_dump($test);
?>
