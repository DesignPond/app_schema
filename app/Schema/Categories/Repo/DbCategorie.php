<?php namespace Schema\Categories\Repo;

use Schema\Categories\Repo\CategorieInterface;
use Illuminate\Database\Eloquent\Model as M;

class DbCategorie implements CategorieInterface {
	
	protected $category;
	
	public function __construct(M $category){
	
		$this->category = $category;
	}
	
	public function getAll(){
		
		return $this->category->with(array('theme'))->get();				
	}
	
	public function find($id){

		return $this->category->where('id','=',$id)->with(array('theme'))->get()->first();
	}
	
	public function droplist(){

        $categories = $this->category->lists('titre','id');

        if(!empty($categories))
        {
            return array('' => 'Choix') + $categories;
        }

        return $categories;

	}
	
}

