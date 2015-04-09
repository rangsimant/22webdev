var FDS = angular.module('FDS', ['ngTable']);

FDS.controller('PatientList',function($rootScope, $scope, $http ,ngTableParams){
	$scope.getPatients = function()
	{
		$http.get($scope.baseUrl+"/getPatientList").
		success(function(data, status, headers, config)
		{
			// console.log("ststus: "+status);
			// console.log(config);
			// console.log(data);
			$scope.patients = data;
			$scope.patientTable = new ngTableParams({
		        page: 1,            // show first page
		        count: 10           // count per page
		    }, {
		        total: data.length, // length of data
		        getData: function($defer, params) {
		            $defer.resolve(data.slice((params.page() - 1) * params.count(), params.page() * params.count()));
		        }
		    });
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
});
