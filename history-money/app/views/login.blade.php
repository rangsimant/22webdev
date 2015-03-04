@extends('theme_login')

@section('form-login')
        <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8" id="login" class="login-form">
		    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
		    <fieldset>

		    	<div class="login-header">
						<a href="dashboard-1.html" class="logo">
							<img src="{{ URL::to('assets/img/logo-orange.png') }}" alt="" width="140" />
						</a>
						
						<p>Dear user, log in to access the admin area!</p>
				</div>

		        <div class="form-group">
		            <label for="email" class="control-label">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
		            <input class="form-control input-dark" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
		        </div>

		        <div class="form-group">
		        	<label for="password" class="control-label">{{{ Lang::get('confide::confide.password') }}}</label>
			       	<input class="form-control input-dark" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
		       	</div>

		       	 @if (Session::get('error'))
		            <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
		        @endif

		        @if (Session::get('notice'))
		            <div class="alert">{{{ Session::get('notice') }}}</div>
		        @endif

		       	<div class="form-group">
		       		 <label for="remember">
		                <input type="hidden" name="remember" value="0">
		                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> {{{ Lang::get('confide::confide.login.remember') }}}
		            </label>
		       	</div>

		       	 <div class="form-group">
		        	<button tabindex="3" type="submit" class="btn btn-dark  btn-block text-left"><i class="fa-lock"></i>{{{ Lang::get('confide::confide.login.submit') }}}</button>
		        </div>


		        <div class="login-footer">
		        	<a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
		        </div>

		    </fieldset>
		</form>
@stop

@section('script')

@stop



