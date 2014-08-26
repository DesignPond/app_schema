<?php

use  Schema\Repositories\Projet\ProjetInterface;
use  Schema\Repositories\Categorie\CategorieInterface;
use  Schema\Repositories\Theme\ThemeInterface;
use  Schema\Repositories\Subtheme\SubthemeInterface;

class CategorieController extends BaseController {

	protected $projet;
		
	protected $categorie;
	
	protected $theme;

    protected $subtheme;

    public function __construct(ProjetInterface $projet, CategorieInterface $categorie, ThemeInterface $theme, SubthemeInterface $subtheme){
		
		$this->projet = $projet;
		
		$this->categorie = $categorie;
		
		$this->theme = $theme;

        $this->subtheme  = $subtheme;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $categorie  = $this->categorie->find(1);
		$subthemes  = $this->theme->themeAndSubthemeByCategory();
        $liste      = $this->subtheme->subthemes(1);
		
		$data = array(
        	'titre'      => 'Catégories',
			'soustitre'  => 'Toutes les catégories',
			'categorie'  => $categorie ,
			'subthemes'  => $subthemes ,
            'liste'      => $liste
		);
		
	    return View::make('schemas.categories')->with( $data );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('categories.create');
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
        return View::make('categories.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('categories.edit');
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
