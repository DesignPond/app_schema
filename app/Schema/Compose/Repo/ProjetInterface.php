<?php namespace Schema\Compose\Repo;

interface ProjetInterface {
	
	public function getAll();
	public function getAllList();
	public function getListById($array);
	
	public function find($id);
	
	public function getLast($nbr);
	
	public function projectsByTheme($id);
	public function projectsByUser($user,$nbr);
    public function sortProjectByTheme($projets);
    public function getByStatus($projets);
    public function arrangeByStatus($projets);

	public function appByProjet($id);
	
	public function isUsers($projet,$user);
    public function isVisible($id);
	
	public function heightProjet($id);
	
	public function create(array $data);
	public function update(array $data);
	
	public function delete($id);
	
}

