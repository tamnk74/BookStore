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

    Route::get('/home', 'HomeController@index');
    Route::resource('users','UserController', ['only' => ['create', 'store'], 'middleware' =>
        'permission:user-create']);
    Route::resource('users','UserController', ['only' => ['edit', 'update'], 'middleware' =>
        'permission:user-update']);
    Route::resource('users','UserController', ['only' => ['show'], 'middleware' =>
        'permission:user-show']);
    Route::resource('users','UserController', ['only' => ['destroy'], 'middleware' =>
        'permission:user-delete']);
    Route::resource('users','UserController', ['only' => ['index'], 'middleware' =>
        'permission:user-list']);
    Route::resource('roles', 'RoleController', ['middleware' =>
        'permission:role-list']);
    Route::resource('permissions', 'PermissionController', ['middleware' =>
        'permission:permission-manage']);
    Route::resource('roles', 'RoleController', ['only' => ['index', 'show'], 'middleware' =>
        'permission:role-list']);
    Route::resource('roles', 'RoleController',['except' => ['index', 'show'], 'middleware' =>
        'permission:role-manage']);

    Route::resource('books', 'BookController', ['only' => ['index'], 'middleware' => ['permission:book-view']]);

    Route::resource('books', 'BookController', ['except' => ['index'], 'middleware' => ['permission:book-others']]);

    Route::resource('permissions', 'PermissionController', ['middleware' => ['permission:permission-manage']]);

    Route::resource('promotions', 'PromotionController', ['middleware' => ['permission:promotion']]);

    Route::resource('stores', 'StoreController', ['omly' => ['index'], 'middleware' => ['permission:store-view']]);

    Route::get('importBooks/create_file',
        ['as' => 'create_file', 'uses' => 'ImportBookController@create_file', 'middleware' => ['permission:import-book']]);

    Route::get('importBooks/downloadExcel/{type}',
        ['as' => 'exportExcel', 'uses' => 'ImportBookController@downloadExcel', 'middleware' => ['permission:export-excel']]);

    Route::post('importBooks/importExcel',
        ['as' => 'importExcel', 'uses' => 'ImportBookController@importExcel', 'middleware' => ['permission:import-book']]);

    Route::resource('importBooks', 'ImportBookController', ['middleware' => 'permission:import-book-function']);

    Route::resource('bills', 'BillController', ['middleware' => 'permission:bill']);

    Route::get('search-book', 'BillDetailController@searchBook', ['middleware' => 'permission:bill']);

    Route::group(['middleware' => 'permission:other-items'], function()
    {
        Route::resource('categories', 'CategoryController');

        Route::resource('types', 'TypeController');

        Route::resource('publishes', 'PublishController');

        Route::resource('authors', 'AuthorController');
    });

    Route::group(['prefix' => 'statistic', 'middleware' => ['permission:statistic']], function () {

        Route::get('/daily', [
            'uses' => 'StatisticController@daily',
            'as' => 'statistic.daily'
        ]);

        Route::get('/monthly', [
            'uses' => 'StatisticController@monthly',
            'as' => 'statistic.monthly'
        ]);

        Route::get('/quarterly', [
            'uses' => 'StatisticController@quarterly',
            'as' => 'statistic.quarterly'
        ]);
    });
});



Route::resource('publishers', 'PublisherController');