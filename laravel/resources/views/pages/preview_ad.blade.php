<?php 

$decryptedid = $previewData->id;

$id = Crypt::encrypt($decryptedid);

?>

@include('includes.head')
@include('includes.header')
<div class="page-wrap">
<br/>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="ad-box">
				<div class="col-md-8 nopadding nomargin">
				<h1 class="ad-title">{{ $previewData->post_title }}</h1><img src=""/>
				<br/>
				<p class="apply_date"><i class="glyphicon glyphicon-calendar"></i> Sista ansökningsdatum - {{ $previewData->expiration_date }} </p>

				@foreach($cities as $city)
				@if($city->id == $previewData->company_location && $previewData->company_location != "")	
					<p class="apply_date"><i class="glyphicon glyphicon-map-marker"></i> {{ $city->name }}</p>
				@endif
				@endforeach
			</div>
			<div class="col-md-4 nopadding nomargin">
				@if($previewData->company_logo_name != NULL)
					<img class="img-responsive" style="text-align: center; margin: auto; max-width: 84.5% !important; max-height: 150px !important;" src="/uploads/{{ $previewData->company_logo_name }}" alt="logo"/>
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
				{!! $previewData->post_body !!}
			</div>
		</div>
		<div class="col-xs-4">
			<div class="right-box">
				<form method="POST" action="/Skapa-annons" style="margin-bottom: 0 !important;">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" value="{{ $previewData->id }}" name="id">
					<button type="submit" class="btn btn-danger noborderradius" id="back-btn">Tillbaka <i class="glyphicon glyphicon-remove"></i></button>
				</form>
				<form method="POST" action="/Skapa-annons/Annons-uppladdad" style="margin-bottom: 0 !important;">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" value="{{ $previewData->id }}" name="id">
					<button type="submit" class="btn btn-info noborderradius" id="confirm-btn">Bekräfta <i class="glyphicon glyphicon-ok"></i></button>
				</form>
			</div>
		</div>
	</div>
</div>

<br/>
</div>
@include('includes.footer')