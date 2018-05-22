<?php
include_once('connect.php');

if(!$user->is_loggedin()!=""){
	$user->redirect('index.php');
}
else {
    $currentuser = $_SESSION['loggedin'];
}
?>
<!doctype html>
<html>

    <title>Testing OOP</title>
    <meta charset="UTF-8"/>
    <link type="text/css" rel="stylesheet" href="style.css"/>
</head>
<body>

<p>Hej 
<?php
    if(isset($currentuser)){
    	echo $currentuser;
    }
    else {
    	die();
    }
?>
!</p>

<a href="logout.php?logout=true">Logga ut</a>

</body>
</html>