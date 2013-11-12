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
			
		 $themes    = Theme::get()->toArray();
		 $subthemes = Subtheme::get()->toArray();
 
		 $themesByCategories = array();
		 
		 if( !empty($themes) )
		 {
			 foreach($themes as $theme)
			 {
				 $themesByCategories[$theme['categorie_id']][$theme['id']]['titre'] = $theme['titre'];
				 
				 $sub = array();
				 
				 if( !empty($subthemes) )
				 {
					  foreach($subthemes as $subtheme)
					  {
						  $sub[$subtheme['id']] = $subtheme['titre'];
					  }
					  
					  $themesByCategories[$theme['categorie_id']][$theme['id']]['subtheme'][] = $sub;
				 }  
			 }
		 }
		 
		 return $themesByCategories;	 
	}
	
	public function subthemes($id){
	
    	$subthemes = Subtheme::where('theme_id', '=', $id)->get()->lists('titre', 'id');
		
		return $subthemes;
    	
	}
	
	public function droplist_theme(){
		
		return Theme::lists('titre','id');
	}
	
	public function droplist_subtheme(){
	
		return Subtheme::lists('titre','id');
	}
	
	public function drop_theme_by_categorie($id){
		
		$themeList = Theme::where('categorie_id', '=', $id)->get();
		$themes    = $themeList->lists('titre','id');
		
		return $themes;
	}
	
	public function drop_subtheme_by_categorie($id){
		
		$subthemeList = Subtheme::where('theme_id', '=', $id)->get();
		$subthemes    = $subthemeList->lists('titre','id');
		
		return $subthemes;
	}
	
}

