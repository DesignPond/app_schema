<?php

use  Schema\Compose\Repo\ProjetInterface;
use  Schema\Categories\Repo\CategorieInterface;
use  Schema\Themes\Repo\ThemeInterface;
use  Schema\Subthemes\Repo\SubthemeInterface;

class ThemeController extends BaseController {
	
	protected $projet;
	
	protected $categorie;
	
	protected $theme;

    protected $subtheme;
	
	public function __construct(ProjetInterface $projet, CategorieInterface $categorie, ThemeInterface $theme, SubthemeInterface $subtheme){
		
		$this->projet    = $projet;
		
		$this->categorie = $categorie;
		
		$this->theme     = $theme;

        $this->subtheme  = $subtheme;
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
		
		return Response::json($themes, 200 );
	}
			
	public function drop_subtheme($id){

		$subthemes = $this->subtheme->drop_subtheme_by_categorie($id);

		ksort($subthemes);
		
		return Response::json($subthemes, 200 );
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
        	'titre'     => 'Thème',
			'soustitre' => $titre->titre,
			'couleur'   => $titre->couleur,
			'projets'   => $projets ,
			'subthemes' => $subtheme
		);
		
	    return View::make('theme')->with( $data );
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
