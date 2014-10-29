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

/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('role', 'Role');

/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

    # User Management
    Route::get('users/{user}/show', 'AdminUsersController@getShow');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
    Route::controller('users', 'AdminUsersController');

    # User Role Management
    Route::get('roles/{role}/show', 'AdminRolesController@getShow');
    Route::get('roles/{role}/edit', 'AdminRolesController@getEdit');
    Route::post('roles/{role}/edit', 'AdminRolesController@postEdit');
    Route::get('roles/{role}/delete', 'AdminRolesController@getDelete');
    Route::post('roles/{role}/delete', 'AdminRolesController@postDelete');
    Route::controller('roles', 'AdminRolesController');

    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');
});


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

// User reset routes
Route::get('user/reset/{token}', 'UserController@getReset');
// User password reset
Route::post('user/reset/{token}', 'UserController@postReset');
//:: User Account Routes ::
Route::post('user/{user}/edit', 'UserController@postEdit');

//:: User Account Routes ::
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');

//:: Application Routes ::

# Filter for detect language
Route::when('contact-us','detectLang');

# Contact Us Static Page
Route::get('contact-us', function()
{
    // Return about us page
    return View::make('site/contact-us');
});

#Contacts Route
Route::group(array('before'=>'auth'), function() {
    Route::resource('contacts', 'ContactController');
});

#Twilio Route
//Route::resource('twilio', 'TwilioController');
Route::get('/twilio2', function()
{

    // Create an authenticated client for the Twilio API
    $client = new Services_Twilio('AC685a150b41abf533cae4bca0319d3c0b', 'd2a703623efd92b7fe1d980bf1e812d4');

    try {

        // Use the Twilio REST API client to send a text message
        $m = $client->account->messages->sendMessage(
            '+12025099421', // the text will be sent from your Twilio number
            '2028055054', // the phone number the text will be sent to
            'Here is a message!' // the body of the text message
        );

    } catch (Services_Twilio_RestException $E) {

        return $E;

    }

    // Return the message object to the browser as JSON
    return $m;

});

Route::match(array('GET', 'POST'), '/twilio', function()
{
    $twiml = new Services_Twilio_Twiml();
    $twiml->say('Hello - your app just answered the phone. Neat, eh?', array('voice' => 'alice'));
    $response = Response::make($twiml, 200);
    $response->header('Content-Type', 'text/xml');
    return $response;
});

# Index Page - Last route, no matches
Route::get('/', array('before' => 'detectLang','auth','uses' => 'MainController@getIndex'));
