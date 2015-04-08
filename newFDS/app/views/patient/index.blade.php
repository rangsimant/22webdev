@extends('layout.square')

@section('content')
<section class="panel panel-default table-dynamic">
	<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Patient</strong></div>
	<div class="" ng-controller="PatientList" ng-init="baseUrl='{{ URL::to('/') }}'">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" ng-model="csrf"/>
	    <div class="table-filters">
	        <div class="row">
	            <div class="col-sm-4 col-xs-6">
	                <form class="ng-pristine ng-valid">
	                    <input type="text" placeholder="search" class="form-control ng-pristine ng-valid" ng-model="filter" ng-keyup="search()">
	                </form>
	            </div>
	            <div class="col-sm-3 col-xs-6 filter-result-info">
	                <span class="ng-binding" ng-cloak>
	                    Showing @{{ display.length }}/@{{ patients.length }} entries
	                </span>              
	            </div>
	        </div>
	    </div>
		<table class="table table-bordered table-striped table-responsive">
	        <thead>
	            <tr>
	                <th>
	                	<div class="th">
	                   		Firstname
	                    </div>
	                </th>
	                <th>
	                	<div class="th">
	                   		Lastname
	                    </div>
	                </th>
	                <th>
	                	<div class="th">
	                   		Gender
	                    </div>
	                </th>
	                <th>
	                	<div class="th">
	                   		
	                    </div>
	                </th>
	               
	            </tr>
	        </thead>
	        <tbody>
	            <tr ng-repeat="patient in patients | filter:filter as display" ng-cloak>
	                <td>@{{ patient.firstname }}</td>
	                <td>@{{ patient.lastname }}</td>
	                <td>@{{ patient.gender }}</td>
	                <td>
	                	<span>
	                		<a href="{{ URL::to('patient') }}/@{{ patient.idPatient }}" class="btn btn-info btn-xs">Edit</a>
	                	</span>
	                	<span>
	                		<a href="#delete" class="btn btn-danger btn-xs">Delete</a>
	                	</span>
	                </td>
	            </tr>
	        </tbody>
	    </table>
	    <h4 ng-if="!display.length" class="text-center">
		    Nothing was found
		</h4>
	</div>
</section>
@stop