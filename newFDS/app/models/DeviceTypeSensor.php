<?php

/**
* 
*/
class DeviceTypeSensor extends Eloquent
{
	protected $table = 'devicetype_sensor';
	protected $primaryKey = 'idDeviceTypeSensor';
    public static $unguarded = true;

    public static function mapping($sensor, $idDeviceType)
    {
    	$sensorArray = array();
        $affectedRow = array();
        foreach ($sensor as $value) {
            if (isset($value['id'])) {
                $sensorArray['DeviceType'] = $idDeviceType;
                $sensorArray['Sensor'] = $value['id'];
                $sensorArray['numberOfChannel'] = isset($value['numberOfChannel'])?$value['numberOfChannel']:1;
                $affectedRow[] = self::create($sensorArray);
            }
        }
        return $affectedRow;
    }
}