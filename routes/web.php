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
        '_active_menu' => 'dashboard'
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
    
    Route::group(['prefix' => 'descriere', '_active_menu' => 'description'], function () {
        Route::get('/', [
            'as' => 'hospital.description.index',
            'uses' => 'HospitalDescriptionController@index'
        ]);

        Route::get('/edit', [
                'as' => 'hospital.description.edit',
                'uses' => 'HospitalDescriptionController@edit',
        ]);
        
        Route::post('/update', [
                'as' => 'hospital.description.update',
                'uses' => 'HospitalDescriptionController@update',
        ]);
    });
    
    Route::group(['prefix' => 'specialitati', '_active_menu' => 'speciality'], function () {
        Route::get('/', [
            'as' => 'hospital.speciality.index',
            'uses' => 'HospitalSpecialitiesController@index'
        ]);

        Route::get('/edit', [
                'as' => 'hospital.speciality.edit',
                'uses' => 'HospitalSpecialitiesController@edit',
        ]);
        
        Route::post('/update', [
                'as' => 'hospital.speciality.update',
                'uses' => 'HospitalSpecialitiesController@update',
        ]);
    });
    
    Route::group(['prefix' => 'ambulatorii', '_active_menu' => 'ambulatory'], function () {
        Route::get('/', [
            'as' => 'hospital.ambulatory.index',
            'uses' => 'HospitalAmbulatoryController@index'
        ]);

        Route::get('/edit', [
                'as' => 'hospital.ambulatory.edit',
                'uses' => 'HospitalAmbulatoryController@edit',
        ]);
        
        Route::post('/update', [
                'as' => 'hospital.ambulatory.update',
                'uses' => 'HospitalAmbulatoryController@update',
        ]);
    });
 
    Route::group(['prefix' => 'manager', '_active_menu' => 'manager'], function () {
        Route::get('/', [
            'as' => 'hospital.manager.index',
            'uses' => 'HospitalManagerController@index'
        ]);

        Route::get('/edit', [
                'as' => 'hospital.manager.edit',
                'uses' => 'HospitalManagerController@edit',
        ]);
        
        Route::post('/update', [
                'as' => 'hospital.manager.update',
                'uses' => 'HospitalManagerController@update',
        ]);
    });
});
