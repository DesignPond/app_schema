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

    public function __construct(ProjetInterface $projet, CategorieInterface $categorie, ThemeInterface $theme, SubthemeInterface $subtheme){

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

        return Redirect::to('compose/'.$projet->id.'#projet/'.$projet->id.'');

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

        $isEditable = null;

        if( Auth::check() )
        {
            $isEditable = $this->projet->isUsers($id,Auth::user()->id);
        }

        $themes  = $this->theme->drop_theme_by_categorie($projet['categorie_id']);

        return View::make('compose.projet')->with( array('projet' => $projet, 'isEditable' => $isEditable, 'themes' => $themes , 'list' => $list) );
    }

}
