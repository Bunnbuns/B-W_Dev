<?php
error_reporting(E_ALL); ini_set('display_errors', 1); 

include('config.php');
include ('common.php');

$connection = new PDO($dsn, $username, $password, $options);

$message = array();

if(isset($_GET['email']) && $_GET['email'] !== ""){
    //Check password by email
    $sql = "SELECT id, name, username, email, password 
                    FROM users
                    WHERE email = :email";

    $email = $_GET['email'];
    $password = $_GET['password'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':email', $email, PDO::FETCH_ASSOC);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    
}else if(isset($_GET['username']) && $_GET['username'] !== ""){
    //Check password by username
    $sql = "SELECT id, name, username, email, password 
                    FROM users
                    WHERE username = :username";

    $username = $_GET['username'];
    $password = $_GET['password'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':username', $username, PDO::FETCH_ASSOC);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
}else{
    //not enough post boiz
    echo "No username or email specified.\n";
}
if(isset($_GET['password']) && $_GET['password'] !== ""){
    if (password_verify($password, $data[0]['password'])) {
        echo "ok\n";
    } else {
        echo "Invalid password.\n";
    }
}else{
    echo "No password specified.\n";
}

//print_r($message);
//echo "<br />"
//echo json_encode($message, JSON_PRETTY_PRINT);