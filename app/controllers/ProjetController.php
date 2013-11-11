<?php

use  Schema\Repositories\Projet\ProjetInterface;
use  Schema\Repositories\Categorie\CategorieInterface;
use  Schema\Repositories\Theme\ThemeInterface;
use  Schema\Service\Form\Projet\ProjetFormValidator;

class ProjetController extends BaseController {

	protected $projet;
	
	protected $categorie;
	
	protected $theme;
	
	protected $validator;
	
	public function __construct(ProjetInterface $projet, CategorieInterface $categorie, ThemeInterface $theme, ProjetFormValidator $validator ){
		
		$this->projet = $projet;
		
		$this->categorie = $categorie;
		
		$this->theme = $theme;
		
		$this->validator = $validator;

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
		
		$categories = array();
		$themes     = array();
		$subthemes  = array();
		
		$categories = $this->categorie->droplist();
		$categories = array_add($categories, '0', 'Choix');
			ksort($categories);
		$themes     = $this->theme->droplist_theme();
		$themes     = array_add($themes, '0', 'Choix');
			ksort($themes); 
		$subthemes  = $this->theme->droplist_subtheme();
		$subthemes  = array_add($subthemes, '0', 'Choix');
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
		if( $this->projet->create( Input::all() )  )
		{
			
		}
		else
		{	
			return Redirect::to('schemas/projet/create')->withErrors($this->projet->errors())->withInput(Input::all() ); 
		}
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
