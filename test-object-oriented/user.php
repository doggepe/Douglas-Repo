<?php
class User {

	public function is_loggedin(){
		if(isset($_SESSION['loggedin'])){
			return true;
		}
	}

	public function register($conn, $username, $password, $fullname){
        $passwordE = password_hash(mysqli_real_escape_string($conn, $password), PASSWORD_DEFAULT);

		$query = "INSERT INTO accounts (userName, passWord, fullName) VALUES (?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $username, $passwordE, $fullname);
        $stmt->execute();
        $stmt->close();
	}

    public function login($uname, $pword){
    	if($uname == "klitta" && $pword == "anus"){
    		$_SESSION['loggedin'] = $uname;
    		return true;
    	}
    	else {
    		$error = "Något gick fel, försök igen";
    		return false;
    	}
    }

    public function redirect($url){
    	header("Location: $url");
    }

    public function logout(){
    	session_destroy();
    	unset($_SESSION['loggedin']);
    	return true;
    }
}

?>