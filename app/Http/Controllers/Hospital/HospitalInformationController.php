<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Hospital;
use App\Http\Requests\Front\Hospital\UpdateHospitalInformationRequest;
use Notification;


class HospitalInformationController extends Controller
{
    public function index()
    {
        $hospital = Auth::user()->hospital;

        $hospitalInformation = Hospital::findOrFail($hospital->id);
      
        return view('front.hospital.information.index', [
            'hospitalInformation' => $hospitalInformation
        ]);
    }
    
    public function edit()
    {
        $hospital = Auth::user()->hospital;

        $hospitalInformation = Hospital::findOrFail($hospital->id);
      
        return view('front.hospital.information.edit', [
            'hospitalInformation' => $hospitalInformation
        ]);
    }
    
    public function update(UpdateHospitalInformationRequest $request)
    {
        $hospital = Auth::user()->hospital;

        $hospitalInformation = Hospital::findOrFail($hospital->id);

        $hospitalInformation->fill([
            'name' => $request->get('name'),
            'country' => $request->get('country'),
            'city' => $request->get('city'),
            'classification' => $request->get('classification'),
            'address' => $request->get('address'),
            'phone1' => $request->get('phone1'),
            'phone2' => $request->get('phone2'),
            'phone3' => $request->get('phone3'),
            'fax' => $request->get('fax'),
            'website' => $request->get('website'),
            'mail' => $request->get('mail'),
        ]);

        $hospitalInformation->save();

        Notification::success('Date actualizate cu succes! ');
        

        return redirect()->route('hospital.information.index');
    }
}
