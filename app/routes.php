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
	
	 $themes = Theme::with(array('subtheme'))->get()->toArray();
	 
	 $themesByCategories = array();
	 
	 if( !empty($themes) )
	 {
		 foreach($themes as $theme)
		 {

			 $themesByCategories[$theme['refCategorie']][$theme['id']]['titre'] = $theme['titre'];
			 $subthemes = array();
			 
			 if( isset($theme['subtheme']) )
			 {
				  foreach($theme['subtheme'] as $subtheme)
				  {
					  $subthemes[$subtheme['id']] = $subtheme['titre'];
				  }
				  
				  $themesByCategories[$theme['refCategorie']][$theme['id']]['subtheme'][] = $subthemes;
			 }  
		 }
	 }
	 
	 echo '<pre>';
	 print_r($themesByCategories);
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
	
	Route::get('contact', 'SchemaController@contact');

});

App::bind('Schema\Repositories\Projet\ProjetInterface', 'Schema\Repositories\Projet\DbProjet');
App::bind('Schema\Repositories\Categorie\CategorieInterface', 'Schema\Repositories\Categorie\DbCategorie');
App::bind('Schema\Repositories\Theme\ThemeInterface', 'Schema\Repositories\Theme\DbTheme');

