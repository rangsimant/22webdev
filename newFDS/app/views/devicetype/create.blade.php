@extends('layout.square')

@section('content')
{{ HTML::ul($errors->all(), array('class' => 'alert ng-isolate-scope alert-danger alert-dismissable')) }}

{{ Form::open(array('url' => 'devicetype','id'=>'form','class'=>'form-horizontal ng-pristine ng-valid','files' => true)) }}

@if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message-type', 'info') }}">{{ Session::get('message') }}</div>
@endif
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Photo Device Type</strong></div>
            <div class="panel-body ng-scope">
            	<input type="file" class="file-loading" name="photo" accept="image/*">
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Detail Device Type</strong></div>
            <div class="panel-body ng-scope">
            	<fieldset>
	            	<div class="form-group">
	                    <div class="col-sm-2">
	                        <label for="">Name</label>
	                    </div>
	                    <div class="col-sm-10">
	                        <input name="name" type="text" placeholder="Device Type Name" value="{{ Input::old('name') }}" class="form-control ng-pristine ng-invalid ng-invalid-required" required="">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-2">
	                        <label for="">Sensor</label>
	                    </div>
	                    <div class="col-sm-10">
	                    	@foreach($sensors as $idx => $sensor)
	                    	<div class="col-sm-6">
	                    		<div class="row">
		                		<label class="devicetype ui-checkbox">
		                			<input name="sensor[{{ $idx }}][id]" type="checkbox" value="{{ $sensor->idSensor }}">
		                			<span>{{ $sensor->name }}</span>
		                		</label>
		                		@if($sensor->numberOfChannels > 1)
		                		<span class="pull-right">
		                			<span style="font-size:9px">CHANNEL</span>
									<span class="devicetype ui-select">
			                			<select name="sensor[{{ $idx }}][numberOfChannel]" class="ng-pristine ng-valid" value="{{ Input::old('sensor[$idx][numberOfChannel]') }}" >
			                				@for($i = 1; $i <= $sensor->numberOfChannels; $i++)
			                					<option value="{{ $i }}">{{ $i }}</option>
			                				@endfor
			                			</select>
		                			</span>
		                		</span>
			                		
		                		@endif
			                	</div>
		                	</div>
	                    	@endforeach
	                    	<div class="col-sm-12" id="addSensor">
	                    		<div class="row">
		                    		<a href="#" class="text-info" data-toggle="modal" data-target="#ModalAddSensor"><i class="fa fa-plus"></i> Add new sensor</a>
	                    		</div>
	                    	</div>
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-2">
	                        <label for="">Manufacturer</label>
	                    </div>
	                    <div class="col-sm-10">
	                        <input name="manufacturer" type="text" placeholder="Manufacturer" value="{{ Input::old('manufacturer') }}" class="form-control ng-pristine ng-invalid ng-invalid-required" required="">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-2">
	                        <label for="">Contact Person</label>
	                    </div>
	                    <div class="col-sm-10">
	                        <input name="contactperson" type="text" placeholder="Name" value="{{ Input::old('contactperson') }}" class="form-control ng-pristine ng-invalid ng-invalid-required" >
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-2">
	                        <label for="">Address</label>
	                    </div>
	                    <div class="col-sm-10">
	                        <textarea name="address" placeholder="Address" class="form-control ng-pristine ng-invalid ng-invalid-required" >{{ Input::old('address') }}</textarea>
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-2">
	                        <label for="">Tel.</label>
	                    </div>
	                    <div class="col-sm-10">
	                        <input name="tel" type="text" placeholder="Telephone Number" value="{{ Input::old('tel') }}" class="form-control ng-pristine ng-invalid ng-invalid-required"  onkeypress="return isNumberKey(event)" maglength="10">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-2">
	                        <label for="">E-mail</label>
	                    </div>
	                    <div class="col-sm-10">
	                        <input name="email" type="email" placeholder="Email" value="{{ Input::old('email') }}" class="form-control ng-pristine ng-invalid ng-invalid-required ng-invalid-email">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-2">
	                        <label for="">Description</label>
	                    </div>
	                    <div class="col-sm-10">
	                        <textarea name="description" placeholder="Description" class="form-control ng-pristine ng-invalid ng-invalid-required" >{{ Input::old('description') }}</textarea>
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-2">
	                        <label for=""></label>
	                    </div>
	                    <div class="col-sm-10">
		            		<a href="{{ URL::to('devicetype') }}" class="btn btn-default">Cencel</a>
	                    	<button type="submit" class="btn btn-primary">Create</button>
	                    </div>
	                </div>
				</fieldset>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}

<!-- Modal add new sensor -->
{{ Form::open(array('id' => 'formNewSensor', 'class'=>'form-horizontal','autocomplete' => 'off')) }}
<div class="modal fade" id="ModalAddSensor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Sensor</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label for="" class="col-sm-4">Sensor Name <small class="text-danger">*</small></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="" id="namesensor" name="namesensor" required>
                <small id="errorsensor" class="text-danger" hidden>Please enter sensor name.</small>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-4">
                Number of Channel
                <small id="errorsensor" class="text-default">(Default: 1)</small>
            </label>
            <div class="col-xs-8">
        				<div class="input-group ui-spinner" data-trigger="spinner">
                    <input type="text" class="form-control" value="1" data-rule="quantity" id="numberOfChannelsensor" name="numberOfChannelsensor">
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sensor">Add</button>
      </div>
    </div>
  </div>
</div>
{{ Form::close() }}

<script type="text/javascript">
$(function(){
	$('button.btn-sensor').click(function(){
		var name = $('#namesensor').val();
		var numberOfChannel = $('#numberOfChannelsensor').val();
		var idx = $('input[type="checkbox"]').length;
		var url = "{{ URL::to('devicetype/addsensor') }}"+"/"+numberOfChannel+"/"+name;
		if (name != "") 
		{
			addNewSensor(url, idx);
		}
		else
		{
			$('#errorsensor').show();
		}
	});

	var input_upload = $("input[type='file']");
	input_upload.fileinput
	({
		// uploadUrl: "{{ URL::to('devicetype/uploadPhoto') }}",
		browseClass: "btn btn-primary btn-block",
		browseLabel: " Pick Image",
		browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
		removeClass: "btn btn-danger",
		removeLabel: "Delete",
		removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
		uploadClass: "btn btn-info",
		uploadLabel: "Upload",
		uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
		showCaption: false,
		showRemove: false,
		showUpload: false,
        allowedFileExtensions : ['jpg', 'png','gif'],
	    uploadAsync: false
	});
})
</script>
@stop