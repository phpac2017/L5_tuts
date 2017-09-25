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