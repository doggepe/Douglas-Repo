<?php
	session_start();

	class admin {

		function redirect($url){
			header('Location:' . $url);
		}

		public function login($username, $password){
			if($username == "admin" && $password == "utte123"){
				$_SESSION['loggedin'] = true;
				$url = "../Admin/";
				$this->redirect("../Admin/");
			}
		}

		public function loginCheck(){
			if(empty($_SESSION['loggedin'])){
				$url = "../Log-in/";
				$this->redirect($url);
			}                                       
		}

	}

?>