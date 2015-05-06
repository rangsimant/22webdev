<?php

class LocationController extends BaseController
{
	public function index()
	{
		return View::make('location.index');
	}

	public function create()
	{
		return View::make('location.create');
	}

	public function store()
	{
		$input = Input::all();
		$rules = array
					(
						'name'=> 'required',
					);
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
	    {
	        return Redirect::to('location/create')
	        				->withErrors($validator)
	        				->withInput(Input::all());
	    }
	    else
	    {
			$result = Location::create(Input::except('_token', 'status'));
			return Redirect::to('location');
	    }
	}

	public function edit($idLocation)
	{
		if (Auth::user()->hasRole('admin')) 
		{
			$location = Location::find($idLocation);

			return View::make('location.edit')
							->with('location', $location);
		}
		else
		{
			return "not permission";
		}
	}

	public function update()
	{
		$input = Input::all();
		$idLocation = $input['idLocation'];
		$rules = array
					(
						'name'=> 'required'
					);
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
	    {
	        return Redirect::to('location/'.$idLocation.'/edit')
	        				->withErrors($validator)
	        				->withInput(Input::all());
	    }
	    else
	    {
			$result = Location::where("idLocation", $idLocation)
							->update(Input::except('_method', '_token', 'idLocation'));

            Session::flash('message', 'Successfully updated Location!');
			return Redirect::to('location/'.$idLocation.'/edit');
	    }
	}

	public function destroy($idLocation)
	{
		$result = Location::where('idLocation', $idLocation)->delete();

		return $result;
	}

	public function getLocation()
	{
		return Location::all();
	}
}