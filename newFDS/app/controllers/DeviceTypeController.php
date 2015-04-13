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

    	if ($devicetype->photo != null) 
    	{
    		$devicetype->photo = URL::to('uploads/devicetype/'.$devicetype->photo);
    	}
    	else
    	{
    		$devicetype->photo = URL::to('uploads/default/device-default.png');
    	}

		return View::make('devicetype.edit')
						->with('devicetype', $devicetype)
						->with('sensors', $sensors)
						->with('devicetype_sensor', $devicetype_sensor);
	}

	public function update()
	{
		$input = Input::all();
		$validator = Validator::make($input, DeviceType::$rules);
        $sensor = Input::get('sensor');

        if ($validator->fails())
        {
            return Redirect::to('devicetype/' . $idDeviceType . '/edit')
                ->withErrors($validator)
                ->withInput(Input::all());
        }
        else
        {
        	$idDeviceType = $input['idDeviceType'];
        	DeviceType::savePhoto($idDeviceType);
            DeviceType::where('idDeviceType',$idDeviceType)->update(Input::except("_token","_method","sensor", "idDeviceType", "photo"));
            DeviceTypeSensor::where('DeviceType',$idDeviceType)->delete();
            DeviceTypeSensor::mapping($sensor, $idDeviceType);
            
            Session::flash('message', 'Successfully updated Device Type!');
            return Redirect::to('devicetype/'.$idDeviceType.'/edit');
        }
	}

	public function getDeviceType()
	{
		return DeviceType::getDeviceTypeList();
	}

	 public function addNewSensor($channel, $name)
    {
        $sensor = array(
            'name' => $name,
            'numberOfChannels' => $channel
            );
        $affectedRow = Sensor::create($sensor);

        return $affectedRow;
    }

    public function deletePhoto($idDeviceType)
    {
    	$deletePhoto = DeviceType::deletePhoto($idDeviceType);
    	return $deletePhoto;
    }
}