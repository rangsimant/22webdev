<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>eSPORTs info</title>
	<link rel="shortcut icon" href="{{ URL::to('assets/img/fav.ico') }}"/>

	{{HTML::style('theme/xenon/css/fonts/linecons/css/linecons.css') }}
	{{HTML::style('theme/xenon/css/fonts/fontawesome/css/font-awesome.min.css') }}
	{{HTML::style('theme/xenon/css/bootstrap.css') }}
	{{HTML::style('theme/xenon/css/xenon-core.css') }}
	{{HTML::style('theme/xenon/css/xenon-forms.css') }}
	{{HTML::style('theme/xenon/css/xenon-components.css') }}
	{{HTML::style('theme/xenon/css/xenon-skins.css') }}
	{{HTML::style('theme/xenon/css/custom.css') }}

	{{HTML::script('theme/xenon/js/jquery-1.11.1.min.js')}}
	{{HTML::script('assets/angular/angular.min.js')}}

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body">

	    <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		@include('side-menu')
		
		<div class="main-content" style="">
			@include('nav-content')
			@yield('content')
			
		</div>
		<!-- end: Chat Section -->	
		
	</div>
	

	<!-- Bottom Scripts -->
	<script src="{{ asset('theme/xenon/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('theme/xenon/js/TweenMax.min.js') }}"></script>
	<script src="{{ asset('theme/xenon/js/resizeable.js') }}"></script>
	<script src="{{ asset('theme/xenon/js/joinable.js') }}"></script>
	<script src="{{ asset('theme/xenon/js/xenon-api.js') }}"></script>
	<script src="{{ asset('theme/xenon/js/xenon-toggles.js') }}"></script>
	<script src="{{ asset('theme/xenon/js/jquery-validate/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('theme/xenon/js/toastr/toastr.min.js') }}"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="{{ asset('theme/xenon/js/xenon-custom.js') }}"></script>

	<!-- Main Js -->
	<script src="{{ asset('assets/my-script/js/main.js') }}"></script>

</body>
</html>