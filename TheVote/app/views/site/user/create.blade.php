@extends('site.layouts.user_template')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div id="forgotpassword" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-default" >
        <div class="panel-heading">
            <div class="panel-title">Create Account</div>
        </div>     

        <div style="padding-top:30px" class="panel-body" >
			<form role="form"  class="form-signup" method="POST" action="{{{ URL::to('user') }}}" accept-charset="UTF-8">
		    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
		    <fieldset>
				<div class="main">
				<!-- Notifications -->
				@include('notifications')
				<!-- ./ notifications -->
	            <div style="margin-bottom: 15px" class="input-group">
	                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	            	<input class="form-control" placeholder="First name" type="text" name="first_name" id="firstname" value="{{{ Input::old('first_name') }}}" autofocus>
	            	<input class="form-control" placeholder="Last name" type="text" name="last_name" id="firstname" value="{{{ Input::old('last_name') }}}">
	            </div>

				<div style="margin-bottom: 15px" class="input-group">
	                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	            	<input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
	            </div>
				
				<div style="margin-bottom: 15px" class="input-group">
	                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
	            </div>

				<div style="margin-bottom: 15px" class="input-group">
	                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
	            </div>

				<div style="margin-bottom: 15px" class="input-group">
	                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
	            </div>

		        </div>
				<div class="signup-footer">
					 <div class="col-xs-8 col-md-8">
			                <div class="left-section">
								You can login with 
									<a href="{{ URL::to('login/facebook') }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
									<a href="{{ URL::to('login/google') }}" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
							</div>
			            </div>
			            <div class="col-xs-4 col-md-4">
		            		<button type="submit" class="btn btn-info pull-right">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
			            </div>
				</div>
			</fieldset>
	      </form>
		</div>
	</div>
</div>
@stop
