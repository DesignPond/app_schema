<?php namespace Schema\Repositories\Theme;

use Theme;

class DbTheme implements ThemeInterface {
	
	public function __construct(){

	}
	
	public function getAll(){
		
		return Theme::all();
				
	}
	
	public function find($id){

		return Theme::findOrFail($id);
				
	}
	
}

