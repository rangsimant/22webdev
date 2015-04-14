@extends('layout.square')

@section('content')
<section class="panel panel-dark table-dynamic">
	<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Monitor :{{ $map->location->name }} {{ $map->name }}</strong></div>
	<div class="panel-body" ng-controller="SensorList" ng-init="baseUrl='{{ URL::to('/') }}'" align="center">
		<div id="monitor" class="clearfix">
			<img src="{{ URL::to('uploads/map/'.$map->filename) }}" class="img-map img-responsive" id="monitor">
			@foreach($router as $key => $value)
          	<div style="top:{{($value->y * 10)/100}}%;left:{{($value->x*10)/100}}%;" class="iconRouter">
	          	<p class="badge badge-info">{{$value->name}}</p>
	          	<div class="text-center">
		          	<i class="fa fa-wifi wifi-router icon-router fa-3x" data-toggle="tooltip" data-placement="top" title="{{$value->name}}" id="{{$value->idRouter}}"></i>
		          	<i class="fa fa-times del-router" title="Delete" data-toggle="modal" data-target="#myModalDelete"></i>
	          	</div>
          	</div>
        	@endforeach
      	</div>
	</div>
</section>

<script type="text/javascript">
$(function(){

})
</script>
@stop