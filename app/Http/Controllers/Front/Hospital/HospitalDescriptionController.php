<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\HospitalDescription;

class HospitalDescriptionController extends Controller
{
    public function getIndex()
    {
        $hospital = Auth::user()->hospital;

        $descriptionHospital = HospitalDescription::findOrFail($hospital->id);
      
        return view('front.hospital.hospitalDescription.index', [
            'descriptionHospital' => $descriptionHospital
        ]);
    }
    
    public function getEdit()
    {
        $hospital = Auth::user()->hospital;

        $descriptionHospital = HospitalDescription::findOrFail($params->id);
      
        return view('front.hospital.hospitalDescription.edit', [
            'descriptionHospital' => $descriptionHospital
        ]);
    }
    
    public function postEdit()
    {
        return view('front.hospital.hospitalDescription.index');
    }
}
