@extends('layout.square')

@section('content')
<div class="row">
	@foreach($map as $value)
	<div class="col-md-4">
		<section class="panel panel-dark table-dynamic monitor" id="{{ $value->idMap }}">
			<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Monitor : {{ $value->location->name }}</strong></div>
			<div class="panel-body" ng-controller="SensorList" ng-init="baseUrl='{{ URL::to('/') }}'" align="center">
				<img src="{{ URL::to('uploads/map/'.$value->filename) }}" class="thumbnail img-responsive img-monitor">
				<div class="callout callout-info text-left">
	                <h4>{{ $value->name }}</h4>
	                <p>Floor : {{ $value->floor }}</p>
	            </div>
			</div>
		</section>
	</div>
	@endforeach
</div>

<script type="text/javascript">
$(function()
{
	$('section.monitor').click(function(){
		var idMap = $(this).attr('id');
		var url = "{{ URL::to('monitor') }}/"+idMap;
		window.location = url;
	})
})
</script>
@stop