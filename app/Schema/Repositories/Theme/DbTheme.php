<?php namespace Schema\Repositories\Theme;

use Theme;
use Subtheme;

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
	
	public function projectsByTheme($id){
    
    	return Theme::where('id', '=', $id)->with(array('projet'))->get()->toArray();
    	
	}
	
	public function subthemes($id){
	
    	$subthemes = Subtheme::where('refTheme', '=', $id)->get()->lists('titre', 'id');
		
		return $subthemes;
    	
	}
	
}

