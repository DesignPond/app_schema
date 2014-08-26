<?php namespace Schema\Repositories\Subtheme;

interface SubthemeInterface {
	
	public function getAll();
	public function find($id);

    public function create(array $data);
    public function update(array $data);
    public function delete($id);

	public function schemas($id);
    public function subthemes($categorie);
}

