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

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', function () {
        return "test";
    });
});

Route::group(['prefix' => 'profil', 'namespace' => 'Hospital'], function () {
    Route::get('/', [
        'as' => 'hospital.dashboard.index',
        'uses' => 'DashboardController@getIndex',
        '_active_menu' => 'hospitalDashboard'
    ]);
    
    Route::group(['prefix' => 'informatii-generale', '_active_menu' => 'information'], function () {
        Route::get('/', [
            'as' => 'hospital.information.index',
            'uses' => 'HospitalInformationController@index'
        ]);

        Route::get('/edit', [
                'as' => 'hospital.information.edit',
                'uses' => 'HospitalInformationController@edit',
        ]);
        
        Route::post('/update', [
                'as' => 'hospital.information.update',
                'uses' => 'HospitalInformationController@update',
        ]);
    });
    
    Route::group(['prefix' => 'descriere', '_active_menu' => 'hospitalDescription'], function () {
        Route::get('/', [
            'as' => 'hospital.hospitalDescription.index',
            'uses' => 'HospitalDescriptionController@getIndex'
        ]);

        Route::get('/edit', [
                'as' => 'hospital.hospitalDescription.edit',
                'uses' => 'HospitalDescriptionController@getEdit',
        ]);
        
        Route::post('/update', [
                'as' => 'hospital.hospitalDescription.update',
                'uses' => 'HospitalDescriptionController@postEdit',
        ]);
    });
});
