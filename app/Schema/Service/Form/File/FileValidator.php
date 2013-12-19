<?php namespace Droit\Service\Form\File;

use  Droit\Service\Validation\AbstractLaravelValidator;

class FileFormValidator extends AbstractLaravelValidator {
	
	/*
	 * Validation rules
	*/	
	protected $rules = array(
		'filename'  => 'required|mimes:pdf,bmp,png,jpg',
		'projet_id' => 'integer|required'
	);
	
	/*
	 * Validation messages
	*/
	protected $messages = array(
		'filename.required'  => 'Le type est obligatoire',
		'projet_id.required' => 'L\'id du projet est obligatoire'
	);
	
}