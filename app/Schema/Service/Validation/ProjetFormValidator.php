<?php namespace Schema\Service\Validation;

class ProjetFormValidator extends AbstractLaravelValidator {
	
	/*
	 * Validation rules
	*/
	
	protected $rules = array(
		'titre'     => 'required',
		'user_id'   => 'required',
		'categorie' => 'required',
		'refTheme'  => 'required'
	);
	
	/*
	 * Validation messages
	*/
	
	protected $messages = array(
		'user_id.exists'     => 'That user does not exist',
		'categorie.required' => 'La catégorie principale est requise',
		'refTheme.required'  => 'Le thème est requis'
	);
	
}