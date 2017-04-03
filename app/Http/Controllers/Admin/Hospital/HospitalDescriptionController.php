<?php

namespace App\Http\Controllers\Admin\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\HospitalDescription;
use App\Images;
use App\Http\Requests\Front\Hospital\UpdateHospitalDescriptionRequest;
use Notification;

class HospitalDescriptionController extends Controller
{
    public function index($hospitalId)
    {

        $hospitalDescription = HospitalDescription::findOrFail($hospitalId);
        $hospitalImages = Images::where('hospital_id', $hospitalId)->get();
                
        return view('admin.hospitals.description.index', [
            'hospital' => $hospitalDescription,
            'hospitalImages' => $hospitalImages,
        ]);
    }
    
    public function edit($hospitalId)
    {
        $hospitalDescription = HospitalDescription::findOrFail($hospitalId);
      
        return view('admin.hospitals.description.edit', [
            'hospital' => $hospitalDescription
        ]);
    }
    
    public function update(UpdateHospitalDescriptionRequest $request, $hospitalId)
    {

        $hospitalDescription = HospitalDescription::findOrFail($hospitalId);

        $hospitalDescription->fill([
            'description' => $request->get('description'),
        ]);

        $hospitalDescription->save();

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
