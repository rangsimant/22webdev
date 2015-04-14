<?php

/**
* 
*/
class Map extends Eloquent
{
	protected $table = 'map';
	protected $primaryKey = 'idMap';
    public static $unguarded = true;

    public function location()
    {
    	return $this->hasOne('Location', 'idLocation', 'Location');
    }

}