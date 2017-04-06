<?php

namespace App\Http\Controllers\Front\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\HospitalDescription;
use App\Images;
use App\Http\Requests\Front\Hospital\UpdateHospitalDescriptionRequest;
use Notification;

class HospitalDescriptionController extends Controller
{
    public function index()
    {
        $hospital = Auth::user()->hospital;

        $hospitalDescription = HospitalDescription::findOrFail($hospital->id);
        $hospitalImages = Images::where('hospital_id', $hospital->id)->get();
                
        return view('front.hospital.hospitalDescription.index', [
            'hospitalDescription' => $hospitalDescription,
            'hospitalImages' => $hospitalImages,
        ]);
    }
    
    public function edit()
    {
        $hospital = Auth::user()->hospital;

        $hospitalDescription = HospitalDescription::findOrFail($hospital->id);
      
        return view('front.hospital.hospitalDescription.edit', [
            'hospitalDescription' => $hospitalDescription
        ]);
    }
    
    public function update(UpdateHospitalDescriptionRequest $request)
    {
        $hospital = Auth::user()->hospital;

        $hospitalDescription = HospitalDescription::findOrFail($hospital->id);

        $hospitalDescription->fill([
            'description' => $request->get('description'),
        ]);

        $hospitalDescription->save();

        Notification::success('Date actualizate cu succes! ');
        
        return redirect()->route('hospital.description.index');
    }
    
        
    public function store(Request $request)
    {
        $hospital = Auth::user()->hospital;
        $roleId = Auth::user()->role->id;

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images/hospitals/description', $name);
        
        Images::create([
            'hospital_id' => $hospital->id,
            'role_id' => $roleId,
            'name' => $name,
            'alias' => 'gallery',
        ]);

    }
}
