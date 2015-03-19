@extends('site.layouts.thevote_templete_v1')

{{-- Content --}}
@section('content')

<!-- Post -->
<div class="col-md-12 box-new-post">
	<div class="row">
		<div class="col-md-4 col-xs-12">
			{{ Form::open(array('url' => 'upload',
			 'action' => 'BlogController@upload',
			  'class' => 'dropzone',
			  'id'	=>	'dropzone'
			  )) 
			}}
			{{ Form::close() }}
		</div>
		<div class="col-md-8">
			<div class="box-input-post">
				<div>
					{{ Form::text('title','',array('class'=>'clear-border-input','rows'=>'2','cols'=>'0','placeholder'=>'Title')) }}
				</div>
					{{ Form::textarea('content','',array('class'=>'clear-border-input','rows'=>'2','cols'=>'0','placeholder'=>'Write a Post.','width'=>'100%')) }}
				<div>
					<div class="border-top-post footer-post">
						<span><a href="" title="Attachment" class="btn btn-xs"><i class="fa fa-paperclip"></i></a></span>
						<a class="btn btn-primary btn-xs pull-right" href="#">Post</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
			<a href="{{{ $post->url() }}}" class="thumbnail"><img src="{{ !empty($post->attachment)?$post->attachment:asset('assets/ico/thrvote-b.png') }}" alt="" style="max-height:400px"></a>
			<p id="footer">
				<span class="glyphicon glyphicon-user"></span> <span class="muted">{{{ $post->author->first_name." ".$post->author->lastname_name }}}</span>
				| <span class="glyphicon glyphicon-calendar"></span> <!--Sept 16th, 2012-->{{{ $post->date() }}}
				| <span class="glyphicon glyphicon-comment"></span> <a href="{{{ $post->url() }}}#comments" title="Comments">{{$post->comments()->count()}} Comments</a>
			</p>
		</div>
		<div class="col-md-8">
			<h4><strong><a href="{{{ $post->url() }}}">{{ String::title($post->title) }}</a></strong></h4>
			<p class="article">
				{{ String::tidy(Str::limit($post->content, 200)) }}
			</p>
			<p><a class="btn btn-outline btn-primary btn-xs" href="{{{ $post->url() }}}">Read more</a></p>
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
