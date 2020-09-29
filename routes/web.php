<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

// $router->get('/key', function () use ($router) {
//     return Illuminate\Support\Str::random(32);
// });

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/'], function () use ($router) {
    $router->post('/login', 'AuthController@authenticate');
    $router->get('/user', ['middleware' => 'auth', function () {
        return Auth::user();
    }]);
});