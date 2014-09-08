<?php

use  Schema\Repositories\Subtheme\SubthemeInterface;

class SubthemeController extends \BaseController {
	
	protected $subtheme;
		
	public function __construct( SubthemeInterface $subtheme ){
		
		$this->subtheme  = $subtheme;	
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
		$subtheme = $this->subtheme->find($id);
		
		$data = array(
        	'titre'     => $subtheme->theme->titre,
			'soustitre' => $subtheme->titre,
			'couleur'   => $subtheme->theme->couleur_primaire,
			'projets'   => $projets ,
			'subtheme'  => $subtheme 
		);
		
	    return View::make('subtheme')->with( $data );
	}

}