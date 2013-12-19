<?php

class Files extends Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	public $timestamps   = false;
	
	public function event()
    {
        return $this->belongsTo('events', 'event_id');
    }
	
}
