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
	                    Showing @{{ $data.length }}/@{{ patients.length }} entries
	                </span>              
	            </div>
	        </div>
	    </div>
		<table class="table table-bordered table-striped table-responsive" ng-table="patientTable" template-pagination="custom/pager" class="table">
	        <thead>
	            <tr>
	                <th width="50">
	                	<div class="th">
	                   		Photo
	                    </div>
	                </th>
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
	            <tr ng-repeat="patient in $data | filter:filter as display" ng-cloak>
	                <td>
	                	<img ng-src="{{ URL::to('uploads/profile') }}/@{{ patient.photo }}" class="img-circle img30_30" ng-cloak>
	                </td>
	                <td>@{{ patient.firstname }}</td>
	                <td>@{{ patient.lastname }}</td>
	                <td>@{{ patient.gender }}</td>
	                <td>
	                	<span>
	                		<a href="{{ URL::to('patient') }}/@{{ patient.idPatient }}" class="btn btn-info btn-xs" title="Edit">Edit</a>
	                	</span>
	                	<span>
	                		<a href="#delete" class="btn btn-danger btn-xs" title="Delete">Delete</a>
	                	</span>
	                </td>
	            </tr>
	        </tbody>
	    </table>
	    <script type="text/ng-template" id="custom/pager">
	        <ul class="pagination-sm pagination ng-isolate-scope ng-pristine ng-valid">
		        <li ng-class="{'active': !page.active}" ng-repeat="page in pages" ng-switch="page.type">
	                <a ng-switch-when="prev" ng-click="params.page(page.number)" href="">Previous</a>
	                <a ng-switch-when="first" ng-click="params.page(page.number)" href=""><span ng-bind="page.number"></span></a>
	                <a ng-switch-when="page" ng-click="params.page(page.number)" href=""><span ng-bind="page.number"></span></a>
	                <a ng-switch-when="more" ng-click="params.page(page.number)" href="">Next</a>
	                <a ng-switch-when="last" ng-click="params.page(page.number)" href=""><span ng-bind="page.number"></span></a>
	                <a ng-switch-when="next" ng-click="params.page(page.number)" href="">&raquo;</a>
	            </li>
	            <li> 
		            <div class="btn-group">
		                <button type="button" ng-class="{'active':params.count() == 1}" ng-click="params.count(1)" class="btn btn-default">1</button>​
		                <button type="button" ng-class="{'active':params.count() == 10}" ng-click="params.count(10)" class="btn btn-default">10</button>​
		                <button type="button" ng-class="{'active':params.count() == 25}" ng-click="params.count(25)" class="btn btn-default">25</button>
		                <button type="button" ng-class="{'active':params.count() == 50}" ng-click="params.count(50)" class="btn btn-default">50</button>
		                <button type="button" ng-class="{'active':params.count() == 100}" ng-click="params.count(100)" class="btn btn-default">100</button>
		            </div>
	            </li>
	        </ul>
	    </script>

	</div>
</section>
@stop