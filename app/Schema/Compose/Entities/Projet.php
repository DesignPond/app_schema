<?php namespace Schema\Compose\Entities;

use Schema\Common\BaseModel as BaseModel;

class Projet extends BaseModel {

    protected $dates   = array('deleted_at');

	protected $guarded = array('id');

    protected static $rules = array(
        'titre'        => 'required',
        'categorie_id' => 'required',
        'theme_id'     => 'required',
        'subtheme_id'  => 'required'
    );

    /*
     * Validation messages
    */

    protected static $messages = array(
        'titre.required'        => 'Le titre est requis',
        'categorie_id.required' => 'La catégorie principale est requise',
        'theme_id.required'     => 'Le thème est requis',
        'subtheme_id.required'  => 'Le sous thème est requis'
    );

    public function scopeUsed($query)
    {
        return $query->where('deleted','=',0);
    }
	
	public function categorie()
    {
        return $this->belongsTo('\Schema\Categories\Entities\Categorie');
    }
    
	public function boxe()
    {
        return $this->hasMany('\Schema\Compose\Entities\Boxe');
    }
    
	public function arrow()
    {
        return $this->hasMany('\Schema\Compose\Entities\Arrow');
    }
    
    public function theme()
    {
        return $this->belongsTo('\Schema\Themes\Entities\Theme');
    }
    
    public function subtheme()
    {
        return $this->belongsTo('\Schema\Subthemes\Entities\Subtheme');
    }
    
    public function user()
    {
        return $this->belongsTo('\Schema\User\Entities\User');
    }

}
