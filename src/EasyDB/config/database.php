<?php 
/*==================================================================
=            Configuration file for database connection            =
==================================================================*/

return array(

	// Driver to chose 


	"driver" => "Mongo",


	// Configuration for mysql database connection

	"Mysql" => array(
		'hostname' => 'localhost',
        'database' => 'skavts',
        'table' => 'users',
        'username' => 'root',
        'password' => 'root'
	),

	// Configuration for mysql database connection

	"Mongo" => array(
		'hostname' => '',
		'database' => 'users',
		'table' => 'collection',
		'username' => 'root',
		'password' => 'root' 

	)


);

/*-----  End of Configuration file for database connection  ------*/
