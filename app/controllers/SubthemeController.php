<?php

use  Schema\Repositories\Projet\ProjetInterface;
use  Schema\Repositories\Categorie\CategorieInterface;
use  Schema\Repositories\Theme\ThemeInterface;
use  Schema\Repositories\Subtheme\SubthemeInterface;

class SubthemeController extends \BaseController {

	protected $projet;
	
	protected $categorie;
	
	protected $theme;
	
	protected $subtheme;
		
	public function __construct(ProjetInterface $projet, CategorieInterface $categorie, ThemeInterface $theme , SubthemeInterface $subtheme){
		
		$this->projet    = $projet;
		
		$this->categorie = $categorie;
		
		$this->theme     = $theme;		
		
		$this->subtheme  = $subtheme;	
	}

	/**
	 * Display a listing of the resource.
	 * GET /subtheme
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /subtheme/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /subtheme
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /subtheme/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$projets  = $this->subtheme->schemas($id);
		$titre    = $this->subtheme->find($id);
		
		$data = array(
        	'titre'     => 'Thème',
			'soustitre' => 'sous',
			//'couleur'   => $titre->couleur,
			'projets'   => $projets ,
			//'subthemes' => $subtheme 
		);
		
	    return View::make('schemas.subtheme')->with( $data );
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /subtheme/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /subtheme/{id}
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
	 * DELETE /subtheme/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}