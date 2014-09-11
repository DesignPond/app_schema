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
Route::get('book/{id}', 'HomeController@book');
Route::get('contact', 'HomeController@contact');
Route::post('sendemail', 'HomeController@sendemail');

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
Route::get('compose/{id}/delete', 'ComposeController@destroy');
Route::get('compose/modal/{id?}', 'ComposeController@modal');
Route::post('compose/update', 'ComposeController@update');
Route::post('compose/status', 'ComposeController@status');
Route::post('compose/assign', 'ComposeController@assign');
Route::resource('compose', 'ComposeController');

/**
 * User routes
 */

Route::get('manage', 'UserController@manage');
Route::get('actifs', 'UserController@actifs');
Route::get('revision', 'UserController@revision');
Route::resource('user', 'UserController');

/**
 * API routes
 */
Route::group(array('prefix' => 'api'), function()
{
    // Get theme for project
    Route::get('projet/{id}', 'ComposeController@projet');
    // Boxes and arrows
    Route::get('boxe/projet/{id}', 'BoxeController@refProject');
    Route::resource('boxe', 'BoxeController');
    Route::get('arrow/projet/{id}', 'ArrowController@refProject');
    Route::resource('arrow', 'ArrowController');

});

/**
 * TEST routes
 */
Route::get('roles', 'UserController@roles');


Event::listen('illuminate.query', function($query, $bindings, $time, $name)
{
    $data = compact('bindings', 'time', 'name');

    // Format binding data for sql insertion
    foreach ($bindings as $i => $binding)
    {
        if ($binding instanceof \DateTime)
        {
            $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
        }
        else if (is_string($binding))
        {
            $bindings[$i] = "'$binding'";
        }
    }

    // Insert bindings into query
    $query = str_replace(array('%', '?'), array('%%', '%s'), $query);
    $query = vsprintf($query, $bindings);

    Log::info($query, $data);
});