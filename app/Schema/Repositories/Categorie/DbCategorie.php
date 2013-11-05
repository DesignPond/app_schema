<?php namespace Schema\Repositories\Categorie;

use Categorie;

class DbCategorie implements CategorieInterface {
	
	public function __construct(){

	}
	
	public function getAll(){
		
		return Categorie::all();
				
	}
	
	public function find($id){

		return Categorie::findOrFail($id);
				
	}
	
}

