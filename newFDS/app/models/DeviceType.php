<?php

/**
* 
*/
class DeviceType extends Eloquent
{
	protected $table = 'devicetype';
	protected $primaryKey = 'idDeviceType';
    public static $unguarded = true;

    public function user()
    {
        return $this->hasOne('User', 'id', 'User');
    }

    public static function getDeviceTypeList()
    {
    	$devicetype = DB::table('devicetype')
                    ->orderBy('created_at', 'DESC')
                    ->get();

        foreach ($devicetype as $key => $value) {
            if ($value->photo == null) 
            {
                $devicetype[$key]->photo = URL::to('uploads/default/device-default.png');
            }
            else
            {
                $devicetype[$key]->photo = URL::to('uploads/devicetype/'.$value->photo);
            }
        }
    	return $devicetype;
    }

}