<?php

/**
* 
*/
class Writhdrawal extends Eloquent
{
	
	protected $table = "money";
	protected $primaryKey = "idMoney";

	public function user()
	{
		return $this->hasOne("User","id","User");
	}
}