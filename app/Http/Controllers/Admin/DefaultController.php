<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Dentists;
use App\Pharmacies;
use App\Doctors;
use App\FamilyDoctors;
use App\PrivateClinics;
use App\PrivateAmbulances;
use App\Laboratories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Admin\StoreDefaultRequest;
use Notification;
use Illuminate\Support\Facades\Redirect;

class DefaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->get('query');

        $sortBy = 'id';
        $sortOrder = 'asc';

        $sortFields = ['id','county', 'city', 'phone1'];

        if ($request->has('sort_by') && in_array($request->get('sort_by'), $sortFields)) {
            $sortBy = $request->get('sort_by');
        }

        if ($request->has('sort_order') && in_array($request->get('sort_order'), ['asc', 'desc'])) {
            $sortOrder = $request->get('sort_order');
        }
        $routeName =  Route::currentRouteName();
        if ($routeName == 'dentists.index') {
            $title = 'Stomatologi';
            $defaultModel = Dentists::orderBy($sortBy, $sortOrder);
        }
        if ($routeName == 'doctors.index') {
            $title = 'Medici specialisti';
            $defaultModel = Doctors::orderBy($sortBy, $sortOrder);
        }
        if ($routeName == 'pharmacies.index') {
            $title = 'Farmacii';
            $defaultModel = Pharmacies::orderBy($sortBy, $sortOrder);
        }
        if ($routeName == 'familyDoctors.index') {
            $title = 'Medici de familie';
            $defaultModel = FamilyDoctors::orderBy($sortBy, $sortOrder);
        }
        if ($routeName == 'privateClinics.index') {
            $title = 'Clinci private';
            $defaultModel = PrivateClinics::orderBy($sortBy, $sortOrder);
        }
        if ($routeName == 'privateAmbulances.index') {
            $title = 'Ambulanta privata';
            $defaultModel = PrivateAmbulances::orderBy($sortBy, $sortOrder);
        }
        if ($routeName == 'laboratories.index') {
            $title = 'Laboratoare de analiza';
            $defaultModel = Laboratories::orderBy($sortBy, $sortOrder);
        }
        
        //$defaultModel = Pharmacies::orderBy($sortBy, $sortOrder);

        if (!is_null($query)) {
            $defaultModel = $defaultModel
                ->where('name', 'like', '%'.$query.'%')
                ->orWhere('city', 'like', '%'.$query.'%')
		->orWhere('county', $query);
        }

        $defaultModel = $defaultModel->paginate(15);

        if (!is_null($query)) {
            $defaultModel->appends('query', $query);
        }
        
        $modelName =  explode(".", $routeName); 
        $modelName = $modelName[0];

        return view('admin.default.index', [
            'modelName' => $modelName,
            'defaultModel' => $defaultModel,
            'query' => $query,
            'title' => $title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeName =  Route::currentRouteName();
        if ($routeName == 'dentists.create') {
            $title = 'Stomatologi';
        }
        if ($routeName == 'doctors.create') {
            $title = 'Medici specialisti';
        }
        if ($routeName == 'pharmacies.create') {
            $title = 'Farmacii';
        }
        if ($routeName == 'familyDoctors.create') {
            $title = 'Medici de familie';
        }
        if ($routeName == 'privateClinics.create') {
            $title = 'Clinci privatecreate';
        }
        if ($routeName == 'privateAmbulances.create') {
            $title = 'Ambulanta privata';
        }
        if ($routeName == 'laboratories.create') {
            $title = 'Laboratoare de analiza';
        }
        
        $modelName =  explode(".", $routeName); 
        $modelName = $modelName[0];
        
        
        return view('admin.default.create',[
            'routeName' => $routeName,
            'modelName' => $modelName,
            'title'  => $title
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDefaultRequest $request)
    {
        $routeName =  Route::currentRouteName();
        if ($routeName == 'dentists.store') {
            Dentists::create($request->all());
        }
        if ($routeName == 'doctors.store') {
            Doctors::create($request->all());
        }
        if ($routeName == 'pharmacies.store') {
            Pharmacies::create($request->all());
        }
        if ($routeName == 'familyDoctors.store') {
            FamilyDoctors::create($request->all());
        }
        if ($routeName == 'privateClinics.store') {
           PrivateClinics::create($request->all());
        }
        if ($routeName == 'privateAmbulances.store') {
            PrivateAmbulances::create($request->all());
        }
        if ($routeName == 'laboratories.store') {
            Laboratories::create($request->all());
        }
        
        $modelName =  explode(".", $routeName); 
        $modelName = $modelName[0];

        Notification::success('Succes.');

        return redirect()->route($modelName.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $routeName =  Route::currentRouteName();
        if ($routeName == 'dentists.show') {
            $title = 'Stomatologi';
            $defaultModel = Dentists::findOrFail($id);
        }
        if ($routeName == 'doctors.show') {
            $title = 'Medici specialisti';
            $defaultModel = Doctors::findOrFail($id);
        }
        if ($routeName == 'pharmacies.show') {
            $title = 'Farmacii';
            $defaultModel = Pharmacies::findOrFail($id);
        }
        if ($routeName == 'familyDoctors.show') {
            $title = 'Medici de familie';
            $defaultModel = FamilyDoctors::findOrFail($id);
        }
        if ($routeName == 'privateClinics.show') {
            $title = 'Clinci private';
            $defaultModel = PrivateClinics::findOrFail($id);
        }
        if ($routeName == 'privateAmbulances.show') {
            $title = 'Ambulanta privata';
            $defaultModel = PrivateAmbulances::findOrFail($id);
        }
        if ($routeName == 'laboratories.show') {
            $title = 'Laboratoare de analiza';
            $defaultModel = Laboratories::findOrFail($id);
        }
        
        $modelName =  explode(".", $routeName); 
        $modelName = $modelName[0];
        
        return view('admin.default.show', [
            'defaultModel' => $defaultModel,
            'modelName' => $modelName,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $routeName =  Route::currentRouteName();
        if ($routeName == 'dentists.edit') {
            $title = 'Stomatologi';
            $defaultModel = Dentists::findOrFail($id);
        }
        if ($routeName == 'doctors.edit') {
            $title = 'Medici specialisti';
            $defaultModel = Doctors::findOrFail($id);
        }
        if ($routeName == 'pharmacies.destroy') {
            $title = 'Farmacii';
            $defaultModel = Pharmacies::findOrFail($id);
        }
        if ($routeName == 'familyDoctors.edit') {
            $title = 'Medici de familie';
            $defaultModel = FamilyDoctors::findOrFail($id);
        }
        if ($routeName == 'privateClinics.edit') {
            $title = 'Clinci private';
            $defaultModel = PrivateClinics::findOrFail($id);
        }
        if ($routeName == 'privateAmbulances.edit') {
            $title = 'Ambulanta privata';
            $defaultModel = PrivateAmbulances::findOrFail($id);
        }
        if ($routeName == 'laboratories.edit') {
            $title = 'Laboratoare de analiza';
            $defaultModel = Laboratories::findOrFail($id);
        }
        
        $modelName =  explode(".", $routeName); 
        $modelName = $modelName[0];
        
        return view('admin.default.edit', [
            'defaultModel' => $defaultModel,
            'routeName' => $routeName,
            'modelName' => $modelName,
            'title' => $title,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDefaultRequest $request, $id)
    {
        $routeName =  Route::currentRouteName();
        if ($routeName == 'dentists.update') {
            $title = 'Stomatologi';
            $defaultModel = Dentists::findOrFail($id);
            $defaultModel = $defaultModel->update($request->all());
        }
        if ($routeName == 'doctors.update') {
            $title = 'Medici specialisti';
            $defaultModel = Doctors::findOrFail($id);
            $defaultModel = $defaultModel->update($request->all());
        }
        if ($routeName == 'pharmacies.update') {
            $title = 'Farmacii';
            $defaultModel = Pharmacies::findOrFail($id);
            $defaultModel = $defaultModel->update($request->all());
        }
        if ($routeName == 'familyDoctors.update') {
            $title = 'Medici de familie';
            $defaultModel = FamilyDoctors::findOrFail($id);
            $defaultModel = $defaultModel->update($request->all());
        }
        if ($routeName == 'privateClinics.update') {
            $title = 'Clinci private';
            $defaultModel = PrivateClinics::findOrFail($id);
            $defaultModel = $defaultModel->update($request->all());
        }
        if ($routeName == 'privateAmbulances.update') {
            $title = 'Ambulanta privata';
            $defaultModel = PrivateAmbulances::findOrFail($id);
            $defaultModel = $defaultModel->update($request->all());
        }
        if ($routeName == 'laboratories.update') {
            $title = 'Laboratoare de analiza';
            $defaultModel = Laboratories::findOrFail($id);
            $defaultModel = $defaultModel->update($request->all());
        }


        $modelName =  explode(".", $routeName); 
        $modelName = $modelName[0];

        Notification::success('Succes.');

        return redirect()->route($modelName.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routeName =  Route::currentRouteName();
        if ($routeName == 'dentists.destroy') {
            $title = 'Stomatologi';
            $defaultModel = Dentists::findOrFail($id);
        }
        if ($routeName == 'doctors.destroy') {
            $title = 'Medici specialisti';
            $defaultModel = Doctors::findOrFail($id);
        }
        if ($routeName == 'pharmacies.destroy') {
            $title = 'Farmacii';
            $defaultModel = Pharmacies::findOrFail($id);
        }
        if ($routeName == 'familyDoctors.destroy') {
            $title = 'Medici de familie';
            $defaultModel = FamilyDoctors::findOrFail($id);
        }
        if ($routeName == 'privateClinics.destroy') {
            $title = 'Clinci private';
            $defaultModel = PrivateClinics::findOrFail($id);
        }
        if ($routeName == 'privateAmbulances.destroy') {
            $title = 'Ambulanta privata';
            $defaultModel = PrivateAmbulances::findOrFail($id);
        }
        if ($routeName == 'laboratories.destroy') {
            $title = 'Laboratoare de analiza';
            $defaultModel = Laboratories::findOrFail($id);
        }
        
        $defaultModel->delete();

        $modelName =  explode(".", $routeName); 
        $modelName = $modelName[0];

        Notification::success('Succes.');

        return redirect()->route($modelName.'.index');
      
    }
    
    public function activate($modelName, $id)
    {
        
        if ($modelName == 'dentists') {
            $title = 'Stomatologi';
            $defaultModel = Dentists::findOrFail($id);
        }
        if ($modelName == 'doctors') {
            $title = 'Medici specialisti';
            $defaultModel = Doctors::findOrFail($id);
        }
        if ($modelName == 'pharmacies') {
            $title = 'Farmacii';
            $defaultModel = Pharmacies::findOrFail($id);
        }
        if ($modelName == 'familyDoctors') {
            $title = 'Medici de familie';
            $defaultModel = FamilyDoctors::findOrFail($id);
        }
        if ($modelName == 'privateClinics') {
            $title = 'Clinci private';
            $defaultModel = PrivateClinics::findOrFail($id);
        }
        if ($modelName == 'privateAmbulances') {
            $title = 'Ambulanta privata';
            $defaultModel = PrivateAmbulances::findOrFail($id);
        }
        if ($modelName == 'laboratories') {
            $title = 'Laboratoare de analiza';
            $defaultModel = Laboratories::findOrFail($id);
        }
      
        if ($defaultModel->active == 0) {
            $defaultModel->active = true;
            $defaultModel->save();
            Notification::success('Succes.');
        }

        return redirect()->back();
    }

    public function deactivate($modelName, $id)
    {
        if ($modelName == 'dentists') {
            $title = 'Stomatologi';
            $defaultModel = Dentists::findOrFail($id);
        }
        if ($modelName == 'doctors') {
            $title = 'Medici specialisti';
            $defaultModel = Doctors::findOrFail($id);
        }
        if ($modelName == 'pharmacies') {
            $title = 'Farmacii';
            $defaultModel = Pharmacies::findOrFail($id);
        }
        if ($modelName == 'familyDoctors') {
            $title = 'Medici de familie';
            $defaultModel = FamilyDoctors::findOrFail($id);
        }
        if ($modelName == 'privateClinics') {
            $title = 'Clinci private';
            $defaultModel = PrivateClinics::findOrFail($id);
        }
        if ($modelName == 'privateAmbulances') {
            $title = 'Ambulanta privata';
            $defaultModel = PrivateAmbulances::findOrFail($id);
        }
        if ($modelName == 'laboratories') {
            $title = 'Laboratoare de analiza';
            $defaultModel = Laboratories::findOrFail($id);
        }

        if ($defaultModel->active == 1) {
            $defaultModel->active = false;
            $defaultModel->save();
            Notification::success('Succes.');
        }

        return redirect()->back();
    }
}
