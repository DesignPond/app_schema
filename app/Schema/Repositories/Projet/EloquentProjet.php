<?php namespace Schema\Service\Form\Projet;

use Illuminate\Database\Eloquent\Model;
use Schema\Repositories\Projet\ProjetFormInterface;

class EloquentProjet implements ProjetFormInterface {

	protected $projet;
	
	// Class expects an Eloquent model
	public function __construct(Model $projet)
	{
		$this->projet = $projet;
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