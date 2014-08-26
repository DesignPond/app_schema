<?php

class Theme extends Eloquent {

	protected $guarded = array('id');
	public $timestamps = false;

	public static $rules = array( 'titre' => 'required', 'categorie_id' => 'required' );
		
	public function categorie()
    {
        return $this->belongsTo('Categorie');
    }

    public function subthemes()
    {
        return $this->hasMany('Subtheme');
    }

}
