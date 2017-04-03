<?php

namespace App\Http\Controllers\Admin\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Hospital;
use App\Http\Requests\Front\Hospital\UpdateHospitalInformationRequest;
use Notification;


class HospitalInformationController extends Controller
{
    public function index($hospitalId)
    {
        $hospitalInformation = Hospital::findOrFail($hospitalId);

        return view('admin.hospitals.information.index', [
            'hospital' => $hospitalInformation,
        ]);
    }
    
    public function edit($hospitalId)
    {
        $hospitalInformation = Hospital::findOrFail($hospitalId);
      
        return view('admin.hospitals.information.edit', [
            'hospital' => $hospitalInformation
        ]);
    }
    
    public function update(UpdateHospitalInformationRequest $request, $hospitalId)
    {

        $hospitalInformation = Hospital::findOrFail($hospitalId);

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
        

        return redirect()->route('admin.hospitals.show.info', $hospitalInformation->id);
    }
}
