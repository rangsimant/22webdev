@extends('layout.square')

@section('content')
{{ HTML::ul($errors->all(), array('class' => 'alert ng-isolate-scope alert-danger alert-dismissable')) }}

{{ Form::model($location, array('route' => array('location.update', $location->idLocation), 'method' => 'PUT', 'id' => 'form','class'=>'form-horizontal ng-pristine ng-valid','files' => true)) }}

	@if (Session::has('message'))
	    <div class="alert alert-{{ Session::get('message-type', 'info') }}">{{ Session::get('message') }}</div>
	@endif
	<input type="hidden" name="idLocation" value="{{ $location->idLocation }}">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Edit Location</strong></div>
		<div class="panel-body">

			<div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Location name :</label>
	            </div>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ (Input::old('name') === null) ? $location->name : Input::old('name') }}" autofocus>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Address :</label>
	            </div>
	            <div class="col-sm-10">
	                <textarea type="text" class="form-control" placeholder="Address" name="address">{{ (Input::old('address') === null) ? $location->address : Input::old('address') }}</textarea>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Description :</label>
	            </div>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" placeholder="Description" description="description" value="{{ (Input::old('description') === null) ? $location->description : Input::old('description') }}">
	            </div>
	        </div>
	        
        </div>
    </div>
{{ Form::close() }}

@stop