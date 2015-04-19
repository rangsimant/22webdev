@extends('layout.square')

@section('content')
<section class="panel panel-default table-dynamic">
	<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Device</strong></div>
	<div class="" ng-controller="DeviceList" ng-init="baseUrl='{{ URL::to('/') }}'">
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
                    <!-- <span class="ng-binding">
                       Device has @{{ deviceTable.total() }} entries
                    </span>   -->            
                </div>
                <div class="col-sm-4 col-xs-6">
	                <span class="pull-right">
	                	<a href="javascriptA:void(0)" class="btn btn-default" title="Reload" ng-click="refreshTable()"><i class="fa fa-refresh"></i></a>
	                	<a href="{{ URL::to('device/create') }}" class="btn btn-default" title="New Device"><i class="fa fa-tag"></i> New Device</a>
	                </span>
                </div>
	        </div>
	    </div>
		<table class="table table-bordered table-striped table-responsive table-hover" ng-table="deviceTable" template-pagination="custom/pager" class="table">

	            <tr ng-repeat="device in $data | filter:filter as display" ng-cloak>
	                <td data-title="'Photo'" width="5%" align="center">
	                	<img ng-src="@{{ device.photo }}" class="img-circle img30_30" ng-cloak>
	                </td>
	                <td data-title="'Device name'" sortable="'name'" width="15%">
	                	@{{ device.name }}
	                	<br>
	                	<small>
	                		@{{ device.typename }}
	                	</small>
	                </td>
	                <!-- <td data-title="'Type'" sortable="'typename'" width="10%">@{{ device.typename }}</td> -->
	                <td data-title="'Description'" sortable="'description'" width="30%">@{{ device.description }}</td>
	                <td data-title="'Action'" sortable="'assign'" width="20%">
	                	<span>@{{ device.firstname }} @{{ device.lastname }}</span>
	                	<div class="assign">
	                		<span ng-if="device.firstname != null && device.assign == null">
		                		<a  href="javascriptA:void(0)" class="text-danger" title="Unassign" ng-click="unassign(device.idDevicePatient)"><small>Unassign</small></a> | 
		                		<a  href="javascriptA:void(0)" class="text-primary" title="Change"><small>Change</small></a>
		                	</span>
	                		<a ng-if="device.firstname == null" href="javascriptA:void(0)" class="text-primary" title="Assign" data-toggle="modal" data-target="#deviceAssign"><small>Click to Assign</small></a>
	                	</div>
	                </td>
	                <td data-title="'Status'" sortable="'deleted_at'" width="5%">
	                	<span ng-if="device.status == 'Available'" class="text-success">@{{ device.status }}</span>
	                	<span ng-if="device.status == 'Unavailable'" class="text-danger">@{{ device.status }}</span>
	                </td>
	                <td width="20%">
                		<a href="{{ URL::to('device') }}/@{{ device.idDevice }}/history" class="btn btn-default btn-xs" title="History">History</a>
                		<a href="{{ URL::to('device') }}/@{{ device.idDevice }}/edit" class="btn btn-info btn-xs" title="Edit">Edit</a>
                		<a href="javascriptA:void(0)" class="btn btn-danger btn-xs" title="Delete" data-toggle="modal" data-target="#deviceDelete" ng-click="getIDDevice(device.idDevice)">Delete</a>
	                </td>
	            </tr>
	    </table>
	    <!-- Modal Assign-->
    <div class="modal fade" id="deviceAssign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Assign Device</h4>
	      </div>
	      <div class="modal-body" ng-controller="PatientList" ng-init="baseUrl='{{ URL::to('/') }}'">
	      	<div class="table-filters">
		        <div class="row">
		            <div class="col-sm-4 col-xs-6">
		                <form class="ng-pristine ng-valid">
		                	<div class="input-group">
						        <span class="input-group-addon"><i class="fa fa-search"></i></span>
			                    <input type="text" placeholder="Search..." class="form-control ng-pristine ng-valid" ng-model="filter_patient" ng-keyup="search()">
						    </div>
		                </form>
		            </div>
		            <div class="col-sm-4 col-xs-6 filter-result-info" ng-cloak>
	                    <span class="ng-binding">
	
	                    </span>              
	                </div>
	                <div class="col-sm-4 col-xs-6">
	                <span class="pull-right">
	                	<a href="javascriptA:void(0)" class="btn btn-default" title="Reload" ng-click="refreshTable()"><i class="fa fa-refresh"></i></a>
	                	<a href="{{ URL::to('patient/create') }}" class="btn btn-default" title="New Patient"><i class="fa fa-wheelchair"></i> New Patient</a>
	                </span>
	                </div>
		        </div>
			</div>
	        <table class="table table-bordered table-striped table-responsive table-hover" ng-table="patientTable" template-pagination="custom/pager" class="table">
		            <tr ng-repeat="patient in $data | filter:filter_patient as patient" ng-cloak>
		                <td data-title="'Photo'" width="5%" align="center">
		                	<img ng-src="@{{ patient.photo }}" class="img-circle img30_30" ng-cloak>
		                </td>
		                <td data-title="'Patient ID'" sortable="'patient_id'" width="30%">@{{ patient.patient_id }}</td>
		                <td data-title="'Firstname'" sortable="'firstname'" width="30%">@{{ patient.firstname }}</td>
		                <td data-title="'Lastname'" sortable="'lastname'" width="30%">@{{ patient.lastname }}</td>
		                <td width="15%">
		                	<span>
		                		<a href="javascriptA:void(0)" class="text-primary" title="Select Patient" ng-click="assign(patient.idPatient)">Select</a>
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
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
    <!-- ./ Modal -->

	    <!-- Modal Delete-->
	    <div class="modal fade" id="deviceDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Delete Device</h4>
		      </div>
		      <div class="modal-body">
		        Are you sure ?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="deviceDelete()">Confirm</button>
		      </div>
		    </div>
		  </div>
		</div>
	    <!-- ./ Modal -->
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