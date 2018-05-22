@include('includes.head')
@include('includes.header')
<div class="page-wrap">
	<br/>

	<div class="container search-box">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="col-xs-12">
						<h1>Sök</h1>
					</div>	
					<br/>
					<br/>
					<form id="search-form" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label for="freetext">Fritext</label><br/>
								<input class="form-control search-input" type="text" name="freetext">
							</div>
						</div>

						<div class="col-md-4 col-xs-12">
							<div class="form-group select_category">
								<label for="select-category" class=" required">Kategori <span class="redstar">*</span></label><br/>
								<input class="form-control typeahead" id="select-category" type="text" placeholder="Välj kategori" name="category">
							</div>
						</div>
						<div class="col-md-4 col-xs-12">
							<div class="form-group select_city">
								<label for="city_name" class=" required">Ort/kommun <span class="redstar">*</span></label><br/>
								<input class="form-control typeahead" id="select-city" type="text" placeholder="Ort/kommun" name="city_name">
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<button type="submit" id="search-btn" class="btn btn-success noborderradius">Sök</button>
							</div>
						</div>
					</form>
				</div>		
			</div>
		</div>
		<br/>
	</div>
	<br/>
	<div class="sk-cube-grid" style="display: none;">
		<div class="sk-cube sk-cube1"></div>
		<div class="sk-cube sk-cube2"></div>
		<div class="sk-cube sk-cube3"></div>
		<div class="sk-cube sk-cube4"></div>
		<div class="sk-cube sk-cube5"></div>
		<div class="sk-cube sk-cube6"></div>
		<div class="sk-cube sk-cube7"></div>
		<div class="sk-cube sk-cube8"></div>
		<div class="sk-cube sk-cube9"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {


		var cities = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			prefetch: 'http://laravel.dev/data/cities',
			remote: {
				url: 'http://laravel.dev/data/cities/%query',
				wildcard: '%query'
			}
		});

		var categories = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			prefetch: 'http://laravel.dev/data/categories',
			remote: {
				url: 'http://laravel.dev/data/categories/%QUERY',
				wildcard: '%QUERY'
			}
		});

		$('.select_category .typeahead').tagsinput({
			itemValue: 'id',
			itemText: 'name',
			typeaheadjs: {
				source: categories,
				name: 'name',
				display: 'name',
				items: 1000,
				minLength: 0,
			}
		});

		$('.select_city .typeahead').tagsinput({
			itemValue: 'id',
			itemText: 'name',
			typeaheadjs: {
				source: cities,
				name: 'name',
				display: 'name',
				items: 1000,
				minLength: 0,
			}
		});
	});
</script>

<br />
</div>
@include('includes.footer')





