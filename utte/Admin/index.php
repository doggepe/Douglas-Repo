<?php
	include('../includes/config.php'); 
	$secondarytitle = "Administrator";
	include('../includes/head.php'); 

	error_log("smack" . $_SESSION['loggedin']);

	$admin->loginCheck();
?>

<a href="../includes/logout.php?logout">Logga ut</a>


<?php include('../includes/footer.php'); ?>