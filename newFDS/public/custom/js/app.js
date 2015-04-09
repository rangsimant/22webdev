var FDS = angular.module('FDS', ['ngTable']);

FDS.controller('PatientList',function($rootScope, $scope, $http , $filter, ngTableParams){
	$scope.getPatients = function()
	{
		$http.get($scope.baseUrl+"/getPatientList").
		success(function(data, status, headers, config)
		{
			$scope.patients = data;
			$scope.dataTable(data);
		}).
		error(function(data, status, headers, config) 
		{
			console.log("ststus: "+status);
		});
	}

	$scope.$watch('baseUrl', function(){
		$scope.getPatients();
	    $rootScope.token = $('input[name="_token"]').attr('value');
	 });

	$scope.dataTable = function(data)
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
