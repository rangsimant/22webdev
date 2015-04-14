<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			@section('title')
			{{ isset($title)?$title:"Social Contents" }}
			@show
		</title>
		<meta name="Rangsimant Hanwongsa" content="Social Content">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="{{ asset('bower_components/font-awesome-4.3.0/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-3.3.4/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-3.3.4/css/bootstrap-theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('custom/css/dashboard.css') }}">
		<link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">

		<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ asset('bower_components/bootstrap-3.3.4/js/bootstrap.min.js') }}"></script>
	</head>

	<body cz-shortcut-listen="true">
	    @yield('content')
	</body>
</html>