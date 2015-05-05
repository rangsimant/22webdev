<?php

/**
* 
*/
class PhysicianController extends BaseController
{
	
	public function index()
	{
		return View::make('physician.index');
	}

	public function getPhysician()
	{
		return Physician::getPhysician();
	}

}