<?php namespace Schema\Repositories;

use Projets;

class DbSchemaRepository implements SchemaRepositoryInterface{
	
	public function getAll(){
		
		return Projets::all();
			
	}
	
	public function find($id){
		
		return Projets::findOrFail($id);
				
	}
}