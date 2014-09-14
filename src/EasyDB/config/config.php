<?php namespace EasyDB\config; 


 /**
 * Class for setting data for configuratin class
 */
 class Conf  
 {
 	private $driver = "";
 	private $dbConf = "";

 	function __construct( $path ) {

 		$this->driver = include "src/EasyDB/config/" . $path . ".php";
 	}

 	public function getClass()
 	{
 		$this->dbConf = $this->driver['driver'];
 		$namespace = "EasyDB\\database\\";
 		
 		return  $namespace . $this->dbConf;
 	}
 	public function getdbConf()
 	{	
 		return  $this->driver[$this->dbConf];
 	}
 }

