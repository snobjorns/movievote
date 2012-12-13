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

$uname = $_POST['username'];
echo $uname;
$db_uname = $database->query("SELECT * FROM users WHERE uname='$uname'");
var_dump($db_uname->fetchArray());

?>