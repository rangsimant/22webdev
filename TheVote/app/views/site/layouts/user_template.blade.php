<!DOCTYPE html>
<html lang="en" ng-app="thevote">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			{{ isset($title)?$title:"TheVote" }}
			@show
		</title>
		@section('meta_keywords')
		<meta name="keywords" content="your, awesome, keywords, here" />
		@show
		@section('meta_author')
		<meta name="author" content="Jon Doe" />
		@show
		@section('meta_description')
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />
                @show
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('theme/sb_admin_2.0/bower_components/bootstrap-social/bootstrap-social.css')}}">

        <link rel="stylesheet" href="{{asset('theme/sb_admin_2.0/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('theme/sb_admin_2.0/bower_components/metisMenu/dist/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('theme/sb_admin_2.0/bower_components/morrisjs/morris.css')}}">
        <link rel="stylesheet" href="{{asset('theme/sb_admin_2.0/bower_components/dropzone/dist/min/dropzone.min.css')}}">


        <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">

        <script src="{{asset('theme/sb_admin_2.0/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('theme/sb_admin_2.0/bower_components/readmore-master/readmore.min.js')}}"></script>
        <script src="{{asset('theme/sb_admin_2.0/bower_components/dropzone/dist/min/dropzone-amd-module.min.js')}}"></script>

        <!-- <script src="{{asset('theme/sb_admin_2.0/bower_components/dotdotdot-master/src/js/jquery.dotdotdot.min.js')}}"></script> -->
        
		<style>
		@section('styles')
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

		<![endif]-->
		<!-- Favicons ================================================== -->
		<link rel="aToggle navigationpple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/fav-TheVite.ico') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/fav-TheVite.ico') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/fav-TheVite.ico') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/fav-TheVite.ico') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/fav-TheVite.ico') }}}">
	</head>

	<body>
        <div id="body-user" style="min-height:100%">
            <div class="container">
				<!-- Content -->
                <hr/>
				@yield('content')
            </div>
            <!-- /.container -->
        </div>

		<!-- the following div is needed to make a sticky footer -->
		</div>
		<!-- ./wrap -->

		<!-- Javascripts
		================================================== -->
        <script src="{{asset('theme/sb_admin_2.0/bower_components/angular-1.3.14/angular.min.js')}}"></script>
        <script src="{{asset('theme/sb_admin_2.0/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('custom/js/controller.js')}}"></script>
        <script src="{{asset('custom/js/app.js')}}"></script>
        <script src="{{asset('custom/js/custom.js')}}"></script>
        @yield('scripts')

	</body>
</html>
