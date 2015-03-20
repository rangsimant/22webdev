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
	<div class="col-md-9 col-xs-12">
		<div class="box-content row">
			<div class="box-author">
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
				<img src="{{ $post->attachment }}" alt="" class="img-responsive" style="min-width:100%;">
				<p>
					<span title="Agree">{{ $agree }} <a href="">Agree </a></span>
					<span>&bull;</span>
					<span title="Disagree">{{ $disagree }} <a href="">Disagree </a></span>
					<span>&bull;</span>
					<span title="Comment">{{ $comments->count() }} <a href="">Comments</a></span>
				</p>
			</div>
			@endif
        </div>
	</div>

	<div class="row">
		<div class="col-md-3 col-xs-12">
			<div id="vote" class="box-post" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); height:325px"></div>
		
			<div class="box-vote text-center">
				@if (Auth::check())
					{{ Form::open(array('url' => URL::to('post/agree'))) }}
					<div class="col-md-6 col-xs-6">
						{{ Form::hidden('idPost',$post->id) }}
						{{ Form::hidden('idUser',Auth::user()->id) }}
						{{ Form::hidden('slug',$post->slug) }}
						<button type="submit" class="btn btn-agree"><i class="fa fa-thumbs-o-up fa-2x" title="Agree"></i></button>
					</div>
					{{ Form::close() }}

					{{ Form::open(array('url' => URL::to('post/disagree'))) }}
						{{ Form::hidden('idPost',$post->id) }}
						{{ Form::hidden('idUser',Auth::user()->id) }}
						{{ Form::hidden('slug',$post->slug) }}
						<div class="col-md-6 col-xs-6">
							<button type="submit" class="btn btn-disagree"><i class="fa fa-thumbs-o-down fa-2x" title="Disagree"></i></button>
						</div>
					{{ Form::close() }}
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
				<div class="row split-comment">
					<div class="col-md-12">
						<div class="box-comment">
							<div class="left clearfix">
			                    <span class="pull-left img-author">
									<img class="" src="{{ !empty($comment->author->picture)?$comment->author->picture:'http://placehold.it/60x60' }}" alt="" style="max-width:30px">
			                    </span>
			                    <div class="clearfix">
			                        <div class="header">
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
	
	<div class="col-md-9">
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
	})

</script>
</script>
@stop
