<?php namespace Schema\User\Repo;

use Illuminate\Database\Eloquent\Model;
use Schema\Compose\Repo\ProjetInterface;
use Illuminate\Database\Eloquent\Model as M;

class DbUser implements UserInterface {

    public function __construct(M $user){

        $this->user = $user;
    }
	
	public function getAll(){
		
		return $this->user->all();
	}
	
	public function find($id){

		return $this->user->with(array('roles'))->findOrFail($id);
				
	}
}

