<?php

namespace App\Http\Controllers\Front\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Hospital;
use App\Ambulatory;
use App\HospitalAmbulatory;
use App\Http\Requests\Front\Hospital\UpdateHospitalAmbulatoriesRequest;
use Notification;
use Illuminate\Support\Facades\Input;

class HospitalAmbulatoryController extends Controller
{
    public function index()
    {
        $hospital = Auth::user()->hospital;

        $hospitalAmbulatories = Hospital::findOrFail($hospital->id)->ambulatories()->get();
        
        
        return view('front.hospital.ambulatory.index', [
            'hospitalAmbulatories' => $hospitalAmbulatories
        ]);
    }
    
    public function edit()
    {
        $hospital = Auth::user()->hospital;

        $ambulatories = Ambulatory::orderBy('name', 'asc')->get();
        $hospitalAmbulatories = Hospital::findOrFail($hospital->id)->ambulatories()->get();
        
        $hospitalAmbulatoriesSelected = array();
        foreach($hospitalAmbulatories as $hospitalAmbulatory){
             $hospitalAmbulatoriesSelected[] =  $hospitalAmbulatory->id;
        }
        
        return view('front.hospital.ambulatory.edit', [
            'ambulatories' => $ambulatories,
            'hospitalAmbulatories' => $hospitalAmbulatories,
            'hospitalAmbulatoriesSelected' => $hospitalAmbulatoriesSelected
        ]);
    }
    
    public function update(UpdateHospitalAmbulatoriesRequest $request)
    {
        $hospital = Auth::user()->hospital;
        
        if($request->get('ambulatory_id')) {
            $hospitalAmbulatoriesDelete = Hospital::findOrFail($hospital->id)->ambulatories()->detach();
            foreach ($request->get('ambulatory_id') as $ambulatory){
            $hospitalAmbulatories = new HospitalAmbulatory([
                'hospital_id' => $hospital->id,
                'ambulatory_id' => $ambulatory
             ]);    
            $hospitalAmbulatories->save();
            }
        Notification::success('Date actualizate cu succes! ');     
        }

        
              

        return redirect()->route('hospital.ambulatory.index');
    }
}
