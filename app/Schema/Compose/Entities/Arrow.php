<?php namespace Schema\Compose\Entities;

use Schema\Common\BaseModel as BaseModel;

class Arrow extends BaseModel {

	protected $guarded = array();
	public $timestamps = false;
	public static $rules = array();
    public static $messages = array();

	public function projet()
    {
        return $this->belongsTo('Projet');
    }
    
}
