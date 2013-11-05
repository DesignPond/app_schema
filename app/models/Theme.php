<?php

class Theme extends Eloquent {

	protected $guarded = array('id');

	public static $rules = array( 'titre' => 'required', 'refCategorie' => 'required' );
		
	public function categorie()
    {
        return $this->hasOne('Categorie', 'id');
    }
    
}
