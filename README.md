EasyDB
===============

EasyDb is a helper class for easier serching in databases.

##Info 

For changing the driver you have to change the driver variable in the file
src/EasyDB/config/database.php

##Basic table of mysql commands working and not

commands		  | completed
------------- | -------------
get           | yes
first 		  | yes
where         | yes
orwhere 	  | yes
insert		  | yes
delete		  | yes
update        | yes
dropTable     | yes

##Basic table of mongodb commands working and not

commands	  | completed
------------- | -------------
get           | yes
first 		  | yes
where         | no
orwhere 	  | no
insert		  | no
delete		  | no
update        | no


##Configuration of database
Data for configurating database connection is in directory src/EasyDB/config/dataase.php

```php
	//change driver value to different driver
	"driver" => "Mysql",
```

##Initialize  class DB

```php
	//specefi table name "user"
	$db = DB::table("user");
```

##Searching all data in database  

```php
	$db = DB::table("user");
 	$db->get();
```

##Searching data with where expresion in database  

```php
	$db = DB::table("user");
 	$db->where("username", "=", "matej")->get();
```
##How to insert into database 

```php
	$db = DB::table("user");

  //Single value
  	$db->insert('username', 'klemen');
  //Or multiple value
  	$db->insert(['username','age'], ['klemen', '11']);
```

##How to update filds

```php
	$db = DB::table("user");

  //Single value
  	$db->where("username","=", "amatelic")->update("age","12");

```
