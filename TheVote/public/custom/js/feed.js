var thevote = angular.module('thevote', []);

thevote.controller('feed', function($rootScope, $scope, $http, $interval) {
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

	$scope.postCreate = function()
	{
		if (typeof ($scope.title && $scope.content) !== "undefined") 
		{
			$('.post-loading').show();
			$scope.dataFrom = {
			 	'title':$scope.title,
			 	'content':$scope.content,
			 	'keywords':$scope.keywords,
				'_token':$scope.token
			};
			$http({
				  method  : 'post',
				  url     : $scope.baseUrl+'/api/newpost',
				  data    : $scope.dataFrom,
				   headers: {
	                'X-CSRF-Token': $scope.token
	            }
				 }).
				success(function(data) {
					$scope.getLoadfeed();
	                $('input[type=text]').each(function(){
					    $(this).val('');
					})
					$('textarea').each(function(){
					    $(this).val('');
					})
					$('.post-loading').hide();
	            }).
			 	error(function() {
	                console.log('Loadfeed error');
	            });
	            $scope.title = null;
			 	$scope.content = null;
			 	$scope.keywords = null;
        }
        else
        {
        	$('#alertPost').modal({
				  backdrop: 'static'
        	});
        }
	}

	$scope.edit = function(idPost)
	{
		alert('Edit ID '+idPost);
	}
	$scope.delete = function(idPost)
	{
		$http({
			  method  : 'post',
			  url     : $scope.baseUrl+'/api/post/delete',
			  data    : {
				  			idPost:idPost,
				  			_token:$scope.token
			  			},
			   headers: {
	            'X-CSRF-Token': $scope.token
	        }
			 }).
			success(function(data) {
				$scope.getLoadfeed();
	        }).
		 	error(function() {
	            console.log('Delete fail.');
	        });
	}

	$scope.votePost = function(idPost,type)
	{
		$scope.vote = {
			'idPost': idPost,
			'type': type,
			'_token':$scope.token
		};
		$http({
			  method  : 'post',
			  url     : $scope.baseUrl+'/api/vote',
			  data    : $scope.vote,
			  headers: {
                'X-CSRF-Token': $scope.vote['_token']
            }
			 }).
			success(function(data) {
				$scope.getVote(idPost,type);
				console.log('Vote success');
            }).
		 	error(function() {
                console.log('Vote serror');
            });
	}

	$scope.getVote = function(idPost,type)
	{
		$scope.data = {
			'idPost': idPost,
			'type': type
		}
		$http({
			  method  : 'get',
			  url     : $scope.baseUrl+'/api/'+idPost+'/'+type,
			  data    : $scope.data
			 }).
			success(function(data) {
				console.log("Get Vote ");
				console.log(data);
				$('.'+idPost+'_agree').text(data.agree);
				$('.'+idPost+'_disagree').text(data.disagree);
            }).
		 	error(function() {
                console.log('get Vote error');
            });
	}


	$scope.$watch('baseUrl', function(){
	    $rootScope.baseUrl = $scope.baseUrl;
	    $rootScope.token = $('input[name="_token"]').attr('value');
	 });

	$scope.$watch($rootScope.baseUrl, function(){
	    $rootScope.getLoadfeed = $scope.getLoadfeed();
	    $interval($scope.getLoadfeed, 60000);  // auto refresh Feeds 1min
	  });
});


