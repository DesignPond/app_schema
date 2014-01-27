<?php namespace Schema\Repositories\Projet;

interface ProjetInterface {
	
	public function getAll();
	public function getAllList();
	public function find($id);
	public function findO($id);
	public function getLast($nbr);
	public function getLastId();
	public function projectsByTheme($id);
	public function projectsByUser($user,$nbr);
	public function appByProjet($id);
	
	public function isUsers($projet,$user);
	
	public function heightProjet($id);
	
	public function create(array $data);
	public function update(array $data);
	
}

