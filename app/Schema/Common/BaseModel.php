<?php namespace Schema\Common;

use Laracasts\Commander\Events\EventGenerator;
use \Eloquent;

class BaseModel extends \Eloquent{

    use EventGenerator;

	/**
	 *  Boot into save hook of model
	 */
	public static function boot(){
		
		parent::boot();
		
		static::saving(function($model)
		{
			return $model->validate();			
		});

	}
	
	/**
	 *  Validate the attributes from model
	 */
	public function validate(){
	
		$validator = \Validator::make($this->getAttributes() , static::$rules , static::$messages);

		if( $validator->fails() )
		{
            throw new \Schema\Exceptions\FormValidationException('Validation failed', $validator->messages() );
		}
	
		return true;	
	}

}