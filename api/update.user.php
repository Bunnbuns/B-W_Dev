<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
?>
<?php
//print_r($_POST);
include('config.php');
include ('common.php');

if(isset($_GET["password"])){
    $hashed_pwd = password_hash($_GET["password"], PASSWORD_DEFAULT);
}else{
    echo "Password not specified\n";
}
    //get ip address
    $ip_address_par = $_SERVER['REMOTE_ADDR'];

if(isset($_GET['username'])){
    $username_par = $_GET['username'];
}else{
    echo "Username not specified\n";
}

// yeet

  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $user =[
      "password"  => $hashed_pwd,
      "ip_address" => $ip_address_par,
      "username"  => $username_par
    ];

    $sql = "UPDATE `users` SET `password` = :password, `ip_address` = :ip_address WHERE `username` = :username";

  $statement = $connection->prepare($sql);
  //$statement->bindValue();
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }

    if(!isset($error)){
        echo "ok";
    }


?>