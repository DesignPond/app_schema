<?php

/**
 * Session routes
*/
Route::post('login', array( 'uses' => 'SessionController@login') );
Route::get('login', 'SessionController@auth');
Route::get('logout', 'SessionController@logout');

/**
 * Pages routes
 */
Route::get('/', 'HomeController@index');
Route::get('contact', 'HomeController@contact');
Route::post('sendemail', 'SchemaController@sendemail');

/**
 * Categories routes
 */

Route::resource('categorie', 'CategorieController');

/**
 * Themes routes
 */
Route::resource('theme', 'ThemeController');
Route::get('theme/drop_theme/{id}', 'ThemeController@drop_theme');
Route::get('theme/drop_subtheme/{id}', 'ThemeController@drop_subtheme');

/**
 * Subtheme routes
 */
Route::resource('subtheme', 'SubthemeController');

/**
 * Compose routes
 */

Route::get('compose/schema/{id}', 'ComposeController@schema');
Route::get('compose/book/{id}', 'ComposeController@book');
Route::get('compose/modal/{id?}', 'ComposeController@modal');

Route::resource('compose', 'ComposeController');

/**
 * User routes
 */
Route::resource('user', 'UserController');

/**
 * API routes
 */
Route::group(array('prefix' => 'api/v1'), function()
{

    Route::get('theme/projet/{id}', 'ThemeController@projet');
    Route::get('boxe/projet/{id}', 'BoxeController@refProject');
    Route::resource('boxe', 'BoxeController');
    Route::get('arrow/projet/{id}', 'ArrowController@refProject');
    Route::resource('arrow', 'ArrowController');

});