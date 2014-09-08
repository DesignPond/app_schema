<?php namespace Schema\User\Repo;

interface UserInterface {
	
	public function getAll();
	public function find($id);

}

