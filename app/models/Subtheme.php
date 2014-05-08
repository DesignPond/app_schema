<?php

class Subtheme extends Eloquent {

	protected $guarded = array('id');
	public $timestamps = false;

	public static $rules = array( 'titre' => 'required', 'categorie_id' => 'required', 'theme_id' => 'required' );
	
	public function categorie()
    {
        return $this->belongsTo('Categorie');
    }
    
	public function theme()
    {
        return $this->belongsTo('Theme');
    }

	
}
