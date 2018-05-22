<?php
include('connect.php');

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];W

    if($user->register($conn, $username, $password, $fullname)){
    	$redirection = "home.php";
    	$user->redirect($redirection);
    }
    else {
    	$error = "Registrering misslyckades";
    }
}
else {
	header("hora.php");
}

?>