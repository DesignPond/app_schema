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
                else
                {
                    $listBySubtheme[$subtheme->id] = array();
                }
            }

            return $listBySubtheme;
        }

    }

    public function create(array $data){

        // Create the article
        $subtheme = Subtheme::create(array(
            'titre'       => $data['titre'],
            'categorie_id'=> $data['categorie_id'],
            'theme_id'    => $data['theme_id']
        ));

        if( ! $subtheme )
        {
            return false;
        }

        return $subtheme;
    }

    public function update(array $data){

        $subtheme = Subtheme::find($id);

        if( ! $subtheme )
        {
            return false;
        }

        $subtheme->titre        = $data['titre'];
        $subtheme->categorie_id = $data['categorie_id'];
        $subtheme->theme_id     = $data['theme_id'];

        $subtheme->save();

        return $subtheme;
    }

    public function delete($id){

        $subtheme = Subtheme::find($id);

        return $subtheme->delete();
    }
	
}

