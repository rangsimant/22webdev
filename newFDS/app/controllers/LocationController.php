<?php

class LocationController extends BaseController
{
	public function index()
	{
		return View::make('location.index');
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

	public function getLocation()
	{
		return Location::all();
	}
}