<?php

use  Schema\Repositories\Projet\ProjetInterface;
use  Schema\Repositories\Categorie\CategorieInterface;
use  Schema\Repositories\Theme\ThemeInterface;

class ProjetController extends BaseController {

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
        return View::make('projets.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('projets.create');
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
		$projet  = $this->projet->find($id);

        return View::make('schemas.projet')->with( array('projet' => $projet ));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('projets.edit');
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
