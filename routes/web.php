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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/test-data', 'myController@getData');
$app->post('/test-data', 'myController@addData');
$app->put('/test-data', 'myController@editData');
$app->delete('/test-data', 'myController@deleteData');
