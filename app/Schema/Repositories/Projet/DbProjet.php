<?php namespace Schema\Repositories\Projet;

use Illuminate\Database\Eloquent\Model;
use Schema\Repositories\Projet\ProjetInterface;
use Illuminate\Database\Eloquent\Model as M;

use Projet;

class DbProjet implements ProjetInterface {

	protected $projet;
	
	// Class expects an Eloquent model
	public function __construct(M $projet)
	{
		$this->projet = $projet;
	}
	
	public function getAll(){
		
		return $this->projet->with( array('theme','subtheme','user') )->get();
			
	}
	
	public function find($id){
		
		return $this->projet->with( array('user') )->findOrFail($id)->toArray();
				
	}
	
	public function getLast($nbr){
	
		return $this->projet->with( array('theme','subtheme','user') )->take($nbr)->skip(0)->get()->toArray();
		
	}
		
	public function projectsByTheme($refTheme){
    	
    	return $this->projet->where('refTheme', '=', $refTheme)->with(array('user'))->get()->toArray();
	}
	
	public function create(array $data){
	
		// Create the article
		$projet = $this->projet->create(array(
			'titre'       => $data['titre'],
			'description' => $data['description'],
			'user_id'     => $data['user_id'],
			'categorie'   => $data['categorie'],
			'refTheme'    => $data['refTheme'],
			'refSubtheme' => $data['refSubtheme']
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

		$projet->titre       = $data['titre'];
		$projet->description = $data['description'];
		$projet->user_id     = $data['user_id'];
		$projet->categorie   = $data['categorie'];
		$projet->refTheme    = $data['refTheme'];
		$projet->refSubtheme = $data['refSubtheme'];
		$projet->save();	
		
		return true;
	}
	
}

