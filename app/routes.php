<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/', function()
{
	//return View::make('hello');
	
	 $projets = Projet::with(array('theme','subtheme'))->get();
	 

	 foreach($projets as $projet) 
	 {
	 	echo '<pre>';
	 	print_r($projet->theme->titre) ;
	 	echo '</pre>';
	 }
	 
	 
	 
});


Route::post('login', array( 'uses' => 'SessionController@store') );
Route::get('logout', 'SessionController@destroy');

Route::resource('login', 'SessionController');

Route::group(array('prefix' => 'schemas'), function()
{

	Route::get('/', 'SchemaController@index');
	Route::get('projets/{id}', 'SchemaController@projets');
	Route::get('categories', 'SchemaController@categories');
	
	Route::get('contact', 'SchemaController@contact');

});

App::bind('Schema\Repositories\Projet\ProjetInterface', 'Schema\Repositories\Projet\DbProjet');
App::bind('Schema\Repositories\Categorie\CategorieInterface', 'Schema\Repositories\Categorie\DbCategorie');