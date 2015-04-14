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

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">Social Contents</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->username }} <span class="caret"></span></a>
	              <ul class="dropdown-menu" role="menu">
	                <li><a href="#"><i class="fa fa-cog"></i> Setting</a></li>
	                <li><a href="#"><i class="fa fa-star-o"></i> Favorite</a></li>
	                <li><a href="#"><i class="fa fa-key"></i> Permission</a></li>
	                <li class="divider"></li>
	                <li><a href="{{ URL::to('users/logout') }}"><i class="fa fa-sign-out"></i> Log out</a></li>
	              </ul>
	            </li> 
	          </ul>
	        </div>
	      </div>
	    </nav>

	    <div class="container-fluid">
	    	<div class="row">
	    		<div class="col-sm-3 col-md-2 sidebar">
		          <ul class="nav nav-sidebar">
		            <li class="active"><a href="#"><i class="fa fa-facebook-square"></i> Facebook <span class="sr-only">(current)</span></a></li>
		            <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
		            <li><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li>
		            <li><a href="#">Pantip</a></li>
		          </ul>
		        </div>
		        <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-3 main">
		        	Thread
		        	@yield('thread')
		        </div>
		        <div class="col-sm-6 col-md-7 main">
		        	Content
					@yield('content')
		        </div>
	    	</div>
	    </div>
	</body>
</html>