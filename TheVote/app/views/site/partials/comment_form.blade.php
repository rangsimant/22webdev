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
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 box-input-post">
				<div class="row">
					<div>
						{{ Form::textarea('comment','',array('class'=>'clear-border-input col-md-12 col-xs-12','rows'=>'2','cols'=>'0','placeholder'=>'Write a Post.')) }}
					</div>
					<div>
						<div class="col-md-12 col-xs-12 border-top-post footer-post">
							<span><a href="" title="Attachment" class="btn btn-xs"><i class="fa fa-paperclip"></i></a></span>
							<input type="submit"class="btn btn-primary btn-xs pull-right" id="submit" value="Submit"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ./ Comment -->
</form>


