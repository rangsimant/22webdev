@extends('layout.square')

@section('content')
{{ HTML::ul($errors->all(), array('class' => 'alert ng-isolate-scope alert-danger alert-dismissable')) }}

{{ Form::model($map, array('route' => array('map.update', $map->idMap), 'method' => 'PUT', 'id' => 'form','class'=>'form-horizontal ng-pristine ng-valid','files' => true)) }}

	@if (Session::has('message'))
	    <div class="alert alert-{{ Session::get('message-type', 'info') }}">{{ Session::get('message') }}</div>
	@endif
	<input type="hidden" name="idMap" value="{{ $map->idMap }}">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Edit Map</strong></div>
		<div class="panel-body">

			<div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Map name :</label>
	            </div>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ (Input::old('name') === null) ? $map->name : Input::old('name') }}" autofocus>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Address :</label>
	            </div>
	            <div class="col-sm-10">
	                <textarea type="text" class="form-control" placeholder="Address" name="address">{{ (Input::old('address') === null) ? $map->address : Input::old('address') }}</textarea>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Description :</label>
	            </div>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" placeholder="Description" name="description" value="{{ (Input::old('description') === null) ? $map->description : Input::old('description') }}">
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">

	            </div>
	            <div class="col-sm-10">
	            	<span>
	            		<a href="{{ URL::to('map') }}" class="btn btn-default">Cencel</a>
		                <button type="submit" class="btn btn-primary">Update</button>
	            	</span>
	            </div>
	        </div>
	        
        </div>
    </div>
{{ Form::close() }}

@stop