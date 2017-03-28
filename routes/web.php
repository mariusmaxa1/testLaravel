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

Route::group(['prefix' => 'profil', 'namespace' => 'Front\Hospital'], function () {
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
    
    Route::group(['prefix' => 'anunturi', '_active_menu' => 'news'], function () {
        Route::get('/', [
            'as' => 'hospital.news.index',
            'uses' => 'HospitalNewsController@index'
        ]);
        
        Route::get('/create', [
                'as' => 'hospital.news.create',
                'uses' => 'HospitalNewsController@create',
        ]);
        
        Route::post('/store', [
                'as' => 'hospital.news.store',
                'uses' => 'HospitalNewsController@store',
        ]);
        
        Route::group(['prefix' => '{newsId}', 'where' => ['newsId' => '[0-9]+']], function () {
            Route::get('/show', [
                'as' => 'hospital.news.show',
                'uses' => 'HospitalNewsController@show',
            ]);
     
            Route::get('/edit', [
                    'as' => 'hospital.news.edit',
                    'uses' => 'HospitalNewsController@edit',
            ]);

            Route::post('/update', [
                    'as' => 'hospital.news.update',
                    'uses' => 'HospitalNewsController@update',
            ]);

            Route::get('/delete', [
                    'as' => 'hospital.news.delete',
                    'uses' => 'HospitalNewsController@delete',
            ]);              
        });
    });
    
    Route::group(['prefix' => 'medici', '_active_menu' => 'doctors'], function () {
        Route::get('/', [
            'as' => 'hospital.doctors.index',
            'uses' => 'HospitalDoctorsController@index'
        ]);
        
        Route::get('/create', [
                'as' => 'hospital.doctors.create',
                'uses' => 'HospitalDoctorsController@create',
        ]);
        
        Route::post('/store', [
                'as' => 'hospital.doctors.store',
                'uses' => 'HospitalDoctorsController@store',
        ]);
        
        Route::group(['prefix' => '{doctorId}', 'where' => ['doctorId' => '[0-9]+']], function () {
            Route::get('/show', [
                'as' => 'hospital.doctors.show',
                'uses' => 'HospitalDoctorsController@show',
            ]);
     
            Route::get('/edit', [
                    'as' => 'hospital.doctors.edit',
                    'uses' => 'HospitalDoctorsController@edit',
            ]);

            Route::post('/update', [
                    'as' => 'hospital.doctors.update',
                    'uses' => 'HospitalDoctorsController@update',
            ]);

            Route::get('/delete', [
                    'as' => 'hospital.doctors.delete',
                    'uses' => 'HospitalDoctorsController@delete',
            ]);              
        });
    });
    
    Route::group(['prefix' => 'indicatori', '_active_menu' => 'indicators'], function () {
        Route::get('/', [
            'as' => 'hospital.indicators.index',
            'uses' => 'HospitalIndicatorsController@index'
        ]);
        
        Route::get('/create', [
                'as' => 'hospital.indicators.create',
                'uses' => 'HospitalIndicatorsIdController@create',
        ]);
        
        Route::post('/store', [
                'as' => 'hospital.indicators.store',
                'uses' => 'HospitalndicatorsController@store',
        ]);
        
        Route::group(['prefix' => '{indicatorId}', 'where' => ['indicatorId' => '[0-9]+']], function () {
            Route::get('/show', [
                'as' => 'hospital.indicators.show',
                'uses' => 'HospitalndicatorsController@show',
            ]);
     
            Route::get('/edit', [
                    'as' => 'hospital.indicators.edit',
                    'uses' => 'HospitalndicatorsController@edit',
            ]);

            Route::post('/update', [
                    'as' => 'hospital.indicators.update',
                    'uses' => 'HospitalndicatorsController@update',
            ]);

            Route::get('/delete', [
                    'as' => 'hospital.indicators.delete',
                    'uses' => 'HospitalndicatorsController@delete',
            ]);              
        });
    });
});
