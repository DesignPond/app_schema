<?php namespace Schema\Repositories\Theme;

interface ThemeInterface {
	
	public function getAll();
	public function find($id);
	public function themeAndSubthemeByCategory();
	public function subthemes($id);
	public function droplist_theme();
	public function droplist_subtheme();
	public function drop_theme_by_categorie($id);
	public function drop_subtheme_by_categorie($id);	
}

