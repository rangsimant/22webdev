@extends('site.layouts.thevote_templete_v1')

{{-- Content --}}
@section('content')

<!-- Post -->
@if(Auth::check())
<div ng-controller="createPost">
	<form name="form" ng-submit="postCreate()">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" ng-model="csrf"/>
		<div class="header-post">
        	<strong>What are you give wanted to vote.</strong>
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-chevron-down"></i>
                </button>
            </div>
        </div>
		<div class="box-input-post">
				{{ Form::text('title',Input::old("title", isset($post) ? $post->title : null),array('class'=>'clear-border-input','rows'=>'2','cols'=>'0','placeholder'=>'Title','ng-model'=>'title')) }}
				{{ Form::textarea('content',Input::old("content", isset($post) ? $post->content : null),array('class'=>'clear-border-input','rows'=>'2','cols'=>'0','placeholder'=>'Write a Post.','width'=>'100%','ng-model'=>'content')) }}
				{{ Form::text('keywords',Input::old("title", isset($post) ? $post->title : null),array('class'=>'clear-border-input','rows'=>'2','cols'=>'0','placeholder'=>'Keywords', 'id' => 'keywords','ng-model'=>'keywords')) }}
			<div>
				<div class="border-top-post footer-post icon-footer">
					<span><a href="" title="Attachment" class="btn btn-xs"><i class="fa fa-paperclip"></i></a></span>
					<span><a href="" title="Image" class="btn btn-xs"><i class="fa fa-picture-o"></i></a></span>
					<button type="submit" class="btn btn-primary btn-xs pull-right" href="#">Post</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endif
<!-- ./ Post -->


<div ng-controller="loadfeed" ng-init="baseUrl='<?php echo URL::to('/'); ?>'">
	<div class="col-md-12 box-feed" ng-repeat="feed in feeds" ng-cloak>
		<!-- Post Title -->
		<div class="row">
			<div class="col-md-8">
				<h4></h4>
			</div>
		</div>
		<!-- ./ post title -->

		<!-- Post Content -->
		<div class="row">
			<div class="col-md-4">
				<a href="{{ URL::to('/') }}/@{{ feed.id }}" class="thumbnail">
					<img ng-if="feed.attachment" src="@{{ feed.attachment }}" alt="" style="max-height:400px">
					<img ng-if="!feed.attachment" src="{{ asset('custom/image/no-image_800x400.png') }}" alt="" style="max-height:400px">
				</a>
				<div id="footer_total">
					<span  class="fa fa-thumbs-o-up"></span> <a href="{{ URL::to('post') }}/@{{ feed.id }}/agree" title="Agree">@{{ feed.agree }} Agree</a>
					<span  class="fa fa-thumbs-o-down"></span> <a href="{{ URL::to('post') }}/@{{ feed.id }}/disagree" title="Disagree">@{{ feed.disagree }} Disagree</a>
					<span class="fa fa-comment-o"></span> <a href="{{ URL::to('/') }}/@{{ feed.id }}#comments" title="Comments">@{{ feed.comment }} Comments</a>
				</div>
			</div>
			<div class="col-md-8">
				<h4><strong><a href="{{ URL::to('/') }}/@{{ feed.id }}">@{{ feed.title }}</a></strong></h4>
				<p class="article">
					@{{ feed.content | limitTo:200 }}&hellip;
				<p>
				<a class="btn btn-outline btn-primary btn-xs" href="{{ URL::to('/') }}/@{{ feed.id }}">Read more</a></p>
				</p>
				<p id="footer" class="">				
					<span>
						<img ng-if="feed.picture" src="@{{ feed.picture }}" class="" style="max-width:24px">
						<img ng-if="!feed.picture" src="{{ URL::to('custom/image/22avatar.png') }}" class="" style="max-width:24px">
					</span> 
					<span class="muted author">@{{ feed.first_name}} @{{ feed.last_name }}</span>
					| @{{ feed.time_ago }}
				</p>
			</div>
		</div>
		<!-- ./ post content -->

	</div>
</div>
<div class="col-md-12">
<div class="row box-loadmore ">
	<a href="#">Load More</a>
</div>
</div>


<script type="text/javascript">
	$(function()
	{
		var textarea = $('textarea');
		autosize(textarea);
		$('#keywords').tagsInput({
			'width': '100%', 
			'min-height': '50px', 
			'height': '50px',
			'interactive':true,
			'delimiter': [','],
			'defaultText': 'Keywords',
			// 'maxChars' : 50,
			'placeholderColor' : 'rgb(169, 169, 169)'
			});
	})
</script>
@stop
