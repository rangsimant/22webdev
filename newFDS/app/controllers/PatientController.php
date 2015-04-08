<?php

/**
* 
*/
class PatientController extends BaseController
{
	
	public function index()
	{
		return View::make('patient.index');
	}

	public function getPatient()
	{
		return Patient::patientAll();
	}
}