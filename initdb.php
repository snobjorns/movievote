<?php 

class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('mydb.db');
    }
}

try{
  //create or open the database
  $database = new MyDB('mydb.db');
}
catch(Exception $e) 
{
  die($error);
};
/*
$query = 'CREATE TABLE users ' .
         '(uid INTEGER PRIMARY KEY ASC, uname TEXT,password TEXT, name TEXT, email TEXT, star REAL, attends INTEGER, penalties INTEGER)';
		 
$database->exec($query);
*/
//$database->exec("INSERT INTO users (uname , password, name, email , star, attends, penalties) VALUES ('snobjorn',' 1234','snorre','snorre@meg.no','1','0','0')");
//$database->exec("INSERT INTO users (uname , password, name, email , star, attends, penalties) VALUES ('ajbergli',' 1235','arne','arne@meg.no','1','0','0')");

$out = $database->query("Select * FROM users WHERE uname ='ajbergli'");

var_dump($out->fetchArray());

?>