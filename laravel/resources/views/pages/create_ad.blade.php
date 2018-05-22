<!DOCTYPE html>
<html lang="sv">
@include('includes.head')
@include('includes.header')
<div class="page-wrap">
<br/>

<div class="container">
	<div class="row">
		
		@include('includes.uploadform')

		<div class="col-xs-12 col-md-4">
			<h2> Populärt</h2>
			<div class="right-box">
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">Special title treatment</h4>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">Special title treatment</h4>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">Special title treatment</h4>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">Special title treatment</h4>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		var cities = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			prefetch: 'http://laravel.dev/data/cities',
			remote: {
				url: 'http://laravel.dev/data/cities/%QUERY',
				wildcard: '%QUERY'
			}
		});

		$('.select_city .typeahead').typeahead(null, {
			name: 'name',
			display: 'name',
			source: cities,
		});

		$('.select_city .typeahead').bind('typeahead:select', function(ev, suggestion) {
			$('#city_id').val(suggestion.id);
		});

	});
</script>

<br/>
</div>
@include('includes.footer')