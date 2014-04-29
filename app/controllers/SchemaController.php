<?php

use  Schema\Repositories\Projet\ProjetInterface;
use  Schema\Repositories\Categorie\CategorieInterface;
use  Schema\Repositories\Theme\ThemeInterface;

class SchemaController extends BaseController {
	
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
		$user_projets = array();
		
        $projets  = $this->projet->getLast(3);
        
        if(Auth::check())
        {
        	$user = Auth::user()->id;
	        $user_projets = $this->projet->projectsByUser($user,3);  
        }       	
        
        $data = array(
        	'titre'        => 'Accueil',
			'soustitre'    => 'Schémas des procédures civiles',
			'projets'      => $projets ,
			'user_projets' => $user_projets
		);
		
	    return View::make('schemas.home')->with( $data );
	}
	
	public function contact(){
	
	    $data = array(
        	'titre'     => 'Contact',
			'soustitre' => 'Une question? Une demande?'
		);
		
    	return View::make('schemas.contact')->with( $data );
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
		$categories = array_add($categories, '', 'Choix');
			ksort($categories);
		$themes     = $this->theme->droplist_theme();
		$themes     = array_add($themes, '', 'Choix');
			ksort($themes); 
		$subthemes  = $this->theme->droplist_subtheme();
		$subthemes  = array_add($subthemes, '', 'Choix');
			 ksort($subthemes); 
		
		$data = array(
        	'titre'      => 'Schéma',
			'soustitre'  => 'Composer un nouveau schéma online',
			'categories' => $categories,
			'themes'     => $themes ,
			'subthemes'  => $subthemes,
			'input'      => Input::old() 
		);
		
        return View::make('schemas.create')->with( $data );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{		
		$categories = array();
		$themes     = array();
		$subthemes  = array();
		
		$categories = $this->categorie->droplist();
		$categories = array_add($categories, '', 'Choix');
			ksort($categories);
		$themes     = $this->theme->droplist_theme();
		$themes     = array_add($themes, '', 'Choix');
			ksort($themes); 
		$subthemes  = $this->theme->droplist_subtheme();
		$subthemes  = array_add($subthemes, '', 'Choix');
			 ksort($subthemes); 
		
		$data = array(
        	'titre'      => 'Schéma',
			'soustitre'  => 'Ajouter un nouveau schéma en pdf',
			'categories' => $categories,
			'themes'     => $themes ,
			'subthemes'  => $subthemes,
			'input'      => Input::old() 
		);
		
        return View::make('schemas.add')->with( $data );
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function sendemail()
	{
	
		$fromEmail = Input::get('email');
	    $fromName  = Input::get('name');
	    $data      = Input::get('message');
	    
	    $subject =  'Demande de rensignement depuis www.droitenschema.ch';
	
	    $toEmail = 'cindy.leschaud@gmail.com';
	    $toName  = 'Cindy Leschaud';
	
	    $send = Mail::send('emails.contact', array('data' => $data) , function($message) use ($toEmail, $toName, $fromEmail, $fromName, $subject )
	    {
	        $message->to($toEmail, $toName);
	
	        $message->from($fromEmail, $fromName);
	
	        $message->subject($subject);
	    });
	    
	    if($send)
	    {
		    return Redirect::back()->with('success', 'Merci pour votre message!');
	    }
	    else
	    {
		    return Redirect::back()->with('error', 'Problème avec l\'envoi du mail');
	    }
	    	    
	}



}
