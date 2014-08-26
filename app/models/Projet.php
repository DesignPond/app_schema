<?php

class Projet extends Eloquent {

	protected $guarded = array('id');
	
	public function categorie()
    {
        return $this->belongsTo('Categorie');
    }
    
	public function boxe()
    {
        return $this->hasMany('Boxe');
    }
    
	public function arrow()
    {
        return $this->hasMany('Arrow');
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
