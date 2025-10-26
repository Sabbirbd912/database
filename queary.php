<?php
// $db = new SQLite3('databestest.db');

// $result = $db->query('SELECT * FROM users');
// while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
//     // print_r($row);
//     echo "ID: {$row['id']}, Name: {$row['name']}, Email:{$row['email']} \n";
// }

$conn=mysqli_connect('localhost','root','','test');
// if(!$conn){
//     echo "Connect Failed";
// }
$results=mysqli_query($conn,'SELECT * FROM users');
while($row = mysqli_fetch_assoc($results)){
    print_r($row);
}

?>
