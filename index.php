<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        require 'vendor/autoload.php';
        use EasyDB\database\DB;
        use EasyDB\database\Mysql as Mysql;
        //use EasyDB\database\Database as Database;

    $conf = array(
        'hostname' => 'localhost',
        'database' => 'test',
        'table' => 'users',
        'username' => 'root',
        'password' => 'root'
    );
        $test = DB::table("users");
        $bla = DB::table("users");
        // var_dump($test->where("username", "=", "matej")->get());
                var_dump($test->orwhere("username", "=", "matej")->where("username", "=", "tilen")->get());

        // var_dump($test->database->first());
    ?>

</body>
</html>
