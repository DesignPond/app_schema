<?php namespace Schema\Repositories\Theme;

interface ThemeInterface {
	
	public function getAll();
	public function find($id);
	public function themeAndSubthemeByCategory();
	public function projectsByTheme($id);
	public function subthemes($id);
}

