<?php
// $db = new PDO('sqlite:database.db');//sqlite

$dsn="mysql:host=127.0.0.1;port=3306;dbname=test"; //mysql
$db=new PDO($dsn,'root','');
$statement = $db->query("SELECT * FROM users");
$rows=$statement->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);