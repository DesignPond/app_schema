<?php namespace Schema\Compose\Repo;

use Illuminate\Database\Eloquent\Model;
use Schema\Compose\Repo\BoxeInterface;
use Illuminate\Database\Eloquent\Model as M;

class DbBoxe implements BoxeInterface {

	protected $boxe;
	
	// Class expects an Eloquent model
	public function __construct(M $boxe)
	{
        $this->boxe = $boxe;
	}
	
	/*
	 * CRUD functions
	*/
		
	public function getAll(){
		
		return $this->boxe->all();
	}

    public function getByProject($projet){

        return  $this->boxe->where('projet_id', '=', $projet)->get();
    }
		
	public function find($id){
		
		return $this->boxe->findOrFail($id);
	}
	
	public function create(array $data){

        // Create the article
        $boxe = $this->boxe->create($data);

		if( ! $boxe )
		{
			return false;
		}
		
		return $boxe;
	}
	
	public function update(array $data){
		
		$boxe = $this->boxe->find($data['id']);

		if( ! $boxe )
		{
			return false;
		}

        $boxe->topCoord_node  = $data['topCoord_node'];
        $boxe->leftCoord_node = $data['leftCoord_node'];
        $boxe->width_node     = $data['width_node'];
        $boxe->height_node    = $data['height_node'];
        $boxe->couleurBg_node = $data['couleurBg_node'];
        $boxe->text           = $data['text'];
        $boxe->borderBg_node  = $data['borderBg_node'];
        $boxe->zindex         = $data['zindex'];
        $boxe->no_node        = $data['no_node'];

        $boxe->save();
		
		return $boxe;
	}
	
	public function delete($id){
	
		$boxe = $this->boxe->find($id);

		return $boxe->delete();		
	}
	
}

