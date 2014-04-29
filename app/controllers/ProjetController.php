<?php

use  Schema\Repositories\Projet\ProjetInterface;
use  Schema\Repositories\Categorie\CategorieInterface;
use  Schema\Repositories\Theme\ThemeInterface;

use  Schema\Service\Form\File\FileValidator as FileValidator;
use  Schema\Service\Upload\UploadInterface;

use  Schema\Service\Form\Projet\ProjetValidator as ProjetValidator;
use  Schema\Service\Form\Projet\SchemaValidator as SchemaValidator;

class ProjetController extends BaseController {

	protected $projet;
	
	protected $categorie;
	
	protected $theme;
	
	protected $validator;
	
	protected $upload;
	
	
	public function __construct(ProjetInterface $projet, CategorieInterface $categorie, ThemeInterface $theme , UploadInterface $upload ){
		
		$this->projet    = $projet;
		
		$this->categorie = $categorie;
		
		$this->theme     = $theme;
		
		$this->upload    = $upload;

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
		
 	 	$SchemaValidator = SchemaValidator::make(Input::all());
				 	 		
		if ($SchemaValidator->passes()) 
		{			
			$this->projet->create(Input::all());
			
			$id = $this->projet->getLastId();
			
			return Redirect::to('schemas/projet/'.$id.'#projet/'.$id.'');
		}
		else
		{	
			return Redirect::back()->withErrors( $SchemaValidator->errors() )->withInput( Input::all() ); 
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function insert()
	{
		
		$custom = new \Custom;
		
		$projet = array(
 	 		'titre'        => Input::get('titre'),
 	 		'description'  => Input::get('description'),
 	 		'categorie_id' => Input::get('categorie_id'),
 	 		'theme_id'     => Input::get('theme_id')
 	 	);
 	 	
 	 	$ProjetValidator = ProjetValidator::make(Input::all());
 	 			 	 		
		if ($ProjetValidator->passes()) 
		{			
			$this->projet->create(Input::all());
											
			$data = $this->upload->upload( Input::file('file') , 'files/projets' , $custom->makeSlug(Input::get('titre')) );
					 	
		 	if($data)
		 	{			 				 				 				 		
		 		$id = $this->projet->getLastId();
		 		
		 		return Redirect::to('schemas/projet/schema/'.$id);
			}
			else
			{
				return Redirect::back()->withErrors( $ProjetValidator->errors() )->with('error_file', 'Le fichier est obligatoire')->withInput( Input::all() ); 
			}				
		}
		else
		{			
			return Redirect::back()->withErrors( $ProjetValidator->errors()  )->withInput( Input::all() ); 
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
		$projet = $this->projet->find($id)->toArray();	
		$list   = $this->projet->getAllList();
      	
      	if( Auth::check() )
		{
			$isEditable = $this->projet->isUsers($id,Auth::user()->id);	
		}	
      	
      	$themes  = $this->theme->drop_theme_by_categorie($projet['categorie_id']);

        return View::make('schemas.projet')->with( array('projet' => $projet,'isEditable' => $isEditable, 'themes' => $themes , 'list' => $list) );
	}
	
	public function schema($id){
	
		$projet = $this->projet->appByProjet($id);	
		$height = $this->projet->heightProjet($id);	
		
		$isEditable = FALSE;
		
		if( Auth::check() )
		{
			$isEditable = $this->projet->isUsers($id,Auth::user()->id);	
		}	
		      	
      	$themes  = $this->theme->drop_theme_by_categorie($projet['categorie_id']);

        return View::make('schemas.schema')->with( array('projet' => $projet , 'height' => $height ,'isEditable' => $isEditable, 'themes' => $themes));
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
      	$projet  = $this->projet->find($id)->toArray();

        return View::make('schemas.edit')->with( array('projet' => $projet ));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$id     = Input::get('id');
		$value  = Input::get('value');
		$column = Input::get('column');
		
		$projet = $this->projet->find($id);
		
		if( ! $projet )
		{
			return false;
		}
		
		$data = array( $column => $value );

		$projet->update( $data );	
		
		return $value;
		
	}
		
	public function fileUpdate(){
		
		$id   = Input::get('id');
		$slug = Input::get('name');
		
		$data = $this->upload->upload( Input::file('file') , 'files/projets' , $slug );
				 	
	 	if($data)
	 	{			 				 				 				 			
	 		return Redirect::to('schemas/projet/schema/'.$id);
		}
		else
		{
			return Redirect::to('schemas/projet/schema/'.$id)->with('error_file', 'Problème avec le fichier'); 
		}
	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if( $this->projet->delete($id) )
		{
			return Redirect::to('schemas/user/'.Auth::user()->id)->with( array('status' => 'success' , 'message' => 'Le projet a été supprimé') );
		}
		
		return Redirect::to('schemas/user/'.Auth::user()->id)->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') );
	}

}
