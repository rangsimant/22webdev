@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="container">
	<div class="row">
		<form role="form"  class="form-signup" method="POST" action="{{{ URL::to('user') }}}" accept-charset="UTF-8">
	    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
	    <fieldset>
	    	<h3 class="heading-desc">
			Create Account</h3>
			<div class="main">

			<div style="margin-bottom: 15px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            	<input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}" autofocus>
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
		            <div class="pull-right">
	            		<button type="submit" class="btn btn-info">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
		            </div>
			</div>
		</fieldset>
      </form>
	</div>
</div>
@stop
