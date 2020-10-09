<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return $router->app->version();
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// $router->get('/series', function () use ($router) {
//     return [
//         'Breaking Bad',
//         'The Office'
//     ];
// });


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('series', 'SeriesController@store');
    $router->get('series', 'SeriesController@index');
});