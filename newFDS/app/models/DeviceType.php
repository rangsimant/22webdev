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

}