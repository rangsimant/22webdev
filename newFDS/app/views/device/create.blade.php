@extends('layout.square')

@section('content')
<section class="panel panel-default table-dynamic">

	<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> New Device</strong></div>
	<div class="panel-body">
		{{ HTML::ul($errors->all(), array('class' => 'alert ng-isolate-scope alert-danger alert-dismissable')) }}

		{{ Form::open(array('url' => 'device', 'class' => 'form-horizontal form-validation', 'autocomplete' => 'off')) }}
			<div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Device name :</label>
	            </div>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ Input::old('name') }}" autofocus>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Device type :</label>
	            </div>
	            <div class="col-sm-10">
            		<span class="ui-select">
	            		<select name="DeviceType" value="{{ Input::old('DeviceType') }}">
	            			<option value="">-- Select --</option>
	            			@foreach($devicetype as $value)
		            			<option value="{{ $value->idDeviceType }}">{{ $value->name }}</option>
	            			@endforeach
	            		</select>
	            	</span>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Purchased date :</label>
	            </div>
	            <div class="col-sm-10">
	            	<div class="input-group">
		                <input type="text" class="form-control input_datepicker" placeholder="YYYY-MM-DD" name="purchasedDate" value="{{ Input::old('purchasedDate') }}">	
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Description :</label>
	            </div>
	            <div class="col-sm-10">
	                <textarea type="text" class="form-control" placeholder="Description" name="description">{{ Input::old('description') }}</textarea>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">
	                <label for="">Status :</label>
	                <p><small>default : "Activate"</small></p>
	            </div>
	            <div class="col-sm-10">
	            	<span class="ui-select">
	            		<select name="status">
	            			<option value="1" selected>Activate</option>
	            			<option value="0" >Deactivate</option>
	            		</select>
	            	</span>
	            </div>
	        </div>

	        <div class="form-group">
	            <div class="col-sm-2">

	            </div>
	            <div class="col-sm-10">
	            	<span>
		                <button type="reset" class="btn btn-default">Reset</button>
		                <button type="submit" class="btn btn-primary">Create</button>
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