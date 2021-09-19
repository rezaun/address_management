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

Route::get('/','Frontend\FrontenController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route:: group(['middleware'=>'auth'],function (){

    Route::prefix('users')->group(function (){
        Route::get('/view','Backend\UserController@view')->name('users.view');
        Route::get('/add','Backend\UserController@add')->name('users.add');
        Route::post('/store','Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
        Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');
    });

    Route::prefix('profiles')->group(function (){
        Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
        Route::get('/edit/{id}','Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/update/{id}','Backend\ProfileController@update')->name('profiles.update');
        Route::get('/password/view','Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/password/update','Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
    });

    Route::prefix('divisions')->group(function (){
        Route::get('/view','Backend\DivisionController@view')->name('divisions.view');
        Route::get('/add','Backend\DivisionController@add')->name('divisions.add');
        Route::post('/store','Backend\DivisionController@store')->name('divisions.store');
        Route::get('/edit/{id}','Backend\DivisionController@edit')->name('divisions.edit');
        Route::post('/update/{id}','Backend\DivisionController@update')->name('divisions.update');
        Route::post('/delete/','Backend\DivisionController@delete')->name('divisions.delete');
    });


    Route::prefix('districts')->group(function (){
        Route::get('/view','Backend\DistrictController@view')->name('districts.view');
        Route::get('/add','Backend\DistrictController@add')->name('districts.add');
        Route::post('/store','Backend\DistrictController@store')->name('districts.store');
        Route::get('/edit/{id}','Backend\DistrictController@edit')->name('districts.edit');
        Route::post('/update/{id}','Backend\DistrictController@update')->name('districts.update');
        Route::post('/delete/','Backend\DistrictController@delete')->name('districts.delete');
    });


    Route::prefix('upazilas')->group(function (){
        Route::get('/view','Backend\UpazilaController@view')->name('upazilas.view');
        Route::get('/add','Backend\UpazilaController@add')->name('upazilas.add');
        Route::post('/store','Backend\UpazilaController@store')->name('upazilas.store');
        Route::get('/edit/{id}','Backend\UpazilaController@edit')->name('upazilas.edit');
        Route::post('/update/{id}','Backend\UpazilaController@update')->name('upazilas.update');
        Route::post('/delete/','Backend\UpazilaController@delete')->name('upazilas.delete');
    });

    Route::prefix('unions')->group(function (){
        Route::get('/view','Backend\UnionController@view')->name('unions.view');
        Route::get('/add','Backend\UnionController@add')->name('unions.add');
        Route::post('/store','Backend\UnionController@store')->name('unions.store');
        Route::get('/edit/{id}','Backend\UnionController@edit')->name('unions.edit');
        Route::post('/update/{id}','Backend\UnionController@update')->name('unions.update');
        Route::post('/delete/','Backend\UnionController@delete')->name('unions.delete');
    });

    Route::prefix('wards')->group(function (){
        Route::get('/view','Backend\WardController@view')->name('wards.view');
        Route::get('/add','Backend\WardController@add')->name('wards.add');
        Route::post('/store','Backend\WardController@store')->name('wards.store');
        Route::get('/edit/{id}','Backend\WardController@edit')->name('wards.edit');
        Route::post('/update/{id}','Backend\WardController@update')->name('wards.update');
        Route::post('/delete/','Backend\WardController@delete')->name('wards.delete');
    });

    Route::prefix('villages')->group(function (){
        Route::get('/view','Backend\VillageController@view')->name('villages.view');
        Route::get('/add','Backend\VillageController@add')->name('villages.add');
        Route::post('/store','Backend\VillageController@store')->name('villages.store');
        Route::get('/edit/{id}','Backend\VillageController@edit')->name('villages.edit');
        Route::post('/update/{id}','Backend\VillageController@update')->name('villages.update');
        Route::post('/delete/','Backend\VillageController@delete')->name('villages.delete');
    });

    Route::get('/get-district','Backend\DefaultController@getDistrict')->name('default.get-district');
    Route::get('/get-upazila','Backend\DefaultController@getUpazila')->name('default.get-upazila');
    Route::get('/get-union','Backend\DefaultController@getUnion')->name('default.get-union');
    Route::get('/get-ward','Backend\DefaultController@getWard')->name('default.get-ward');

});
