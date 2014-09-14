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


        $test = DB::table("users");
        
        var_dump($test->where("id", "=", "4")->delete());
        var_dump($test->get());
    ?>

</body>
</html>
