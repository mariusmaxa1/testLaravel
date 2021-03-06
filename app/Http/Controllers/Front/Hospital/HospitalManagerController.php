<?php

namespace App\Http\Controllers\Front\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\HospitalManager;
use App\Images;
use App\Http\Requests\Front\Hospital\UpdateHospitalManagerRequest;
use Notification;

class HospitalManagerController extends Controller
{
    public function index()
    {
        $hospital = Auth::user()->hospital;

        $hospitalManager = HospitalManager::findOrFail($hospital->id);
        
        return view('front.hospital.manager.index', [
            'hospitalManager' => $hospitalManager
        ]);
    }
    
    public function edit()
    {
        $hospital = Auth::user()->hospital;

        $hospitalManager = HospitalManager::findOrFail($hospital->id);
      
        return view('front.hospital.manager.edit', [
            'hospitalManager' => $hospitalManager
        ]);
    }
    
    public function update(UpdateHospitalManagerRequest $request)
    {
        $hospital = Auth::user()->hospital;

        $hospitalManager = HospitalManager::findOrFail($hospital->id);

        $hospitalManager->fill([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'photo' => $request->get('photo'),
        ]);

        $hospitalManager->save();

        Notification::success('Date actualizate cu succes! ');
        
        return redirect()->route('hospital.manager.index');
    }
    
    public function store(Request $request)
    {
        $hospital = Auth::user()->hospital;
        $roleId = Auth::user()->role->id;

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images/hospitals/manager', $name);
        
        Images::create([
            'hospital_id' => $hospital->id,
            'role_id' => $roleId,
            'name' => $name,
            'alias' => 'manager',
        ]);

    }
}
