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
		$devicetype = DeviceType::all();
		return View::make('device.create')->with('devicetype', $devicetype);
	}

	public function store()
	{
		$input = Input::all();
		$rules = array
					(
						'name'=> 'required',
						'DeviceType'=> 'required | numeric',
						'purchasedDate'=> 'date_format:Y-m-d'
					);
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
	    {
	        return Redirect::to('device/create')
	        				->withErrors($validator)
	        				->withInput(Input::all());
	    }
	    else
	    {
			$result = Device::create(Input::except('_token'));
			return Redirect::to('device');
	    }
	}

	public function edit($idDevice)
	{
		if (Auth::user()->hasRole('admin')) 
		{
			$device = Device::find($idDevice);
			return View::make('device.edit')->with('device', $device);
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

	public function deleteDevice($idDevice)
	{
		$device = new Device();
		$result = $device->deviceForceDelete($idDevice);

		return $result;
	}

}