<?php namespace Schema\Subthemes\Entities;

use Schema\Common\BaseModel as BaseModel;

class Subtheme extends BaseModel {

	protected $guarded = array('id');
	public $timestamps = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'titre'        => 'required',
        'categorie_id' => 'required',
        'theme_id'     => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'titre.required'        => 'Le champs titre est requis',
        'categorie_id.required' => 'La categorie est requise',
        'theme_id.required'     => 'Le theme est requis'
    );
	
	public function categorie()
    {
        return $this->belongsTo('\Schema\Categories\Entities\Categorie');
    }
    
	public function theme()
    {
        return $this->belongsTo('\Schema\Themes\Entities\Theme', 'theme_id', 'id');
    }

    public function projets()
    {
        return $this->hasMany('\Schema\Compose\Entities\Projet', 'subtheme_id', 'id');
    }
	
}
