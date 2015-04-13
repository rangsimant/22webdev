<?php

/**
* 
*/
class Sensor extends Eloquent
{
	protected $table = 'sensor';
	protected $primaryKey = 'idSensor';
    public static $unguarded = true;

}