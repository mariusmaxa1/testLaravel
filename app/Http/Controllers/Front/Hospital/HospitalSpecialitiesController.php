<?php

namespace App\Http\Controllers\Front\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Hospital;
use App\Specialities;
use App\HospitalSpecialities;
use App\Http\Requests\Front\Hospital\UpdateHospitalSpecialitiesRequest;
use Notification;

class HospitalSpecialitiesController extends Controller
{
    public function index()
    {
        $hospital = Auth::user()->hospital;

        $hospitalSpecialities = Hospital::findOrFail($hospital->id)->specialities()->get();
        //var_dump($hospitalSpecialities);
        
        return view('front.hospital.speciality.index', [
            'hospitalSpecialities' => $hospitalSpecialities
        ]);
    }
    
    public function edit()
    {
        $hospital = Auth::user()->hospital;

        $specialities = Specialities::orderBy('name', 'asc')->get();
        $hospitalSpecialities = Hospital::findOrFail($hospital->id)->specialities()->get();
        
        $hospitalSpecialitiesSelected = array();
        foreach($hospitalSpecialities as $hospitalSpeciality){
             $hospitalSpecialitiesSelected[] =  $hospitalSpeciality->id;
        }
        
        return view('front.hospital.speciality.edit', [
            'specialities' => $specialities,
            'hospitalSpecialities' => $hospitalSpecialities,
            'hospitalSpecialitiesSelected' =>  $hospitalSpecialitiesSelected
        ]);
    }
    
    public function update(UpdateHospitalSpecialitiesRequest $request)
    {
        $hospital = Auth::user()->hospital;                     
        
        if($request->get('speciality_id')) {
            $hospitalSpecialitiesDelete = Hospital::findOrFail($hospital->id)->specialities()->detach();
            foreach ($request->get('speciality_id') as $speciality){
            $hospitalSpecialities = new HospitalSpecialities([
                'hospital_id' => $hospital->id,
                'speciality_id' => $speciality
             ]);    
            $hospitalSpecialities->save();
            }       
            Notification::success('Date actualizate cu succes! ');              
        }
    

        return redirect()->route('hospital.speciality.index');
    }
}
