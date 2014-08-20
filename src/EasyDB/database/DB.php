<?php namespace EasyDB\database;

class DB
{



    public static $driver =  ' Mysql';
    public static $conf = [
        'hostname' => 'localhost',
        'database' => 'test',
        'table' => 'test',
        'username' => 'root',
        'password' => 'root'
    ];

    public static $database = null ;

    public static function table( $table, $param = null){
        $conf = self::$conf;
        $conf['table'] = $table;
        return new Mysql( $conf );

    }

}
