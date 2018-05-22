@include('includes.head')
@include('includes.header')
<div class="page-wrap">
<br/>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="ad-box">
				<div class="col-md-8 nopadding nomargin">
				<h1 class="ad-title">{{ $adData->post_title }}</h1><img src=""/>
				<br/>
				<p class="apply_date"><i class="glyphicon glyphicon-calendar"></i> Sista ansökningsdatum - {{ $adData->expiration_date }} </p>

				@foreach($cities as $city)
				@if($city->id == $adData->company_location && $adData->company_location != "")	
					<p class="apply_date"><i class="glyphicon glyphicon-map-marker"></i> {{ $adData->company_name }}, {{ $city->name }}</p>
				@endif
				@endforeach
				@foreach($categories as $category)
				@if($category->id == $adData->category && $adData->category != "")
					<div class="btn btn-default noborderradius">{{ $category->name }}</div>
				@endif
				@endforeach
			</div>
			<div class="col-md-4 nopadding nomargin">
				@if($adData->company_logo_name != NULL)
					<img class="img-responsive" style="text-align: center; margin: auto; max-width: 84.5% !important; max-height: 150px !important; display: flex; justify-content: center; align-items: center; " src="/uploads/{{ $adData->company_logo_name }}" alt="logo"/>
				@else
					<img class="img-responsive" style="text-align: center; margin: auto; max-width: 84.5% !important; max-height: 150px !important;" src="/images/Potato.png" alt="logo"/>
				@endif
			</div>
			</div>
		</div>
	</div>

	<br/>

	<div class="row">
		<div class="col-xs-8">
			<div class="ad-box">
				{!! $adData->post_body !!}
			</div>
		</div>
		<div class="col-xs-4">
			<h3>Ansökan</h3>
			<div class="right-box">
				@if( $adData->apply_website != NULL )
					<a href="{{ $adData->apply_website }}"><button class="btn btn-info noborderradius" id="confirm-btn">Ansök här</button></a>
				@else
					<h4>Ansökan sker via e-post till <a href="mailto:{{$adData->apply_email}}?Subject=Ansökan%20{{ $adData->post_title }}">{{$adData->apply_email}}</a></h4>
				@endif
				@if( $adData->apply_reference != NULL )
				<br/>
					<h6>Ange {{$adData->apply_reference}} som referens.</h6>
				@endif
			</div>
			<br/>
			<br/>
			@if( $alikeData != '')
			<h3>Liknande</h3>
			<div class="right-box">
				@foreach($alikeData as $alike)
				<div class="card">
					<div class="card-block">
						<h4 class="card-title"><a href="/jobb/{{ $alike->id }}/{{ $alike->slug_title }}">{{ $alike->post_title }}</a></h4>
						@if($alike->company_facebook == NULL)
						@else
						<a href="{{ $alike->company_facebook }}" class="btn btn-primary">Facebook</a>
						@endif
					</div>
				</div>
				<hr/>
				@endforeach
			</div>
			@endif
		</div>
	</div>
</div>

<br/>
</div>
@include('includes.footer')