<?php namespace Schema\Repositories\User;

use User;

class DbUser implements UserInterface {
	
	public function __construct(){

	}
	
	public function getAll(){
		
		return User::all();				
	}
	
	public function find($id){

		return User::findOrFail($id);
				
	}
	
	
}

