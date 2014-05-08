<?php

Route::get('test', function()
{
			
	return Subtheme::where('id','=',1)->get()->first()->toArray(); 
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
	Route::post('sendemail', 'SchemaController@sendemail');	
	
	Route::get('create', array('before' => 'auth' ,'uses' => 'SchemaController@create') );	
	Route::get('add', array('before' => 'auth' ,'uses' => 'SchemaController@add') );	
	
	Route::resource('categorie', 'CategorieController');
	
	Route::resource('theme', 'ThemeController');
	Route::get('theme/drop_theme/{id}', 'ThemeController@drop_theme');
	Route::get('theme/drop_subtheme/{id}', 'ThemeController@drop_subtheme');
	
	Route::resource('subtheme', 'SubthemeController');
	
	Route::get('projet/schema/{id}', 'ProjetController@schema');
	Route::get('projet/modal/{id?}', 'ProjetController@modal');
	Route::post('projet/insert', 'ProjetController@insert');
	Route::get('projet/{id}/delete', array('uses' => 'ProjetController@destroy'));
	Route::post('projet/update', array( 'uses' => 'ProjetController@update') );	
	Route::post('projet/fileUpdate', array( 'uses' => 'ProjetController@fileUpdate') );		
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
