<?php namespace Schema\Repositories\Projet;

interface ProjetInterface {
	
	public function getAll();
	public function find($id);
	public function getLast($nbr);
	public function projectsByTheme($id);
	public function projectsByUser($user,$nbr);
	public function appByProjet($id);
	
	public function create(array $data);
	public function update(array $data);

}

