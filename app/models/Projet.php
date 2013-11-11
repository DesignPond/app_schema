<?php

class Projet extends Eloquent {

	protected $guarded = array('id');
	
	public function categorie()
    {
        return $this->hasOne('Categorie', 'id');
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
        return $this->belongsTo('User');
    }
	
}
