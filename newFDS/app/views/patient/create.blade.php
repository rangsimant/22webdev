@extends('layout.square')

@section('content')
<section class="panel panel-default table-dynamic">
	<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> New Patient</strong></div>
	<div class="panel-body" ng-controller="PatientList" ng-init="baseUrl='{{ URL::to('/') }}'">
		dd
	</div>
</section>
@stop