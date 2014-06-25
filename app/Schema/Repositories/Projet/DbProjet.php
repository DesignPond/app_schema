<?php namespace Schema\Repositories\Projet;

use Illuminate\Database\Eloquent\Model;
use Schema\Repositories\Projet\ProjetInterface;
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
    	
    	return $this->projet->where('theme_id', '=', $refTheme)->where('status','=','actif')->with(array('user'))->orderBy('id', 'DESC')->get()->toArray();
	}
	
	public function getListById($array){
	
		return $this->projet->whereIn('id', $array )->orderBy('id', 'DESC')->get();
	}
	
	public function projectsByUser($user , $nbr = NULL){
		
		if($nbr)
		{
			return $this->projet->where('user_id', '=', $user)->with( array('user','categorie','theme') )->orderBy('id', 'DESC')->take($nbr)->get()->toArray();
		}
		
		return $this->projet->where('user_id', '=', $user)->with( array('user','categorie','theme') )->orderBy('id', 'DESC')->get()->toArray();
		
	}

	/*
	 * Applications functions
	*/
	
	public function isUsers($projet,$user){
		
		$app = $this->projet->find($projet);
		
		if($app->user_id == $user){
			return TRUE;
		}
		
		return FALSE;		
	}
	
	public function appByProjet($id){
	
		return $this->projet->where('id', '=', $id)->with('boxe','arrow','user','theme')->get()->first()->toArray();
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
		
		return $this->projet->with( array('theme','user') )->get();		
	}
	
	public function getAllList(){
	
		return $this->projet->orderBy('id')->lists('titre', 'id');	
	}
		
	public function find($id){
		
		return $this->projet->with( array('user','theme',) )->findOrFail($id);			
	}
	
	public function getLastId(){
		
		$projet = $this->projet->orderBy('id', 'DESC')->take(1)->get()->first()->toArray();
		
		return $projet['id'];					
	}
	
	public function create(array $data){
		
		$custom = new \Custom;
		
		// Create the article
		$projet = $this->projet->create(array(
			'titre'       => $data['titre'],
			'description' => $data['description'],
			'user_id'     => $data['user_id'],
			'categorie_id'=> $data['categorie_id'],
			'theme_id'    => $data['theme_id'],
			'type'        => $data['type'],
			'slug'        => $custom->makeSlug($data['titre'])
			//'subtheme_id' => $data['subtheme_id']
		));
		
		if( ! $projet )
		{
			return false;
		}
		
		return true;
	}
	
	public function update(array $data){
		
		$projet = $this->projet->find($data['id']);
		
		if( ! $projet )
		{
			return false;
		}
		
		if( isset($data['titre']) ){
			$projet->titre  = $data['titre'];
		}
		
		if( isset($data['description']) ){
			$projet->description  = $data['description'];
		}
		
		if( isset($data['user_id']) ){
			$projet->user_id  = $data['user_id'];
		}
		
		if( isset($data['categorie_id']) ){
			$projet->categorie_id  = $data['categorie_id'];
		}
		
		if( isset($data['theme_id']) ){
			$projet->theme_id  = $data['theme_id'];
		}

		//$projet->subtheme_id  = $data['subtheme_id'];
		$projet->save();	
		
		return true;
	}
	
	public function delete($id){
	
		$projet = $this->projet->find($id);

		return $projet->delete();		
	}
	
}

