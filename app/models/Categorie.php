<?php

class Categorie extends Eloquent {

	protected $guarded = array('id');
	public $timestamps = false;

	public static $rules = array( 'titre' => 'required' );
	
	public function theme()
    {
        return $this->hasMany('Theme');
    }
   
	public function subtheme()
    {
        return $this->hasMany('Subtheme');
    }   

    
}
