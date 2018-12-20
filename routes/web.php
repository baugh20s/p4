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
 * CREATE hobby
 */
Route::get('/hobbies/create', 'ContactController@createHobby');
Route::post('/hobbies', 'ContactController@storeNewHobby');

/*
 * READ contact
 */
Route::get('/contacts/{id}', 'ContactController@read');
Route::get('/contacts', 'ContactController@index');

/*
 * READ hobbies
 */
Route::get('/hobbies', 'ContactController@indexHobbies');

/*
* UPDATE contact
*/
Route::get('/contacts/{id}/edit', 'ContactController@edit');
Route::put('/contacts/{id}', 'ContactController@update');

/*
 * DELETE contact
 */
Route::get('/contacts/{id}/delete', 'ContactController@delete');
Route::delete('/contacts/{id}', 'ContactController@destroy');
/*
 * Misc static pages
 */
Route::view('/about', 'about');
Route::view('/contactus', 'contactUs');