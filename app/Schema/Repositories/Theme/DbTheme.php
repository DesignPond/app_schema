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
	
	public function themeAndSubthemeByCategory(){
			
		 $themes = Theme::with(array('subtheme'))->get()->toArray();
		 
		 $themesByCategories = array();
		 
		 if( !empty($themes) )
		 {
			 foreach($themes as $theme)
			 {
				 $themesByCategories[$theme['refCategorie']][$theme['id']]['titre'] = $theme['titre'];
				 $subthemes = array();
				 
				 if( isset($theme['subtheme']) )
				 {
					  foreach($theme['subtheme'] as $subtheme)
					  {
						  $subthemes[$subtheme['id']] = $subtheme['titre'];
					  }
					  
					  $themesByCategories[$theme['refCategorie']][$theme['id']]['subtheme'][] = $subthemes;
				 }  
			 }
		 }
		 
		 return $themesByCategories;	 
	}
	
	public function themeWithProjects($id){
    
    	return Theme::where('refCategorie', '=', $id)->with(array('subtheme','projet'))->get()->toArray();
    	
	}
	
	public function subthemes($id){
	
    	$themes = Theme::where('id', '=', 1)->with(array('subtheme'))->get()->first()->toArray();
	 
		return $themes['subtheme'];
    	
	}
	
}

