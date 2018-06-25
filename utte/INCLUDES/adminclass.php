<?php
	class admin {

		function redirect($url){
			header('Location:' . $url);
		}

		function login($username, $password){
			if($username == "admin" && $password == "utte123"){
				$_SESSION['loggedin'] == true;
				$url = "../Admin/";
				$this->redirect($url);
			}
		}

		function loginCheck(){
			if($_SESSION['loggedin'] != true){
				$url = "../Log-in/";
				$this->redirect($url);
			}                                       
		}

	}

?>