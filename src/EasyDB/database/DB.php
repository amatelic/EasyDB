<?php namespace EasyDB\database;

use EasyDB\config\Conf;

class DB
{

    public static function table( $table, $param = null){

        $conf = new Conf("database");
        $reflectorClass = $conf->getClass();

        return new $reflectorClass($conf->getdbConf( $table ), $table, $param );
    }

}
