<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Entities;
use App\EntitiesTypes;
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
        
        $entityTypeAndId = Helper::getEntityTypeAndId($routeName);
        
        if(!$entityTypeAndId){
            
            return "notok";                     
        }
        
        $defaultModel = Entities::getEntities($entityTypeAndId[1]);
       

        $defaultModel = $defaultModel->orderBy($sortBy, $sortOrder);   
       
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
       
        return view('admin.default.index', [
            'modelName' => $entityTypeAndId[0],
            'defaultModel' => $defaultModel,
            'query' => $query,
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
        
        $entityTypeAndId = Helper::getEntityTypeAndId($routeName);
        
        if(!$entityTypeAndId){
            
            return "notok";                     
        }
        
        
        return view('admin.default.create',[
            'routeName' => $routeName,
            'modelName' => $entityTypeAndId[0],
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
        
        $entityTypeAndId = Helper::getEntityTypeAndId($routeName);

        if(!$entityTypeAndId){
            
            return "notok";                     
        }
        

        $defaultModel = new Entities([
            'entity_type_id' => $entityTypeAndId[1],
            'name' => $request->get('name'),
            'county' => $request->get('county'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'phone1' => $request->get('phone1'),
            'phone2' => $request->get('phone2'),
            'phone3' => $request->get('phone3'),
            'fax' => $request->get('fax'),
            'website' => $request->get('website'),
            'mail' => $request->get('mail'),
            'active' => (bool) $request->get('active'),          
        ]);
        
        $defaultModel->save();

        Notification::success('Succes.');

        return redirect()->route($entityTypeAndId[0].'.index');
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
        $entityTypeAndId = Helper::getEntityTypeAndId($routeName);
        
        if(!$entityTypeAndId){
            
            return "notok";                     
        }
        
        $defaultModel = Entities::findOrFail($id);
        
        return view('admin.default.show', [
            'defaultModel' => $defaultModel,
            'modelName' => $entityTypeAndId[0],
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
        $entityTypeAndId = Helper::getEntityTypeAndId($routeName);
        
        if(!$entityTypeAndId){
            
            return "notok";                     
        }
        
        $defaultModel = Entities::findOrFail($id);
        
        return view('admin.default.edit', [
            'defaultModel' => $defaultModel,
            'routeName' => $routeName,
            'modelName' => $entityTypeAndId[0],
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
        
        $entityTypeAndId = Helper::getEntityTypeAndId($routeName);

        if(!$entityTypeAndId){
            
            return "notok";                     
        }
        $defaultModel = Entities::findOrFail($id);

        $defaultModel->fill([
            'entity_type_id' => $entityTypeAndId[1],
            'name' => $request->get('name'),
            'county' => $request->get('county'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'phone1' => $request->get('phone1'),
            'phone2' => $request->get('phone2'),
            'phone3' => $request->get('phone3'),
            'fax' => $request->get('fax'),
            'website' => $request->get('website'),
            'mail' => $request->get('mail'),
            'active' => (bool) $request->get('active'),          
        ]);
        
        $defaultModel->save();

        Notification::success('Succes.');

        return redirect()->route($entityTypeAndId[0].'.index');
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
        $defaultModel = Entities::findOrFail($id);
        
        $defaultModel->delete();

       $entityTypeAndId = Helper::getEntityTypeAndId($routeName);
        
        if(!$entityTypeAndId){
            
            return "notok";                     
        }
        

        Notification::success('Succes.');

        return redirect()->route($entityTypeAndId[0].'.index');
      
    }
    
    public function activate($modelName, $id)
    {    
        $defaultModel = Entities::findOrFail($id);  
      
        if ($defaultModel->active == 0) {
            $defaultModel->active = true;
            $defaultModel->save();
            Notification::success('Succes.');
        }

        return redirect()->back();
    }

    public function deactivate($modelName, $id)
    {        
        $defaultModel = Entities::findOrFail($id);

        if ($defaultModel->active == 1) {
            $defaultModel->active = false;
            $defaultModel->save();
            Notification::success('Succes.');
        }

        return redirect()->back();
    }
}
