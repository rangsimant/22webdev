<?php

class MapController extends BaseController
{
	public function index()
	{
		return View::make('map.index');
	}

	public function create()
	{
		return View::make('map.create');
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
	        return Redirect::to('map/create')
	        				->withErrors($validator)
	        				->withInput(Input::all());
	    }
	    else
	    {
			$result = Location::create(Input::except('_token'));
			return Redirect::to('map');
	    }
	}

	public function edit($idMap)
	{
		if (Auth::user()->hasRole('admin')) 
		{
			$map = Map::find($idMap);

			return View::make('map.edit')
							->with('map', $map);
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
	        return Redirect::to('map/'.$idLocation.'/edit')
	        				->withErrors($validator)
	        				->withInput(Input::all());
	    }
	    else
	    {
			$result = Location::where("idLocation", $idLocation)
							->update(Input::except('_method', '_token', 'idLocation'));

            Session::flash('message', 'Successfully updated Location!');
			return Redirect::to('map/'.$idLocation.'/edit');
	    }
	}

	public function destroy($idLocation)
	{
		$result = Location::where('idLocation', $idLocation)->delete();

		return $result;
	}

	public function getMap()
	{
		return Map::all();
	}
}