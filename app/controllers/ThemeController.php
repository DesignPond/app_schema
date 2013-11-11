<?php

use  Schema\Repositories\Projet\ProjetInterface;
use  Schema\Repositories\Categorie\CategorieInterface;
use  Schema\Repositories\Theme\ThemeInterface;

class ThemeController extends BaseController {
	
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
        return View::make('themes.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('themes.create');
	}
	
	public function drop_theme($id = NULL){
		
		$themes = $this->theme->drop_theme_by_categorie($id);
		$themes = array_add($themes, '0', 'Choix');
		
		ksort($themes);
		
		return Response::json($themes, 200 );
	}
	
			
	public function drop_subtheme($id){

		$subthemes = $this->theme->drop_subtheme_by_categorie($id);
		$subthemes = array_add($subthemes, '0', 'Choix');
		
		ksort($subthemes);
		
		return Response::json($subthemes, 200 );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function projet($id){
		
		$ref   = Projet::find($id);
		$theme = $ref->refTheme;
		
		return Response::json(array(
        	'error' => false,
			'items' => array('id' => $theme)
			),
		200 );	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$projets  = $this->projet->projectsByTheme($id);
		$subtheme = $this->theme->subthemes($id);
		$titre    = $this->theme->find($id);
		
		$data = array(
        	'titre'     => 'Thèmes',
			'soustitre' => $titre->titre,
			'couleur'   => $titre->couleur,
			'projets'   => $projets ,
			'subthemes' => $subtheme 
		);
		
	    return View::make('schemas.theme')->with( $data );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('themes.edit');
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
