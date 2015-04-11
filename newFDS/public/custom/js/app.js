var FDS = angular.module('FDS', ['ngTable']);

FDS.controller('PatientList',function($scope, $http , $filter, ngTableParams){
	$scope.$watch('baseUrl', function(){
		$scope.getPatients();
	 });
	
	$scope.getPatients = function()
	{
		$http.get($scope.baseUrl+"/getPatientList").
		success(function(data, status, headers, config)
		{
			$scope.patients = data;
			$scope.dataTablePatient(data);
		}).
		error(function(data, status, headers, config) 
		{
			console.log("ststus: "+status);
		});
	}

	$scope.dataTablePatient = function(data)
	{
		$scope.patientTable = new ngTableParams({
		        page: 1,            // show first page
		        count: 10,           // count per page
		        filter:{
		        	firstname:''
		        },
		        sorting: {
		            firstname: 'asc',     // initial sorting
		            lastname: '',     // initial sorting
		            gender: ''     // initial sorting
		        }
		    }, {
		        total: data.length, // length of data
		        getData: function($defer, params) {
		        	 // use build-in angular filter
		            var orderedData = params.sorting() ? $filter('orderBy')(data, params.orderBy()) : data;
		            $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
		             params.total(orderedData.length); // set total for recalc pagination
		        }
		    });
	}
	
});

FDS.controller('DeviceList',function($scope, $http , $filter, ngTableParams){
	$scope.$watch('baseUrl', function(){
		$scope.getDevices();
	 });

	$scope.getDevices = function()
	{
		$http.get($scope.baseUrl+"/getDeviceList").
		success(function(data, status, headers, config)
		{
			$scope.devices = data;
			$scope.dataTableDevice(data);
			console.log(data);
		}).
		error(function(data, status, headers, config) 
		{
			console.log("ststus: "+status);
		});
	}

	$scope.refresh = function()
	{
		$http.get($scope.baseUrl+"/getDeviceList").
		success(function(data, status, headers, config)
		{
			$scope.devices = data;
			$scope.dataTableDevice(data);
			$scope.products.push(data[i]);
		}).
		error(function(data, status, headers, config) 
		{
			console.log("ststus: "+status);
		});
	}

	$scope.dataTableDevice = function(data)
	{
		$scope.deviceTable = new ngTableParams({
		        page: 1,            // show first page
		        count: 10,           // count per page
		        filter:{
		        	status:''
		        },
		        sorting: {
		            name: 'asc',     // initial sorting
		            description: '',
		            deleted_at:''
		        }
		    }, {
		        total: data.length, // length of data
		        getData: function($defer, params) {
		        	 // use build-in angular filter
		            var orderedData = params.sorting() ? $filter('orderBy')(data, params.orderBy()) : data;
		            $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
		             params.total(orderedData.length); // set total for recalc pagination
		        }
		    });
	}
	
});