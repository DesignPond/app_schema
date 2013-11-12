<?php

class Projet extends Eloquent {

	protected $guarded = array('id');
	
	public function categorie()
    {
        return $this->hasOne('Categorie');
    }
    
    public function theme()
    {
        return $this->belongsTo('Theme');
    }
    
    public function subtheme()
    {
        return $this->belongsTo('Subtheme');
    }
    
    public function user()
    {
        return $this->belongsTo('User');
    }
	
}
