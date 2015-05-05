<?php
class Physician extends Eloquent
{
	protected $table = 'physician';
	protected $primaryKey = 'idPhysician';
    public static $unguarded = true;

    public function user()
    {
        return $this->hasOne('User', 'id', 'User');
    }

    public static function getPhysician()
    {
    	$physician = DB::table('physician')
                    ->join('user_profile', 'physician.User', '=', 'user_profile.User')
                    ->select(
                            'physician.idPhysician', 
                            'physician.Department', 
                            'physician.Position', 
                            'user_profile.firstname', 
                            'user_profile.lastname', 
                            'user_profile.gender', 
                            'user_profile.photo'
                            )
                    ->get();
        foreach ($physician as $key => $value) 
        {
            if ($value->photo == null) 
            {
                $physician[$key]->photo = URL::to('uploads/default/icon-user-default.png');
            }
            else
            {
                $physician[$key]->photo = URL::to('uploads/profile/'.$value->photo);
            }
        }
    	return $physician;
    }
}