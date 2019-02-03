<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
	echo "TrackKnowledge Content API";
});

$router->get('nationalities',  ['middleware'=>'auth', 'uses' => 'NationalityController@all']);
$router->get('nationalities/{id}', ['middleware'=>'auth', 'uses' => 'NationalityController@get']);
$router->post('nationalities', ['middleware'=>'auth', 'uses' => 'NationalityController@create']);
$router->delete('nationalities/{id}', ['middleware'=>'auth', 'uses' => 'NationalityController@delete']);
$router->put('nationalities/{id}', ['middleware'=>'auth', 'uses' => 'NationalityController@update']);

$router->get('continents',  ['middleware'=>'auth', 'uses' => 'ContinentController@all']);
$router->get('continents/{id}', ['middleware'=>'auth', 'uses' => 'ContinentController@get']);
$router->post('continents', ['middleware'=>'auth', 'uses' => 'ContinentController@create']);
$router->delete('continents/{id}', ['middleware'=>'auth', 'uses' => 'ContinentController@delete']);
$router->put('continents/{id}', ['middleware'=>'auth', 'uses' => 'ContinentController@update']);

$router->get('countries',  ['middleware'=>'auth', 'uses' => 'CountryController@all']);
$router->get('countries/{id}', ['middleware'=>'auth', 'uses' => 'CountryController@get']);
$router->post('countries', ['middleware'=>'auth', 'uses' => 'CountryController@create']);
$router->delete('countries/{id}', ['middleware'=>'auth', 'uses' => 'CountryController@delete']);
$router->put('countries/{id}', ['middleware'=>'auth', 'uses' => 'CountryController@update']);

$router->get('leagues',  ['middleware'=>'auth', 'uses' => 'LeagueController@all']);
$router->get('leagues/{id}', ['middleware'=>'auth', 'uses' => 'LeagueController@get']);
$router->post('leagues', ['middleware'=>'auth', 'uses' => 'LeagueController@create']);
$router->delete('leagues/{id}', ['middleware'=>'auth', 'uses' => 'LeagueController@delete']);
$router->put('leagues/{id}', ['middleware'=>'auth', 'uses' => 'LeagueController@update']);

$router->get('mails/activation/{mail}/{activation_code}',  ['middleware'=>'auth', 'uses' => 'MailController@SendActivationMail']);
