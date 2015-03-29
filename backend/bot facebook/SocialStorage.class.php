<?php
require_once("pdo/easyCRUD/easyCRUD.class.php");
/**
* 
*/
class SocialStorage Extends Crud 
{
	protected $table = 'social_data';
	protected $pk	 = 'sd_id';

	public function createSocialStorage($data)
	{
		$social_storage = new SocialStorage($data);
		return $social_storage->Create();
	}
}