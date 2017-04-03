<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UsersSocial;
use Illuminate\Http\Request;
use Notification;

class SocialController extends Controller
{
    /**
     * Display list of login data.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function getIndex(Request $request)
    {
        $query = $request->get('query');

        $sortBy = 'id';
        $sortOrder = 'desc';

        $sortFields = ['id', 'user_id', 'provider', 'name', 'email', 'created_at', 'updated_at'];

        if ($request->has('sort_by') && in_array($request->get('sort_by'), $sortFields)) {
            $sortBy = $request->get('sort_by');
        }

        if ($request->has('sort_order') && in_array($request->get('sort_order'), ['asc', 'desc'])) {
            $sortOrder = $request->get('sort_order');
        }

        $social = UsersSocial::orderBy($sortBy, $sortOrder);

        if (!is_null($query)) {
            $social = $social
                ->where('name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orWhere('provider', $query);
        }

        $social = $social->paginate(15);

        if (!is_null($query)) {
            $social->appends('query', $query);
        }

        return view('admin.social.index', [
            'social' => $social,
            'query' => $query,
        ]);
    }

    /**
     * Display social details.
     *
     * @param $socialId
     * @return \Illuminate\View\View
     */
    public function getShow($socialId)
    {
        $social = UsersSocial::findOrFail($socialId);

        return view('admin.social.show', [
            'social' => $social,
        ]);
    }

    /**
     * Delete given data.
     *
     * @param $socialId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($socialId)
    {
        $social = UsersSocial::findOrFail($socialId);

        $social->delete();

        Notification::success('Social login data deleted successfully.');

        return redirect()->route('admin.social.index');
    }
}
