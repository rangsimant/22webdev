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
		<nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="" href="{{ URL::to('/') }}"><img src="{{{ asset('assets/ico/thrvote-b.png') }}}" class="navbar-brand"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    @if (Auth::user()->hasRole('admin'))
                    <li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
                    @endif
                    <li class="dropdown pull-right">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-top: 11px;padding-bottom: 9px;">
                                 <img src="{{ (Auth::user()->picture != null)?Auth::user()->picture:URL::to('custom/image/22avatar.png'); }}" alt="Avatar" class="avatar-thumbnail" width="30px" title="{{{ Auth::user()->first_name." ".Auth::user()->last_name }}} ">
                                 <span>{{ Auth::user()->first_name." ".Auth::user()->last_name }}</span>
                                 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{{ URL::to('user') }}}"><span class="glyphicon glyphicon-user"></span> Profile</a>
                                    </li>
                                <li class="divider"></li>
                                <li><a href="{{{ URL::to('user/logout') }}}"><span class="glyphicon glyphicon-share"></span> Logout</a></li>
                            </ul>
                    </li>
                    @else
                    <li  class="{{ (Request::is('user/login') ? 'active' : '') }}"><a href="{{{ URL::to('user/login') }}}">Login</a></li>
                    <li  class="{{ (Request::is('user/create') ? 'active' : '') }}"><a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>
                    @endif
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>

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
