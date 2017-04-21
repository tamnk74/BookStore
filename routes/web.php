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

Route::name('homepage')->get('/', 'FrontEnd\HomeController@index');

Route::name('contact')->get('/contact', 'FrontEnd\HomeController@contact');

Route::name('show')->get('/show/{id}', 'FrontEnd\HomeController@show');

Route::name('book')->get('/book', 'FrontEnd\HomeController@listBook');

Route::get('/admin', 'HomeController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home', 'HomeController@index');

    Route::resource('users','UserController', ['middleware' => 'permission:user-manager']);

    Route::resource('permissions', 'PermissionController', ['middleware' => 'permission:permission-manage']);

    Route::resource('roles', 'RoleController',['middleware' => 'permission:role-manager']);

    Route::resource('books', 'BookController', ['middleware' => ['permission:book']]);

    Route::resource('stores', 'StoreController', ['omly' => ['index'], 'middleware' => ['permission:store-view']]);

    Route::group(['middleware' => 'permission:import-book'], function() {
        Route::get('importBooks/create_file', ['as' => 'create_file', 'uses' => 'ImportBookController@create_file']);
        Route::get('importBooks/downloadExcel/{type}', ['as' => 'exportExcel', 'uses' => 'ImportBookController@downloadExcel']);
        Route::post('importBooks/importExcel', ['as' => 'importExcel', 'uses' => 'ImportBookController@importExcel']);
        Route::resource('importBooks', 'ImportBookController', ['middleware' => 'permission:import-book']);
    });

    Route::group(['middleware' => 'permission:bill'], function() {
        Route::resource('bills', 'BillController');
        Route::get('search-book', 'BillController@searchBook');
        Route::get('get-book', 'BillController@getBook');
    });


    Route::group(['middleware' => 'permission:other-items'], function()
    {
        Route::resource('categories', 'CategoryController');
        Route::resource('types', 'TypeController');
        Route::resource('publishers', 'PublisherController');
        Route::resource('authors', 'AuthorController');
    });

    Route::group(['prefix' => 'statistic', 'middleware' => ['permission:statistic']], function () {
        Route::get('/daily', 'StatisticController@daily')->name('statistic.daily');
        Route::get('/monthly', 'StatisticController@monthly')->name('statistic.monthly');
        Route::get('/quarterly', 'StatisticController@quarterly')->name('statistic.quarterly');
    });

    Route::resource('employees', 'EmployeeController');
    Route::get('profiles', 'ProfileController@index')->name('profiles.index');
    Route::match(['put', 'patch'], 'profiles/update', 'ProfileController@update')->name('profiles.update');
    Route::get('profiles/edit', 'ProfileController@edit')->name('profiles.edit');
});