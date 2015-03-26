thevote.controller('viewfeed', function($rootScope, $scope, $http, $interval) {
	$scope.postCreate = function()
	{
		if (($scope.title && $scope.content) != "") 
		{
			$('.post-loading').show();
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
        }
        else
        {
        	alert("Please fill Title & Content.");
        }
	}

	$scope.votePost = function(idPost,type)
	{
		$scope.vote = {
			'idPost': idPost,
			'type': type,
			'_token':$('input[name="_token"]').attr('value')
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
	 });
});


