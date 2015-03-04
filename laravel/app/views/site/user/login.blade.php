@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>Login into your account</h1>
</div>
{{ Confide::makeLoginForm()->render() }}
<div class="form-group">
    <label class="col-md-2 control-label" for="password">
    </label>
    <div class="col-md-3 row">
       <a href="{{ URL::to('login/facebook') }}"class="btn btn-block btn-social btn-facebook">
            <i class="fa fa-facebook"></i> Sign in with Facebook
        </a>
    </div>
</div>
@stop
