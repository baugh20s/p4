<?php

Route::get('/debug', function () {
    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: ' . $e->getMessage();
    }

    dump($debug);
});

/*
 * HOME
 */
Route::get('/', 'WelcomeController');

/*
 * SEARCH
 */
Route::get('/search', 'ContactController@search');
Route::get('contacts/search-process', 'ContactController@searchProcess');

/*
 * CREATE contact
 */
Route::get('/contacts/create', 'ContactController@create');
Route::post('/contacts', 'ContactController@storeNew');
/*
 * READ contact
 */
Route::get('/contacts/{id}', 'ContactController@read');
Route::get('/contacts', 'ContactController@index');

/*
* UPDATE contact
*/

/*
 * DELETE contact
 */
Route::get('/contacts/{id}/delete', 'ContactController@delete');

/*
 * Misc static pages
 */
Route::view('/about', 'about');
Route::view('/contactus', 'contactUs');