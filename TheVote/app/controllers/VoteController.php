<?php
/**
* 
*/
class VoteController extends BaseController
{
	
	public function vote()
	{
		$slug = Input::get('slug');
		if (!empty(Input::get('idPost')) && !empty(Input::get('idUser'))) 
		{
			$idPost = Input::get('idPost');
			$idUser = Input::get('idUser');
			$data = array(
				"vote"=>1,
				"type"=>"agree",
				"Post"=>$idPost,
				"User"=>$idUser
				);
			Vote::create($data);

			return Redirect::to($slug."#vote");
		}
		else
		{
			return Redirect::to($slug."#vote")->with('error', 'Please login before Vote.');
		}
		
	}

	public function worse()
	{
				$slug = Input::get('slug');
		if (!empty(Input::get('idPost')) && !empty(Input::get('idUser'))) 
		{
			$idPost = Input::get('idPost');
			$idUser = Input::get('idUser');
			$data = array(
				"vote"=>1,
				"type"=>"disagree",
				"Post"=>$idPost,
				"User"=>$idUser
				);
			Vote::create($data);
			return Redirect::to($slug."#vote");
		}
		else
		{
			return Redirect::to($slug."#vote")->with('error', 'Please login before Vote.');
		}
	}
}