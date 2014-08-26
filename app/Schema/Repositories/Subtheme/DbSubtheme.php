<?php namespace Schema\Repositories\Subtheme;

use Subtheme;

class DbSubtheme implements SubthemeInterface {
	
	public function __construct(){

	}
	
	public function getAll(){
		
		return Subtheme::all();				
	}
	
	public function find($id){

		return Subtheme::where('id' , '=' , $id)->with(array('categorie','theme'))->get()->first();			
	}	
	
	public function schemas($id){
		
		$schemas = array();
		
		$result  = Subtheme::where('id','=',$id)->get()->first();
		
		if(!empty($result))
		{
			$result  = $result->toArray();
			$schemas = 	explode(',', $result['schemas']);
		}
		
		return $schemas;
		
	}

    public function subthemes($categorie){

        $projets = Subtheme::where('categorie_id','=',$categorie)->with(array('categorie','theme','projets'))->get();

        if(!empty($projets)){

            $listBySubtheme = array();

            foreach($projets as $subtheme)
            {
                if(!$subtheme->projets->isEmpty())
                {
                    $listBySubtheme[$subtheme->id] = $subtheme->projets->toArray();
                }
            }

            return $listBySubtheme;
        }

    }
	
}

