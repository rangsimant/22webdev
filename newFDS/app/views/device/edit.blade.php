@extends('layout.square')

@section('content')
<section class="panel panel-default table-dynamic">

	<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Edit Device</strong></div>
	<div class="panel-body">
		{{ HTML::ul($errors->all(), array('class' => 'alert ng-isolate-scope alert-danger alert-dismissable')) }}

		{{ Form::model($device, array('route' => array('device.update', $device->idDevice), 'method' => 'PUT', 'id' => 'form','class'=>'form-horizontal ng-pristine ng-valid','files' => true)) }}
			<input type="hidden" name="idDevice" value="{{ $device->idDevice }}">
			<div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Device name :</label>
	            </div>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ (Input::old('name') === null) ? $device->name : Input::old('name') }}" autofocus>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Device type :</label>
	            </div>
	            <div class="col-sm-10">
	            	<div class="">
	            		<span class="ui-select">
		            		<select name="DeviceType" value="{{ Input::old('DeviceType') }}">
		            			<option value="">-- Select --</option>
		            			@foreach($devicetype as $value)
			            			<option value="{{ $value->idDeviceType }}" {{ ($value->idDeviceType == $device->DeviceType) ? 'selected' : '' }}>{{ $value->name }}</option>
		            			@endforeach
		            		</select>
		            	</span>
	            	</div>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Purchased date :</label>
	            </div>
	            <div class="col-sm-10">
	            	<div class="input-group">
		                <input type="text" class="form-control input_datepicker" placeholder="YYYY-MM-DD" name="purchasedDate" value="{{ ( Input::old('purchasedDate') === null && $device->purchasedDate != '0000-00-00') ? $device->purchasedDate : Input::old('purchasedDate') }}">	
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Description :</label>
	            </div>
	            <div class="col-sm-10">
	                <textarea type="text" class="form-control" placeholder="Description" name="description">{{ Input::old('description') ? $device->description : Input::old('description') }}</textarea>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Status :</label>
	            </div>
	            <div class="col-sm-10">
	            	<span class="ui-select">
	            		<select name="status">
	            			<option value="1" {{ (empty($device->deleted_at)) ? 'selected' : '' }}>Activate</option>
	            			<option value="0" {{ (!empty($device->deleted_at)) ? 'selected' : '' }}>Deactivate</option>
	            		</select>
	            	</span>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">

	            </div>
	            <div class="col-sm-10">
	            	<span>
	            		<a href="{{ URL::to('device') }}" class="btn btn-default">Cencel</a>
		                <button type="submit" class="btn btn-primary">Update</button>
	            	</span>
	            </div>
	        </div>
	    </form>
	</div>
</section>

<script type="text/javascript">
	$(function(){
		$('.input_datepicker').datepicker({
			format: "yyyy-mm-dd",
		    todayBtn: "linked",
		    orientation: "top auto",
		    keyboardNavigation: false,
		    forceParse: false,
		    calendarWeeks: true,
		    autoclose: true,
		    todayHighlight: true
		});
	})
</script>
@stop