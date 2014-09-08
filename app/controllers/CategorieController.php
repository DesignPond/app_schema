<?php

use  Schema\Categories\Repo\CategorieInterface;
use  Schema\Subthemes\Repo\SubthemeInterface;


class CategorieController extends BaseController {
		
	protected $categorie;

    protected $subtheme;

    public function __construct( CategorieInterface $categorie, SubthemeInterface $subtheme){
		
		$this->categorie = $categorie;

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
		$subthemes  = $this->subtheme->themeAndSubthemeByCategory(1);
        $liste      = $this->subtheme->subthemes(1);
		
		$data = array(
        	'titre'      => 'Catégories',
			'soustitre'  => 'Toutes les catégories',
			'categorie'  => $categorie ,
			'subthemes'  => $subthemes ,
            'liste'      => $liste
		);
		
	    return View::make('categories.index')->with( $data );
	}
}
