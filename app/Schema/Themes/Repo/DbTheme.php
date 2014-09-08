<?php namespace Schema\Themes\Repo;

use Illuminate\Database\Eloquent\Model;
use Schema\Themes\Repo\ThemeInterface;
use Illuminate\Database\Eloquent\Model as M;

class DbTheme implements ThemeInterface {
	
	public function __construct(M $theme){

        $this->theme = $theme;
    }
	
	public function getAll(){
		
		return $this->theme->all();
	}
	
	public function find($id){

		return  $this->theme->where('id','=',$id)->with(array('subthemes'))->get();
				
	}
	
	public function droplist_theme(){

        $themes = $this->theme->lists('titre','id');

        if(!empty($themes))
        {
            return array('' => 'Choix') + $themes;
        }

        return $themes;
	}
	
	public function drop_theme_by_categorie($id){
		
		$themeList = $this->theme->where('categorie_id', '=', $id)->get();
		$themes    = $themeList->lists('titre','id');

        if(!empty($themes))
        {
            return array('' => 'Choix') + $themes;
        }

		return $themes;
	}
	
}

