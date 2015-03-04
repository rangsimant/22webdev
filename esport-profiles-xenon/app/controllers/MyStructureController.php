<?php

/**
* 
*/
class MyStructureController extends BaseController
{
	
	public function getIndex()
	{
		$title = Lang::get('home.my-structure');
		return View::make('site/my-structure/index')->with('title',$title);
	}
}