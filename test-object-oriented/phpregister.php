<?php
include('connect.php');

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];

    if($user->register($conn, $username, $password, $fullname)){
        $_SESSION['loggedin'] = $username;
    	$url = "home.php";
    	$user->redirect($url);
    }
    else {
    	$error = "Registrering misslyckades";
    }
}
else {
	header("hora.php");
}

?>