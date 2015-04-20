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
	                	<div class="input-group">
					        <span class="input-group-addon"><i class="fa fa-search"></i></span>
		                    <input type="text" placeholder="Search..." class="form-control ng-pristine ng-valid" ng-model="filter" ng-keyup="search()">
					    </div>
	                </form>
	            </div>
	            <div class="col-sm-4 col-xs-6 filter-result-info" ng-cloak>
                   <!--  <span class="ng-binding">
                       All patient @{{ patientTable.total() }} persons
                    </span>       -->        
                </div>
                <div class="col-sm-4 col-xs-6">
	                 <span class="pull-right">
	                	<a href="{{ URL::to('patient/create') }}" class="btn btn-default" title="New Patient"><i class="fa fa-wheelchair"></i> New Patient</a>
                	</span>
                </div>
	        </div>
	    </div>
		<table class="table table-bordered table-striped table-responsive table-hover" ng-table="patientTable" template-pagination="custom/pager" class="table">

	            <tr ng-repeat="patient in $data | filter:filter as display" ng-cloak>
	                <td data-title="'Photo'" width="5%" align="center">
	                	<img ng-src="@{{ patient.photo }}" class="img-circle img30_30" ng-cloak>
	                </td>
	                <td data-title="'Name'" sortable="'firstname'" width="30%">@{{ patient.firstname }} @{{ patient.lastname }}</td>
	               <!--  <td data-title="'Firstname'" sortable="'firstname'" width="30%">@{{ patient.firstname }}</td>
	                <td data-title="'Lastname'" sortable="'lastname'" width="30%">@{{ patient.lastname }}</td> -->
	                <td data-title="'Gender'" sortable="'gender'" width="15%">@{{ patient.gender }}</td>
	                <td width="15%">
	                	<span>
	                		<a href="{{ URL::to('patient') }}/@{{ patient.idPatient }}/edit" class="btn btn-info btn-xs" title="Edit">Edit</a>
	                	</span>
	                	<span>
	                		<a href="javascriptA:void(0)" class="btn btn-danger btn-xs" title="Delete">Delete</a>
	                	</span>
	                </td>
	            </tr>
	    </table>
    	<script type="text/ng-template" id="custom/pager">
		    <footer class="table-footer">
	            <div class="row">
	                <div class="col-md-6 page-num-info">
		                <span>
	                        Show 
	    	                <select ng-change="params.count(showlist)" ng-model="showlist">
			                	<option value="3">3</option>
			                	<option value="5">5</option>
			                	<option value="10" ng-selected="true">10</option>
			                	<option value="20">20</option>
			                </select> 
			                 entries per page
	                    </span>                
	                </div>
	                <div class="col-md-6 text-right pagination-container">
				        <ul class="pagination-sm pagination ng-isolate-scope ng-pristine ng-valid">
					        <li ng-class="{'disabled': !page.active }" ng-repeat="page in pages" ng-switch="page.type">
					            <a ng-switch-when="prev" ng-click="params.page(page.number)" href="">Previous</a>
				                <a ng-switch-when="first" ng-click="params.page(page.number)" href=""><span ng-bind="page.number"></span></a>
				                <a ng-switch-when="page" ng-click="params.page(page.number)" href=""><span ng-bind="page.number"></span></a>
				                <a ng-switch-when="more" ng-click="params.page(page.number)" href="">&#8230;</a>
				                <a ng-switch-when="last" ng-click="params.page(page.number)" href=""><span ng-bind="page.number"></span></a>
				                <a ng-switch-when="next" ng-click="params.page(page.number)" href="">Next</a>
					        </li>
				        </ul>
	                </div>
	            </div>
	        </footer>
	    </script>
	</div>
</section>
@stop