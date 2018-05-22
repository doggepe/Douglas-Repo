@include('includes.head')
@include('includes.header')
<div class="page-wrap">
	<!-- Header image with background -->
	<div class="header-img">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Hitta</h1>
					<div class="btn btn-info noborderradius show-ads-btn">VISA</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blue searchbar top -->
	<div class="search-bar-blue">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="input-group inside-search-bar">
						<input type="text" class="form-control noborderradius" placeholder="SÖK UPPDRAG" aria-label="SÖK UPPDRAG">
						<span class="input-group-btn">
							<button class="btn btn-secondary noborderradius" type="button">SÖK</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Click-cards -->
	<br/>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<h2 class="card-header">Nytt</h2>
				<div class="left-box">
					@foreach($new_ads as $new_ad)
					<div class="row">
					<div class="card home_new_ads">
						<div class="col-md-2 img-block">
							@if($new_ad->company_logo_name != NULL)
							<img class="img-responsive card-image" style="text-align: center; margin: auto; max-height: 65px; width: auto; height: auto" src="/uploads/{{ $new_ad->company_logo_name }}" alt="logo"/>
							@else
							<img class="img-responsive card-image" style="text-align: center; margin: auto; max-height: 65px; width: auto; height: auto;" src="/images/Potato.png" alt="logo"/>
							@endif
						</div>
						<div class="col-md-10 text-block">
							<div class="card-block">
								<a href="/jobb/{{$new_ad->id}}/{{$new_ad->slug_title}}"><h4 class="card-home-title nopadding">{{ $new_ad->post_title }}</h4></a>
								@foreach($cities as $city)
								@if($city->id == $new_ad->company_location && $new_ad->company_location != "")	
									<p class="nomargin">{{ $new_ad->company_name }}, {{ $city->name }}</p>
								@endif
								@endforeach	
								@foreach($categories as $category)
								@if($category->id == $new_ad->category && $new_ad->category != "")
									<div style="margin-top: 3px;" class="btn btn-default noborderradius tiny-tag">{{ $category->name }}</div>
								@endif
								@endforeach
							</div>
						</div>
					</div>
					</div>
					<hr/>
					@endforeach
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="right-box nopadding">
					<!-- Card -->
					<div class="card card-image" style="background-image: url(http://www.goldminesuccess.com/wordpress/wp-content/uploads/2016/10/computer-user.jpeg);">
						<!-- Content -->
						<div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
							<div>
								<h3 class="card-title pt-2"><strong>Rekrytera</strong></h3>
								<p class="card-normal-text">hahhaha ahhdisdasidiasdaijd </p>
								<div class="btn btn-info card-btn"><a>PUBLICERA ANNONS</a></div>
								<br/>
								<br/>
							</div>
						</div>
					</div>
					<!-- Card end -->
				</div>
				<br/>
				<h2> Populärt</h2>
				<div class="right-box">
					@foreach($pop_ads as $pop_ad)
					<div class="card">
						<div class="card-block">
							<h4 class="card-title"><a href="/jobb/{{ $pop_ad->id }}/{{ $pop_ad->slug_title }}">{{ $pop_ad->post_title }}</a></h4>
							@if($pop_ad->company_facebook == NULL)
							@else
							<a href="{{ $pop_ad->company_facebook }}" class="btn btn-primary">Facebook</a>
							@endif
						</div>
					</div>
					<hr/>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<br/>
</div>
@include('includes.footer')

