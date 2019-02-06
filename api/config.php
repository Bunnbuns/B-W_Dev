<?php
$host       = "localhost";
$username   = "root";
$password   = "D5yA8qKGMIbfsK31";
$dbname     = "ben_world_db";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

$connection = new PDO("mysql:host=$host", $username, $password, $options);

?>