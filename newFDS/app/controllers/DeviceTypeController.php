<?php

/**
* 
*/
class DeviceTypeController extends BaseController
{
	
	public function index()
	{
		return View::make('devicetype.index');
	}

	public function create()
	{
		
	}

	public function store()
	{
		
	}

	public function edit($idDeviceType)
	{
		$devicetype = DeviceType::find($idDeviceType);
        $sensors = Sensor::orderBy('idSensor')->get();
        $devicetype_sensor = DeviceTypeSensor::where('DeviceType',$idDeviceType)->orderBy('Sensor')->get();
		return View::make('devicetype.edit');
	}

	public function update()
	{

	}

	public function getDeviceType()
	{
		return DeviceType::getDeviceTypeList();
	}


}