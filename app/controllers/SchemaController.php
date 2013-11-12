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

        $projets  = $this->projet->getLast(3);
        
        $data = array(
        	'titre'     => 'Accueil',
			'soustitre' => 'Schémas des procédures civiles',
			'projets'   => $projets 
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
        return View::make('schemas.create');
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
