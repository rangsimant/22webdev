@extends('site.layouts.thevote_templete_v1')

{{-- Web site Title --}}
@section('title')
{{{ String::title($post->title) }}} ::
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
@parent

@stop

{{-- Update the Meta Description --}}
@section('meta_description')
<meta name="description" content="{{{ $post->meta_description() }}}" />

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
<meta name="keywords" content="{{{ $post->meta_keywords() }}}" />

@stop

@section('meta_author')
<meta name="author" content="{{{ $post->author->username }}}" />
@stop

{{-- Content --}}
@section('content')
<div ng-controller="viewfeed" ng-init="baseUrl='<?php echo URL::to('/'); ?>'">
	<div class="col-md-9 col-xs-12">
		<div class="box-content row">
			<div class="box-author">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" ng-model="csrf"/>
				<div class="left clearfix">
                    <span class="pull-left img-author">
						<img src="{{ !empty($post->author->picture)?$post->author->picture:URL::to('custom/image/22avatar.png') }}" alt="" class="img-responsive" style="max-width:40px;">
                    </span>
                    <div class="clearfix">
                        <div class="header">
                            <strong class="primary-font author">{{ $post->author->first_name." ".$post->author->last_name }}</strong>
                        </div>
                        <p class="post-time">Posted {{{ $post->date() }}}</p>
                    </div>
                </div>
            </div>
			<!-- Title -->
    		<div> 
				<h4>{{ $post->title }}</h4>
			</div>
			<!-- Content -->
			<div id="content">
				<p class="article">
					{{ $post->content() }}
				</p>
			</div>
			<!-- Picture Content -->
			@if(!empty($post->attachment)) 
			<div class="pic-content">
				<a href="{{ $post->attachment }}" class="lightbox-image" title="{{ $post->content() }}"><img src="{{ $post->attachment }}" alt="" class="img-responsive"></a>
			</div>
			@endif
			<div class="col-md-12 status-vote">
				<p style="padding: 10px 0px 0px;">
					<span  class="fa fa-thumbs-o-up"></span> <a href="" title="Agree"><span ng-click="votePost('{{ $post->id }}','agree')" ><span class="{{ $post->id }}_agree">{{ $agree }}</span> Agree</span></a>
						<span  class="fa fa-thumbs-o-down"></span> <a href="" title="Disagree"><span ng-click="votePost('{{ $post->id }}','disagree')"><span class="{{ $post->id }}_disagree">{{ $disagree }}</span> Disagree</span></a>
						<span class="fa fa-comment-o"></span> <a href="{{ URL::to('/') }}/{{ $post->id }}#comments" title="Comments">{{ $comments->count() }} Comments</a>
				</p>
			</div>
        </div>
	</div>

	<div class="row">
		<div class="col-md-3 col-xs-12 group-vote">
			<div id="vote" class="box-post" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); height:325px"></div>
		
			<div class="box-vote text-center">
				@if (Auth::check())
					<div class="col-md-6 col-xs-6">
						<a href="{{ URL::to('post/'.$post->id.'/agree') }}" class="btn btn-agree"><i class="fa fa-thumbs-o-up fa-2x" title="Agree"></i></a>
					</div>

					<div class="col-md-6 col-xs-6">
						<a href="{{ URL::to('post/'.$post->id.'/disagree') }}" class="btn btn-disagree"><i class="fa fa-thumbs-o-down fa-2x" title="Disagree"></i></a>
					</div>
				@else
					Please <a href="{{ URL::to('user/login') }}">Login</a> before Vote.
				@endif
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="row">
			{{ $commentForm }}
		</div>
		<div class="row">
			@if ($comments->count())
				@foreach ($comments as $comment)
				<div class="row split-comment" id="comments">
					<div class="col-md-12">
						<div class="box-comment">
							<div class="left clearfix">
			                    <span class="pull-left img-author">
									<img class="" src="{{ !empty($comment->author->picture)?$comment->author->picture:asset('custom/image/22avatar.png') }}" alt="" style="max-width:30px">
			                    </span>
			                    <div class="clearfix">
			                        <div class="header" style="margin-top: -3px;">
			                            <strong class="primary-font author">{{ $comment->author->first_name." ".$comment->author->last_name }}</strong>
			                            <p class="post-time">{{{ $comment->date() }}}</p>
			                        </div>
			                        <span class="article"> {{ nl2br(e($comment->content())) }} </span>
			                    </div>
			                </div>
			            </div>
					</div>
				</div>
				@endforeach
				@else
				<hr />
			@endif
		</div>
	</div>
</div>



<script src="{{asset('custom/js/vote.js')}}"></script>
<script type="text/javascript">
	$(function(){
		var textarea = $('textarea');
		autosize(textarea);

		var article = $('.article');
		article.readmore({
		  speed: 75,
		  collapsedHeight: 100,
		  moreLink: '<a href="#" class="margin-readmore">Read more</a>',
		  lessLink: '<a href="#" class="margin-readmore">Read less</a>'
		});

		var comment = $('.comment:nth-child(1n+0)')
		comment.readmore({
		  speed: 75,
		  collapsedHeight: 100,
		  moreLink: '<a href="#" class="margin-readmore">Read more</a>',
		  lessLink: '<a href="#" class="margin-readmore">Read less</a>'
		});

		new Morris.Bar({
		  // ID of the element in which to draw the chart.
		  element: 'vote',
		  hideHover: 'auto',
		  // Chart data records -- each entry in this array corresponds to a point on
		  // the chart.
		  data: [
		    { year: 'Agree | Disagree', agree: {{ $agree }},disagree: {{ $disagree }} }
		  ],
		  // The name of the data record attribute that contains x-values.
		  xkey: 'year',
		  // A list of names of data record attributes that contain y-values.
		  ykeys: ['agree','disagree'],
		  // Labels for the ykeys -- will be displayed when you hover over the
		  // chart.
		  labels: ['<i class="fa fa-thumbs-o-up"></i>','<i class="fa fa-thumbs-o-down"></i>'],
		  barColors: ['#03A9F4','#424242'],
		  resize: true
		});

		$('.lightbox-image').magnificPopup({ 
			type: 'image',
			image: {
			  markup: '<div class="mfp-figure">'+
			            '<div class="mfp-close"></div>'+
			            '<div class="mfp-img"></div>'+
			            '<div class="mfp-bottom-bar">'+
			              '<div class="mfp-title"></div>'+
			              '<div class="mfp-counter"></div>'+
			            '</div>'+
			          '</div>', // Popup HTML markup. `.mfp-img` div will be replaced with img tag, `.mfp-close` by close button

			  cursor: 'mfp-zoom-out-cur', // Class that adds zoom cursor, will be added to body. Set to null to disable zoom out cursor. 
			  
			  titleSrc: 'title', // Attribute of the target element that contains caption for the slide.
			  // Or the function that should return the title. For example:
			  // titleSrc: function(item) {
			  //   return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
			  // }

			  verticalFit: true, // Fits image in area vertically

			  tError: '<a href="%url%">The image</a> could not be loaded.' // Error message
			}
		});
	})

</script>
</script>
@stop
