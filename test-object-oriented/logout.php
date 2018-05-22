<?php
include('connect.php');

if($_GET['logout'] == true){
	$user->logout();
	$index = "index.php";
	$user->redirect($index);
}
else {
    $error;
}

if(isset($error)){
	echo $error;
}

?>