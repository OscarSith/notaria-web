<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('ubigeo', 'PruebaController@ubigeo');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web', 'guest']], function($route) {

	$route->get('login', 'Auth\AuthController@showLoginForm');
	$route->post('login', 'Auth\AuthController@login');

});

Route::group(['middleware' => ['web', 'auth']], function ($route) {

    $route->get('/', 'HomeController@index')->name('protestos');
    $route->get('persona', 'PersonaController@index')->name('persona');
    $route->get('persona/create', 'PersonaController@create')->name('add-persona');

    // AJAX
    $route->get('master-tables', 'HomeController@getMasterOfTables');

    $this->get('logout', 'Auth\AuthController@logout');

});
