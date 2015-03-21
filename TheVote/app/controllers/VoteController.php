<?php
/**
* 
*/
class VoteController extends BaseController
{
	
	public function vote($idPost,$type)
	{
		$post = Post::find($idPost);
		if (!empty($post)) 
		{
			$data = array(
				"vote"=>1,
				"type"=>$type,
				"Post"=>$idPost,
				"User"=>Auth::user()->id
				);
			Vote::create($data);

			return Redirect::back();
		}
		else
		{
			return Redirect::back()->with('error', 'Please login before Vote.');
		}
		
	}
}