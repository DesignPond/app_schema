<?php namespace Schema\Categories\Repo;

interface CategorieInterface {
	
	public function getAll();
	public function find($id);
	public function droplist();
	
}

