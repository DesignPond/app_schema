<?php namespace Schema\Categories\Entities;

use Schema\Common\BaseModel as BaseModel;

class Categorie extends BaseModel {

	protected $guarded = array('id');
	public $timestamps = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'titre' => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'titre.required' => 'Le champs titre est requis'
    );
	
	public function theme()
    {
        return $this->hasMany('\Schema\Themes\Entities\Theme');
    }
   
	public function subtheme()
    {
        return $this->hasMany('\Schema\Subthemes\Entities\Subtheme');
    }   

    
}
