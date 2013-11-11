<?php namespace Schema\Repositories\Projet;

use Projet;
use Theme;

class DbProjet implements ProjetInterface {
	
	
	public function __construct(){
		
	}
	
	public function getAll(){
		
		return Projet::with( array('theme','subtheme','user') )->get();
			
	}
	
	public function find($id){
		
		return Projet::with( array('user') )->findOrFail($id)->toArray();
				
	}
	
	public function getLast($nbr){
	
		return Projet::with( array('theme','subtheme','user') )->take($nbr)->skip(0)->get()->toArray();
		
	}
		
	public function projectsByTheme($refTheme){
    	
    	return Projet::where('refTheme', '=', $refTheme)->with(array('user'))->get()->toArray();
	}
	
}

