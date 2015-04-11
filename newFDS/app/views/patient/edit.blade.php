@extends('layout.square')

@section('content')
<section data-ng-view="" id="profile" class="animate-fade-up ng-scope">
<div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-profile">
                <div class="panel-heading text-center bg-info">
                    <img alt="" src="{{ (!empty($patient->user->userProfile->photo))? URL::to('uploads/profile/'.$patient->user->userProfile->photo) : URL::to('uploads/default/icon-user-default.png') }}" class="img-circle img80_80">
                    <h3 class="ng-binding">{{ $patient->user->userProfile->firstname." ".$patient->user->userProfile->lastname }}</h3>
                    <p>Project Manager</p>                    
                </div>
                <div class="list-justified-container">
                    <ul class="list-justified text-center">
                        <li>
                            <p class="size-h3">679</p>
                            <p class="text-muted">Tweets</p>
                        </li>
                        <li>
                            <p class="size-h3">575</p>
                            <p class="text-muted">Followers</p>
                        </li>
                        <li>
                            <p class="size-h3">23</p>
                            <p class="text-muted">Following</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <section class="panel panel-box">
                        <div class="panel-top bg-facebook">
                            <div class="divider divider"></div>
                            <i class="fa fa-facebook size-h1"></i>
                            <div class="divider divider"></div>
                        </div>
                        <div class="list-justified-container">
                            <ul class="list-justified text-center">
                                <li>
                                    <p class="size-h3">575</p>
                                    <p class="text-muted">Followers</p>
                                </li>
                                <li>
                                    <p class="size-h3">23</p>
                                    <p class="text-muted">Following</p>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="col-sm-6">
                    <section class="panel panel-box">
                        <div class="panel-top bg-twitter">
                            <div class="divider divider"></div>
                            <i class="fa fa-twitter size-h1"></i>
                            <div class="divider divider"></div>
                        </div>
                        <div class="list-justified-container">
                            <ul class="list-justified text-center">
                                <li>
                                    <p class="size-h3">575</p>
                                    <p class="text-muted">Followers</p>
                                </li>
                                <li>
                                    <p class="size-h3">23</p>
                                    <p class="text-muted">Following</p>
                                </li>
                            </ul>
                        </div>
                    </section>                        
                </div>
            </div>


          
        </div>
        <div class="col-md-6">

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel mini-box">
                        <span class="box-icon bg-danger">
                            <i class="fa fa-film"></i>
                        </span>
                        <div class="box-info">
                            <p class="size-h2">39</p>
                            <p class="text-muted">Amazing Films</p>
                        </div>
                    </div>                    
                </div>
                <div class="col-sm-6">
                    <div class="panel mini-box">
                        <span class="box-icon bg-warning">
                            <i class="fa fa-camera"></i>
                        </span>
                        <div class="box-info">
                            <p class="size-h2">63</p>
                            <p class="text-muted">Wonderful Photos</p>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel mini-box">
                        <span class="box-icon bg-success">
                            <i class="fa fa-bookmark-o"></i>
                        </span>
                        <div class="box-info">
                            <p class="size-h2">55</p>
                            <p class="text-muted">New Collections</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel mini-box">
                        <span class="box-icon bg-info">
                            <i class="fa fa-check"></i>
                        </span>
                        <div class="box-info">
                            <p class="size-h2">34</p>
                            <p class="text-muted">Tasks Finised</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Profile Info</strong></div>
                <div class="panel-body">
                    <div class="media">
                        <div class="media-body">
                            <ul class="list-unstyled list-info">
                                <li class="ng-binding">
                                    <span class="icon glyphicon glyphicon-user"></span>
                                    <label>User name</label>
		                            {{ $patient->user->userProfile->firstname." ".$patient->user->userProfile->lastname  }}
                                </li>
                                <li>
                                    <span class="icon glyphicon glyphicon-envelope"></span>
                                    <label>Email</label>
                                    {{ $patient->user->email }}
                                </li>
                                <li>
                                    <span class="icon glyphicon glyphicon-home"></span>
                                    <label>Address</label>
		                            {{ $patient->user->userProfile->address  }}
                                </li>
                                <li>
                                    <span class="icon glyphicon glyphicon-earphone"></span>
                                    <label>Contact</label>
		                            {{ $patient->user->userProfile->telephone  }}
                                </li>
                                <li>
                                    <span class="icon glyphicon glyphicon-flag"></span>
                                    <label>Nationality</label>
		                            {{ $patient->user->userProfile->nationality }}
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></section>
@stop