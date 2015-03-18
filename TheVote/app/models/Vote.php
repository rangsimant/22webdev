<?php

class Vote extends Eloquent
{
	protected $table = "vote";
	protected $primaryKey = "idVote";
	public static $unguarded = true;

	public static function getCountVote($idPost)
	{
		return self::whereRaw("Post = '".$idPost."' AND Type='agree'")->count();
	}
	public static function getCountWorse($idPost)
	{
		return self::whereRaw("Post = '".$idPost."' AND Type='disagree'")->count();
	}

}