<?php

/**
* 
*/
class Patient extends Eloquent
{
	protected $table = 'patient';
	protected $primaryKey = 'idPatient';
    public static $unguarded = true;

    public function user()
    {
        return $this->hasOne('User', 'id', 'User');
    }

    public static function getPatientList()
    {
    	$patient = DB::table('patient')
                    ->join('user_profile', 'patient.User', '=', 'user_profile.User')
                    ->select(
                            'patient.idPatient', 
                            'user_profile.firstname', 
                            'user_profile.lastname', 
                            'user_profile.gender', 
                            'user_profile.photo'
                            )
                    ->get();
        foreach ($patient as $key => $value) 
        {
            if ($value->photo == null) 
            {
                $patient[$key]->photo = URL::to('uploads/default/icon-user-default.png');
            }
            else
            {
                $patient[$key]->photo = URL::to('uploads/profile/'.$value->photo);
            }
        }
    	return $patient;
    }
}