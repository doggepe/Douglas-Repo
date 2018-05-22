<div class="col-xs-12 col-md-8">
<div class="left-box">
	<h2 class="card-header">Skapa annons </h2>
</div>
<br/>

<div class="left-box">
	<form method="POST" action="/Skapa-annons/Granska" enctype="multipart/form-data"> 
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h3 class="card-header">Företagsuppgifter</h3>
		<label class="required-information"><span class="redstar">* </span>Indikerar obligatoriska uppgifter.</label>

		<div class="form-group">
			<label for="company_email" class="required">E-postadress f&ouml;r kvittens <span class="redstar">*</span></label>
			<input class="form-control" placeholder="E-postadress" name="company_email" type="text" id="publisher[email]">
			<p>
				<small class="form-text text-muted"><em>En giltlig e-postadress behövs för kvittens och verifikation.</em></small>
			</p>
		</div>
		<div class="form-group">
			<label for="company_name" class=" required">F&ouml;retagsnamn <span class="redstar">*</span></label>
			<input class="form-control" placeholder="Företagsnamn" name="company_name" type="text" id="company[name]">
		</div>
		<div class="form-group">
			<label for="company_website">Webbplats</label>
			<input class="form-control" placeholder="Webbplats" name="company_website" type="text" id="company[website]">
			<p>
				<small class="form-text text-muted"><em>Om ni önskar en länk till er webbplats.</em></small>
			</p>
		</div>
		<div class="form-group">
			<label for="company_facebook">Facebook-sida</label>
			<input class="form-control" placeholder="Facebook-sida" name="company_facebook" type="text" id="company[facebook]">
			<p>
				<small class="form-text text-muted"><em>Om ni önskar en länk till er Facebook-sida, vänligen kopiera och klistra in URL:en.</em></small>
			</p>
		</div>
		<div class="form-group">
			<label for="company_logo">Logotyp</label>
			<p><input name="company_logo" type="file" id="company_logo"></p>
			<p>
				<small class="form-text text-muted"><em>Maxstorlek är 2Mb. Filen omskalas för att passa innanför 350x150px.</em></small>
			</p>
		</div>
</div>

	<br/>

<div class="left-box">
		<h3 class="card-header">Uppdragsbeskrivning</h3>
		<div class="form-group">
			<label for="post_title" class=" required">Annonstitel <span class="redstar">*</span></label>
			<input class="form-control" placeholder="Annonstitel" name="post_title" type="text" value="{!! old('title')!!}" id="title">
		</div>
		<div class="form-group">
			<label for="post_body" class="required">Annonstext <span class="redstar">*</span></label>
			<textarea class="ckeditor form-control" name="post_body"></textarea>
			<p>
				<small class="form-text text-muted"><em><code>p</code>, <code>a</code>, <code>em</code>, <code>strong</code> samt <code>ul</code>/<code>ol</code>-taggar är tillåtna. Övriga element plockas bort. Om du kopierar och klistrar in annonsen från exempelvis Word bör du kopiera in den oformaterad för att undvika oväntade formateringsfel.</em></small>
			</p>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group select_city">
					<label for="company_location" class=" required">Kommun/ort <span class="redstar">*</span></label><br/>
					<input class="form-control typeahead" id="city_name" type="text" placeholder="Ort/kommun" name="city_name">
					<input type="hidden" id="city_id" name="city_id" value="">
				</div>

				<div class="form-group select_category">
					<label for="category">Kategori <span class="redstar">*</span></label>
					<select placeholder="Välj kategori" name="category" class="form-control" id="category">
						<option value="0">- Välj kategori -</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach;
					</select>
					<br/>
					<label for="expiration_date" class=" required">Sista ans&ouml;kningsdag</label>
					<div id="root-picker-outlet"></div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input class="form-control datepicker" name="expiration_date" type="text" id="datepicker">
					</div>
					<p>
						<small class="form-text text-muted"><em>Du kan som mest välja ett datum två månader framåt i tiden.</em></small>
					</p>
				</div>
			</div>
		</div>
</div>
		<br/>
		<div class="left-box">
			<div class="row">
				<div class="col-md-12">
					<h3>Ansökning</h3>
					<div class="form-group">
						<label for="application_type_label" class="required">Hur man s&ouml;ker positionen. <span class="redstar">*</span></label>
						<div class="row">
							<div class="col-md-12">
								<div class="form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input js-show-hide" checked="checked" id="application_type_web" name="apply_check" type="radio" value="website">
										&nbsp;Via extern webbplats
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input js-show-hide" id="application_type_email" name="apply_check" type="radio" value="email" onclick="">
										&nbsp;Via e-post
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="show-website-application">
						<div class="form-group ">
							<label for="application_data_website" class=" required">Webbadress <span class="redstar">*</span></label>
							<input class="form-control apply_website" placeholder="Webbadress" name="apply_website" type="text" id="application_data_website">
						</div>
					</div>
					<div class="show-email-application" style="display:none;">
						<div class="form-group ">
							<label for="application_data_email" class=" required">E-postadress <span class="redstar">*</span></label>
							<input class="form-control apply_email" placeholder="E-postadress" name="apply_email" type="text" id="application_data_email">
						</div>
						<div class="form-group ">
							<label for="application_data_reference">Eventuell referens som ska anges vid ans&ouml;kan</label>
							<input class="form-control apply_email" placeholder="Referens" name="apply_reference" type="text" id="application_data_reference">
						</div>
					</div>
				</div>
			</div>
		</div>
		<br/>
		<div class="left-box">
			<div class="row">
				<div class="col-md-12">
					<input class="btn btn-info btn-goto-preview" type="submit" id="btn-goto-preview" value="Vidare till förhandsgranskning">
				</div>
			</div>
		</form>
	</div>
	<br/>
</div>
