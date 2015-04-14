// var validator = $('#formNewSensor').validate();
// validator.form();

$('#ModalAddSensor').on('hidden.bs.modal', function (e) {
	$('#namesensor').val(null);
	$('#errorsensor').hide();
})
function addNewSensor(url, idx)
{
	$.ajax({
	    type: "GET",
	    contentType: "application/json; charset=utf-8",
	    url: url,
	    success: function (data) {
	    	var html = '<div class="col-sm-6">' +
                    		'<div class="row">' +
	                		'<label class="devicetype ui-checkbox">' +
	                			'<input name="sensor['+idx+'][id]" type="checkbox" value="'+data.idSensor+'">' +
	                			'<span>'+ data.name +'</span>' +
	                		'</label>';
		                		
	        if(data.numberOfChannels > 1)
    		{
    			html += 	'<span class="pull-right">' +
				            			'<span style="font-size:9px">CHANNEL </span>' +
										'<span class="devicetype ui-select">' +
				                			'<select name="sensor['+idx+'][numberOfChannel]" ng-model="hstep" ng-options="opt for opt in options.hstep" class="ng-pristine ng-valid">';
												for(var i=1; i <= data.numberOfChannels ; i++)
												{
												 html += '<option value="'+i+'">'+i+'</option>';
												}
				html += '</select> </span> </span>';			
        	}
        	html += '</div> </div>';

	        $('#addSensor').before(html);
			$('#ModalAddSensor').modal('hide');
	    }
	});
}