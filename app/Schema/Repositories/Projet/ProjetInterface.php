<?php namespace Schema\Repositories\Projet;

interface ProjetInterface {
	
	public function getAll();
	public function find($id);
	public function getLast($nbr);
	
}

