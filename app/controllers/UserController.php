<?php

use  Schema\Repositories\User\UserInterface;
use  Schema\Repositories\Projet\ProjetInterface;

class UserController extends BaseController {

	protected $user;
	
	protected $projet;
	
	public function __construct(UserInterface $user , ProjetInterface $projet){
		
		$this->user = $user;
		
		$this->projet = $projet;

	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('users.home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{             
        $user    = $this->user->find($id);
	    $projets = $this->projet->projectsByUser($id);  
	    $themes  = array();
	    
	    if(!empty($projets)){
		    foreach($projets as $projet)
		    {
		    	if( isset($projet['theme']['titre']) )
		    	{
			    	$themes[$projet['theme']['id']] = $projet['theme']['titre'];
		    	}
		    }
	    } 
	    
	    $name = $user['prenom'].' '.$user['nom'];
        
        $data = array(
        	'titre'     => 'Profil',
			'soustitre' => $name,
			'user'      => $user,
			'projets'   => $projets,
			'themes'    => $themes
		);
		
	    return View::make('users.home')->with( $data );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('users.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
