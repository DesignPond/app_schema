<?php namespace Schema\User\Entities;

use Schema\Common\BaseModel as BaseModel;

class Role extends BaseModel{

    /**
     * Set timestamps off
     */
    public $timestamps = false;

    /**
     * Get users with a certain role
     */
    public function users()
    {
        return $this->belongsToMany('\Schema\User\Entities\User', 'users_roles');
    }
}