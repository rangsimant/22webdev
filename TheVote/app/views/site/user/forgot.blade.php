@extends('site.layouts.user_template')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.forgot_password') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div id="forgotpassword" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-default" >
        <div class="panel-heading">
            <div class="panel-title">{{{ Lang::get('user/user.forgot_password') }}}</div>
        </div>     

        <div style="padding-top:30px" class="panel-body" >
			{{ Confide::makeForgotPasswordForm() }}
		</div>
	</div>
</div>
@stop
