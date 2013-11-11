<?php

class Theme extends Eloquent {

	protected $guarded = array('id');
	public $timestamps = false;

	public static $rules = array( 'titre' => 'required', 'refCategorie' => 'required' );
		
	public function categorie()
    {
        return $this->belongsTo('Categorie', 'id');
    }
    
    public function subtheme()
    {
        return $this->hasMany('Subtheme','id');
    }
    
    public function projet()
    {
        return $this->belongsToMany('Projet','id');
    }
    
}
