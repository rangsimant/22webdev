<?php

/**
* 
*/
class Sensor extends Eloquent
{
	protected $table = 'sensor';
	protected $primaryKey = 'idSensor';
    public static $unguarded = true;
    public static $rules = array
							(
								'name' => 'required',
								'numberOfChannels' => 'numeric'
							);


    // public static function getDeviceList()
    // {
    // 	$sensor = DB::table('sensor')
    //                 ->orderBy('device.created_at', 'DESC')
    //                 ->get();
    // 	return $sensor;
    // }
}