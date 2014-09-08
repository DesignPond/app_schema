<?php namespace Schema\Themes\Repo;

interface ThemeInterface {
	
	public function getAll();
	public function find($id);

	public function droplist_theme();
	public function drop_theme_by_categorie($id);

}

