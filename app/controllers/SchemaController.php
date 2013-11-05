<?php

use  Schema\Repositories\Projet\ProjetInterface;
use  Schema\Repositories\Categorie\CategorieInterface;

class SchemaController extends BaseController {
	
	protected $projet;
	
	public function __construct(ProjetInterface $projet, CategorieInterface $categorie){
		
		$this->projet = $projet;
		$this->categorie = $categorie;		
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $categories  = $this->categorie->getAll();
		
	    return View::make('schemas.home')->with(array('categories'=> $categories)); 
	}
	
	public function projets($id){
		
		$projets  = $this->projet->getAll();
		
	    return View::make('schemas.projets')->with(array('projets'=> $projets)); 

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
