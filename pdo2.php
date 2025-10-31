<?php
// Data Read From Database

$dsn = "sqlite:data.db";
$sql="SELECT * FROM users";

try {
    $pdo=new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result =$pdo->query($sql);
    //1.1 All data get by while-loop
    // while($row=$result->fetch(PDO::FETCH_ASSOC)){
    //     print_r($row);
    // }

    //1.2 All data fetch
    $all=$result->fetchAll(PDO::FETCH_ASSOC);
    print_r($all);


    // -----------------------------------------34 restrat
} catch (PDOException $e) {
    echo $e->getMessage();
}