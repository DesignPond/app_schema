<?php namespace Schema\Subthemes\Repo;

interface SubthemeInterface {
	
	public function getAll();
	public function find($id);

    public function create(array $data);
    public function update(array $data);
    public function delete($id);

    public function subthemes($id);
	public function schemas($id);
    public function themeAndSubthemeByCategory($categorie);

    public function droplist_subtheme();
    public function drop_subtheme_by_categorie($id);
}

