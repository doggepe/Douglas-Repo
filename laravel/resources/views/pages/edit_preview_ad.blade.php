@include('includes.head')
@include('includes.header')
<div class="page-wrap">
<br/>

<div class="container">
	<div class="row">
		
		@include('includes.edit_uploadform')

		<div class="col-xs-12 col-md-4">
			<div class="right-box">
				<h2> Populärt</h2>
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
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('city_name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: 'http://laravel.dev/public/data/cities',
                remote: {
                    url: 'http://laravel.dev/data/cities/%QUERY',
                    wildcard: '%QUERY'
                }
            });

            $('.select_city .typeahead').typeahead(null, {
                city_name: 'city_name',
                display: 'city_name',
                source: cities,
                limit: 4,
            });
            	$('.select_city .typeahead').bind('typeahead:select', function(ev, suggestion) {
            	$('#city_id').val(suggestion.city_id);
			});
        });
</script>

<br/>
</div>
@include('includes.footer')