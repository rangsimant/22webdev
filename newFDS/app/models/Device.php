<?php

/**
* 
*/
class Device extends Eloquent
{
	protected $table = 'device';
	protected $primaryKey = 'idDevice';
    public static $unguarded = true;

    public function user()
    {
        return $this->hasOne('User', 'id', 'User');
    }

    public static function getDeviceList()
    {
    	$device = DB::table('device')
                    ->join('devicetype', 'device.DeviceType', '=', 'devicetype.idDeviceType')
                    ->select(
                            'device.idDevice', 
                            'device.name', 
                            'device.description', 
                            'devicetype.name as typename', 
                            'devicetype.photo',
                            'device.deleted_at'
                            )
                    ->get();
		foreach ($device as $key => $value) {
			if ($value->deleted_at == null) 
			{
				$device[$key]->status = 'Activate';
			}
			else
			{
				$device[$key]->status = 'Deactivate';
			}
		}
    	return $device;
    }
}