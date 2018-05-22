<?php
include('connect.php');

if($user->is_loggedin()!=""){
	$url = "home.php";
	$user->redirect($url);
}
?>
<!doctype html>
<html>

<head>
    <title>Testing OOP</title>
    <meta charset="UTF-8"/>
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</head>
<body>
<form>
    <input name="fullname" id="fullname" type="text" placeholder="För- och efternamn"/><br/><br/>
    <input name="username" id="username" type="text" placeholder="Användarnamn"/><br/>
    <input name="password" id="password" type="password" placeholder="Lösenord"/><br/>
    <button name="register-btn" id="register-btn">Registrera</button><br/>
    <?php
        if(isset($error)){
        	echo $error;
        }
    ?>
</form>
<!--
<form method="post">
    <input name="username" id="" type="text" placeholder="Användarnamn"/><br/>
    <input name="password" id="" type="password" placeholder="Lösenord"/><br/>
    <button name="login-btn" id="login-btn" type="submit">Logga in</button><br/>
    <?php
        if(isset($error)){
        	echo $error;
        }
    ?>
</form>
-->
<script type="text/javascript">
	$('#register-btn').click(function(){
		var fullname = $('#fullname').val();
		var username = $('#username').val();
		var password = $('#password').val();

        $.ajax({
            method: "POST",
            url: "phpregister.php",
            data: {fullname: fullname, username: username, password: password},
        })
        .done(function(){
        	console.log("function complete");
        	$('#fullname').val("");
		    $('#username').val("");
		    $('#password').val("");
        });
	});
</script>

</body>
</html>