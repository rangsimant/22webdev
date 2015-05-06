<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'auth'), function()
{
	Route::get('/', function()
	{
		return View::make('content');
	});

	Route::resource('patient','PatientController');
	Route::resource('device','DeviceController');
	Route::resource('devicetype','DeviceTypeController');
	Route::resource('sensor','SensorController');
	Route::resource('monitor','MonitorController');
	Route::resource('physician','PhysicianController');
	Route::resource('location','LocationController');
	Route::resource('map','MapController');

	// Ajax Route
	Route::get('getPatientList','PatientController@getPatient');
	Route::get('getDeviceList','DeviceController@getDevice');
	Route::get('getDeviceTypeList','DeviceTypeController@getDeviceType');
	Route::get('getPhysicianList','PhysicianController@getPhysician');
	Route::get('getSensorList','SensorController@getSensor');
	Route::get('getLocationList','LocationController@getLocation');
	Route::get('getMapList','MapController@getMap');

	Route::get('device/{idDevice}/assign', 'DeviceController@assign');
	Route::get('devicetype/addsensor/{chaneel}/{name}', 'DeviceTypeController@addNewSensor');
	Route::get('devicetype/{idDevicePatient}/unassign', 'DeviceTypeController@unassign');
	Route::post('devicetype/uploadPhoto', 'DeviceTypeController@uploadPhoto');
	Route::delete('devicetype/{idDeviceType}/deletePhoto', 'DeviceTypeController@deletePhoto');
});


// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
