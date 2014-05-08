<?php
function __autoload($class_name) {
	require_once("../$class_name.php");
}
use EasyDB\database\DBFactory as DB;
$test = DB::table("test",['id'])->first();
var_dump($test)
?>
