<?php namespace Schema\Compose\Repo;

use Illuminate\Database\Eloquent\Model;
use Schema\Compose\Repo\ProjetInterface;
use Illuminate\Database\Eloquent\Model as M;

class DbProjet implements ProjetInterface {

	protected $projet;
	
	// Class expects an Eloquent model
	public function __construct(M $projet)
	{
		$this->projet = $projet;	
	}
	
	public function getLast($nbr){
	
		return $this->projet->with( array('user','theme') )->where('status','=','actif')->orderBy('id', 'DESC')->take($nbr)->get()->toArray();
	}
		
	public function projectsByTheme($refTheme){
    	
    	return $this->projet->where('theme_id', '=', $refTheme)->where('status','=','actif')->orderBy('id', 'DESC')->get()->toArray();
	}
	
	public function getListById($array){
	
		return $this->projet->whereIn('id', $array )->orderBy('id', 'DESC')->get();
	}

    public function getByStatus($status = null){

        $projets = $this->projet->with( array('user','categorie','theme') )->where('type','=','app');

        if($status)
        {
            $projets = $projets->whereIn('status', $status);
        }

        return $projets->orderBy('theme_id', 'ASC')->get()->toArray();
    }
	
	public function projectsByUser($user , $nbr = NULL){

        $projets = $this->projet->where('user_id', '=', $user)->with( array('user','categorie','theme') )->orderBy('id', 'DESC');

		if($nbr)
		{
            $projets = $projets->take($nbr);
		}
		
		return $projets->get()->toArray();
		
	}

    /**
     * Sort project for user by theme
     *
     * @return array
     */
    public function sortProjectByTheme($projets)
    {
        $themes  = array();
        $sorting = array();

        if(!empty($projets))
        {
            foreach($projets as $projet)
            {
                if( isset($projet['theme']['titre']) )
                {
                    $themes[$projet['theme']['id']] = $projet['theme']['titre'];
                    $sorting[$projet['categorie']['titre']][$projet['theme']['titre']][] = $projet;
                }
            }
        }

        return array( $themes, $sorting);
    }

    public function arrangeByStatus($projets){

        if(!empty($projets))
        {
            foreach($projets as $projet)
            {
                $sorting[$projet['status']][] = $projet;
            }
        }

        return $sorting;
    }

	/*
	 * Applications functions
	*/
	
	public function isUsers($projet,$user){
		
		$app = $this->projet->find($projet);
		
		if($app->user_id == $user)
        {
			return TRUE;
		}
		
		return FALSE;		
	}
	
	public function appByProjet($id){
	
		return $this->projet->where('id', '=', $id)->with('boxe','arrow','user','theme','subtheme')->get()->first()->toArray();
	}
	
	public function heightProjet($id){
		
		$app = $this->appByProjet($id);
		
		$contentHeight = array();

        if(!empty($app['boxe']))
        {
        	foreach($app['boxe'] as $box)
        	{
        		$contentHeight[] = $box['topCoord_node'] + $box['height_node'];
        	}                  
        }
        		
        if(!empty($app['arrow']))
        {
        	foreach($app['arrow'] as $arr)
        	{
        		$contentHeight[] = $arr['topCoord_arrow'] + 15;	
        	}                  
        }
        
        if(!empty($contentHeight)){
	        return max($contentHeight) + 40;
        }
        else
        {
	        return 150;
        }
		
	}
	
	/*
	 * CRUD functions
	*/
		
	public function getAll(){
		
		return $this->projet->with( array('theme','subtheme','user') )->get();
	}
	
	public function getAllList(){
	
		return $this->projet->orderBy('id')->lists('titre', 'id');	
	}
		
	public function find($id){
		
		return $this->projet->with( array('user','theme',) )->findOrFail($id);			
	}
	
	public function create(array $data){
		
		$custom = new \Custom;

		// Create the article
		$projet = $this->projet->create(array(

		));
		
		if( ! $projet )
		{
			return false;
		}
		
		return $projet;
	}
	
	public function update(array $data){
		
		$projet = $this->projet->find($data['id']);
		
		if( ! $projet )
		{
			return false;
		}

		$projet->titre         = $data['titre'];
        $projet->categorie_id  = $data['categorie_id'];
        $projet->theme_id      = $data['theme_id'];
        $projet->subtheme_id   = $data['subtheme_id'];

		if( isset($data['description']) ){
			$projet->description  = $data['description'];
		}
		
		if( isset($data['user_id']) ){
			$projet->user_id  = $data['user_id'];
		}

		$projet->save();	
		
		return $projet;
	}
	
	public function delete($id){
	
		$projet = $this->projet->find($id);

		return $projet->delete();		
	}
	
}

