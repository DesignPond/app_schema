<?php namespace Schema\Repositories;

interface SchemaRepositoryInterface {

	public function getAll();
	public function find($id);
	
}

