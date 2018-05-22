$(document).ready(function(){


	$('#application_type_web').on('click', function(){
		changeTypeWeb();
	});

	$('#application_type_email').on('click', function(){
		changeTypeEmail();
	})


	$('#btn-goto-preview').on('click', function(){
		previewDataPost();
	});

    $('.ckeditor').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.

    $('#search-form').on('submit', function(e){
    	console.log('här');
    	searchAds(e);
    });
    






	/////////////////////////////////////////////////////////////////////////////////////////////
	// FUNCTIONS BELOW THIS LINE //// FUNCTIONS BELOW THIS LINE //// FUNCTIONS BELOW THIS LINE //
	/////////////////////////////////////////////////////////////////////////////////////////////
	
	function previewDataPost(){
		console.log("tjena");
		return;
	}

	function searchAds(e){
		e.preventDefault();

		$('.search-result').remove();


		var formData = $('#search-form').serialize();

		$.ajax({
			headers: {
      			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: "POST",
			url: "/Sok",
			data: JSON.stringify(formData),
			dataType: 'JSON',
			success: function(data){
				$('.sk-cube-grid').show();
				setTimeout(function(){
					$('.sk-cube-grid').hide();
					$('.search-box').append(data.ad_html);
				}, 1250);
			},
			error: function(data){
				console.log('fel');
			}
		});
	}

	function changeTypeEmail(){
		$('#application_type_web').prop('checked', false);
		$('.show-email-application').css('display', 'block');
		$('.show-website-application').css('display', 'none');
		$('.apply_website').val("");
	}

	function changeTypeWeb(){
		$('#application_type_email').prop('checked', false);
		$('.show-website-application').css('display', 'block');
		$('.show-email-application').css('display', 'none');
		$('.apply_email').val("");
	}


});

