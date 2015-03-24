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

	$scope.$watch($rootScope.baseUrl, function(){
	    $rootScope.getLoadfeed = $scope.getLoadfeed();
	    $interval($scope.getLoadfeed, 60000);  // auto refresh Feeds 1min
	  });
});


// function appendNewFeed()
// {
// 	var html = '<div class="row">' +
// 				'<div class="col-md-4">'+
// 					'<a href="{{ URL::to('/') }}/@{{ feed.id }}" class="thumbnail">'+
// 						'<img ng-if="feed.attachment" src="@{{ feed.attachment }}" alt="" style="max-height:400px">'+
// 						'<img ng-if="!feed.attachment" src="{{ asset('custom/image/no-image_800x400.png') }}" alt="" style="max-height:400px">'+
// 					'</a>'+
// 					'<div id="footer_total">'+
// 						'<span  class="fa fa-thumbs-o-up"></span> <a href="{{ URL::to('post') }}/@{{ feed.id }}/agree" title="Agree">@{{ feed.agree }} Agree</a>'+
// 						'<span  class="fa fa-thumbs-o-down"></span> <a href="{{ URL::to('post') }}/@{{ feed.id }}/disagree" title="Disagree">@{{ feed.disagree }} Disagree</a>'+
// 						'<span class="fa fa-comment-o"></span> <a href="{{ URL::to('/') }}/@{{ feed.id }}#comments" title="Comments">@{{ feed.comment }} Comments</a>'+
// 					'</div>'+
// 				'</div>'+
// 				'<div class="col-md-8">'+
// 					'<h4><strong><a href="{{ URL::to('/') }}/@{{ feed.id }}">@{{ feed.title }}</a></strong></h4>'+
// 					'<p class="article">'+
// 						'@{{ feed.content | limitTo:200 }}&hellip;'+
// 					'<p>'+
// 					'<a class="btn btn-outline btn-primary btn-xs" href="{{ URL::to('/') }}/@{{ feed.id }}">Read more</a></p>'+
// 					'</p>'+
// 					'<p id="footer" class="">'				+
// 						'<span>'+
// 							'<img ng-if="feed.picture" src="@{{ feed.picture }}" class="" style="max-width:24px">'+
// 							'<img ng-if="!feed.picture" src="{{ URL::to('custom/image/22avatar.png') }}" class="" style="max-width:24px">'+
// 						'</span> '+
// 						'<span class="muted author">@{{ feed.first_name}} @{{ feed.last_name }}</span>'+
// 						'| @{{ feed.time_ago }}'+
// 					'</p>'+
// 				'</div>'+
// 			'</div>';
// }

