<?php

namespace App\Http\Controllers\Admin\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\HospitalManager;
use App\Images;
use App\Http\Requests\Front\Hospital\UpdateHospitalDescriptionRequest;
use Notification;

class HospitalManagerController extends Controller
{
    public function index($hospitalId)
    {

        $hospitalManager = HospitalManager::findOrFail($hospitalId);
        //$hospitalImages = Images::where('hospital_id', $hospitalId)->get();
                
        return view('admin.hospitals.manager.index', [
            'hospital' => $hospitalManager,
        //    'hospitalImages' => $hospitalImages,
        ]);
    }
    
    public function edit($hospitalId)
    {
        $hospitalManager = HospitalManager::findOrFail($hospitalId);
      
        return view('admin.hospitals.manager.edit', [
            'hospital' => $hospitalManager
        ]);
    }
    
    public function update(UpdateHospitalDescriptionRequest $request, $hospitalId)
    {

        $hospitalManager = HospitalManager::findOrFail($hospitalId);

        $hospitalManager->fill([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        $hospitalManager->save();

        Notification::success('Date actualizate cu succes! ');
        
        return redirect()->route('admin.hospitals.show.description', $hospitalDescription->id);
    }
    
        
    public function store(Request $request)
    {
        $hospital = Auth::user()->hospital;
        $roleId = Auth::user()->role->id;

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images/hospitals', $name);
        
        Images::create([
            'hospital_id' => $hospital->id,
            'role_id' => $roleId,
            'name' => $name,
            'alias' => 'gallery',
        ]);

    }
}
