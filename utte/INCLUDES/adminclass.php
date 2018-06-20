<?php
	session_start();

	class admin {

		function login($username, $password){
			if($username == "admin" && $password == "utte123"){
				$_SESSION['loggedin'] == true;
				redirect('../admin/');
			}
		}

		function loginCheck(){
			if($_SESSION['loggedin'] != true){
				redirect('../Log-in/');
			}
		}

		function redirect($url){
			header('Location: "' . $url . '"');
		}

	}

?>