<?php

/**
* 
*/
class SensorController extends BaseController
{
	
	public function index()
	{
		return View::make('sensor.index');
	}

	public function create()
	{
		return View::make('sensor.create');
	}

	public function store()
	{
		$input = Input::all();
		$validator = Validator::make($input, Sensor::$rules);
		if ($validator->fails())
        {
            return Redirect::to('sensor/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }
        else
        {    	
	        $affectedRow = Sensor::create(Input::only('name', 'numberOfChannels'));
	        Session::flash('message', 'Successfully created Sensor!');
			return Redirect::to('sensor');
        }
	}

	public function edit($idSensor)
	{
		if (Auth::user()->hasRole('admin')) 
		{
			$sensor = Sensor::find($idSensor);
			return View::make('sensor.edit')->with('sensor', $sensor);
		}
		else
		{
			return "not permission";
		}
		
	}

	public function update()
	{
		$input = Input::all();
		$validator = Validator::make($input, Sensor::$rules);
        $idSensor = Input::get('idSensor');

        if ($validator->fails())
        {
            return Redirect::to('sensor/' . $idSensor . '/edit')
                ->withErrors($validator)
                ->withInput(Input::all());
        }
        else
        {
            Sensor::find($idSensor)->update(Input::except("_token", "_method", "idSensor"));
            
            Session::flash('message', 'Successfully updated Sensor!');
            return Redirect::to('sensor/'.$idSensor.'/edit');
        }
	}

	public function destroy($idSensor)
	{
		$sensor = Sensor::find($idSensor);
        if(empty($sensor))
        {
           $this->redirectWithMessage($id);
        }
        else
        {
            $sensor->delete();
            return 'Sensor success.';
        }
        return 'No delete';
	}

	public function getSensor()
	{
		return Sensor::all();
	}
}