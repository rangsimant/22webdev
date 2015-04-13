<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
/**
* 
*/
class Device extends Eloquent
{
    use SoftDeletingTrait;

	protected $table = 'device';
	protected $primaryKey = 'idDevice';
    protected $dates = ['deleted_at'];

    public static $unguarded = true;

    public function user()
    {
        return $this->hasOne('User', 'id', 'User');
    }

    public function devicetype()
    {
        return $this->hasOne('DeviceType', 'idDeviceType', 'DeviceType');
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
                            'device.created_at',
                            'device.deleted_at'
                            )
                    ->orderBy('device.created_at', 'ASC')
                    ->get();
		foreach ($device as $key => $value) {
            if ($value->photo == null) 
            {
                $device[$key]->photo = URL::to('uploads/default/device-default.png');
            }
            else
            {
                $device[$key]->photo = URL::to('uploads/devicetype/'.$value->photo);
            }

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

    public function deviceForceDelete($idDevice)
    {
    	$device = self::withTrashed()->find($idDevice);
    	if ($device) 
    	{
	    	$device->forceDelete();
	    	return 'Delete device success.';
    	}
    	else
    	{
    		return "this Device: ".$idDevice." Deleted.";
    	}
    }

    public static function changeStatusDevice($idDevice, $status)
    {
        $device = self::withTrashed()->find($idDevice);
        if ($status == 1) // is Activate
        {
            return $device->restore();
        }
        else
        {
            return $device->delete();
        }
    }
}