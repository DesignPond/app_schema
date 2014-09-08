<?php namespace Schema\Compose\Repo;

use Illuminate\Database\Eloquent\Model;
use Schema\Compose\Repo\ArrowInterface;
use Illuminate\Database\Eloquent\Model as M;

class DbArrow implements ArrowInterface {

	protected $arrow;
	
	// Class expects an Eloquent model
	public function __construct(M $arrow)
	{
		$this->arrow = $arrow;
	}

	/*
	 * CRUD functions
	*/

    public function getAll(){

        return $this->arrow->all();
    }

    public function getByProject($projet){

        return  $this->arrow->where('projet_id', '=', $projet)->get();
    }
		
	public function find($id){
		
		return $this->arrow->findOrFail($id);
	}
	
	public function create(array $data){

        $arrow = $this->arrow->create($data);
		
		if( ! $arrow )
		{
			return false;
		}
		
		return $arrow;
	}
	
	public function update(array $data){
		
		$arrow = $this->arrow->find($data['id']);
		
		if( ! $arrow )
		{
			return false;
		}

        $arrow->topCoord_arrow  = $data['topCoord_arrow'];
        $arrow->leftCoord_arrow = $data['leftCoord_arrow'];
        $arrow->couleurBg_arrow = $data['couleurBg_arrow'];
        $arrow->no_arrow        = $data['no_arrow'];
        $arrow->position        = $data['position'];

		$arrow->save();	
		
		return $arrow;
	}
	
	public function delete($id){
	
		$arrow = $this->arrow->find($id);

		return $arrow->delete();		
	}
	
}

