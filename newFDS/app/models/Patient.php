<?php

/**
* 
*/
class Patient extends Eloquent
{
	protected $table = 'patient';
	protected $primaryKey = 'idPatient';

    public function user()
    {
        return $this->hasOne('User', 'id', 'User');
    }

    public static function patientAll()
    {
    	$patient = DB::table('patient')
    				->join('user_profile', 'patient.User', '=', 'user_profile.User')
    				->select('patient.idPatient', 'user_profile.firstname', 'user_profile.lastname', 'user_profile.gender')
    				->get();
    	return $patient;
    }
}