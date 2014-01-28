<?php namespace Schema\Service\Form\Projet;

use Crhayes\Validation\ContextualValidator;

class SchemaValidator extends ContextualValidator
{
	
	protected $rules = array(
		'titre'        => 'required',
		'categorie_id' => 'required',
		'theme_id'     => 'required'
	);
	
	/*
	 * Validation messages
	*/
	
	protected $messages = array(
		'titre.required'        => 'Le titre est requis',
		'user_id.exists'        => 'That user does not exist',
		'categorie_id.required' => 'La catégorie principale est requise',
		'theme_id.required'     => 'Le thème est requis'
	);
	
}