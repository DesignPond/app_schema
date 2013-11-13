<?php

use  Schema\Repositories\Projet\ProjetInterface;
use  Schema\Repositories\Categorie\CategorieInterface;
use  Schema\Repositories\Theme\ThemeInterface;

class SchemaController extends BaseController {
	
	protected $projet;
	
	protected $categorie;
	
	protected $theme;
	
	public function __construct(ProjetInterface $projet, CategorieInterface $categorie, ThemeInterface $theme){
		
		$this->projet = $projet;
		
		$this->categorie = $categorie;
		
		$this->theme = $theme;		
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_projets = array();
		
        $projets  = $this->projet->getLast(3);
        
        if(Auth::check())
        {
        	$user = Auth::user()->id;
	        $user_projets = $this->projet->projectsByUser($user,2);  
        }       	
        
        $data = array(
        	'titre'        => 'Accueil',
			'soustitre'    => 'Schémas des procédures civiles',
			'projets'      => $projets ,
			'user_projets' => $user_projets
		);
		
	    return View::make('schemas.home')->with( $data );
	}
	
	public function contact(){
	
	    $data = array(
        	'titre'     => 'Contact',
			'soustitre' => 'Une question? Une demande?'
		);
		
    	return View::make('schemas.contact')->with( $data );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{		
		$categories = array();
		$themes     = array();
		$subthemes  = array();
		
		$categories = $this->categorie->droplist();
		$categories = array_add($categories, '', 'Choix');
			ksort($categories);
		$themes     = $this->theme->droplist_theme();
		$themes     = array_add($themes, '', 'Choix');
			ksort($themes); 
		$subthemes  = $this->theme->droplist_subtheme();
		$subthemes  = array_add($subthemes, '', 'Choix');
			 ksort($subthemes); 
		
		$data = array(
        	'titre'      => 'Schéma',
			'soustitre'  => 'Créer un nouveau schéma',
			'categories' => $categories,
			'themes'     => $themes ,
			'subthemes'  => $subthemes,
			'input'      => Input::old() 
		);
		
        return View::make('schemas.create')->with( $data );
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
        return View::make('schemas.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('schemas.edit');
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
