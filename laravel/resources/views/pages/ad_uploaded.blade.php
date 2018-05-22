@include('includes.head')
@include('includes.header')
<div class="page-wrap">
<br/>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<div class="box">
				<h2 class="ad_uploaded">Din annons är nu uppladdad och kommer att visas på webbplatsen när er e-post är verifierad.</h2>
				<br/>
				<h3 class="ad_uploaded_second">Tack för att du väljer Uppdraget.io 🥂</h3>
				<p>Ps. Kolla er e-post för verifikation samt länk för redigering. </p>
				<br/><br/>
				<a href="/jobb/{{$ad->id}}/{{$ad->slug_title}}"><div class="btn btn-success noborderradius"/>Till er annons</div></a>
			</div>
		</div>
	</div>
</div>

<br/>
</div>
@include('includes.footer')