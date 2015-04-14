@extends('site.layouts.user_template')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.profile') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div id="forgotpassword" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-default" >
        <div class="panel-heading">
            <div class="panel-title">User Profile</div>
        </div>     

        <div style="padding-top:30px" class="panel-body" >
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Signed Up</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{{$user->id}}}</td>
                    <td>{{{$user->username}}}</td>
                    <td>{{{$user->joined()}}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
