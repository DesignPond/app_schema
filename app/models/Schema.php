<?php

class Schema extends Eloquent {

	protected $guarded   = array('id');

	public static $rules = array(
		'titre'     => 'required',
		'auteur'    => 'required',
		'categorie' => 'required',
		'refTheme'  => 'required'
	);
	
}
