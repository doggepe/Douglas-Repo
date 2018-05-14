<!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<h1> TEST </h1>
	<input type="text" name="regnr" id="regnr"/>

	<div class="json-data">
		hej
	</div>

	<script type="text/javascript">
		$('#regnr').on('input', function(){

			var regno = $('#regnr').val();

			if(regno.length < 6){
				return;
			}
			else{
				$.ajax({
					data: {regno : 'regno'},
					url: 'fun.json',
					dataType: 'JSON',
					contentType: 'application/json',
					method: 'GET',
					error: function(err){
						console.log('fel');
					},
					success: function(data){
						var vehicleData = data.vehicleData;

						var model = vehicleData.Model;


						var modelYear = vehicleData.Year_from;
						
						var sliced = modelYear.slice(0, -3);

						var number = parseInt(sliced);

						var newnumber = number + 1;

						window.location.href = "http://localhost:8888/wordpress/produkt-kategori/" + model + "-" + newnumber;
					},
				});
			}
		});
	</script>
</body>
</html>