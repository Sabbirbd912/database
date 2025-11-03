<?php
$dsn = "sqlite:country.db";

try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS countries(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR(50) UNIQUE,
        capital VARCHAR(50),
        population INTEGER
        )"
    );

    $pdo->exec('DELETE FROM countries');

    $statement = $pdo->prepare("INSERT INTO countries(name,capital,population) VALUES(?,?,?)");
    $file = fopen("data.csv", "r");
    $row = fgetcsv($file);
    $pdo->beginTransaction();
    while (($row = fgetcsv($file)) !== false) {
        $statement->execute([$row[0], $row[1], $row[2]]);
    }
    $pdo->commit();
    // print_r($row);
} catch (PDOException $e) {
    $pdo->rollBack();
    echo $e->getMessage();
}