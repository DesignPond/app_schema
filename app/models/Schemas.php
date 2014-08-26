<?php

class Schemas extends Eloquent {

	protected $guarded   = array('id');

	public static $rules = array(
		'titre'     => 'required',
		'auteur'    => 'required',
		'categorie' => 'required',
		'refTheme'  => 'required',
        'subTheme'  => 'required'
	);
	
}
