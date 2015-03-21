<!-- <h4>Add a Comment</h4>
<form  method="post" action="{{{ URL::to($post->url()) }}}">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}" />

    <textarea class="col-md-12 input-block-level" rows="4" name="comment" id="comment">{{{ Request::old('comment') }}}</textarea>

    <div class="form-group">
        <div class="col-md-12">
            <input type="submit" class="btn btn-default" id="submit" value="Submit" />
        </div>
    </div>
</form> -->
<form  method="post" action="{{{ URL::to($post->url()) }}}">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}" />
	<!-- Comment -->
			<div class="box-input-post">
				{{ Form::textarea('comment','',array('class'=>'clear-border-input','rows'=>'2','cols'=>'0','placeholder'=>'Write a comments.','width'=>'100%')) }}
			<div>
				<div class="border-top-post footer-post icon-footer">
					<span><a href="" title="Attachment" class="btn btn-xs"><i class="fa fa-paperclip"></i></a></span>
					<span><a href="" title="Image" class="btn btn-xs"><i class="fa fa-picture-o"></i></a></span>
					<button type="submit" class="btn btn-primary btn-xs pull-right" href="#">Write</button>
				</div>
			</div>
		</div>
	<!-- ./ Comment -->
</form>


