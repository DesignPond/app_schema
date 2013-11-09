<?php

class Subtheme extends Eloquent {

	protected $guarded = array('id');
	public $timestamps = false;

	public static $rules = array( 'titre' => 'required', 'refCategorie' => 'required', 'refTheme' => 'required' );
	
	public function categorie()
    {
        return $this->hasOne('Categorie', 'refCategorie');
    }
    
	public function theme()
    {
        return $this->hasOne('Theme', 'refTheme');
    }
	
}
