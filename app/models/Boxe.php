<?php

class Boxe extends Eloquent {

	protected $guarded = array();
	public $timestamps = false;
	public static $rules = array();
	
	public function projet()
    {
        return $this->belongsTo('Projet');
    }
}
