var FDS = angular.module('FDS', []);

FDS.controller('PatientList',function($rootScope, $scope, $http){
	$scope.getPatients = function()
	{
		$http.get($scope.baseUrl+"/getPatientList").
		success(function(data, status, headers, config)
		{
			// console.log("ststus: "+status);
			// console.log(config);
			// console.log(data);
			$scope.patients = data;
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
