<?php namespace Droit\Repo\File;

use Droit\Repo\File\FileInterface;
use Files as M;

class FileEloquent implements FileInterface {

	protected $file;
	
	// Class expects an Eloquent model
	public function __construct(M $file)
	{
		$this->file = $file;	

	}
	
	/*
	 * CRUD functions
	*/
		
	public function getAllForEvent($event){
		
		return $this->file->where('event_id','=', $event)->get();		
	}
		
	public function find($id){
		
		return $this->file->with( array('prices','eventsoptions','files') )->findOrFail($id);			
	}
	
	public function create(array $data){

		$file = $this->file->create(array(
			'filename'  => $data['filename'], 
			'typeFile'  => $data['typeFile'],
			'event_id'  => $data['event_id']
		));
		
		if( ! $file )
		{
			return false;
		}
		
		return true;

	}
	
	public function update(array $data){
		
		$file = $this->file->findOrFail($data['id']);	
		
		if( ! $file )
		{	
			return false;
		}
		
		$file->filename  = $data['filename'];
		$file->typeFile  = $data['typeFile'];
		$file->event_id  = $data['event_id'];
		
		$file->save();	
		
		return true;
	}
	
}

