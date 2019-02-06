<?php
//print_r($_POST);
include('config.php');
include ('common.php');

		$connection = new PDO($dsn, $username, $password, $options);

        $hashed_pwd = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $new_user = array(
            "name" => $_POST["name"],
            "username"  => $_POST["username"],
            "email"     => $_POST["email"],
            "password"       => $hashed_pwd,
            "ip_address"  => $_SERVER['REMOTE_ADDR'],
            "bio"       => $_POST["bio"]
        );
//print_r($new_user);
        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "users",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );
	try {
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    if(!isset($error)){
        echo "ok";
    }


?>