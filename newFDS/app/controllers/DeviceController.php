<?php

/**
* 
*/
class DeviceController extends BaseController
{
	
	public function index()
	{
		return View::make('device.index');
	}

	public function create()
	{
		return View::make('patient.create');
	}

	public function edit($idPatient)
	{
		if (Auth::user()->hasRole('admin')) 
		{
			$patient = Patient::find($idPatient);
			return View::make('patient.edit')->with('patient', $patient);
		}
		else
		{
			return "not permission";
		}
		
	}

	public function getDevice()
	{
		return Device::getDeviceList();
	}
}