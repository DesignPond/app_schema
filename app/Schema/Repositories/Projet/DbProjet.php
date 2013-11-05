<?php namespace Schema\Repositories\Projet;

use Projet;

class DbProjet implements ProjetInterface {
	
	
	public function __construct(){
		
	}
	
	public function getAll(){
		
		return Projet::all();
			
	}
	
	public function find($id){
		
		return Projet::findOrFail($id);
				
	}
	
}

