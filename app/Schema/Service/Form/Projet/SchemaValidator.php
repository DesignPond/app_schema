<?php namespace Schema\Service\Form\Projet;

use Crhayes\Validation\ContextualValidator;

class SchemaValidator extends ContextualValidator
{
	
	protected $rules = array(
		'titre'        => 'required',
		'categorie_id' => 'required',
		'theme_id'     => 'required',
        'subtheme_id'  => 'required'
	);
	
	/*
	 * Validation messages
	*/
	
	protected $messages = array(
		'titre.required'        => 'Le titre est requis',
		'categorie_id.required' => 'La catégorie principale est requise',
		'theme_id.required'     => 'Le thème est requis',
        'subtheme_id.required'  => 'Le sous thème est requis'
	);
	
}