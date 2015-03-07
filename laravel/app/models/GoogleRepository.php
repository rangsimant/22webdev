<?php

/**
* 
*/
class GoogleRepository extends UserRepository
{
	protected $table = 'users';
	protected $primaryKey = 'id';

	public function signup($input)
	{
		$user = new User;

		$user->username = array_get($input, 'username');
		$user->email    = array_get($input, 'email');
		$user->password = array_get($input, 'password');
		$user->idSocial = array_get($input, 'id');
		$user->first_name = array_get($input, 'first_name');
		$user->last_name = array_get($input, 'last_name');
		$user->confirmed = array_get($input, 'confirmed');
		$user->channel = array_get($input, 'channel');
		$user->picture = array_get($input, 'picture');


		// The password confirmation will be removed from model
		// before saving. This field will be used in Ardent's
		// auto validation.
		$user->password_confirmation = array_get($input, 'password');

		// Generate a random confirmation code
		$user->confirmation_code     = md5(uniqid(mt_rand(), true));

		// Save if valid. Password field will be hashed before save
		$this->save($user);
		log::debug("Create new Account ".$user->idSocial." From Google.\n".json_encode($user));
		return $user;
	}


}