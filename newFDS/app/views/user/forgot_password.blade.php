@extends('layout.square_user')

@section('content')
<div class="page-forgot">

    <div class="signin-header">
        <div class="container text-center">
            <section class="logo">
                <a href="#/">Fall Detection System</a>
            </section>
        </div>
    </div>

    <div class="main-body">
        <div class="container">
            
            <div class="info text-center">
                <h2>Password Reset</h2>
                <p class="text-small">Enter your email address that you used to register. We'll send you an email with your username and a link to reset your password.</p>
            </div>

            <div class="form-container">

                <form method="POST" action="{{ URL::to('users/forgot_password') }}" accept-charset="UTF-8">
				    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control input-lg" placeholder="Email">
                    </div>
                    <div class="form-group">
                        @if ( Session::get('error') )
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-block btn-primary">Send</button>
                    </div>
                </form>
                
            </div>

        </div>
    </div>

</div>
@stop