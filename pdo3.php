<?php
// Data Read From Database

$dsn = "sqlite:data.db";
$sql="SELECT * FROM users WHERE id < ?";
$sql="SELECT * FROM users WHERE id BETWEEN ? AND ?";

try {
    $pdo=new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement= $pdo->prepare($sql);
    $statement->execute([2,5]);

    // while($row=$result->fetch(PDO::FETCH_ASSOC)){
    //     print_r($row);
    // }

    $all=$statement->fetchAll(PDO::FETCH_ASSOC);
    print_r($all);

   // -----------------------------------------34 restrat
} catch (PDOException $e) {
    echo $e->getMessage();
}