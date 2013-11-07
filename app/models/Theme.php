<?php

class Theme extends Eloquent {

	protected $guarded = array('id');

	public static $rules = array( 'titre' => 'required', 'refCategorie' => 'required' );
		
	public function categorie()
    {
        return $this->hasOne('Categorie', 'refCategorie');
    }
    
    public function subtheme()
    {
        return $this->hasMany('Subtheme','refTheme');
    }
    
    public function projet()
    {
        return $this->hasMany('Projet','refTheme');
    }
    
}
