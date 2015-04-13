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

FDS.controller('DeviceList',function($rootScope, $scope, $http , $filter, ngTableParams){


	$scope.$watch('baseUrl', function(){
		$scope.getDevices();
		$rootScope.token = $('input[name="_token"]').attr('value');
	 });

	$scope.getDevices = function()
	{
		$http.get($scope.baseUrl+"/getDeviceList").
		success(function(data, status, headers, config)
		{
			$scope.data = [];
			$scope.data.push(data);
			$scope.dataTableDevice();
			console.log($scope.data);
		}).
		error(function(data, status, headers, config) 
		{
			console.log("ststus: "+status);
		});
	}

	$scope.deviceDelete = function()
	{
		$http({
			  method  : 'Get',
			  url     : $scope.baseUrl + '/device/' + $scope.idDevice + '/delete',
			  data    : $scope.device,
			  headers: {
                'X-CSRF-Token': $scope.token
            }
			 }).
			success(function(data) {
				$scope.refreshTable();
            }).
		 	error(function() {
                console.log('error');
            });
	}

	$scope.refreshTable = function()
	{
		$scope.getDevices();
		$scope.deviceTable.sorting({ name:''});
		console.log('Refresh table.');
	}

	$scope.getIDDevice = function(idDevice)
	{
		$scope.idDevice = idDevice;
	}

	$scope.dataTableDevice = function()
	{
		$scope.deviceTable = new ngTableParams({
		        page: 1,            // show first page
		        count: 10,           // count per page
		        filter:{
		        	status:''
		        },
		        sorting: {

		        }
		    }, {
		        total: $scope.data[0].length, // length of data
		        getData: function($defer, params) {
		        	 // use build-in angular filter
		            var orderedData = params.sorting() ? $filter('orderBy')($scope.data[0], params.orderBy()) : $scope.data[0];
		            $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
		            params.total(orderedData.length); // set total for recalc pagination
		        }
		    });
	}
	
});

FDS.controller('DeviceTypeList',function($rootScope, $scope, $http , $filter, ngTableParams){


	$scope.$watch('baseUrl', function(){
		$scope.getDeviceTypes();
		$rootScope.token = $('input[name="_token"]').attr('value');
	 });

	$scope.getDeviceTypes = function()
	{
		$http.get($scope.baseUrl+"/getDeviceTypeList").
		success(function(data, status, headers, config)
		{
			$scope.data = [];
			$scope.data.push(data);
			$scope.dataTableDeviceType();
			console.log($scope.data);
		}).
		error(function(data, status, headers, config) 
		{
			console.log("ststus: "+status);
		});
	}

	$scope.refreshTable = function()
	{
		$scope.getDeviceTypes();
		$scope.deviceTable.sorting({ name:''});
		console.log('Refresh table.');
	}

	$scope.getIDDeviceType = function(idDeviceType)
	{
		$scope.idDeviceType = idDeviceType;
	}

	$scope.devicetypeDelete = function()
	{
		$http({
			  method  : 'Get',
			  url     : $scope.baseUrl + '/devicetype/' + $scope.idDeviceType + '/delete'
			 }).
			success(function(data) {
				$scope.refreshTable();
            }).
		 	error(function() {
                console.log('error');
            });
	}

	$scope.dataTableDeviceType = function()
	{
		$scope.devicetypeTable = new ngTableParams({
		        page: 1,            // show first page
		        count: 10,           // count per page
		        filter:{
		        	status:''
		        },
		        sorting: {

		        }
		    }, {
		        total: $scope.data[0].length, // length of data
		        getData: function($defer, params) {
		        	 // use build-in angular filter
		            var orderedData = params.sorting() ? $filter('orderBy')($scope.data[0], params.orderBy()) : $scope.data[0];
		            $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
		            params.total(orderedData.length); // set total for recalc pagination
		        }
		    });
	}
	
});