<?php namespace Schema\Subthemes\Repo;

use Illuminate\Database\Eloquent\Model;
use Schema\Subthemes\Repo\SubthemeInterface;
use Illuminate\Database\Eloquent\Model as M;


class DbSubtheme implements SubthemeInterface {
	
	public function __construct(M $subtheme){

        $this->subtheme = $subtheme;
	}
	
	public function getAll(){
		
		return $this->subtheme->all();
	}
	
	public function find($id){

		return $this->subtheme->where('id' , '=' , $id)->with(array('categorie','theme'))->get()->first();
	}	
	
	public function schemas($id){
		
		$schemas = array();
		
		$result  = $this->subtheme->where('id','=',$id)->get()->first();
		
		if(!empty($result))
		{
			$result  = $result->toArray();
			$schemas = 	explode(',', $result['schemas']);
		}
		
		return $schemas;
		
	}

    public function droplist_subtheme(){

        $subthemes = $this->subtheme->lists('titre','id');

        if(!empty($subthemes))
        {
            return array(0 => 'Choix') + $subthemes;
        }

        return $subthemes;
    }

    public function drop_subtheme_by_categorie($id){

        $subthemeList = $this->subtheme->where('theme_id', '=', $id)->get();
        $subthemes    = $subthemeList->lists('titre','id');

        if(!empty($subthemes))
        {
            return array(0 => 'Choix') + $subthemes;
        }

        return $subthemes;
    }


    public function themeAndSubthemeByCategory($categorie){

        $subthemes = $this->subtheme->where('categorie_id', '=', $categorie)->get()->toArray();

        $subthemeByTheme = array();

        if( !empty($subthemes) )
        {
            foreach($subthemes as $subtheme)
            {
                $subthemeByTheme[$subtheme['theme_id']][] = $subtheme;
            }
        }

        return $subthemeByTheme;
    }


    public function subthemes($categorie){

        $projets = $this->subtheme->where('categorie_id','=',$categorie)->with(array('categorie','theme','projets' => function($query)
        {
            $query->where('projets.deleted','=',0);
            $query->orderBy('projets.rang', 'DESC');

        }))->get();

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
        $subtheme = $this->subtheme->create(array(
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

        $subtheme = $this->subtheme->find($id);

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

        $subtheme = $this->subtheme->find($id);

        return $subtheme->delete();
    }
	
}

