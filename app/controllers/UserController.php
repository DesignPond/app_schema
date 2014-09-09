<?php

use  Schema\User\Repo\UserInterface;
use  Schema\Compose\Repo\ProjetInterface;
use Faker\Factory as Faker;

class UserController extends BaseController {

	protected $user;
	
	protected $projet;
	
	public function __construct(UserInterface $user , ProjetInterface $projet){
		
		$this->user = $user;
		
		$this->projet = $projet;

        $this->beforeFilter('auth', array('only' => array('show', 'manage')));
        $this->beforeFilter('admin', array('only' => array('manage')));

	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('users.home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
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

        if( Auth::user()->id != $id)
            return Redirect::to('/');

        $user    = $this->user->find($id);
	    $projets = $this->projet->projectsByUser($id);

        list($themes,$sorting) = $this->projet->sortProjectByTheme($projets);
        
        $data = array(
        	'titre'     => 'Profil',
			'soustitre' => 'Vos informations et schémas',
			'user'      => $user,
			'projets'   => $projets,
			'themes'    => $themes,
			'sorting'   => $sorting
		);
		
	    return View::make('users.home')->with( $data );
	}

    public function manage(){

        $projets = $this->projet->getByStatus(array('submitted', 'revision'));
        $projets = $this->projet->arrangeByStatus($projets);
        $user    = $this->user->find(Auth::user()->id);

        $data = array(
            'titre'     => 'Schémas',
            'soustitre' => 'Gestion',
            'user'      => $user,
            'projets'   => $projets
        );

        return View::make('users.manage')->with( $data );
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('users.edit');
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

    function getIdInArray($array, $term)
    {
        foreach ($array as $key => $value) {
            if ($value == $term) {
                return $key;
            }
        }

        throw new UnexpectedValueException;
    }
    /**
     * Roles for user
     *
     * @return Response
     */
    public function roles()
    {
        $user = $this->user->find(1);

        if ( $user->hasRole('assign')  ){
        }
        //$user->makeEmployee('admin');

        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            \Schema\Compose\Entities\Projet::create([
                'titre'       => $faker->text(40),
                'description' => $faker->text(200),
                'user_id'     => 2,
                'categorie_id'=> 1,
                'theme_id'    => $faker->numberBetween(1,13),
                'type'        => 'app',
                'slug'        => $faker->word,
                'status'      => $faker->randomElement(array ('actif','pending','submitted','revision')),
                'subtheme_id' => $faker->numberBetween(1,69)
            ]);
        }

        $data = array(
            'titre'     => 'Profil',
            'soustitre' => 'Roles',
            'roles'     => $user
        );

        return View::make('users.roles')->with( $data );
    }

}
