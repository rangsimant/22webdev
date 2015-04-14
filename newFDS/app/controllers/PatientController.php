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

	public function create()
	{
		return View::make('patient.create');
	}

	public function edit($idPatient)
	{
		if (Auth::user()->hasRole('admin')) 
		{
			$patient = Patient::find($idPatient);
			return View::make('patient.edit')->with('patient', $patient);
		}
		else
		{
			return "not permission";
		}
		
	}

	public function getPatient()
	{
		return Patient::getPatientList();
	}
}