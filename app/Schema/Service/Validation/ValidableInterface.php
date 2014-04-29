<?php namespace Schema\Service\Validation;

interface ValidableInterface {
	
	/*
	 * Add data to validation against
	 * @return \Impl\Service\Validation\ValidableInterface
	*/
		
	public function with(array $input);
	
	/*
	 * Test if validation passes
	 * @return boolean
	*/	
	
	public function passes();
	
	/*
	 * Retrieve validation errors
	 * @return array
	*/	
	
	public function errors();
}