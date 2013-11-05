<?php

class Categorie extends Eloquent {

	protected $guarded = array('id');

	public static $rules = array( 'titre' => 'required' );
}
