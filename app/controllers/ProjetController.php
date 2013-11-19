<?php

use  Schema\Repositories\Projet\ProjetInterface;
use  Schema\Repositories\Categorie\CategorieInterface;
use  Schema\Repositories\Theme\ThemeInterface;
use  Schema\Service\Form\Projet\ProjetForm;

class ProjetController extends BaseController {

	protected $projet;
	
	protected $categorie;
	
	protected $theme;
	
	protected $validator;
	
	public function __construct(ProjetInterface $projet, CategorieInterface $categorie, ThemeInterface $theme, ProjetForm $validator ){
		
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

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if( $this->validator->save( Input::all() ) )
		{
			// Get last inserted
			$projet = Projet::orderBy('id', 'DESC')->take(1)->get()->first()->toArray();
			$id     = $projet['id'];
			
			return Redirect::to('schemas/projet/'.$id.'#projet/'.$id.'');
		}
		else
		{	
			return Redirect::to('schemas/create')->withErrors($this->validator->errors())->withInput(Input::all() ); 
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
		$projet = $this->projet->find($id);	

        return View::make('schemas.projet')->with( array('projet' => $projet ));
	}
	
	public function schema($id){
	
		$projet = $this->projet->appByProjet($id);	
		$height = $this->projet->heightProjet($id);	
		
		$isEditable = FALSE;
		
		if( Auth::check() )
		{
			$isEditable = $this->projet->isUsers($id,Auth::user()->id);	
		}	

        return View::make('schemas.schema')->with( array('projet' => $projet , 'height' => $height ,'isEditable' => $isEditable));
	}
	
	public function modal($id = NULL){
	
		$projet = $this->projet->appByProjet($id);	
		$height = $this->projet->heightProjet($id);	

        return View::make('schemas.modal')->with( array('projet' => $projet , 'height' => $height));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
      	$projet  = $this->projet->find($id);

        return View::make('schemas.edit')->with( array('projet' => $projet ));
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
