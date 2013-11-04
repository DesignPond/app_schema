<?php namespace Schema\Repositories;

class DbSchemaRepository implements SchemaRepositoryInterface{
	
	use Schema;

	public function getAll(){
		
		return Schema::all();
			
	}
	
	public function find($id){
		
		return Schema::findOrFail($id);
				
	}
}