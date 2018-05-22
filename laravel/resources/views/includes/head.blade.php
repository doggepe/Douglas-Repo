<html>
<head>
	<title>{{ $title }}</title>

	<meta charset="UTF-8">
	<meta name="author" content="Douglas">
	<meta name="description" content="Uppdraget.io">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="{{ asset('css/app.css') }}" media="all" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/bootstrap-tagsinput.css') }}" media="all" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

  	<!-- ALL JS BELOW THIS LINE -->
  	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  	<script src="{{ asset('js/global.js') }}"></script>
  	<script src="{{ asset('js/typeahead.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
  	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
</head>
<body>