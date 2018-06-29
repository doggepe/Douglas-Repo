<?php
include('adminclass.php');

$admin = new Admin;

	if(isset($_POST['action'])){
		$action = $_POST['action'];
			switch ($action) {
				case "login":
					$admin->login($_POST['username'], $_POST['password']);
					break;
		}
	}
?>