@extends('layout.square')

@section('content')
@if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message-type', 'info') }}">{{ Session::get('message') }}</div>
@endif

<section class="panel panel-default table-dynamic">

	<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Edit Device</strong></div>
	<div class="panel-body">
		{{ HTML::ul($errors->all(), array('class' => 'alert ng-isolate-scope alert-danger alert-dismissable')) }}

		{{ Form::model($sensor, array('route' => array('sensor.update', $sensor->idSensor), 'method' => 'PUT', 'id' => 'form','class'=>'form-horizontal ng-pristine ng-valid','files' => true)) }}
			<input type="hidden" name="idSensor" value="{{ $sensor->idSensor }}">
			<div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Sensor name :</label>
	            </div>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" placeholder="name" name="name" value="{{ (Input::old('name') === null) ? $sensor->name : Input::old('name') }}" autofocus>
	            </div>
	        </div>

	        <div class="form-group">
            <label class="col-sm-2">
                Number of Channel
                <small id="errorsensor" class="text-default">(Default: 1)</small>
            </label>
            <div class="col-sm-10">
        				<div class="input-group ui-spinner" data-trigger="spinner">
                    <input type="text" class="form-control" value="{{ (Input::old('numberOfChannels') === null) ? $sensor->numberOfChannels : Input::old('numberOfChannels') }}" data-rule="quantity" name="numberOfChannels">
                    <div class="input-group-btn btn-group-vertical">
                        <a href="javascript:;" data-spin="up" class="btn btn-xs btn-default">
                            <i class="fa fa-angle-up"></i>
                        </a>
                        <a href="javascript:;" data-spin="down" class="btn spinner-down btn-xs btn-default">
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

	        <div class="form-group">
	            <div class="col-sm-2">

	            </div>
	            <div class="col-sm-10">
	            	<span>
	            		<a href="{{ URL::to('sensor') }}" class="btn btn-default">Cencel</a>
		                <button type="submit" class="btn btn-primary">Update</button>
	            	</span>
	            </div>
	        </div>
	    </form>
	</div>
</section>

<script type="text/javascript">
	
</script>
@stop