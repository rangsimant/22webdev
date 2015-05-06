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
			$result = Device::create(Input::except('_token', 'status'));
			if($input['status'] == 0) // if select Deactivate
			{
				Device::deactivate($result->idDevice);
			}
			return Redirect::to('device');
	    }
	}

	public function edit($idDevice)
	{
		if (Auth::user()->hasRole('admin')) 
		{
			$device = Device::withTrashed()->find($idDevice);

			$devicetype = DeviceType::all();
			return View::make('device.edit')
							->with('device', $device)
							->with('devicetype', $devicetype);
		}
		else
		{
			return "not permission";
		}
	}

	public function update()
	{
		$input = Input::all();
		$idDevice = $input['idDevice'];
		$status = $input['status'];
		$rules = array
					(
						'name'=> 'required',
						'DeviceType'=> 'required | numeric',
						'purchasedDate'=> 'date_format:Y-m-d'
					);
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
	    {
	        return Redirect::to('device/'.$idDevice.'/edit')
	        				->withErrors($validator)
	        				->withInput(Input::all());
	    }
	    else
	    {
			$result = Device::withTrashed()
							->find($idDevice)
							->update(Input::except('_method', '_token', 'status', 'idDevice'));
			Device::changeStatusDevice($idDevice, $status);
			
            Session::flash('message', 'Successfully updated Device!');
			return Redirect::to('device/'.$idDevice.'/edit');
	    }
	}

	public function getDevice()
	{
		return Device::getDeviceList();
	}

	public function assign($idDevice)
	{
		return View::make('device.assign')->with('idDevice', $idDevice);
	}

	public function destroy($idDevice)
	{
		$device = new Device();
		$result = $device->deviceForceDelete($idDevice);

		return $result;
	}

}