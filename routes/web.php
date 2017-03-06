<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('categories', 'CategoryController');

Route::resource('types', 'TypeController');

Route::resource('publishes', 'PublishController');

Route::resource('authors', 'AuthorController');

Route::resource('books', 'BookController');

Route::resource('promotions', 'PromotionController');

Route::resource('stores', 'StoreController');

Route::get('importBooks/create_file', 'ImportBookController@create_file');

Route::get('importBooks/downloadExcel/{type}', 'ImportBookController@downloadExcel');

Route::post('importBooks/importExcel',  ['as' => 'importExcel', 'uses' => 'ImportBookController@importExcel']);

Route::resource('importBooks', 'ImportBookController');

Route::resource('billDetails', 'BillDetailController');

Route::resource('bills', 'BillController');