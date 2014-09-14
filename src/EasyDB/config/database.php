<?php 
/*==================================================================
=            Configuration file for database connection            =
==================================================================*/

return array(

	// Driver chosen 

	"driver" => "Mysql",


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

	)


);

/*-----  End of Configuration file for database connection  ------*/
