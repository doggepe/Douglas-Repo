<div class="row search-result">
	<div class="col-md-12 col-xs-12">
		<div class="box">
			@if(!empty($noads))
				<h3 style="text-align: center">{{ $noads }}.</h3>
			@endif
			@foreach($ads as $ad)
				<a href="/jobb/{{$ad->id}}/{{$ad->slug_title}}">{{$ad->post_title}}</a>
				<hr/>
			@endforeach
		</div>
	</div>
</div>
