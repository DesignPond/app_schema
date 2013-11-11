<?php namespace Schema\Service\Form\Projet;

use  Schema\Service\Validation\ValidableInterface;
use  Schema\Repositories\Projet\ProjetFormInterface;

class ProjetForm {
	
	/*
	* Form Data
	*/
	protected $data;
	
	/*
	* Validator
	*/
	protected $validator;
	
	/*
	* projet repository
	*/
	protected $projet;
	
	public function __construct( ValidableInterface $validator, ProjetFormInterface $projet )
	{
		$this->validator = $validator;
		$this->projet    = $projet;
	}
	
	/*
	* Create an new projet
	*/
	public function save(array $input){
	
		if( ! $this->valid($input) )
		{
			return false;
		}
		
		return $this->projet->create($input);
	}
	
	/*
	* Update an existing projet
	*/
	public function update(array $input){
	
		if( ! $this->valid($input) )
		{
			return false;
		}
		
		return $this->projet->update($input);
	}
	
	/*
	* Return any validation errors
	*/
	public function errors()
	{
		return $this->validator->errors();
	}

	/*
	* Test if form validator passes
	*/
	protected function valid(array $input)
	{
		return $this->validator->with($input)->passes();
	}
	
}

