<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			@section('title')
			{{ isset($title)?$title:"Fall Detection System" }}
			@show
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="{{ asset('bower_components/font-awesome-4.3.0/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-3.3.4/css/bootstrap.min.css') }}">

		<!-- Square 1.4 Theme -->
		<link rel="stylesheet" href="{{ asset('theme/square-v1.4/dist/bower_components/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/square-v1.4/dist/bower_components/weather-icons/css/weather-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/square-v1.4/dist/styles/main.css') }}">
		<!-- ./ Square 1.4 -->

		<link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">

		<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ asset('bower_components/bootstrap-3.3.4/js/bootstrap.min.js') }}"></script>
	</head>

	<body>
		@yield('content')
	</body>
</html>