<?php

/**
* 
*/
class MonitorController extends BaseController
{
	
	public function index()
	{
		$map = Map::all();
		return View::make('monitor.index')->with('map', $map);
	}

	public function show($idMap)
	{
		$map = Map::find($idMap);
		$router = Router::where('Map', $idMap)->get();
		return View::make('monitor.show')
						->with('map', $map)
						->with('router', $router);
	}
}