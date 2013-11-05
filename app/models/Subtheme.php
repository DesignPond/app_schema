<?php

class Subtheme extends Eloquent {

	protected $guarded = array('id');

	public static $rules = array( 'titre' => 'required', 'refCategorie' => 'required', 'refTheme' => 'required' );
	
	public function categorie()
    {
        return $this->hasOne('Categorie', 'id');
    }
    
	public function theme()
    {
        return $this->hasOne('Theme', 'id');
    }
	
}
