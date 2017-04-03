<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAmbulatoryRequest;
use App\User;
use App\Ambulatory;
use App\Hospital;
use Illuminate\Http\Request;
use Notification;
use Auth;

class AmbulatoriesController extends Controller 
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

        $ambulatories = Ambulatory::orderBy($sortBy, $sortOrder);

        if (!is_null($query)) {
            $ambulatories = $ambulatories
                ->where('name', 'like', '%'.$query.'%');
        }

        $ambulatories = $ambulatories->paginate(15);

        if (!is_null($query)) {
            $ambulatories->appends('query', $query);
        }

        return view('admin.ambulatories.index', [
            'ambulatories' => $ambulatories,
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
        return view('admin.ambulatories.create');
    }

    /**
     * Create new ambulatory.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postStore(StoreAmbulatoryRequest $request)
    {
        $ambulatory = new Ambulatory([
            'name' => $request->get('name'),
            'active' => (bool) $request->get('active'),           
        ]);

        $ambulatory->save();

        Notification::success('Ambulatoriu creat cu  succes.');

        return redirect()->route('admin.ambulatories.index');
    }

    /**
     * Delete given user.
     *
     * @param int $userId User id to delete.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($ambulatoryId)
    {
        $ambulatory = Ambulatory::findOrFail($ambulatoryId);

        $ambulatory->delete();

        Notification::success('Ambulatoriul a fost sters cu succes.');

        return redirect()->route('admin.ambulatories.index');
    }

    public function getEdit($ambulatoryId)
    {
        $ambulatory = Ambulatory::findOrFail($ambulatoryId);


        return view('admin.ambulatories.edit', [
            'ambulatory' => $ambulatory,
        ]);
    }

    public function postUpdate(StoreAmbulatoryRequest $request, $ambulatoryId)
    {
        $ambulatory = Ambulatory::findOrFail($ambulatoryId);

        $ambulatory->fill([
            'name' => $request->get('name'),
            'active' => (bool) $request->get('active'),
        ]);

        $ambulatory->save();

        Notification::success('Ambulatoriul a fost actualizat cu succes');

        return redirect()->route('admin.ambulatories.index');
    }


    public function getActivate($ambulatoryId)
    {
        $ambulatory = Ambulatory::findOrFail($ambulatoryId);

        if ($ambulatory->active == 0) {
            $ambulatory->active = true;
            $ambulatory->save();
            Notification::success('Ambulatoriu activated successfully.');
        }

        return redirect()->back();
    }

    public function getDeactivate($ambulatoryId)
    {
        $ambulatory = Ambulatory::findOrFail($ambulatoryId);

        if ($ambulatory->active == 1) {
            $ambulatory->active = false;
            $ambulatory->save();
            Notification::success('Ambulatoriu deactivated successfully.');
        }

        return redirect()->back();
    }

  
}
