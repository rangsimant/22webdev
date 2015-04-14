<?php

class UserProfile extends Eloquent
{
	protected $table = 'user_profile';
    protected $primaryKey = 'idUser_Profile';
    public $timestamps = true;
    public static $unguarded = true;
        
}