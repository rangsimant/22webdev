@extends('layout.square_user')

@section('content')
<div class="page-signin">

    <div class="signin-header">
        <div class="container text-center">
            <section class="logo">
                <a href="#/">Fall Detection System</a>
            </section>
        </div>
    </div>

    <div class="main-body">
        <div class="container">
            <div class="form-container">
                 <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                    <fieldset>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>
                        </div>
                        <div class="form-group">
                            @if ( Session::get('error') )
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        </div>
                    </fieldset>
                </form>

                <section>
                    <p class="text-center"><a href="{{ URL::to('users/forgot_password') }}">Forgot your password?</a></p>
                </section>
                
            </div>
        </div>
    </div>

</div>
@stop