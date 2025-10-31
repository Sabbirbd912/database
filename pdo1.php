<?php 
// Data Insert process
$dsn="sqlite:data.db";
try{
    $pdo=new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS users(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR(100),
        email VARCHAR(100) UNIQUE,
        gender VARCHAR(1)
    )";
    $pdo->exec($sql);

    $users = [
        ['name'=>'William Darcy', 'email'=>'darcy@hotmail.com', 'gender'=>"M"],
        ['name'=>'Elizabet Benet', 'email'=>'eliza@hotmail.com', 'gender'=>"F"],
        ['name'=>'Tom Jonse', 'email'=>'tom@hotmail.com', 'gender'=>"M"],
        ['name'=>'Sofia', 'email'=>'sofi@hotmail.com', 'gender'=>"F"],
    ];

    //HardCode data insert
    // $pdo->exec("INSERT INTO users (name,email,gender) VALUES('Stave Jack','jack@mail.com','M')");

    //1. Positional Prepared Statements
    // $name="Hector";
    // $email= "hector@gamil.com";
    // $gender="M";
    // $statement=$pdo->prepare("INSERT INTO users (name, email, gender) VALUES(?,?,?)"); 
    // $statement->execute([$name, $email, $gender]);
    //End
    
    //2. Placeholder Prepared Statements
    // $name1="Price";
    // $email1= "prince@gamil.com";
    // $gender1="M";
    // $statement=$pdo->prepare("INSERT INTO users (name, email, gender) VALUES(:name,:email,:gender)"); 
    // $statement=$pdo->prepare("INSERT INTO users (name, email, gender) VALUES(:n,:e,:g)"); 
    // $statement->execute([':n'=>$name1, ':e'=>$email1, ':g'=>$gender1]);
    // End

    // insert all users
    $statement=$pdo->prepare("INSERT INTO users (name, email, gender) VALUES(:name,:email,:gender)");
    foreach($users as $user){
        $statement->execute([':name'=>$user['name'],':email'=>$user['email'],':gender'=>$user['gender']]);
    }
}catch(PDOException $e){
    echo $e->getMessage();
}

?>
