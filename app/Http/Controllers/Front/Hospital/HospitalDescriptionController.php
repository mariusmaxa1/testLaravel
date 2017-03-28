<?php

namespace App\Http\Controllers\Front\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\HospitalDescription;
use App\Http\Requests\Front\Hospital\UpdateHospitalDescriptionRequest;
use Notification;

class HospitalDescriptionController extends Controller
{
    public function index()
    {
        $hospital = Auth::user()->hospital;

        $hospitalDescription = HospitalDescription::findOrFail($hospital->id);
      
        return view('front.hospital.hospitalDescription.index', [
            'hospitalDescription' => $hospitalDescription
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
}
