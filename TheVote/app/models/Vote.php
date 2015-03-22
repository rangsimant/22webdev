<?php

class Vote extends Eloquent
{
	protected $table = "vote";
	protected $primaryKey = "idVote";
	public static $unguarded = true;

	public static function getCountVote($idPost)
	{

		return self::whereRaw("Post = '".$idPost."' AND Type ='agree'")->count();
	}
	public static function getCountWorse($idPost)
	{
		return self::whereRaw("Post = '".$idPost."' AND Type ='disagree'")->count();
	}
	public static function postVote($idPost,$type)
	{
		$post = Post::find($idPost);
		if (!empty($post)) 
		{

			$idUser = Auth::user()->id;
			$vote = self::where("Post",$idPost)->where("User",$idUser)->first();
			if (count($vote) == 0) 
			{
				$data = array(
						"vote"=>1,
						"type"=>$type,
						"Post"=>$idPost,
						"User"=>$idUser
						);
				self::create($data);
				Log::debug('Vote Agree +1 Success @Post = '.$idPost.' by User ID = '.$idUser);
			}
			else
			{
				$vote->type = $type;
				$vote->save();
				Log::debug('Vote Disagree +1 Success @Post = '.$idPost.' by User ID = '.$idUser);
			}

			$post->touch();
			return true;
		}
		else
		{
			return false;
		}
	}

}