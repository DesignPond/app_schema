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


View::composer('layouts.app', function($view){

    $menus = Categorie::lists('titre', 'id');

    $view->with('menus', $menus);
});



Route::post('login', array( 'uses' => 'SessionController@store') );
Route::get('login', 'SessionController@index');
Route::get('logout', 'SessionController@destroy');

Route::group(array('prefix' => 'schemas'), function()
{

	Route::get('/', 'SchemaController@index');
	Route::get('contact', 'SchemaController@contact');	
	
	Route::resource('categorie', 'CategorieController');
	Route::resource('theme', 'ThemeController');
	Route::resource('projet', 'ProjetController');

});

Route::group(array('prefix' => 'api/v1'), function()
{

	Route::get('theme/projet/{id}', 'ThemeController@projet');
    Route::get('boxe/projet/{id}', 'BoxeController@refProject');
    Route::resource('boxe', 'BoxeController');
    Route::get('arrow/projet/{id}', 'ArrowController@refProject');
    Route::resource('arrow', 'ArrowController');
    
});

App::bind('Schema\Repositories\Projet\ProjetInterface', 'Schema\Repositories\Projet\DbProjet');
App::bind('Schema\Repositories\Categorie\CategorieInterface', 'Schema\Repositories\Categorie\DbCategorie');
App::bind('Schema\Repositories\Theme\ThemeInterface', 'Schema\Repositories\Theme\DbTheme');

