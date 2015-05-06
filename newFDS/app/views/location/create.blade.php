@extends('layout.square')

@section('content')
{{ HTML::ul($errors->all(), array('class' => 'alert ng-isolate-scope alert-danger alert-dismissable')) }}

{{ Form::open(array('url' => 'location', 'class' => 'form-horizontal form-validation', 'autocomplete' => 'off')) }}

	@if (Session::has('message'))
	    <div class="alert alert-{{ Session::get('message-type', 'info') }}">{{ Session::get('message') }}</div>
	@endif
    <div class="panel panel-default">
        <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> New Location</strong></div>
		<div class="panel-body">

			<div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Location name :</label>
	            </div>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" placeholder="Name" name="name" value="" autofocus>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Address :</label>
	            </div>
	            <div class="col-sm-10">
	                <textarea type="text" class="form-control" placeholder="Address" name="address"></textarea>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Description :</label>
	            </div>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" placeholder="Description" name="description" value="">
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">

	            </div>
	            <div class="col-sm-10">
	            	<span>
	            		<a href="{{ URL::to('location') }}" class="btn btn-default">Cencel</a>
		                <button type="submit" class="btn btn-primary">Create</button>
	            	</span>
	            </div>
	        </div>
	        
        </div>
    </div>
{{ Form::close() }}

@stop