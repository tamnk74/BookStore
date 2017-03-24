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

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::resource('users','UserController');

Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);//

Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);

Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);

Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);

Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);

Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);

Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

Route::resource('books', 'BookController', ['only' => ['index'], 'middleware' => ['permission:book-view']]);

Route::resource('books', 'BookController', ['except' => ['index'], 'middleware' => ['permission:book-others']]);

Route::resource('permissions', 'PermissionController', ['middleware' => ['permission:permission']]);

Route::resource('promotions', 'PromotionController', ['middleware' => ['permission:promotion']]);

Route::resource('stores', 'StoreController', ['middleware' => ['permission:store']]);

Route::get('importBooks/create_file',
    ['as' => 'create_file', 'uses' => 'ImportBookController@create_file', 'middleware' => ['permission:import-book']]);

Route::get('importBooks/downloadExcel/{type}',
    ['as' => 'exportExcel', 'uses' => 'ImportBookController@downloadExcel', 'middleware' => ['permission:export-excel']]);

Route::post('importBooks/importExcel',
    ['as' => 'importExcel', 'uses' => 'ImportBookController@importExcel', 'middleware' => ['permission:import-book']]);

Route::resource('importBooks', 'ImportBookController', ['middleware' => 'permission:import-book-function']);

Route::resource('billDetails', 'BillDetailController', ['middleware' => 'permission:bill']);

Route::group(['middleware' => 'permission:other-items'], function()
{
    Route::resource('categories', 'CategoryController');

    Route::resource('types', 'TypeController');

    Route::resource('publishes', 'PublishController');

    Route::resource('authors', 'AuthorController');

    Route::resource('todo', 'TodoController', ['only' => ['index']]);
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