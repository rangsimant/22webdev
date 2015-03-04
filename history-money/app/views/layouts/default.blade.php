<html lang='en'>
<head>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML; CHARSET=UTF-8" >
	<META NAME="KEYWORDS" CONTENT="osv,online_saving,online saving,บันทึกรายรับรายจ่าย,บันทึก,บันทึกรายรับ,บันทึกรายจ่าย,เงินออม,บันทึกเงินออม">
	<META NAME="DESCRIPTION" CONTENT="Record your revenue.">
	<META NAME="AUTHOR" CONTENT="22webdev ny Rangsimant Hanwongsa">
	<META NAME="COPYRIGHT" CONTENT="Twenty two Developer"> 
	<META NAME="GENERATOR" CONTENT="Sublime2,Laravel,Bootstrop,Xampp,Mysql">
	<META name="ABSTRACT" content="Record your revenue.">
	<META NAME="ROBOT" CONTENT="osv,online_saving,online saving,บันทึกรายรับรายจ่าย,บันทึก,บันทึกรายรับ,บันทึกรายจ่าย,เงินออม,บันทึกเงินออม"> 
	<META NAME="REVISIT-AFTER" CONTENT="7 Days"> 
	<META HTTP-EQUIV="expires" CONTENT="Never">
	<META name="Distribution" content="Global">
	<META NAME="CONTACT_ADDR" CONTENT="hanwongsa.r@gmail.com"> 
	<META NAME="RATING" CONTENT="General">
	<META NAME="LANGUAGE" CONTENT="en-th">

  <!-- Fav icon -->
  <link rel="shortcut icon" href="{{ asset('assets/capture-site/img/osv.ico') }}">

  <!-- Extends Css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome-4.2.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-material/css/material.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-material/css/material-wfont.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-material/css/ripples.min.css') }}">

  <!-- my-script -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/my-script/css/css.css') }}">
	<title>{{ $title }} : {{ Lang::get( 'capture-site.title' ) }}</title>
</head>
<body>
	<nav class="navbar navbar-default container" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img id="logo-img"src="{{ asset('assets/capture-site/img/osv.png') }}" class=" navbar-brand " title="Online Saving logo">
          <a id="logo-text" class=" navbar-brand" href="/">{{ Lang::get( 'capture-site.title' ) }}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#dashboard" class=""><i class="fa fa-tachometer"></i> {{ Lang::get( 'home.overview' ) }}</a></li>
            <li><a href="writhdrawal" class=""><i class="fa fa-money"></i> {{ Lang::get( 'home.history' ) }}</a></li>
            <li><a href="MyStructure" class=""><i class="fa fa-money"></i> {{ Lang::get( 'home.my-structure' ) }}</a></li>
          </ul>
          <ul class="nav navbar-nav pull-right">
          	<li><a href="Login" class=""><i class="fa fa-sign-in"></i> {{ Lang::get( 'home.login' ) }}</a></li>
          	<li><a href="" class="">{{ Lang::get( 'home.signup' ) }}</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="content">
    	@yield('content')
    </div>
	
</body>

<script type="text/javascript" src="{{ asset('assets/capture-site/js/jquery-2.1.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap-material/js/ripples.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap-material/js/material.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/capture-site/js/jquery.nouislider.min.js') }}"></script>
<script type="text/javascript">
$(function() {
    $.material.init();
});

@yield('script')
</script>


</html>