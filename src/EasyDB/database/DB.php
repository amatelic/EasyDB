<?php namespace EasyDB\database;

use EasyDB\config\Conf;

class DB
{

    public static function table( $table, $param = null){

        $conf = new Conf("database");

        //Getting the name of the selected driver 
        $reflectorClass = $conf->getClass();


        // initilalizing reflector class
        return new $reflectorClass($conf->getdbConf(), $table, $param );
    }

}
