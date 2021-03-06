@extends('site.layouts.thevote_templete_v1')

{{-- Content --}}
@section('content')
<div ng-controller="feed">
<!-- Post -->
@if(Auth::check())
<div>
	<form name="form" ng-submit="postCreate()" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" ng-model="csrf"/>
		<div class="header-post">
        	<strong>What are you give wanted to vote.</strong>
            <span class="pull-right"><img src="{{ asset('custom/image/loading/20.gif') }}" class="post-loading" border="0px" hidden> </span>
        </div>
		<div class="box-input-post">
				{{ Form::text('title',Input::old("title", isset($post) ? $post->title : null),array('class'=>'clear-border-input','rows'=>'2','cols'=>'0','placeholder'=>'Title','ng-model'=>'title', 'maxlength' => 100)) }}
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

	@include('site.blog.modal_post_alert')
</div>
@endif
<!-- ./ Post -->
<div ng-init="baseUrl='<?php echo URL::to('/'); ?>'">
	<div id="feed">
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
						<img ng-if="feed.attachment" ng-src="@{{ feed.attachment }}" alt="" style="max-height:400px">
						<img ng-if="!feed.attachment" ng-src="{{ asset('custom/image/no-image_800x400.png') }}" alt="" style="max-height:400px">
					</a>
					<div id="footer_total">
						<span  class="fa fa-thumbs-o-up"></span> 
						<a href="" title="Agree" ng-if="{{ Auth::check() }}" ng-cloak><span ng-click="votePost(feed.id,'agree')" ><span class="@{{ feed.id }}_agree">@{{ feed.agree }}</span> Agree</span></a>
						<a href="{{ URL::to('user/login') }}" title="Agree" ng-if="{{ !Auth::check() }}" ng-cloak><span ><span>@{{ feed.agree }}</span> Agree</span></a>
						<span  class="fa fa-thumbs-o-down"></span> 
						<a href="" title="Disagree" ng-if="{{ Auth::check() }}" ng-cloak><span ng-click="votePost(feed.id,'disagree')"><span class="@{{ feed.id }}_disagree">@{{ feed.disagree }}</span> Disagree</span></a>
						<a href="{{ URL::to('user/login') }}" title="Disagree" ng-if="{{ !Auth::check() }}" ng-cloak><span><span>@{{ feed.disagree }}</span> Disagree</span></a>
						<span class="fa fa-comment-o"></span> <a href="{{ URL::to('/') }}/@{{ feed.id }}#comments" title="Comments">@{{ feed.comment }} Comments</a>
					</div>
				</div>
				<div class="col-md-8">

					<!-- post edit -->
					@if(Auth::check())
						<div class="btn-group pull-right" ng-if="{{ Auth::user()->id }} == feed.user_id">
			                <button type="button" class="btn btn-default btn-xs btn-post-edit dropdown-toggle" data-toggle="dropdown">
			                    <i class="fa fa-chevron-down"></i>
			                </button>
			                <ul class="dropdown-menu dropdown-menu-post-edit" role="menu" aria-labelledby="drop3">
				                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" ng-click="edit(feed.id)"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
				                <li role="presentation" class="divider"></li>
				            	<li role="presentation"><a type="button" data-toggle="modal" data-target="#alertDelete_@{{ feed.id }}"><i class="fa fa-trash-o"></i> Trash</a></li>
				            </ul>
			            </div>
			            @include('site.blog.modal_confirm_delete')
		            @endif
		            <!-- ./ post edit -->

					<h4><strong><a href="{{ URL::to('/') }}/@{{ feed.id }}">@{{ feed.title }}</a></strong></h4>
					<p class="article">
						@{{ feed.content | limitTo:200 }}&hellip;
					<p>
					<a class="btn btn-outline btn-primary btn-xs" href="{{ URL::to('/') }}/@{{ feed.id }}">Read more</a></p>
					</p>
					<p id="footer" class="">				
						<span>
							<img ng-if="feed.picture" ng-src="@{{ feed.picture }}" class="" style="max-width:24px">
							<img ng-if="!feed.picture" ng-src="{{ URL::to('custom/image/22avatar.png') }}" class="" style="max-width:24px">
						</span> 
						<span class="muted author">@{{ feed.first_name}} @{{ feed.last_name }}</span>
						| @{{ feed.created_time_ago }}
					</p>
				</div>
			</div>
			<!-- ./ post content -->

		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="row box-loadmore ">
		<a href="#">Load More</a>
	</div>
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
