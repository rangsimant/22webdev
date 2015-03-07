@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="container">
	<div class="row">
		<form role="form"  class="form-signin" method="POST" action="{{{ URL::to('/user/login') }}}" accept-charset="UTF-8">
	    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
	    <fieldset>
	    	<h3 class="heading-desc">
			Login to <span style="color:orange">ADS</span>Center</h3>
			<div class="social-box">
				<div class="row mg-btm">
					<div class="col-md-12">
		                <a href="{{ URL::to('login/facebook') }}"class="btn btn-social btn-facebook btn-block">
				            <i class="fa fa-facebook"></i> Sign in with Facebook
				        </a>
			        </div>
				</div>
				<div class="row">
					<div class="col-md-12">
		                <a href="{{ URL::to('login/google') }}"class="btn btn-block btn-social btn-google-plus">
                            <i class="fa fa-google-plus"></i> Sign in with Google
                        </a>
			        </div>
				</div>
			</div>
			<div class="main">
	        <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}" autofocus>
			<input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
			<div class="checkbox">
	            <label for="remember">
	                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> {{{ Lang::get('confide::confide.login.remember') }}}
	            </label>
	        </div>
			<span class="clearfix"></span>	
	        </div>
			<div class="login-footer">
				<div class="row">
		            <div class="col-xs-6 col-md-6">
		                <div class="left-section">
							<a href="{{{ URL::to('user/forgot') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
							</br>
							<a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a>
						</div>
		            </div>
		            <div class="col-xs-6 col-md-6 pull-right">
	            		<button tabindex="3" type="submit" class="btn btn-large btn-info pull-right">{{{ Lang::get('confide::confide.login.submit') }}}</button>
		            </div>
		        </div>
			</div>
		</fieldset>
      </form>
	</div>
</div>


@stop
