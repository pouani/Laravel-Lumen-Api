<?php

use App\Http\Controllers\ProductController;

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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/products', 'Api\ProductController@index');
    $router->post('/products', 'Api\ProductController@store');
    $router->get('/products/{id}', 'Api\ProductController@show');
    $router->put('/products/{id}', 'Api\ProductController@update');
    $router->delete('/products/{id}', 'Api\ProductController@destroy');
});//end group
