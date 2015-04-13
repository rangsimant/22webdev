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
		return View::make('devicetype.edit')
						->with('devicetype', $devicetype)
						->with('sensors', $sensors)
						->with('devicetype_sensor', $devicetype_sensor);
	}

	public function update()
	{
		$rules = array
					(
	                    'name'              => 'required',
	                    'manufacturer'      => 'required',
	                    'tel'      => 'Numeric',
	                    'email'      => 'email'
					);
		$input = Input::all();
		$validator = Validator::make($input, $rules);
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
            $updatedrow = DeviceType::where('idDeviceType',$idDeviceType)->update(Input::except("_token","_method","sensor","filename-devicetype", "idDeviceType"));
            $devicetype_sensor = DeviceTypeSensor::where('DeviceType',$idDeviceType)->delete();
            
            $sensorArray = array();
            foreach ($sensor as $value) {
                if (isset($value['id'])) {
                    $sensorArray['DeviceType'] = $idDeviceType;
                    $sensorArray['Sensor'] = $value['id'];
                    $sensorArray['numberOfChannel'] = isset($value['numberOfChannel'])?$value['numberOfChannel']:1;
                    $affectedRow_sensor = DeviceTypeSensor::create($sensorArray);
                }
            }
            // if(Input::hasFile('filename-devicetype'))
            // {
            //     Input::file('filename-devicetype')->move($path,$fileName); // save file at public/upload/devicetype
            // }
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
}