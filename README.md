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
insert		  | yes
delete		  | no
update        | yes
dropTable     | yes

##Basic table of mysql commands working and not

commands	  | completed
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
