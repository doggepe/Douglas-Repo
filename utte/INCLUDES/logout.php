<?php
include('config.php');

if(isset($_GET['logout'])){
	$_SESSION['loggedin'] = false;
	session_destroy();
	unset($_SESSION['loggedin']);
	$admin->redirect('../Log-in/');
}

?>