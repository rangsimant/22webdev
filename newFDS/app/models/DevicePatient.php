<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

/**
* 
*/
class DevicePatient extends Eloquent
{
    use SoftDeletingTrait;

	protected $table = 'device_patient';
	protected $primaryKey = 'idDevicePatient';
    public static $unguarded = true;

    public static function assign($idPatient, $idDevice)
    {
        
    }

    public static function unassign($idDevicePatient)
    {
        $devicepatient = DevicePatient::find($idDevicePatient);
        if (!empty($devicepatient))
        {
            $devicepatient->delete();
            return 'Unassign success.';
        }
        return 'Unassign fail.';
    }
}