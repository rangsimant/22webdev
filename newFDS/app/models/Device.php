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
                    ->leftjoin('devicetype', 'device.DeviceType', '=', 'devicetype.idDeviceType')
                    ->leftjoin('device_patient', function($join){
                        $join->on('device_patient.Device', '=', 'device.idDevice')
                                ->whereNull('device_patient.deleted_at');
                    })
                    ->leftjoin('patient', 'device_patient.Patient', '=', 'patient.idPatient')
                    ->leftjoin('user_profile', 'patient.User', '=', 'user_profile.User')
                    ->select(
                            'device.idDevice', 
                            'patient.patient_id', 
                            'user_profile.firstname',
                            'user_profile.lastname',
                            'device.name', 
                            'device.description', 
                            'device_patient.idDevicePatient', 
                            'devicetype.name as typename', 
                            'devicetype.photo',
                            'device.created_at',
                            'device.deleted_at',
                            'device_patient.deleted_at as assign'
                            )
                    ->groupBy('idDevice')
                    ->orderBy('device.created_at', 'DESC')
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
				$device[$key]->status = 'Available';
			}
			else
			{
				$device[$key]->status = 'Unavailable';
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

    public static function deactivate($idDevice)
    {
        $device = self::find($idDevice);
        return $device->delete();
    }
}