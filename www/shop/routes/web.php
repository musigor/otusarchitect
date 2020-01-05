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

/**
 * all routes which needs authorization
 */
$router->group(['middleware' => ['auth']], function () use ($router) {
    $router->put('api/users', 'Api\UserController@updateUser');
    $router->post('api/users', 'Api\UserController@createUser');

    $router->put('api/products', 'Api\ProductsController@updateProducts');
    $router->post('api/products', 'Api\ProductsController@createProducts');
});

/**
 * user methods
 */
$router->post('api/login', 'Api\UserController@login');
$router->get('api/logout', 'Api\UserController@logout');

/**
 * catalog
 */
$router->get('api/products[/{id}]', 'Api\ProductsController@products');

/**
 * Frontend routes
 */
$router->get('/', 'IndexController@index');
$router->get('/admin', 'IndexController@admin');
$router->get('/login', 'IndexController@admin');
$router->get('/logout', 'IndexController@logout');
$router->post('/login', 'IndexController@login');

/**
 * Backend routes
 */
$router->group(['middleware' => ['frontendAuth']], function () use ($router) {
    $router->get('/admin/user', 'IndexController@user');
    $router->post('/admin/user/create', 'IndexController@userCreate');

    $router->get('/admin/product', 'IndexController@product');
    $router->post('/admin/product/create', 'IndexController@productCreate');
});