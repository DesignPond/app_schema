<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
/*        $user_projets = array();

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
        );*/

        return View::make('home');
	}

    public function contact(){

        $data = array(
            'titre'     => 'Contact',
            'soustitre' => 'Une question? Une demande?'
        );

        return View::make('contact')->with( $data );
    }

}
