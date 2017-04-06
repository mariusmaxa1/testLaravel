<?php

namespace App\Http\Controllers\Admin\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Hospital\UpdateHospitalAmbulatoriesRequest;
use Auth;
use App\Hospital;
use App\Ambulatory;
use App\HospitalAmbulatory;
use Notification;


class HospitalAmbulatoriesController extends Controller
{  
    public function index(Request $request, $hospitalId)
    {
        $query = $request->get('query');
        $sortBy = 'id';
        $sortOrder = 'asc';
        $hospital = Hospital::findOrFail($hospitalId);
        $sortFields = ['id', 'name'];

        if ($request->has('sort_by') && in_array($request->get('sort_by'), $sortFields)) {
            $sortBy = $request->get('sort_by');
        }

        if ($request->has('sort_order') && in_array($request->get('sort_order'), ['asc', 'desc'])) {
            $sortOrder = $request->get('sort_order');
        }

        $hospitalAmbulatories = Hospital::findOrFail($hospitalId)->ambulatories();

        $hospitalAmbulatories = $hospitalAmbulatories->orderBy($sortBy, $sortOrder);
		
        if (!is_null($query)) {
            $hospitalAmbulatories = $hospitalAmbulatories
                ->where('name', 'like', '%'.$query.'%');
        }

        $hospitalAmbulatories = $hospitalAmbulatories->paginate(15);

        if (!is_null($query)) {
            $hospitalAmbulatories->appends('query', $query);
        }
	

        return view('admin.hospitals.ambulatories.index', [
            'hospitalAmbulatories' => $hospitalAmbulatories,
            'hospital' => $hospital,
            'query' => $query,
        ]);
    }

    public function edit(Request $request, $hospitalId)
    {
        $hospital = Hospital::findOrFail($hospitalId);
        
        $ambulatories = Ambulatory::orderBy('name', 'asc')->get();
        $hospitalAmbulatories = Hospital::findOrFail($hospitalId)->ambulatories()->get();
        
        $hospitalAmbulatoriesSelected = array();
        foreach($hospitalAmbulatories as $hospitalAmbulatory){
             $hospitalAmbulatoriesSelected[] =  $hospitalAmbulatory->id;
        }


        return view('admin.hospitals.ambulatories.create', [
            'ambulatories' => $ambulatories,
            'hospitalAmbulatories' => $hospitalAmbulatories,
            'hospitalAmbulatoriesSelected' => $hospitalAmbulatoriesSelected,
            'hospital' => $hospital,
        ]);
    }

    public function update(UpdateHospitalAmbulatoriesRequest $request, $hospitalId)
    {
        if($request->get('ambulatory_id')) {
            $hospitalAmbulatoriesDelete = Hospital::findOrFail($hospitalId)->ambulatories()->detach();
            foreach ($request->get('ambulatory_id') as $ambulatory){
            $hospitalAmbulatories = new HospitalAmbulatory([
                'hospital_id' => $hospitalId,
                'ambulatory_id' => $ambulatory
             ]);    
            $hospitalAmbulatories->save();
            }
        
        Notification::success('Date actualizate cu succes! ');     
        }
	
	return redirect()->route('admin.hospitals.index.ambulatories', $hospitalId);
	
    }
}