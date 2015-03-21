<?php
/**
* 
*/
class VoteController extends BaseController
{
	
	public function vote($idPost,$type)
	{
		$vote = Vote::postVote($idPost,$type);
		if ($vote) 
		{
			return Redirect::back();
		}
		else
		{
			return Redirect::back()->with('error', 'Please login before Vote.');
		}
	}
}