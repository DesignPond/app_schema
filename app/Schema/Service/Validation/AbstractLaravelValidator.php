<?php namespace Schema\Service\Validation;


abstract class AbstractLaravelValidator implements ValidableInterface {

	/*
	 * Validator
	*/
	
	protected $validator;
	
	/*
	 * Validator data key => value array
	*/
	
	protected $data = array();
	
	/*
	 * Validator errors
	*/
	
	protected $errors = array();
	
	/*
	* Validation rules
	*/
	
	protected $rules = array();
	
	/*
	* Custom validation messages
	*/
	
	protected $messages = array();
	
	public function __construct()
	{
	}
	
	/**
	 * Set data to validate
	 *
	* @return \Impl\Service\Validation\AbstractLaravelValidation
	*/
	public function with(array $data)
	{
		$this->data = $data;
	
		return $this;
	}
	
	/**
	* Validation passes or fails
	*
	* @return Boolean
	*/
	public function passes()
	{
		$validator = \Validator::make(
			$this->data,
			$this->rules,
			$this->messages
		);
	
		if( $validator->fails() )
		{
		 	$this->errors = $validator->messages();
		 	return false;
		}
	
		return true;
	}
	
	/*
	
	*/
	public function errors()
	{
		return $this->errors;
	}
	
}