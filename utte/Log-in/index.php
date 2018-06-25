<?php 
	include('../includes/config.php');
	$secondarytitle = "Hem";
	include('../includes/head.php'); 
?>
<div class="row">
	<div class="col-md-12"/>
		<div id="headerimage">
			<img src="<?=ROOT_FILE?>media/headerimg.jpg" id="header" alt="Lär dig att köra bil hos oss" />
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="row">
		<div class="col-md-12">
			<div id="about">
				<input type="text" name="username" id="username"/>
				<input type="password" name="password" id="password"/>
				<div id="login-btn">Logga in</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#login-btn').on('click', function(){
		var username = $('#username').val();
		var password = $('#password').val();
		var action = "login";
			$.ajax({
				data: '{ username: "username", password: "password", action: "action"}',
				type: 'POST',
				url: '../includes/adminclass.php',
				contentType: 'application/json',
				dataType: 'json',
				success: function(data){
					console.log('Function success');
				},
				error: function(data){
					console.log('Function error');
				}
		});
	})
</script>

<?php include('../includes/footer.php'); ?>