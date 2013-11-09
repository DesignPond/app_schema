<?php

class Projet extends Eloquent {

	protected $guarded = array('id');

	public static $rules = array(
		'titre'     => 'required',
		'auteur'    => 'required',
		'categorie' => 'required',
		'refTheme'  => 'required'
	);
	
	public function categorie()
    {
        return $this->hasOne('Categorie', 'categorie');
    }
    
    public function theme()
    {
        return $this->hasOne('Theme', 'id');
    }
    
    public function subtheme()
    {
        return $this->hasOne('Subtheme', 'id');
    }
    
    public function user()
    {
        return $this->hasOne('User', 'id');
    }
	
}
