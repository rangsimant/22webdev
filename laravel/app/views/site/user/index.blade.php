@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.settings') }}} ::
@parent
@stop

{{-- New Laravel 4 Feature in use --}}
@section('styles')
@parent
body {
	background: #f2f2f2;
}
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>Edit your settings</h3>
</div>
<form class="form-horizontal" method="post" action="{{ URL::to('user/' . $user->id . '/edit') }}"  autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">
        <!-- Notifications -->
            @include('notifications')
            <!-- ./ notifications -->
        <!-- username -->
        <div class="form-group {{{ $errors->has('username') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="username">Username</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="username" id="username" value="{{{ Input::old('username', $user->username) }}}" {{ (Auth::user()->channel == "normal")?"":"readonly" }}/>
                {{ $errors->first('username', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ username -->

        <!-- first_name -->
        <div class="form-group {{{ $errors->has('first_name') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="first_name">First Name</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="first_name" id="first_name" value="{{{ Input::old('first_name', $user->first_name) }}}"  {{ (Auth::user()->channel == "normal")?"":"readonly" }}/>
                {{ $errors->first('first_name', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ first_name -->

        <!-- last_name -->
        <div class="form-group {{{ $errors->has('last_name') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="last_name">Last Name</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="last_name" id="last_name" value="{{{ Input::old('last_name', $user->last_name) }}}"  {{ (Auth::user()->channel == "normal")?"":"readonly" }}/>
                {{ $errors->first('last_name', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ last_name -->

        <!-- Email -->
        <div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="email">Email</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', $user->email) }}}"  {{ (Auth::user()->channel == "normal")?"":"readonly" }}/>
                {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ email -->

        @if (Auth::check())
        @if (Auth::user()->channel == "normal")
        <!-- Password -->
        <div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="password">Password</label>
            <div class="col-md-10">
                <input class="form-control" type="password" name="password" id="password" value=""  {{ (Auth::user()->channel == "normal")?"":"readonly" }}/>
                {{ $errors->first('password', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ password -->

        <!-- Password Confirm -->
        <div class="form-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="password_confirmation">Password Confirm</label>
            <div class="col-md-10">
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value=""  {{ (Auth::user()->channel == "normal")?"":"readonly" }}/>
                {{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ password confirm -->
        @endif
        @endif
        <!-- Channel -->
        <div class="form-group {{{ $errors->has('channel') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="channel">Channel</label>
            <div class="col-md-10">
                <input style="text-transform: uppercase;" class="form-control" type="text" name="channel" id="channel" value="{{{ Input::old('channel', $user->channel) }}}" readonly/>
                {{ $errors->first('channel', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
    </div>
    <!-- ./ general tab -->

    @if (Auth::user()->channel == "normal")
    <!-- Form Actions -->
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
    <!-- ./ form actions -->
    @endif
</form>
</form>
@stop
