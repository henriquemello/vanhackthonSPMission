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

/** @var Laravel\Lumen\Routing\Router $router */
$router->get('/', function () use ($router) {
	return $router->app->version();
});

$router->get('/proposals', function () use ($router) {
	return 'list of proposal';
});

$router->post('/proposal', function () use ($router) {
	return 'create proposal';
});

$router->put('/proposal/{id}', function ($id) use ($router) {
	return 'update proposal ' . $id;
});

$router->delete('/proposal/{id}', function ($id) use ($router) {
	return 'delete proposal ' . $id;
});

$router->get('/proposal/{id}', function ($id) use ($router) {
	return 'proposal with id ' . $id;
});

$router->get('/proposal/{id}/isSigned', function ($id) use ($router) {
	return 'isSigned proposal ' . $id;
});

$router->get('/proposal/{id}/isOpened', function ($id) use ($router) {
	return 'isOpened proposal ' . $id;
});

$router->get('/proposal/{id}/isDeclined', function ($id) use ($router) {
	return 'isDeclined proposal ' . $id;
});

$router->get('/proposal/{id}/getLastVersion', function ($id) use ($router) {
	return 'getLastVersion proposal ' . $id;
});
