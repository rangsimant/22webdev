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
		<!-- <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-3.3.4/css/bootstrap.min.css') }}"> -->
		<!-- <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-3.3.4/css/bootstrap-theme.min.css') }}"> -->

		<!-- Square 1.4 Theme -->
		<link rel="stylesheet" href="{{ asset('theme/square-v1.4/dist/bower_components/weather-icons/css/weather-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('theme/square-v1.4/dist/styles/main.css') }}">
		<!-- ./ Square 1.4 -->

		<link rel="stylesheet" href="{{ asset('custom/css/square-font.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/ng-table/dist/ng-table.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/angular-ngToast/ngtoast/dist/ngToast.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/angular-ngToast/ngtoast/dist/ngToast-animations.min.css') }}">
		<link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">

		<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
		<script src="{{ asset('bower_components/ng-table/dist/ng-table.min.js') }}"></script>
		<script src="{{ asset('bower_components/angular-ngToast/angular-sanitize/angular-sanitize.min.js') }}"></script>
		<script src="{{ asset('bower_components/angular-ngToast/angular-animate/angular-animate.min.js') }}"></script>
		<script src="{{ asset('bower_components/angular-ngToast/ngtoast/dist/ngToast.min.js') }}"></script>
		<script src="{{ asset('custom/js/app.js') }}"></script>
		<script src="{{ asset('custom/js/devicetype.js') }}"></script>
		<script src="{{ asset('bower_components/bootstrap-3.3.4/js/bootstrap.min.js') }}"></script>
	</head>

	<body ng-app="FDS">
	    <toast></toast>
		
		<div class="no-print">
            <section id="header" class="top-header ng-scope">
            	<header class="clearfix ng-scope">

				    <!-- Logo -->
				    <div class="logo">
				        <a href="{{ URL::to('/') }}">
				            <!-- <span class="logo-icon glyphicon glyphicon-fire"></span> -->
				            <span class="ng-binding">FDS</span>
				        </a>
				    </div>

				    <!-- needs to be put after logo to make it working-->
				    <div class="menu-button" toggle-off-canvas="">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </div>

				    <div class="top-nav">
				        <ul class="nav-left list-unstyled">
				            <li>
				                <a href="#/" class="toggle-min"><i class="fa fa-bars"></i></a>
				            </li>
				            <li class="dropdown text-normal nav-profile">
				                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                    <img src="{{ (isset(Auth::user()->userProfile->photo))?URL::to('uploads/profile/'.Auth::user()->userProfile->photo):'' }}" alt="" class="img-circle img30_30">
				                    <span class="hidden-xs">
				                        <span>{{ Auth::user()->userProfile->firstname." ".Auth::user()->userProfile->lastname }}</span>
				                    </span>
				                </a>
				                <ul class="dropdown-menu dropdown-dark with-arrow">
				                    <li>
				                        <a href="#/pages/profile">
				                            <i class="fa fa-user"></i>
				                            <span>My Profile</span>
				                        </a>
				                    </li>
				                    <li>
				                        <a href="#/tasks">
				                            <i class="fa fa-check"></i>
				                            <span>My Tasks</span>
				                        </a>
				                    </li>
				                    <li>
				                        <a href="#/pages/lock-screen">
				                            <i class="fa fa-lock"></i>
				                            <span>Lock</span>
				                        </a>
				                    </li>
				                    <li>
				                        <a href="{{ URL::to('users/logout') }}">
				                            <i class="fa fa-sign-out"></i>
				                            <span>Log Out</span>
				                        </a>
				                    </li>
				                </ul>
				            </li>
				        </ul> 
				    </div>

				</header>
			</section>

		    <aside id="nav-container" class="ng-scope">        
				<div id="nav-wrapper" class="ng-scope">
				    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><ul id="nav" class="ng-scope" style="overflow: hidden; width: auto; height: 100%;"  id="accordion" role="tablist" aria-multiselectable="true">
				        <li class="{{ (Request::segment(1)=='monitor')? 'active' : '' }}"><a href="{{ URL::to('monitor') }}"> <i class="fa fa-desktop"></i><span >Monitor</span> </a></li>
				        <li class="{{ (Request::segment(1)=='device' || Request::segment(1)=='devicetype' || Request::segment(1)=='sensor')? 'active' : '' }}">
				            <a data-toggle="collapse" data-parent="#accordion" href="#Device" aria-expanded="true" aria-controls="Device">
				            	<i class="fa fa-tag"></i><span>Device Management</span>
				            </a>
				            <ul id="Device" class="panel-collapse collapse">
				                <li class="{{ (Request::segment(1)=='device')? 'active' : '' }}"><a href="{{ URL::to('device') }}"><i class="fa fa-caret-right"></i><span>Device</span></a></li>
				                <li class="{{ (Request::segment(1)=='devicetype')? 'active' : '' }}"><a href="{{ URL::to('devicetype') }}"><i class="fa fa-caret-right"></i><span>Device Type</span></a></li>
				                <li class="{{ (Request::segment(1)=='sensor')? 'active' : '' }}"><a href="{{ URL::to('sensor') }}"><i class="fa fa-caret-right"></i><span>Sensor</span></a></li>
				            </ul>
					        <i class="fa fa-caret-right icon-has-ul"></i>
					    </li>
					    <li class="{{ (Request::segment(1)=='patient')? 'active' : '' }}">
				            <a data-toggle="collapse" data-parent="#accordion" href="#Patient" aria-expanded="true" aria-controls="Patient">
				            	<i class="fa fa-wheelchair"></i><span>Patient Management</span>
				            </a>
				            <ul id="Patient" class="panel-collapse collapse">
				                <li class="{{ (Request::segment(1)=='patient')? 'active' : '' }}"><a href="{{ URL::to('patient') }}"><i class="fa fa-caret-right"></i><span>Patient</span></a></li>
				                <li class="{{ (Request::segment(1)=='devicepatient')? 'active' : '' }}"><a href="{{ URL::to('devicepatient') }}"><i class="fa fa-caret-right"></i><span>Assign Device</span></a></li>
				            </ul>
					        <i class="fa fa-caret-right icon-has-ul"></i>
					    </li>
					    <li class="">
				            <a data-toggle="collapse" data-parent="#accordion" href="#Physician" aria-expanded="true" aria-controls="Physician">
				            	<i class="fa fa-user-md"></i><span>Physician Management</span>
				            </a>
				            <ul id="Physician" class="panel-collapse collapse">
				                <li><a href="#/tables/static"><i class="fa fa-caret-right"></i><span>Physician</span></a></li>
				            </ul>
					        <i class="fa fa-caret-right icon-has-ul"></i>
					    </li>
					     <li class="">
				            <a data-toggle="collapse" data-parent="#accordion" href="#Location" aria-expanded="true" aria-controls="Location"><i class="fa fa-location-arrow"></i><span>Location Management</span></a>
				            <ul id="Location" class="panel-collapse collapse">
				                <li><a href="#/tables/static"><i class="fa fa-caret-right"></i><span>Location</span></a></li>
				                <li><a href="#/tables/static"><i class="fa fa-caret-right"></i><span>Map</span></a></li>
				            </ul>
					        <i class="fa fa-caret-right icon-has-ul"></i>
					    </li>
					     <li class="">
				            <a href="{{ URL::to('questionnaire') }}">
				            	<i class="fa fa-file-text-o"></i><span>Questionnaire</span>
				            </a>
					    </li>
					    <li class="">
				            <a href="#Notification"><i class="fa fa-bell-o"></i><span>Notification</span></a>
					    </li>
					     <li class="">
				            <a data-toggle="collapse" data-parent="#accordion" href="#Router" aria-expanded="true" aria-controls="Router">
				            	<i class="fa fa-wifi"></i><span>Router</span>
				            </a>
					    </li>
				    </ul>
				    <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 144.926041666667px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
				</div>
			</aside>
		</div>
        <div class="view-container">
            <section id="content" class="animate-fade-up ng-scope">
            	<div class="page ng-scope">

			            @yield('content')

				</div>
			</section>   
		</div>
	</body>

	<!-- new components -->
    <script src="{{ asset('bower_components/dataTables-1.10.6/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('bower_components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
	<script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput_locale_th.js') }}"></script>

	<!-- Square 1.4 theme -->
	<script src="{{ asset('theme/square-v1.4/dist/bower_components/jquery-spinner/dist/jquery.spinner.min.js') }}"></script>


	<script type="text/javascript">
	$(function(){	    
		if ($('li').hasClass('active')) {
                $('> a').removeClass('collapsed');
                var activeMenu = $('li.active > ul').attr('id');
                $('#'+activeMenu).addClass('collapse in');
            };

		$('.collapse').on('show.bs.collapse', function () {
		  $('.collapse.in').collapse('hide');
		})
	})
	</script>

	<!--
    <script src="{{ asset('theme/square-v1.4/dist/scripts/vendor.js') }}"></script>
    <script src="{{ asset('theme/square-v1.4/dist/scripts/ui.js') }}"></script>
    <script src="{{ asset('theme/square-v1.4/dist/scripts/app.js') }}"></script> -->
</html>