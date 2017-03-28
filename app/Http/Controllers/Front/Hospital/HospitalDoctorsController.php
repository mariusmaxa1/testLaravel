<?php

namespace App\Http\Controllers\Front\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Hospital;
use App\HospitalDoctors;
use App\Http\Requests\Front\Hospital\StoreHospitalDoctorsRequest;
use Notification;

class HospitalDoctorsController extends Controller
{
    public function index()
    {
        $hospital = Auth::user()->hospital;

        $hospitalDoctors = Hospital::findOrFail($hospital->id)->doctors()->get();
      
        return view('front.hospital.doctors.index', [
            'hospitalDoctors' => $hospitalDoctors
        ]);
    }
    
    public function edit($doctorId)
    {
        $hospital = Auth::user()->hospital;

        $hospitalDoctors = HospitalDoctors::findOrFail($doctorId);
      
        return view('front.hospital.news.edit', [
            'hospitalDoctors' => $hospitalDoctors
        ]);
    }
    
    public function update(StoreHospitalDoctorsRequest $request, $doctorId)
    {
        $hospital = Auth::user()->hospital;

        $hospitalDoctors = HospitalDoctors::findOrFail($doctorId);

        $hospitalDoctors->fill([
            'hospital_id' => $hospital->id,
            'active' => 1,
        ]);

        $hospitalDoctors->save();

        Notification::success('Date actualizate cu succes! ');
        

        return redirect()->route('hospital.doctors.index');
    }
    
    public function create()
    {  
        return view('front.hospital.doctors.create');
    }
    
    public function store(StoreHospitalDoctorsRequest $request)
    {
        $hospital = Auth::user()->hospital;                     
        
        $hospitalDoctors = new HospitalDoctors([
            'hospital_id' => $hospital->id,
            'active' => 1,
         ]);    
        $hospitalDoctors->save();

        Notification::success('Date actualizate cu succes! ');              
         
        return redirect()->route('hospital.doctors.index');
    }
    
    public function delete($doctorId)
    {
        $hospital = Auth::user()->hospital;   
        
        $hospitalDoctors = HospitalDoctors::findOrFail($newsId);

        $hospitalDoctors->delete();

        Notification::success('Doctorul a fost sters cu succes.');

        return redirect()->route('hospital.doctors.index');
    }
    
    public function show($doctorId)
    {
        $hospitalDoctors = HospitalDoctors::findOrFail($doctorId);

        return view('front.hospital.doctors.show', [
            'hospitalDoctors' => $hospitalDoctors,
        ]);
    }
}
