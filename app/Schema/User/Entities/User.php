<?php namespace Schema\User\Entities;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Schema\Common\BaseModel as BaseModel;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     * Validation rules
     *
     * @var array
     */
    protected static $rules = array(
        'email'    => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected static $messages = array(
        'email.required'        => 'Le champs email est requis'
    );

    /**
     * Get the roles a user has
     */
    public function roles()
    {
        return $this->belongsToMany('\Schema\User\Entities\Role', 'users_roles');
    }

    /**
     * Find out if user has a specific role
     *
     * $return boolean
     */
    public function hasRole($check)
    {
        return in_array($check, array_fetch($this->roles->toArray(), 'name'));
    }

    /**
     * Find out if User is an employee, based on if has any roles
     *
     * @return boolean
     */
    public function isEmployee()
    {
        $roles = $this->roles->toArray();
        return !empty($roles);
    }

    /**
     * Get key in array with corresponding value
     *
     * @return int
     */
    private function getIdInArray($array, $term)
    {
        foreach ($array as $key => $value) {
            if ($value == $term) {
                return $key;
            }
        }

        throw new UnexpectedValueException;
    }

    /**
     * Add roles to user to make them a concierge
     */
    public function makeEmployee($title)
    {
        $assigned_roles = array();

        $roles = array_fetch(\Schema\User\Entities\Role::all()->toArray(), 'name');

        switch ($title) {
            case 'admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'validate');
                $assigned_roles[] = $this->getIdInArray($roles, 'assign');
            case 'editor':
                $assigned_roles[] = $this->getIdInArray($roles, 'submission');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete');
                break;
            default:
                throw new \Exception("The employee status entered does not exist");
        }

        $this->roles()->attach($assigned_roles);
    }

}
