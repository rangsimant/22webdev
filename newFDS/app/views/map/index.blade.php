@extends('layout.square')

@section('content')
<section class="panel panel-default table-dynamic">
	<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Map</strong></div>
	<div class="" ng-controller="MapList" ng-init="baseUrl='{{ URL::to('/') }}'">
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
                       All sensor @{{ sensorTable.total() }} entries
                    </span>   -->            
                </div>
                <div class="col-sm-4 col-xs-6">
	                 <span class="pull-right">
	                	<a href="javascriptA:void(0)" class="btn btn-default" title="Reload" ng-click="refreshTable()"><i class="fa fa-refresh"></i></a>
	                	<a href="{{ URL::to('map/create') }}" class="btn btn-default" title="New Map"><i class="fa fa-location-arrow"></i> New Map</a>
                	</span>
                </div>
	        </div>
	    </div>
		<table class="table table-bordered table-striped table-responsive table-hover" ng-table="mapTable" template-pagination="custom/pager" class="table">

	            <tr ng-repeat="map in $data | filter:filter as display" ng-cloak>
	                <td data-title="'Name'" sortable="'name'" width="30%">@{{ map.name}}</td>
	                <td data-title="'Address'" sortable="'address'" width="25%">@{{ map.address }}</td>
	                <td data-title="'Description'" sortable="'description'" width="25%">@{{ map.description }}</td>
	                <td width="15%">
	                	<span>
	                		<a href="{{ URL::to('map') }}/@{{ map.idMap }}/edit" class="btn btn-info btn-xs" title="Edit">Edit</a>
	                	</span>
	                	<span>
	                		<a href="javascriptA:void(0)" class="btn btn-danger btn-xs" title="Delete" data-toggle="modal" data-target="#mapDelete" ng-click="getIDMap(map.idMap)">Delete</a>
	                	</span>
	                </td>
	            </tr>
	    </table>
	     <!-- Modal -->
	    <div class="modal fade" id="mapDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Delete Map</h4>
		      </div>
		      <div class="modal-body">
		        Are you sure ?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="mapDelete()">Confirm</button>
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