<?php

namespace App\Http\Controllers\Front\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Hospital;
use App\HospitalIndicators;
use App\Http\Requests\Front\Hospital\StoreHospitalIndicatorsRequest;
use Notification;

class HospitalIndicatorsController extends Controller
{
     public function index()
    {
        $hospital = Auth::user()->hospital;

        $hospitalIndicators = Hospital::findOrFail($hospital->id)->doctors()->get();
      
        return view('front.hospital.indicators.index', [
            'hospitalIndicators' => $hospitalIndicators
        ]);
    }
    
    public function edit($indicatorId)
    {
        $hospital = Auth::user()->hospital;

        $hospitalIndicators = HospitalIndicators::findOrFail($indicatorId);
      
        return view('front.hospital.indicators.edit', [
            'hospitalIndicators' => $hospitalIndicators
        ]);
    }
    
    public function update(StoreHospitalNewsRequest $request, $indicatorId)
    {
        $hospital = Auth::user()->hospital;

        $hospitalIndicators = HospitalIndicators::findOrFail($indicatorId);

        $hospitalIndicators->fill([
            'hospital_id' => $hospital->id,
            'active' => 1,
        ]);

        $hospitalIndicators->save();

        Notification::success('Date actualizate cu succes! ');
        

        return redirect()->route('hospital.indicators.index');
    }
    
    public function create()
    {  
        return view('front.hospital.indicators.create');
    }
    
    public function store(StoreHospitalIndicatorsRequest $request)
    {
        $hospital = Auth::user()->hospital;                     
        
        $hospitalIndicators = new HospitalIndicators([
            'hospital_id' => $hospital->id,
            'active' => 1,
         ]);    
        $hospitalIndicators->save();

        Notification::success('Date actualizate cu succes! ');              
         
        return redirect()->route('hospital.indicators.index');
    }
    
    public function delete($indicatorId)
    {
        $hospital = Auth::user()->hospital;   
        
        $hospitalIndicators = HospitalIndicators::findOrFail($indicatorId);

        $hospitalIndicators->delete();

        Notification::success('Indicator a fost sters cu succes.');

        return redirect()->route('hospital.indicators.index');
    }
    
    public function show($indicatorId)
    {
        $hospitalIndicators = HospitalIndicators::findOrFail($indicatorId);

        return view('front.hospital.indicators.show', [
            'hospitalIndicators' => $hospitalIndicators,
        ]);
    }
}
