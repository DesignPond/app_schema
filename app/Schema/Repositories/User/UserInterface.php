<?php namespace Schema\Repositories\User;

interface UserInterface {
	
	public function getAll();
	public function find($id);

}

