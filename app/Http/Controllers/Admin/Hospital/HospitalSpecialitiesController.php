<?php

namespace App\Http\Controllers\Admin\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Hospital\UpdateHospitalSpecialitiesRequest;
use Auth;
use App\Hospital;
use App\Specialities;
use App\HospitalSpecialities;
use Notification;


class HospitalSpecialitiesController extends Controller
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

        $hospitalSpecialities = Hospital::findOrFail($hospitalId)->specialities();

        $hospitalSpecialities = $hospitalSpecialities->orderBy($sortBy, $sortOrder);
		
        if (!is_null($query)) {
            $hospitalSpecialities = $hospitalSpecialities
                ->where('name', 'like', '%'.$query.'%');
        }

        $hospitalSpecialities = $hospitalSpecialities->paginate(15);

        if (!is_null($query)) {
            $hospitalSpecialities->appends('query', $query);
        }
	

        return view('admin.hospitals.specialities.index', [
            'hospitalSpecialities' => $hospitalSpecialities,
            'hospital' => $hospital,
            'query' => $query,
        ]);
    }

    public function edit(Request $request, $hospitalId)
    {
        $hospital = Hospital::findOrFail($hospitalId);
        
        $specialities = Specialities::orderBy('name', 'asc')->get();
        $hospitalSpecialities = Hospital::findOrFail($hospitalId)->specialities()->get();
        
        $hospitalSpecialitiesSelected = array();
        foreach($hospitalSpecialities as $hospitalSpeciality){
             $hospitalSpecialitiesSelected[] =  $hospitalSpeciality->id;
        }


        return view('admin.hospitals.specialities.create', [
            'specialities' => $specialities,
            'hospitalSpecialities' => $hospitalSpecialities,
            'hospitalSpecialitiesSelected' => $hospitalSpecialitiesSelected,
            'hospital' => $hospital,
        ]);
    }

    public function update(UpdateHospitalSpecialitiesRequest $request, $hospitalId)
    {
        if($request->get('speciality_id')) {
            $hospitalSpecialitiesDelete = Hospital::findOrFail($hospitalId)->specialities()->detach();
            foreach ($request->get('speciality_id') as $speciality){
            $hospitalSpecialities = new HospitalSpecialities([
                'hospital_id' => $hospitalId,
                'speciality_id' => $speciality
             ]);    
            $hospitalSpecialities->save();
            }
        
        Notification::success('Date actualizate cu succes! ');     
        }
	
	return redirect()->route('admin.hospitals.index.specialities', $hospitalId);
	
    }
}