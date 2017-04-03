<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hospital;
use App\Http\Requests\Admin\StoreHospitalRequest;
use Notification;

class HospitalsController extends Controller
{
    /**
     * Display list of hospitals.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = $request->get('query');

        $sortBy = 'id';
        $sortOrder = 'asc';

        $sortFields = ['id', 'name', 'classification', 'county'];

        if ($request->has('sort_by') && in_array($request->get('sort_by'), $sortFields)) {
            $sortBy = $request->get('sort_by');
        }

        if ($request->has('sort_order') && in_array($request->get('sort_order'), ['asc', 'desc'])) {
            $sortOrder = $request->get('sort_order');
        }

        $hospitals = Hospital::orderBy($sortBy, $sortOrder);

        if (!is_null($query)) {
            $hospitals = $hospitals
                ->where('name', 'like', '%'.$query.'%')
                ->orWhere('classification', 'like', '%'.$query.'%')
		->orWhere('county', $query);
        }

        $hospitals = $hospitals->paginate(15);

        if (!is_null($query)) {
            $hospitals->appends('query', $query);
        }
					
        return view('admin.hospitals.index', [
            'hospitals' => $hospitals,
            'query' => $query,
        ]);
    }

    /**
     * Display hospital details.
     *
     * @param int $hospitalID Hospital id to show.
     * @return \Illuminate\View\View
     */
    public function show($hospitalId)
    {
        $hospital = Hospital::findOrFail($hospitalId);

        return view('admin.hospitals.show', [
            'hospital' => $hospital,
        ]);
    }

    /**
     * Display hospital form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.hospitals.create');
    }

    /**
     * Create new hospital.
     *
     * @param StoreHospitalRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreHospitalRequest $request)
    {
        $hospital = new Hospital([
            'name' => $request->get('name'),
            'classification' => $request->get('classification'),
            'county' => $request->get('county'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'phone1' => $request->get('phone1'),
            'phone2' => $request->get('phone2'),
            'phone3' => $request->get('phone3'),
            'fax' => $request->get('fax'),
            'website' => $request->get('website'),
            'mail' => $request->get('mail'),
            'active' => (bool) $request->get('active'),
            
        ]);

        $hospital->save();

        Notification::success('Spital create cu succes.');

        return redirect()->route('admin.hospitals.index');
    }

    /**
     * Delete given hospital.
     *
     * @param int $hospitalId Hospital id to delete.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($hospitalId)
    {
        $hospital = Hospital::findOrFail($hospitalId);
        
        $hospital->delete();

        Notification::success('Spital sters cu succes.');

        return redirect()->route('admin.hospitals.index');
    }

    /**
     * Display edit form for a given user.
     *
     * @param int $userId User id to edit.
     * @return \Illuminate\View\View
     */
    public function edit($hospitalId)
    {
        $hospital = Hospital::findOrFail($hospitalId);

        return view('admin.hospitals.edit', [
            'hospital' => $hospital,
        ]);
    }

    /**
     * Update given user.
     *
     * @param UpdateUserRequest $request
     * @param int $userId User id to update.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreHospitalRequest $request, $hospitalId)
    {
        $hospital = Hospital::findOrFail($hospitalId);

        $hospital->fill([
            'name' => $request->get('name'),
            'classification' => $request->get('classification'),
            'county' => $request->get('county'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'phone1' => $request->get('phone1'),
            'phone2' => $request->get('phone2'),
            'phone3' => $request->get('phone3'),
            'fax' => $request->get('fax'),
            'website' => $request->get('website'),
            'mail' => $request->get('mail'),
            'active' => (bool) $request->get('active'),
        ]);

        $hospital->save();

        Notification::success('Hospital updated successfully.');

        return redirect()->route('admin.hospitals.show', $hospital->id);
    }


    public function activate($hospitalId)
    {
        $hospital = Hospital::findOrFail($hospitalId);

        if ($hospital->active == 0) {
            $hospital->active = true;
            $hospital->save();
            Notification::success('Spital activat cu succes.');
        }

        return redirect()->back();
    }

    /**
     * Deactivate given category.
     *
     * @param int $categoryId Category id to deactivate.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deactivate($hospitalId)
    {
        $hospital = Hospital::findOrFail($hospitalId);

        if ($hospital->active == 1) {
            $hospital->active = false;
            $hospital->save();
            Notification::success('Spital dezactivat cu succes.');
        }

        return redirect()->back();
    }
}
