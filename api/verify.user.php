<?php
session_start();
#temp
error_reporting(E_ALL); ini_set('display_errors', 1); 

include('config.php');
include ('common.php');

$connection = new PDO($dsn, $username, $password, $options);

header("Content-Type", "application/json");

if(isset($_POST['email']) && $_POST['email'] !== ""){
    //Check password by email
    $sql = "SELECT id, name, username, email, password 
                    FROM users
                    WHERE email = :email";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':email', $email, PDO::FETCH_ASSOC);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    
}else if(isset($_POST['username']) && $_POST['username'] !== ""){
    //Check password by username
    $sql = "SELECT id, name, username, email, password 
                    FROM users
                    WHERE username = :username";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':username', $username, PDO::FETCH_ASSOC);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
}else{
    //not enough post boiz
    echo "No username or email specified.\n";
}
if(isset($_POST['password']) && $_POST['password'] !== ""){
    if (password_verify($password, $data[0]['password'])) {
        $_SESSION['username']=$username;
        //good
        echo "ok\n";
    } else {
        //bad
        echo "Invalid password.\n";
    }
}else{
    echo "No password specified.\n";
}