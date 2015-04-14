@extends('layout.user_layout')

@section('content')
<div class="container">
  <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
     @if (Session::get('error'))
        <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if (Session::get('notice'))
        <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" name="email" id="email" class="form-control" placeholder="Email address" value="{{{ Input::old('email') }}}" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="{{{ Input::old('password') }}}" required="">
    <div class="checkbox">
      <label>
        <input type="checkbox" name="remember" value="{{{ Input::old('remember') }}}"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>
</div>
@stop