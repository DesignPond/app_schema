<?php namespace Schema\Repositories\Subtheme;

interface SubthemeInterface {
	
	public function getAll();
	public function find($id);
	public function schemas($id);
    public function subthemes($categorie);
}

