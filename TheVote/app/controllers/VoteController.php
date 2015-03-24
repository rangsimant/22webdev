<?php
/**
* 
*/
class VoteController extends BaseController
{	
	public function vote()
	{
		$idPost = Input::get('idPost');
		$type = Input::get('type');
		$vote = Vote::postVote($idPost,$type);
	}

	public function voteCount($idPost,$type)
	{
		return Vote::getCountVoteAll($idPost,$type);
	}
}