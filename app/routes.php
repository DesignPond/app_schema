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
	
	 $themes = Theme::where('id', '=', 1)->with(array('subtheme'))->get()->first()->toArray();
	 
	 echo '<pre>';
	 print_r($themes['subtheme']);
	 echo '</pre>';
	 
/*
	
	 foreach($categories as $categorie) 
	 {
	 	
	 	foreach($categorie->theme as $theme)
	 	{
		 	echo '<pre>';
		 	//print_r($projet->theme->titre) ;
	 		print_r($theme->titre);
	 		echo '</pre>';
	 	}
	 	
	 }
*/


	 
});


Route::post('login', array( 'uses' => 'SessionController@store') );
Route::get('logout', 'SessionController@destroy');

Route::resource('login', 'SessionController');

Route::group(array('prefix' => 'schemas'), function()
{

	Route::get('/', 'SchemaController@index');
	Route::get('projets/{id}', 'SchemaController@projets');
	
	Route::get('categories', 'SchemaController@categories');
	
	Route::resource('categorie', 'CategorieController');
	Route::resource('theme', 'ThemeController');
	
	Route::get('contact', 'SchemaController@contact');

});

App::bind('Schema\Repositories\Projet\ProjetInterface', 'Schema\Repositories\Projet\DbProjet');
App::bind('Schema\Repositories\Categorie\CategorieInterface', 'Schema\Repositories\Categorie\DbCategorie');
App::bind('Schema\Repositories\Theme\ThemeInterface', 'Schema\Repositories\Theme\DbTheme');

