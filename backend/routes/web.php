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
    $filePath = public_path('index.html');

    if (File::exists($filePath)) {
        return response()->file($filePath);
    } else {
        abort(404);
    }
});

$router->group( ['prefix' => 'api'], function () use ($router) {
    $router->get('posts',  ['uses' => 'PostController@showAllPosts']);
  
    $router->get('posts/{id}', ['uses' => 'PostController@showOnePost']);
  
    $router->post('posts', ['uses' => 'PostController@create']);
  
    $router->delete('posts/{id}', ['uses' => 'PostController@delete']);
  
    $router->put('posts/{id}', ['uses' => 'PostController@update']);
  });
