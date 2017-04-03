<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAmbulatoryRequest;
use App\User;
use App\Specialities;
use App\Hospital;
use Illuminate\Http\Request;
use Notification;
use Auth;

class SpecialitiesController extends Controller 
{
    /**
     * Display list of ambulatories.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function getIndex(Request $request)
    {
        $query = $request->get('query');

        $sortBy = 'name';
        $sortOrder = 'asc';

        $sortFields = ['id', 'name', 'created_at', 'updated_at'];

        if ($request->has('sort_by') && in_array($request->get('sort_by'), $sortFields)) {
            $sortBy = $request->get('sort_by');
        }

        if ($request->has('sort_order') && in_array($request->get('sort_order'), ['asc', 'desc'])) {
            $sortOrder = $request->get('sort_order');
        }

        $specialities = Specialities::orderBy($sortBy, $sortOrder);

        if (!is_null($query)) {
            $specialities = $specialities
                ->where('name', 'like', '%'.$query.'%');
        }

        $specialities = $specialities->paginate(15);

        if (!is_null($query)) {
            $specialities->appends('query', $query);
        }

        return view('admin.specialities.index', [
            'specialities' => $specialities,
            'query' => $query,
        ]);
    }

    /**
     * Display ambulatory form.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        return view('admin.specialities.create');
    }

    /**
     * Create new ambulatory.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postStore(StoreAmbulatoryRequest $request)
    {
        $speciality = new Specialities([
            'name' => $request->get('name'),
            'active' => (bool) $request->get('active'),           
        ]);

        $speciality->save();

        Notification::success('Ambulatoriu creat cu  succes.');

        return redirect()->route('admin.specialities.index');
    }

    /**
     * Delete given user.
     *
     * @param int $userId User id to delete.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($specialityId)
    {
        $speciality = Specialities::findOrFail($specialityId);

        $speciality->delete();

        Notification::success('Specialitate a fost sters cu succes.');

        return redirect()->route('admin.specialities.index');
    }

    public function getEdit($specialityId)
    {
        $speciality = Specialities::findOrFail($specialityId);


        return view('admin.specialities.edit', [
            'speciality' => $speciality,
        ]);
    }

    public function postUpdate(StoreAmbulatoryRequest $request, $specialityId)
    {
        $speciality = Specialities::findOrFail($specialityId);

        $speciality->fill([
            'name' => $request->get('name'),
            'active' => (bool) $request->get('active'),
        ]);

        $speciality->save();

        Notification::success('Ambulatoriul a fost actualizat cu succes');

        return redirect()->route('admin.specialities.index');
    }


    public function getActivate($specialityId)
    {
        $speciality = Specialities::findOrFail($specialityId);

        if ($speciality->active == 0) {
            $speciality->active = true;
            $speciality->save();
            Notification::success('Specialitate activata cu succes.');
        }

        return redirect()->back();
    }

    public function getDeactivate($specialityId)
    {
        $speciality = Specialities::findOrFail($specialityId);

        if ($speciality->active == 1) {
            $speciality->active = false;
            $speciality->save();
            Notification::success('Specialitate devactivata cu succes.');
        }

        return redirect()->back();
    }

  
}
