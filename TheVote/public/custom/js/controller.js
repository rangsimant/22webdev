var thevote = angular.module('thevote', []);

thevote.controller('loadfeed', function($rootScope, $scope, $http, $interval) {
	$scope.getLoadfeed = function()
	{
		$http.get($scope.baseUrl+"/load/feeds").
		success(function(data, status, headers, config)
		{
			$scope.feeds = data;
			console.log("ststus: "+status);
			console.log(config);
			console.log(data);
		}).
		error(function(data, status, headers, config) 
		{
			console.log("ststus: "+status);
			console.log(config);
			console.log(data);
		});
	}

	$scope.$watch('baseUrl', function(){
	    $rootScope.baseUrl = $scope.baseUrl;
	 });

	$scope.$watch($rootScope.baseUrl, function(){
	    $scope.getLoadfeed();
	    $interval($scope.getLoadfeed, 5000);  // auto refresh Feeds 1min
	  });
});

thevote.controller('createPost', function($rootScope, $scope, $http, $interval) {
	$scope.postCreate = function()
	{
		 $scope.dataFrom = {
		 	'title':$scope.title,
		 	'content':$scope.content,
		 	'keywords':$scope.keywords,
			'_token':$('input[name="_token"]').attr('value')
		};
		$http({
			  method  : 'post',
			  url     : $scope.baseUrl+'/api/newpost',
			  data    : $scope.dataFrom,
			   headers: {
                'X-CSRF-Token': $scope.dataFrom['_token']
            }
			 }).
			success(function(data) {
                console.log(data);
                $('input[type=text]').each(function(){
				    $(this).val('');
				})
				$('textarea').each(function(){
				    $(this).val('');
				})
            }).
		 	error(function() {
                console.log('error');
            });
	}
});

