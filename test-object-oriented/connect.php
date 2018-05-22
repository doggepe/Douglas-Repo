<?php
session_start();

$dbuser = 'root';
$dbpass = 'root';
$dbname = 'oop';
$dbhost = 'localhost';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Error:" . mysqli_connect_errno() . PHP_EOL;
	exit;
}

include('user.php');

$user = new User;

?>