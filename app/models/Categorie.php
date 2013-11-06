<?php

class Categorie extends Eloquent {

	protected $guarded = array('id');

	public static $rules = array( 'titre' => 'required' );
	
	public function theme()
    {
        return $this->hasMany('Theme','id');
    }
   
	public function subtheme()
    {
        return $this->hasMany('Subtheme','id');
    }   

    
}
