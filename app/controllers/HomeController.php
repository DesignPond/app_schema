<?php

use  Schema\Compose\Repo\ProjetInterface;
use Schema\Forms\EmailValidator as EmailValidator;
use Laracasts\Validation\FormValidationException;

class HomeController extends BaseController {

    protected $projet;

    protected $emailValidator;

    public function __construct(ProjetInterface $projet, EmailValidator $emailValidator){

        $this->projet  = $projet;

        $this->emailValidator = $emailValidator;

    }

	public function index()
	{

        $projets  = $this->projet->getLast(3);

        if(Auth::check())
        {
            $user = Auth::user()->id;
            $user_projets = $this->projet->projectsByUser($user,3);
        }

        $data = array(
            'titre'        => 'Accueil',
            'soustitre'    => 'Schémas des procédures civiles',
            'projets'      => $projets ,
            'user_projets' => $user_projets
        );

        return View::make('home')->with($data);
	}

    /**
     * Book schemas
     *
     * @return
     */
    public function book($id)
    {
        $projet  = $this->projet->find($id);

        return View::make('book')->with( array('projet' => $projet ) );
    }

    public function contact(){

        $data = array(
            'titre'     => 'Contact',
            'soustitre' => 'Une question? Une demande?'
        );

        return View::make('contact')->with( $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function sendemail()
    {
        try
        {
            $this->emailValidator->validate(Input::all());

            $fromEmail = Input::get('email');
            $fromName  = Input::get('name');
            $data      = Input::get('message');

            $subject =  'Demande de rensignement depuis www.droitenschema.ch';

            $toEmail = 'cindy.leschaud@gmail.com';
            $toName  = 'Cindy Leschaud';

            Mail::send('emails.contact', array('data' => $data) , function($message) use ($toEmail, $toName, $fromEmail, $fromName, $subject )
            {
                $message->to($toEmail, $toName);
                $message->from($fromEmail, $fromName);
                $message->subject($subject);
            });

            return Redirect::back()->with('success', 'Merci pour votre message!');

        }
        catch (FormValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

    }

}
