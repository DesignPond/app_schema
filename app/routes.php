<?php

Route::get('/', function()
{
			
$app = Projet::find(3);	

echo '<pre>';
print_r($app->categorie_id);
echo '</pre>';	 
	 
/*
	$data = array();

	Mail::send('emails.contact', $data, function($message)
	{
	    $message->to('cindy.leschaud@gmail.com', 'Cindy Leschaud')->subject('Welcome!');
	    
	});
*/
	 
});


View::composer('layouts.app', function($view){

    $menus = Categorie::lists('titre', 'id');

    $view->with('menus', $menus);
});

Route::get('/', 'SchemaController@index');

Route::post('login', array( 'uses' => 'SessionController@login') );
Route::get('login', 'SessionController@auth');
Route::get('logout', 'SessionController@logout');

Route::group(array('prefix' => 'schemas'), function()
{

	Route::get('/', 'SchemaController@index');
	Route::get('contact', 'SchemaController@contact');	
	
	Route::get('create', array('before' => 'auth' ,'uses' => 'SchemaController@create') );	
	
	Route::post('projet/update', array( 'uses' => 'ProjetController@update') );
	
	Route::resource('categorie', 'CategorieController');
	Route::resource('theme', 'ThemeController');
	Route::get('theme/drop_theme/{id}', 'ThemeController@drop_theme');
	Route::get('theme/drop_subtheme/{id}', 'ThemeController@drop_subtheme');
	Route::get('projet/schema/{id}', 'ProjetController@schema');
	Route::get('projet/modal/{id?}', 'ProjetController@modal');
	Route::resource('projet', 'ProjetController');
	Route::resource('user', 'UserController');

});

Route::group(array('prefix' => 'api/v1'), function()
{

	Route::get('theme/projet/{id}', 'ThemeController@projet');
    Route::get('boxe/projet/{id}', 'BoxeController@refProject');
    Route::resource('boxe', 'BoxeController');
    Route::get('arrow/projet/{id}', 'ArrowController@refProject');
    Route::resource('arrow', 'ArrowController');
    
});
