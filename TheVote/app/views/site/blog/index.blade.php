@extends('site.layouts.thevote_templete_v1')

{{-- Content --}}
@section('content')

<!-- Post -->
@if(Auth::check())
<div>
	<form class="form-horizontal" method="post" action="{{ URL::to('feed/post') }}" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<div class="header-post">
        	<strong>What are you give wanted to vote.</strong>
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-chevron-down"></i>
                </button>
            </div>
        </div>
		<div class="box-input-post">
				{{ Form::text('title',Input::old("title", isset($post) ? $post->title : null),array('class'=>'clear-border-input','rows'=>'2','cols'=>'0','placeholder'=>'Title')) }}
				{{ Form::textarea('content',Input::old("content", isset($post) ? $post->content : null),array('class'=>'clear-border-input','rows'=>'2','cols'=>'0','placeholder'=>'Write a Post.','width'=>'100%')) }}
				{{ Form::text('keywords',Input::old("title", isset($post) ? $post->title : null),array('class'=>'clear-border-input','rows'=>'2','cols'=>'0','placeholder'=>'Hashtag')) }}
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

@foreach ($posts as $post)
<div class="col-md-12 box-feed">
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
			<a href="{{{ $post->url() }}}" class="thumbnail"><img src="{{ !empty($post->attachment)?$post->attachment:asset('custom/image/no-image_800x400.png') }}" alt="" style="max-height:400px"></a>
			<div id="footer_total">
				<span  class="fa fa-thumbs-o-up"></span> <a href="{{ URL::to('post/'.$post->id.'/agree') }}" title="Agree">{{ $post->getCountAgree() }} Agree</a>
				<span  class="fa fa-thumbs-o-down"></span> <a href="{{ URL::to('post/'.$post->id.'/disagree') }}" title="Disagree">{{ $post->getCountDisAgree() }} Disagree</a>
				<span class="fa fa-comment-o"></span> <a href="{{{ $post->url() }}}#comments" title="Comments">{{$post->comments()->count()}} Comments</a>
			</div>
		</div>
		<div class="col-md-8">
			<h4><strong><a href="{{{ $post->url() }}}">{{ String::title($post->title) }}</a></strong></h4>
			<p class="article">
				{{ String::tidy(Str::limit($post->content, 200)) }}
				<p><a class="btn btn-outline btn-primary btn-xs" href="{{{ $post->url() }}}">Read more</a></p>
			</p>
			<p id="footer" class="">				
				<span><img src="{{ !empty($post->author->picture)?$post->author->picture:URL::to('custom/image/22avatar.png') }}" class="" style="max-width:24px"></span> <span class="muted author">{{{ $post->author->first_name." ".$post->author->last_name }}}</span>
				| {{{ $post->date() }}}
			</p>
		</div>
	</div>
	<!-- ./ post content -->

</div>
@endforeach
<div class="col-md-12 row">
	{{ $posts->links() }}
</div>
<script type="text/javascript">
	$(function()
	{
		var textarea = $('textarea');
		autosize(textarea);
	})
</script>
@stop
