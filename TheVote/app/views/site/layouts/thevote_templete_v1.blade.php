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
        <link rel="stylesheet" href="{{asset('theme/sb_admin_2.0/dist/css/sb-admin-2.css')}}">        
        <link rel="stylesheet" href="{{asset('theme/sb_admin_2.0/dist/css/timeline.css')}}">
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

	<body ng-controller="changepage">
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

        <div id="page-wrapper" style="min-height:100%">
            <div class="container">
                <div class="row">
                <!-- /.row -->
                    <div class="col-lg-3" ng-view>
                        <hr/>
                         <div class="panel-body box-ranking">
                            <ul class="ranking">
                               <li class="header-ranking">
                                     <h3 class="text-ranking text-center">Ranking Top 5</h3>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="https://farm9.staticflickr.com/8650/16466044379_c54870e0cf_z.jpg" alt="User Avatar" class="img-responsive" style="max-width:50px;">
                                    </span>
                                    <div class="ranking-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">No.1</strong>
                                        </div>
                                        <p>
                                            รีวิว Samsung Galaxy E5 สมาร์ท...
                                        </p>
                                        <div class="footer vote-group">
                                            <span><a href="#"><i class="fa fa-thumbs-o-up"></i> 2k</a></span>
                                            <span><a href="#"><i class="fa fa-thumbs-o-down"></i> 110</a></span>
                                            <span><a href="#"><i class="fa fa-comment-o"></i> 500</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="https://www.blognone.com/sites/default/files/imagecache/news-thumbnail/category_pictures/kbank.png" alt="User Avatar" class="img-responsive" style="max-width:50px;">
                                    </span>
                                    <div class="ranking-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">No.2</strong>
                                        </div>
                                        <p>
                                            [Ask Blognone] ขอเชิญร่วมวิ...
                                        </p>
                                        <div class="footer vote-group">
                                            <span><a href="#"><i class="fa fa-thumbs-o-up"></i> 1.79k</a></span>
                                            <span><a href="#"><i class="fa fa-thumbs-o-down"></i> 800</a></span>
                                            <span><a href="#"><i class="fa fa-comment-o"></i> 123</a></span>
                                        </div>
                                    </div>
                                </li>
                                 <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="https://farm9.staticflickr.com/8640/16313050189_8c4d883bf0_z_d.jpg" alt="User Avatar" class="img-responsive" style="max-width:50px;">
                                    </span>
                                    <div class="ranking-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">No.3</strong>
                                        </div>
                                        <p>
                                            รีวิว Galaxy A7 สมาร์ทโฟนเรี...
                                        </p>
                                        <div class="footer vote-group">
                                            <span><a href="#"><i class="fa fa-thumbs-o-up"></i> 1.68k</a></span>
                                            <span><a href="#"><i class="fa fa-thumbs-o-down"></i> 300</a></span>
                                            <span><a href="#"><i class="fa fa-comment-o"></i> 900</a></span>
                                        </div>
                                    </div>
                                </li>
                                 <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="https://www.blognone.com/sites/default/files/imagecache/news-thumbnail/news-thumbnails/slack%20sticker-logo-BN.png" alt="User Avatar" class="img-responsive" style="max-width:50px;">
                                    </span>
                                    <div class="ranking-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">No.4</strong>
                                        </div>
                                        <p>
                                            แนะนำ Slack โต๊ะกลางวางงาน ...
                                        </p>
                                        <div class="footer vote-group">
                                            <span><a href="#"><i class="fa fa-thumbs-o-up"></i> 1.66k</a></span>
                                            <span><a href="#"><i class="fa fa-thumbs-o-down"></i> 752</a></span>
                                            <span><a href="#"><i class="fa fa-comment-o"></i> 50</a></span>
                                        </div>
                                    </div>
                                </li>
                                 <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="https://www.blognone.com/sites/default/files/imagecache/news-thumbnail/news-thumbnails/dyson-icon.png" alt="User Avatar" class="img-responsive" style="max-width:50px;">
                                    </span>
                                    <div class="ranking-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">No.5</strong>
                                        </div>
                                        <p>
                                            [รีวิว] พัดลมไร้ใบพัด Dyson Cool...
                                        </p>
                                        <div class="footer vote-group">
                                            <span><a href="#"><i class="fa fa-thumbs-o-up"></i> 1.25k</a></span>
                                            <span><a href="#"><i class="fa fa-thumbs-o-down"></i> 300</a></span>
                                            <span><a href="#"><i class="fa fa-comment-o"></i> 33</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li class='text-center'>
                                <a href="#">See More</a>
                                </li>
                            </ul>
                        </div>
                    </div>
	                <div class="col-lg-9 grid-post" ng-view>
                        <hr/>
						<!-- Content -->
						@yield('content')
                	</div>
                </div>
            <!-- /.container -->
        </div>

		<!-- the following div is needed to make a sticky footer -->
		</div>
		<!-- ./wrap -->

		<!-- Javascripts
		================================================== -->
        <script src="{{asset('theme/sb_admin_2.0/bower_components/angular-1.3.14/angular.min.js')}}"></script>
        <script src="{{asset('theme/sb_admin_2.0/bower_components/raphael/raphael-min.js')}}"></script>
        <script src="{{asset('theme/sb_admin_2.0/bower_components/morrisjs/morris.min.js')}}"></script>
        <script src="{{asset('theme/sb_admin_2.0/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('theme/sb_admin_2.0/bower_components/autosize-master/dest/autosize.min.js')}}"></script>

        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('theme/sb_admin_2.0/dist/js/sb-admin-2.js')}}"></script>
        <script src="{{asset('theme/sb_admin_2.0/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('custom/js/controller.js')}}"></script>
        <script src="{{asset('custom/js/app.js')}}"></script>
        <script src="{{asset('custom/js/custom.js')}}"></script>
        @yield('scripts')

	</body>
</html>
