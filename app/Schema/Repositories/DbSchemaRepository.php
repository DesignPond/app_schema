<?php namespace Schema\Repositories;

use Schemas;

class DbSchemaRepository implements SchemaRepositoryInterface{
	
	public function getAll(){
		
		return Schemas::all();
			
	}
	
	public function find($id){
		
		return Schemas::findOrFail($id);
				
	}
}