<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Hospital;
use App\Specialities;
use App\HospitalSpecialities;
use App\Http\Requests\Front\Hospital\UpdateHospitalSpecialitiesRequest;
use Notification;
use Illuminate\Support\Facades\Input;

class HospitalSpecialitiesController extends Controller
{
    public function index()
    {
        $hospital = Auth::user()->hospital;

        $hospitalSpecialities = Hospital::findOrFail($hospital->id)->specialities()->get();
        
        
        return view('front.hospital.speciality.index', [
            'hospitalSpecialities' => $hospitalSpecialities
        ]);
    }
    
    public function edit()
    {
        $hospital = Auth::user()->hospital;

        $specialities = Specialities::orderBy('name', 'asc')->get();
        $hospitalSpecialities = Hospital::findOrFail($hospital->id)->specialities()->get();
        
        //return $hospitalSpecialities;
        
        return view('front.hospital.speciality.edit', [
            'specialities' => $specialities,
            'hospitalSpecialities' => $hospitalSpecialities
        ]);
    }
    
    public function update(UpdateHospitalSpecialitiesRequest $request)
    {
        $hospital = Auth::user()->hospital;
             
	foreach ($request->get('speciality_id') as $speciality){
            $hospitalSpecialities = new HospitalSpecialities([
                'hospital_id' => $hospital->id,
                'specialities_id' => $speciality
             ]);    
            $hospitalSpecialities->save();
        }
        
        Notification::success('Date actualizate cu succes! ');       

        return redirect()->route('hospital.speciality.index');
    }
}
