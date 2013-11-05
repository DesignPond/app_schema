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
	 $Carbon = new Carbon\Carbon();
	 $date   = $Carbon->create(1975, 12, 25, 14, 15, 16);
	 
	 $day    = $date->format('d');  
	 $month  = $date->format('M'); 
	 
	 return $month;
});

Route::group(array('prefix' => 'schemas'), function()
{

	Route::get('categories', 'SchemaController@index');
	Route::get('projets/{id}', 'SchemaController@projets');

});

App::bind('Schema\Repositories\Projet\ProjetInterface', 'Schema\Repositories\Projet\DbProjet');
App::bind('Schema\Repositories\Categorie\CategorieInterface', 'Schema\Repositories\Categorie\DbCategorie');