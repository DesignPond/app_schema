<?php namespace Schema\Compose\Repo;

interface BoxeInterface {
	
	public function getAll();
	public function find($id);
	
	public function create(array $data);
	public function update(array $data);
	
	public function delete($id);
	
}

