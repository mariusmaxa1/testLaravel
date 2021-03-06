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

Route::get('/cautare/{tip}', [
    'as' => 'anunturi',
    'uses' => 'FrontController@index'
]);

Route::get('social/login/redirect/{provider}', [
    'uses' => 'Auth\SocialController@redirectToProvider', 
    'as' => 'social.login'
    ]);
Route::get('social/login/{provider}', 'Auth\SocialController@handleProviderCallback');

Route::group(['prefix' => 'profil', 'namespace' => 'Front'], function () {
    Route::get('/', [
        'as' => 'hospital.dashboard.index',
        'uses' => 'DashboardController@getIndex',
        '_active_menu' => 'dashboard'
    ]);
    
    Route::group(['prefix' => 'contul-meu', '_active_menu' => 'account'], function () {
            Route::get('/', [
                'as' => 'account.edit',
                'uses' => 'AccountController@edit'
            ]);

            Route::post('/update', [
                'as' => 'account.update',
                'uses' => 'AccountController@postUser',
            ]);
            
            Route::post('/password', [
                'as' => 'update.password',
                'uses' => 'AccountController@postPassword'
            ]);

            Route::post('/social/remove', [
                'as' => 'update.social.remove',
                'uses' => 'AccountController@postSocialRemove'
            ]);
            
            Route::get('/social/associate/{provider}', [
                'as' => 'update.social.associate',
                'uses' => 'AccountController@getSocialAssociate'
            ]);

            Route::get('/social/associate/{provider}/callback', [
                'as' => 'update.social.associate.handle',
                'uses' => 'AccountController@getSocialAssociateHandle'
            ]);

        });
    
    Route::group(['middleware' => 'hospital', 'namespace' => 'Hospital'], function () {
        
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
            
            Route::post('/store', [
                    'as' => 'hospital.description.photo.update',
                    'uses' => 'HospitalDescriptionController@store',
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
            
            Route::post('/store', [
                    'as' => 'hospital.manager.store',
                    'uses' => 'HospitalManagerController@store',
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
                    'uses' => 'HospitalIndicatorsController@create',
            ]);

            Route::post('/store', [
                    'as' => 'hospital.indicators.store',
                    'uses' => 'HospitalIndicatorsController@store',
            ]);

            Route::group(['prefix' => '{indicatorId}', 'where' => ['indicatorId' => '[0-9]+']], function () {
                Route::get('/show', [
                    'as' => 'hospital.indicators.show',
                    'uses' => 'HospitalIndicatorsController@show',
                ]);

                Route::get('/edit', [
                        'as' => 'hospital.indicators.edit',
                        'uses' => 'HospitalIndicatorsController@edit',
                ]);

                Route::post('/update', [
                        'as' => 'hospital.indicators.update',
                        'uses' => 'HospitalIndicatorsController@update',
                ]);

                Route::get('/delete', [
                        'as' => 'hospital.indicators.delete',
                        'uses' => 'HospitalIndicatorsController@delete',
                ]);              
            });
        });
        
        
    });
    
    Route::group(['middleware' => 'patient', 'namespace' => 'Patient'], function () {
        Route::get('/dashboard', [
            'as' => 'patient.dashboard.index',
            'uses' => 'DashboardController@index',
            '_active_menu' => 'dashboard'
        ]);
        
    });
    
    Route::group(['middleware' => 'defaultM', 'namespace' => 'DefaultM'], function () {
        Route::get('/dashboard', [
            'as' => 'default.dashboard.index',
            'uses' => 'DashboardController@index',
            '_active_menu' => 'dashboard'
        ]);
        
        
        Route::get('/profil', [
            'as' => 'default.profil.edit',
            'uses' => 'ProfileController@edit',
            '_active_menu' => 'profile'
        ]);
        
        
        Route::get('/descriere', [
            'as' => 'default.description.edit',
            'uses' => 'DescriptionController@edit',
            '_active_menu' => 'profile'
        ]);
               
        Route::get('/programari', [
            'as' => 'default.appointments.edit',
            'uses' => 'AppointmentsController@edit',
            '_active_menu' => 'profile'
        ]);
        
        
        Route::get('/progra-de-lucru', [
            'as' => 'default.workProgram.edit',
            'uses' => 'WorkProgramController@edit',
            '_active_menu' => 'profile'
        ]);


    });
    
    
    
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [
        'as' => 'admin.login',
        'uses' => 'AuthController@getLogin'
    ]);

    Route::post('/login', [
        'as' => 'admin.login.post',
        'uses' => 'AuthController@postLogin'
    ]);

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/logout', [
            'as' => 'admin.logout',
            'uses' => 'AuthController@getLogout'
        ]);

        Route::get('/', [
            'as' => 'admin.dashboard',
            'uses' => 'DashboardController@getIndex',
            '_active_menu' => 'dashboard'
        ]);
        
        Route::group(['prefix' => 'users', '_active_menu' => 'users'], function () {
            Route::get('/', [
                'as' => 'admin.users.index',
                'uses' => 'UsersController@getIndex'
            ]);

            Route::get('/create', [
                'as' => 'admin.users.create',
                'uses' => 'UsersController@getCreate'
            ]);

            Route::post('/store', [
                'as' => 'admin.users.store',
                'uses' => 'UsersController@postStore'
            ]);

            Route::group(['prefix' => '{userId}', 'where' => ['userId' => '[0-9]+']], function () {
                Route::get('/', [
                    'as' => 'admin.users.show',
                    'uses' => 'UsersController@getShow',
                    '_active_tab' => 'overview'
                ]);

                Route::get('/delete', [
                    'as' => 'admin.users.delete',
                    'uses' => 'UsersController@getDelete'
                ]);

                Route::get('/edit', [
                    'as' => 'admin.users.edit',
                    'uses' => 'UsersController@getEdit',
                    '_active_tab' => 'edit'
                ]);

                Route::post('/update', [
                    'as' => 'admin.users.update',
                    'uses' => 'UsersController@postUpdate'
                ]);

                Route::get('/activate', [
                    'as' => 'admin.users.activate',
                    'uses' => 'UsersController@activate'
                ]);

                Route::get('/deactivate', [
                    'as' => 'admin.users.deactivate',
                    'uses' => 'UsersController@deactivate'
                ]);                

                Route::group(['prefix' => 'social'], function () {
                    Route::get('{socialId}/delete', [
                        'as' => 'admin.users.social.delete',
                        'uses' => 'UsersController@getSocialDelete'
                    ])->where('socialId', '[0-9]+');
                });
            });
        });
        
        Route::group(['prefix' => 'hospitals', '_active_menu' => 'hospitals'], function () {
            Route::get('/', [
                'as' => 'admin.hospitals.index',
                'uses' => 'HospitalsController@index'
            ]);

            Route::get('/create', [
                'as' => 'admin.hospitals.create',
                'uses' => 'HospitalsController@create'
            ]);

             Route::post('/store', [
                'as' => 'admin.hospitals.store',
                'uses' => 'HospitalsController@store'
            ]);

            Route::group(['prefix' => '{hospitalId}', 'where' => ['hospitalId' => '[0-9]+']], function ($hospitalId) {

                Route::get('/show', [
                    'as' => 'admin.hospitals.show',
                    'uses' => 'HospitalsController@show',
                    '_active_tab' => 'informatii_spital'
                ]);
                
                Route::get('/delete', [
                    'as' => 'admin.hospitals.delete',
                    'uses' => 'HospitalsController@delete'
                ]);

                Route::get('/edit', [
                    'as' => 'admin.hospitals.edit',
                    'uses' => 'HospitalsController@edit',
                    '_active_tab' => 'informatii_spital'
                ]);

                Route::post('/update', [
                    'as' => 'admin.hospitals.update',
                    'uses' => 'HospitalsController@update'
                ]);
                
                Route::get('/activate', [
                    'as' => 'admin.hospitals.activate',
                    'uses' => 'HospitalsController@activate'
                ]);

                Route::get('/deactivate', [
                    'as' => 'admin.hospitals.deactivate',
                    'uses' => 'HospitalsController@deactivate'
                ]);
                
                Route::group(['prefix' => 'informatii', 'namespace' => 'Hospital'], function () {
                    Route::get('/', [
                        'as' => 'admin.hospitals.show.info',
                        'uses' => 'HospitalInformationController@index',
                        '_active_tab' => 'information'
                    ]);

                    Route::get('/edit', [
                        'as' => 'admin.hospitals.edit.info',
                        'uses' => 'HospitalInformationController@edit',
                        '_active_tab' => 'information'
                    ]);

                    Route::post('/update', [
                        'as' => 'admin.hospitals.update.info',
                        'uses' => 'HospitalInformationController@update'
                    ]);                    
                }); 
                
                Route::group(['prefix' => 'descriere', 'namespace' => 'Hospital'], function () {
                    Route::get('/', [
                        'as' => 'admin.hospitals.show.description',
                        'uses' => 'HospitalDescriptionController@index',
                        '_active_tab' => 'description'
                    ]);

                    Route::get('/edit', [
                        'as' => 'admin.hospitals.edit.description',
                        'uses' => 'HospitalDescriptionController@edit',
                        '_active_tab' => 'description'
                    ]);

                    Route::post('/update', [
                        'as' => 'admin.hospitals.update.description',
                        'uses' => 'HospitalDescriptionController@update'
                    ]);                    
                });   
                
                Route::group(['prefix' => 'cuvant-manager', 'namespace' => 'Hospital'], function () {
                    Route::get('/', [
                        'as' => 'admin.hospitals.show.manager',
                        'uses' => 'HospitalManagerController@index',
                        '_active_tab' => 'manager'
                   ]);

                   Route::get('/edit', [
                        'as' => 'admin.hospitals.edit.manager',
                        'uses' => 'HospitalManagerController@edit',
                        '_active_tab' => 'manager'
                    ]);

                   Route::post('/update', [
                        'as' => 'admin.hospitals.update.manager',
                        'uses' => 'HospitalManagerController@update'
                    ]);                     
                });
                
                Route::group(['prefix' => 'ambulatorii', 'namespace' => 'Hospital'], function () {
                    Route::get('/', [
                        'as' => 'admin.hospitals.index.ambulatories',
                        'uses' => 'HospitalAmbulatoriesController@index',
                        '_active_tab' => 'ambulatories'
                    ]);
                
                    Route::get('/create', [
                        'as' => 'admin.hospitals.add.ambulatories',
                        'uses' => 'HospitalAmbulatoriesController@edit',
                        '_active_tab' => 'ambulatories'
                    ]);

                    Route::post('/store', [
                        'as' => 'admin.hospitals.store.ambulatories',
                        'uses' => 'HospitalAmbulatoriesController@update',
                        '_active_tab' => 'ambulatories'
                    ]);
                 
                });
                
                Route::group(['prefix' => 'specialitati', 'namespace' => 'Hospital'], function () {
                     Route::get('/', [
                        'as' => 'admin.hospitals.index.specialities',
                        'uses' => 'HospitalSpecialitiesController@index',
                        '_active_tab' => 'specialities'
                    ]);
                
                    Route::get('/create', [
                        'as' => 'admin.hospitals.add.specialities',
                        'uses' => 'HospitalSpecialitiesController@edit',
                        '_active_tab' => 'specialities'
                    ]);

                    Route::post('/store', [
                        'as' => 'admin.hospitals.store.specialities',
                        'uses' => 'HospitalSpecialitiesController@update',
                        '_active_tab' => 'specialities'
                    ]);
            
                });
                
                Route::group(['prefix' => 'doctors', 'namespace' => 'Hospital'], function () {
                    Route::get('/', [
                        'as' => 'admin.hospitals.index.doctors',
                        'uses' => 'HospitalDoctorsController@index',
                        '_active_tab' => 'doctors'
                    ]);                  
                });
                
                Route::group(['prefix' => 'indicators', 'namespace' => 'Hospital'], function () {
                    Route::get('/', [
                        'as' => 'admin.hospitals.index.indicators',
                        'uses' => 'HospitalIndicatorsController@index',
                        '_active_tab' => 'indicators'
                     ]);                 
                });
            });
        });
        
        Route::group(['prefix' => 'social', '_active_menu' => 'social'], function () {
            Route::get('/', [
                'as' => 'admin.social.index',
                'uses' => 'SocialController@getIndex'
            ]);

            Route::group(['prefix' => '{socialId}', 'where' => ['socialId' => '[0-9]+']], function () {
                Route::get('/', [
                    'as' => 'admin.social.show',
                    'uses' => 'SocialController@getShow',
                    '_active_tab' => 'overview'
                ]);

                Route::get('/delete', [
                    'as' => 'admin.social.delete',
                    'uses' => 'SocialController@getDelete'
                ]);
            });
        });
        
        Route::group(['prefix' => 'ambulatories', '_active_menu' => 'ambulatories'], function () {
             Route::get('/', [
                'as' => 'admin.ambulatories.index',
                'uses' => 'AmbulatoriesController@getIndex'
            ]);

            Route::get('/create', [
                'as' => 'admin.ambulatories.create',
                'uses' => 'AmbulatoriesController@getCreate'
            ]);

             Route::post('/store', [
                'as' => 'admin.ambulatories.store',
                'uses' => 'AmbulatoriesController@postStore'
            ]);

            Route::group(['prefix' => '{ambulatoryId}', 'where' => ['ambulatoryId' => '[0-9]+']], function () {
                Route::get('/', [
                    'as' => 'admin.ambulatories.show',
                    'uses' => 'AmbulatoriesController@getShow',
                    '_active_tab' => 'overview'
                ]);
                Route::get('/delete', [
                    'as' => 'admin.ambulatories.delete',
                    'uses' => 'AmbulatoriesController@getDelete'
                ]);
                Route::get('/edit', [
                    'as' => 'admin.ambulatories.edit',
                    'uses' => 'AmbulatoriesController@getEdit',
                    '_active_tab' => 'edit'
                ]);

                Route::post('/update', [
                    'as' => 'admin.ambulatories.update',
                    'uses' => 'AmbulatoriesController@postUpdate'
                ]);
                Route::get('/activate', [
                    'as' => 'admin.ambulatories.activate',
                    'uses' => 'AmbulatoriesController@getActivate'
                ]);

                Route::get('/deactivate', [
                    'as' => 'admin.ambulatories.deactivate',
                    'uses' => 'AmbulatoriesController@getDeactivate'
                ]);
            });
        });
        
        Route::group(['prefix' => 'specialities', '_active_menu' => 'specialities'], function () {
             
            Route::get('/', [
                'as' => 'admin.specialities.index',
                'uses' => 'SpecialitiesController@getIndex'
            ]);

            Route::get('/create', [
                'as' => 'admin.specialities.create',
                'uses' => 'SpecialitiesController@getCreate'
            ]);

            Route::post('/store', [
                'as' => 'admin.specialities.store',
                'uses' => 'SpecialitiesController@postStore'
            ]);

            Route::group(['prefix' => '{specialityId}', 'where' => ['specialityId' => '[0-9]+']], function () {
                Route::get('/', [
                    'as' => 'admin.specialities.show',
                    'uses' => 'SpecialitiesController@getShow',
                    '_active_tab' => 'overview'
                ]);
                Route::get('/delete', [
                    'as' => 'admin.specialities.delete',
                    'uses' => 'SpecialitiesController@getDelete'
                ]);

                Route::get('/edit', [
                    'as' => 'admin.specialities.edit',
                    'uses' => 'SpecialitiesController@getEdit',
                    '_active_tab' => 'edit'
                ]);

                Route::post('/update', [
                    'as' => 'admin.specialities.update',
                    'uses' => 'SpecialitiesController@postUpdate'
                ]);
                Route::get('/activate', [
                    'as' => 'admin.specialities.activate',
                    'uses' => 'SpecialitiesController@getActivate'
                ]);

                Route::get('/deactivate', [
                    'as' => 'admin.specialities.deactivate',
                    'uses' => 'SpecialitiesController@getDeactivate'
                ]);
            });
        });
        
        Route::group(['prefix' => 'chestionare', '_active_menu' => 'surveys'], function () {
            Route::get('/', [
                'as' => 'admin.surveys.index',
                'uses' => 'SurveysController@index'
            ]);

            Route::get('/create', [
                'as' => 'admin.surveys.create',
                'uses' => 'SurveysController@create'
            ]);

            Route::post('/store', [
                'as' => 'admin.surveys.store',
                'uses' => 'SurveysController@store'
            ]);

            Route::group(['prefix' => '{surveyId}', 'where' => ['surveyId' => '[0-9]+']], function () {
                Route::get('/', [
                    'as' => 'admin.surveys.show',
                    'uses' => 'SurveysController@show',
                    '_active_tab' => 'overview'
                ]);

                Route::get('/delete', [
                    'as' => 'admin.surveys.destroy',
                    'uses' => 'SurveysController@destroy'
                ]);

                Route::get('/edit', [
                    'as' => 'admin.surveys.edit',
                    'uses' => 'SurveysController@edit',
                    '_active_tab' => 'edit'
                ]);

                Route::post('/update', [
                    'as' => 'admin.surveys.update',
                    'uses' => 'SurveysController@update'
                ]);
                
               Route::get('/activate', [
                    'as' => 'admin.surveys.activate',
                    'uses' => 'SurveysController@activate',
                    '_active_tab' => 'edit'
                ]);

                Route::get('/deactivate', [
                    'as' => 'admin.surveys.deactivate',
                    'uses' => 'SurveysController@deactivate'
                ]);

                Route::group(['prefix' => 'sectiuni', '_active_tab' => 'sections'], function () {
                    Route::get('/', [
                        'as' => 'admin.surveys.sections.index',
                        'uses' => 'SurveysController@sections'
                    ]);

                    Route::post('/create', [
                        'as' => 'admin.surveys.sections.create',
                        'uses' => 'SurveysController@postSections'
                    ]);
                    
                    Route::group(['prefix' => '{sectionId}', 'where' => ['sectionId' => '[0-9]+']], function () {
                        Route::get('/delete', [
                            'as' => 'admin.surveys.sections.destroy',
                            'uses' => 'SurveysController@destroySections'
                        ]);

                        Route::get('/edit', [
                            'as' => 'admin.surveys.sections.edit',
                            'uses' => 'SurveysController@editSections',
                            '_active_tab' => 'edit'
                        ]);

                        Route::post('/update', [
                            'as' => 'admin.surveys.sections.update',
                            'uses' => 'SurveysController@updateSections'
                        ]);
                        
                        Route::get('/activate', [
                            'as' => 'admin.surveys.sections.activate',
                            'uses' => 'SurveysController@activateSections',
                            '_active_tab' => 'edit'
                        ]);

                        Route::get('/deactivate', [
                            'as' => 'admin.surveys.sections.deactivate',
                            'uses' => 'SurveysController@deactivateSections'
                        ]);                    
                    });    
                    
                });
                
                Route::group(['prefix' => 'intrebari', '_active_tab' => 'questions'], function () {
                    Route::get('/', [
                        'as' => 'admin.surveys.questions.index',
                        'uses' => 'SurveysController@questions'
                    ]);

                    Route::post('/create', [
                        'as' => 'admin.surveys.questions.create',
                        'uses' => 'SurveysController@postQuestions'
                    ]);
                    
                    Route::group(['prefix' => '{questionId}', 'where' => ['questionId' => '[0-9]+']], function () {
                        Route::get('/delete', [
                            'as' => 'admin.surveys.questions.destroy',
                            'uses' => 'SurveysController@destroyQuestions'
                        ]);

                        Route::get('/edit', [
                            'as' => 'admin.surveys.questions.edit',
                            'uses' => 'SurveysController@editQuestions',
                            '_active_tab' => 'edit'
                        ]);
                        
                        Route::get('/raspuns', [
                            'as' => 'admin.surveys.questions.answers.edit',
                            'uses' => 'SurveysController@editAnswers',
                            '_active_tab' => 'edit'
                        ]);                      
                        
                        Route::post('/raspuns/update', [
                            'as' => 'admin.surveys.questions.answers.update',
                            'uses' => 'SurveysController@updateAnswers'
                        ]);
                        
                        Route::group(['prefix' => '{answerId}', 'where' => ['answerId' => '[0-9]+']], function () {
                            Route::get('/delete', [
                                'as' => 'admin.surveys.questions.answers.destroy',
                                'uses' => 'SurveysController@destroyAnswers'
                            ]);
                        });
                        

                        Route::post('/update', [
                            'as' => 'admin.surveys.questions.update',
                            'uses' => 'SurveysController@updateQuestions'
                        ]);
                        
                        Route::get('/activate', [
                            'as' => 'admin.surveys.questions.activate',
                            'uses' => 'SurveysController@activateQuestions',
                            '_active_tab' => 'edit'
                        ]);

                        Route::get('/deactivate', [
                            'as' => 'admin.surveys.questions.deactivate',
                            'uses' => 'SurveysController@deactivateQuestions'
                        ]);   
                                          
                    });    
                    
                });
            });
        });
        
        Route::resource('dentists', 'DefaultController');
        
        Route::resource('doctors', 'DefaultController');
        
        Route::resource('familyDoctors', 'DefaultController');
        
        Route::resource('laboratories', 'DefaultController');
        
        Route::resource('pharmacies', 'DefaultController');
        
        Route::resource('privateAmbulances', 'DefaultController');
        
        Route::resource('privateClinics', 'DefaultController');
        
        Route::get('/{modelName}/{id}/activate', [
            'uses' => 'DefaultController@activate'
        ]);

        Route::get('/{modelName}/{id}/deactivate', [
            'uses' => 'DefaultController@deactivate'
        ]);
    });
});  
 


