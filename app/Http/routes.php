<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('myform', 'AjaxDemoController@myform');

Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'AjaxDemoController@selectAjax']);

Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));

Route::get('exportPDF', 'ItemController@exportPDF');

Route::get('importExport', 'ItemController@importExport');

Route::get('downloadExcel/{type}', 'ItemController@downloadExcel');

Route::post('importExcel', 'ItemController@importExcel');

Route::get('web-register', 'Auth\AuthController@webRegister');
Route::post('web-register', 'Auth\AuthController@webRegisterPost');

Route::get('mail', 'ItemController@mail');


Route::get('test', 'ItemController@test');


// Authentication routes...
Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('register',  [ 'as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('register',  [ 'as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);

// Password reset link request routes...
Route::get('password/email', [ 'as' => 'password/email', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('password/email', [ 'as' => 'password/email', 'uses' => 'Auth\PasswordController@postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');