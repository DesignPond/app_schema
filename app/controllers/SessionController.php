<?php

class SessionController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function auth()
	{
        return View::make('session.login');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function login()
	{
        $user = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password')
        );
        
        if (Auth::attempt($user)) {
            return Redirect::intended('schemas')
                ->with('flash_notice', 'You are successfully logged in.');
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::to('login')
            ->with('flash_error', 'Your email/password combination was incorrect.')
            ->withInput();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function logout()
	{
        Auth::logout();
        return Redirect::intended('schemas');
        
	}

}
