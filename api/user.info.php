<?php
include('config.php');
include ('common.php');

$connection = new PDO($dsn, $username, $password, $options);

$sql = "SELECT id, name, username, email, bio, date 
				FROM users
				WHERE username = :username";

$username = $_GET['username'];

$statement = $connection->prepare($sql);
$statement->bindParam(':username', $username, PDO::FETCH_ASSOC);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>