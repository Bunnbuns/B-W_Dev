<?php
session_start();
#temp
error_reporting(E_ALL); ini_set('display_errors', 1); 

include('config.php');
include ('common.php');

$connection = new PDO($dsn, $username, $password, $options);

function usernameExists($connection, $username) {
    $stmt = $connection->prepare("SELECT 1 FROM users WHERE username=?");
    $stmt->execute([$username]); 
    return $stmt->fetchColumn();
}

if(isset($_REQUEST['username']) && $_REQUEST['username'] !== ""){
if (usernameExists($connection, $_REQUEST['username'])) {
        //Check password by username
        $sql = "SELECT id, name, username, email, password
                        FROM users
                        WHERE username = :username";

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, PDO::FETCH_ASSOC);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_REQUEST['password']) && $_REQUEST['password'] !== ""){
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
    }else{
        //not enough post boiz
        echo "Username does not exist.\n";
    }
    }else{
        //not enough post boiz
        echo "No username or email specified.\n";
    }
