<?php namespace Schema\Forms;

use Laracasts\Validation\FormValidator;

class EmailValidator extends FormValidator {

    /**
     * Validation rules for sending email
     *
     * @var array
     */
    protected $rules = [
        'email'   => 'required',
        'name'    => 'required',
        'message' => 'required'
    ];


    /**
     * Validation message for sending email
     *
     * @var array
     */
    protected $messages = [
        'email.required'   => 'Le champs email est requis',
        'name.required'    => 'Le champs nom est requis',
        'message.required' => 'Le champs message est requis'
    ];

}