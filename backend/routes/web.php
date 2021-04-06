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
$router->group(['prefix'=>'/user'],function($router){
    $router->get('/','UserController@index');
    $router->post('/add','UserController@create');
    $router->put('/update/{id}','UserController@update');
    $router->delete('/delete/{id}','UserController@delete');
});
$router->group(['prefix'=>'/tag'],function($router){
    $router->get('/','TagController@index');
    $router->post('/add','TagController@create');
    $router->put('/update/{id}','TagController@update');
//    $router->delete('/delete/{id}','UserController@delete');
});
