<?php namespace Schema\Service\Form\Projet;

use  Schema\Service\Validation\AbstractLaravelValidator;

class ProjetFormValidator extends AbstractLaravelValidator {
	
	/*
	 * Validation rules
	*/
	
	protected $rules = array(
		'titre'     => 'required',
		'categorie' => 'required',
		'refTheme'  => 'required'
	);
	
	/*
	 * Validation messages
	*/
	
	protected $messages = array(
		'titre.required'     => 'Le titre est requis',
		'user_id.exists'     => 'That user does not exist',
		'categorie.required' => 'La catégorie principale est requise',
		'refTheme.required'  => 'Le thème est requis'
	);
	
}