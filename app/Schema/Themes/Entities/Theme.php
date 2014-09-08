<?php namespace Schema\Themes\Entities;

use Schema\Common\BaseModel as BaseModel;

class Theme extends BaseModel {

	protected $guarded = array('id');
	public $timestamps = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'titre'        => 'required',
        'categorie_id' => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'titre.required'        => 'Le champs titre est requis',
        'categorie_id.required' => 'La categorie est requise'
    );
		
	public function categorie()
    {
        return $this->belongsTo('\Schema\Categories\Entities\Categorie');
    }

    public function subthemes()
    {
        return $this->hasMany('\Schema\Subthemes\Entities\Subtheme');
    }

}
