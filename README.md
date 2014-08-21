EasyDB
===============

EasyDb is a helper class for easier serching in databases.


##Basic table of mysql commands working and not

commands		  | completed
------------- | -------------
get           | yes
first 		  | yes
where         | yes
orwhere 	  | yes
insert		  | no
delete		  | no
update        | no

##Basic table of mysql commands working and not

commands		  | completed
------------- | -------------
get           | no
first 		  | no
where         | no
orwhere 	  | no
insert		  | no
delete		  | no
update        | no
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

