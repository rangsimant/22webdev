var FDS = angular.module('FDS', ['ngTable','ngAnimate','ngSanitize','ngToast']).config(['ngToastProvider',
    function(ngToast) {
      ngToast.configure({
      	animation: 'slide',
        additionalClasses: 'my-animation',
        horizontalPosition: 'right',
        verticalPosition: 'bottom'
      });
    }
  ]);


FDS.controller('PatientList',function($scope, $http , $filter, ngTableParams, ngToast){
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
	$scope.refreshTable = function()
	{
		$scope.getPatients();
		$scope.patientTable.sorting({ firstname:''});
		console.log('Refresh table.');
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

	$scope.assign = function(idPatient, idDevice)
	{
		$scope.notify('success', 'Assign device to '+idPatient);
	}

	$scope.notify = function(css, text)
	{
		ngToast.create({
					className: css,
					content: text,
					dismissButton: true
				});
	}
	
});

FDS.controller('DeviceList', function($rootScope, $scope, $http , $filter, ngTableParams, ngToast){

	$scope.$watch('baseUrl', function(){
		$scope.getDevices();
		$rootScope.token = $('input[name="_token"]').attr('value');
	 });

	$('#deviceAssign').on('hidden.bs.modal', function (e) {
	  	$scope.refreshTable();
	})

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
			  method  : 'DELETE',
			  url     : $scope.baseUrl + '/device/' + $scope.idDevice
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

	$scope.notify = function(css, text)
	{
		ngToast.create({
					className: css,
					content: text,
					dismissButton: true
				});
	}

	$scope.unassign = function(idDevicePatient)
	{
		$http({
			  method  : 'GET',
			  url     : $scope.baseUrl + '/devicetype/' + idDevicePatient + '/unassign'
			 }).
			success(function(data) {
				$scope.refreshTable();
				var html = '<i class="fa fa-check"> '+data+'</i></div>';
				$scope.notify('success',html);
            }).
		 	error(function() {
                console.log('error');
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
		$scope.devicetypeTable.sorting({ name:''});
		console.log('Refresh table.');
	}

	$scope.getIDDeviceType = function(idDeviceType)
	{
		$scope.idDeviceType = idDeviceType;
	}

	$scope.devicetypeDelete = function()
	{
		$http({
			  method  : 'DELETE',
			  url     : $scope.baseUrl + '/devicetype/' + $scope.idDeviceType
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

FDS.controller('SensorList',function($rootScope, $scope, $http , $filter, ngTableParams){


	$scope.$watch('baseUrl', function(){
		$scope.getSensors();
		$rootScope.token = $('input[name="_token"]').attr('value');
	 });

	$scope.getSensors = function()
	{
		$http.get($scope.baseUrl+"/getSensorList").
		success(function(data, status, headers, config)
		{
			$scope.data = [];
			$scope.data.push(data);
			$scope.dataTableSensor();
			console.log($scope.data);
		}).
		error(function(data, status, headers, config) 
		{
			console.log("ststus: "+status);
		});
	}

	$scope.refreshTable = function()
	{
		$scope.getSensors();
		$scope.sensorTable.sorting({ name:''});
		console.log('Refresh table.');
	}

	$scope.getIDSensor = function(idSensor)
	{
		$scope.idSensor = idSensor;
	}

	$scope.sensorDelete = function()
	{
		$http({
			  method  : 'DELETE',
			  url     : $scope.baseUrl + '/sensor/'+$scope.idSensor,
			 }).
			success(function(data) {
				$scope.refreshTable();
            }).
		 	error(function() {
                console.log('error');
            });
	}

	$scope.dataTableSensor = function()
	{
		$scope.sensorTable = new ngTableParams({
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

FDS.controller('PhysicianList',function($rootScope, $scope, $http , $filter, ngTableParams){


	$scope.$watch('baseUrl', function(){
		$scope.getPhysician();
		$rootScope.token = $('input[name="_token"]').attr('value');
	 });

	$scope.getPhysician = function()
	{
		$http.get($scope.baseUrl+"/getPhysicianList").
		success(function(data, status, headers, config)
		{
			$scope.data = [];
			$scope.data.push(data);
			$scope.dataTablePhysician();
		}).
		error(function(data, status, headers, config) 
		{
			console.log("ststus: "+status);
		});
	}

	$scope.refreshTable = function()
	{
		$scope.getPhysician();
		$scope.physicianTable.sorting({ name:''});
		console.log('Refresh table.');
	}

	$scope.getIDPhysician = function(idSensor)
	{
		$scope.idPhysician = idPhysician;
	}

	$scope.physicianDelete = function()
	{
		$http({
			  method  : 'DELETE',
			  url     : $scope.baseUrl + '/physician/'+$scope.idSensor,
			 }).
			success(function(data) {
				$scope.refreshTable();
            }).
		 	error(function() {
                console.log('error');
            });
	}

	$scope.dataTablePhysician = function()
	{
		$scope.physicianTable = new ngTableParams({
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

FDS.controller('LocationList',function($rootScope, $scope, $http , $filter, ngTableParams){


	$scope.$watch('baseUrl', function(){
		$scope.getLocation();
		$rootScope.token = $('input[name="_token"]').attr('value');
	 });

	$scope.getLocation = function()
	{
		$http.get($scope.baseUrl+"/getLocationList").
		success(function(data, status, headers, config)
		{
			$scope.data = [];
			$scope.data.push(data);
			$scope.dataTableLocation();
		}).
		error(function(data, status, headers, config) 
		{
			console.log("ststus: "+status);
		});
	}

	$scope.refreshTable = function()
	{
		$scope.getLocation();
		$scope.locationTable.sorting({ name:''});
		console.log('Refresh table.');
	}

	$scope.getIDLocation = function(idLocation)
	{
		$scope.idLocation = idLocation;
	}

	$scope.locationDelete = function()
	{
		$http({
			  method  : 'DELETE',
			  url     : $scope.baseUrl + '/location/'+$scope.idLocation,
			 }).
			success(function(data) {
				$scope.refreshTable();
            }).
		 	error(function() {
                console.log('error');
            });
	}

	$scope.dataTableLocation = function()
	{
		$scope.locationTable = new ngTableParams({
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