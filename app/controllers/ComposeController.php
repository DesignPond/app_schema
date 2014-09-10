<?php

use  Schema\Compose\Repo\ProjetInterface;
use  Schema\Categories\Repo\CategorieInterface;
use  Schema\Themes\Repo\ThemeInterface;
use  Schema\Subthemes\Repo\SubthemeInterface;

class ComposeController extends BaseController {

    protected $projet;

    protected $categorie;

    protected $theme;

    protected $subtheme;

    public function __construct( ProjetInterface $projet, CategorieInterface $categorie, ThemeInterface $theme, SubthemeInterface $subtheme ){

        $this->projet    = $projet;

        $this->categorie = $categorie;

        $this->theme     = $theme;

        $this->subtheme  = $subtheme;

    }

	public function index()
	{
        return View::make('home');
	}


    /**
     * Book schemas
     *
     * @return
     */
    public function book($id)
    {
        $projet  = $this->projet->find($id);

        return View::make('book')->with( array('projet' => $projet ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $categories = $this->categorie->droplist();
        $themes     = $this->theme->droplist_theme();
        $subthemes  = $this->subtheme->droplist_subtheme();

        $data = array(
            'titre'      => 'Schéma',
            'soustitre'  => 'Composer un nouveau schéma online',
            'categories' => $categories,
            'themes'     => $themes ,
            'subthemes'  => $subthemes
        );

        return View::make('compose.create')->with( $data );
    }

    public function store(){

        // Test if we have to create a new subtheme
        $subtheme = Input::get('subtheme_id');
        $new      = Input::get('subtheme_new');

        if(!empty($subtheme))
        {
            $subtheme_id = $subtheme;
        }
        else if(!empty($new))
        {
            $subtheme = $this->subtheme->create(array(
                'titre'       => $new,
                'categorie_id'=> Input::get('categorie_id'),
                'theme_id'    => Input::get('theme_id')
            ));

            $subtheme_id = $subtheme->id;
        }
        else
        {
            $subtheme_id = null;
        }

        $projet = array(
            'titre'        => Input::get('titre'),
            'description'  => Input::get('description'),
            'user_id'      => Input::get('user_id'),
            'type'         => 'app',
            'categorie_id' => Input::get('categorie_id'),
            'theme_id'     => Input::get('theme_id'),
            'subtheme_id'  => $subtheme_id
        );

        $projet = $this->projet->create($projet);

        return Redirect::to('compose/'.$projet->id.'/edit#projet/'.$projet->id.'');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id)
    {
        $projet = $this->projet->appByProjet($id);

        // If the project is not actif and we are not authenticated redirect to main page
        if( $projet['status'] != 'actif' && !Auth::check() )
        {
            return Redirect::to('/');
        }

        // Is the project visible for everyone (actif?) or are we the editor, user or admin
        $isEditable = $this->projet->isVisible($id);

        $height = $this->projet->heightProjet($id);
        $themes = $this->theme->drop_theme_by_categorie($projet['categorie_id']);

        return View::make('compose.index')->with( array('projet' => $projet , 'height' => $height ,'isEditable' => $isEditable, 'themes' => $themes));

    }

    public function edit($id)
    {
        $projet = $this->projet->find($id)->toArray();
        $list   = $this->projet->getAllList();

        $isEditable = $this->projet->isVisible($id);

        $themes  = $this->theme->drop_theme_by_categorie($projet['categorie_id']);

        return View::make('compose.edit')->with( array('projet' => $projet, 'isEditable' => $isEditable, 'themes' => $themes , 'list' => $list) );
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

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function projet($id){

        $ref   = $this->projet->find($id);
        $theme = $ref['theme_id'];

        return Response::json(array(
                'error' => false,
                'items' => array('id' => $theme)
            ),
            200 );
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
            return Redirect::back()->with( array('status' => 'success' , 'message' => 'Le projet a été supprimé') );
        }

        return Redirect::back()->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') );
    }

}
