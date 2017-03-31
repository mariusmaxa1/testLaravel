<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Payment;
use App\User;
use Illuminate\Http\Request;
use Notification;
use Auth;

class UsersController extends Controller
{
    /**
     * Display list of users.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function getIndex(Request $request)
    {
        $query = $request->get('query');

        $sortBy = 'email';
        $sortOrder = 'asc';

        $sortFields = ['id', 'name', 'email', 'created_at', 'updated_at'];

        if ($request->has('sort_by') && in_array($request->get('sort_by'), $sortFields)) {
            $sortBy = $request->get('sort_by');
        }

        if ($request->has('sort_order') && in_array($request->get('sort_order'), ['asc', 'desc'])) {
            $sortOrder = $request->get('sort_order');
        }

        $users = User::orderBy($sortBy, $sortOrder);

        if (!is_null($query)) {
            $users = $users
                ->where('name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orWhere('role', $query);
        }

        $users = $users->paginate(15);

        if (!is_null($query)) {
            $users->appends('query', $query);
        }

        return view('admin.users.index', [
            'users' => $users,
            'query' => $query,
        ]);
    }

    /**
     * Display user details.
     *
     * @param int $userId User id to show.
     * @return \Illuminate\View\View
     */
    public function getShow($userId)
    {
        $user = User::findOrFail($userId);

        return view('admin.users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Display user form.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        $companies = Company::orderBy('name', 'asc')->get();

        return view('admin.users.create', [
            'companies' => $companies,
        ]);
    }

    /**
     * Create new user.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postStore(StoreUserRequest $request)
    {
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role' => $request->get('role'),
        ]);

        $user->save();

        $user->companies()->sync((array) $request->get('companies'));

        Notification::success('User created successfully.');

        return redirect()->route('admin.users.show', $user->id);
    }

    /**
     * Delete given user.
     *
     * @param int $userId User id to delete.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($userId)
    {
        $user = User::findOrFail($userId);

        $user->delete();

        Notification::success('User deleted successfully.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display edit form for a given user.
     *
     * @param int $userId User id to edit.
     * @return \Illuminate\View\View
     */
    public function getEdit($userId)
    {
        $user = User::findOrFail($userId);

        $companies = Company::orderBy('name', 'asc')->get();

        return view('admin.users.edit', [
            'user' => $user,
            'companies' => $companies,
        ]);
    }

    /**
     * Update given user.
     *
     * @param UpdateUserRequest $request
     * @param int $userId User id to update.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(UpdateUserRequest $request, $userId)
    {
        $user = User::findOrFail($userId);

        $user->fill([
            'name' => $request->get('name'),
            'role' => $request->get('role'),
        ]);

        if (strlen($request->get('new_password')) > 0) {
            $user->password = bcrypt($request->get('new_password'));
        }

        $user->save();

        $user->companies()->sync((array) $request->get('companies'));

        Notification::success('User updated successfully.');

        return redirect()->route('admin.users.edit', $user->id);
    }

    /**
     * Delete user social profile.
     *
     * @param $userId
     * @param $socialId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getSocialDelete($userId, $socialId)
    {
        $user = User::findOrFail($userId);

        $social = $user->social()->findOrFail($socialId);

        $social->delete();

        Notification::success('User social profile removed successfully.');

        return redirect()->route('admin.users.show', $user->id);
    }

    /**
     * Detach company.
     *
     * @param $userId
     * @param $companyId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getCompaniesDelete($userId, $companyId)
    {
        $user = User::findOrFail($userId);

        $user->companies()->detach($companyId);

        Notification::success('Company removed successfully.');

        return redirect()->route('admin.users.show', $user->id);
    }

    /**
     * Display balance overview.
     *
     * @param $userId
     * @return \Illuminate\View\View
     */
    public function getBalance($userId)
    {
        $user = User::findOrFail($userId);

        $balance = $user->balance;

        $history = $balance->history()->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.users.balance', [
            'user' => $user,
            'balance' => $balance,
            'history' => $history,
        ]);
    }

    /**
     * Update user balance.
     *
     * @param ProcessBalanceRequest $request
     * @param Balance $balance
     * @param $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postBalanceProcess(ProcessBalanceRequest $request, Balance $balance, $userId)
    {
        $user = User::findOrFail($userId);

        $service = Payment::create([
            'gateway' => 'admin',
            'payload' => [
                'admin_id' => Auth::user()->id,
                'note' => strlen($request->get('note')) > 0 ? $request->get('note') : null,
            ]
        ]);

        $method = $request->get('type') == 'in' ? 'add' : 'charge';

        $balance->{$method}($request->get('amount'), $user->balance, $service);

        if ($request->get('type') == 'in') {
            $message = 'Balance increased successfully.';
        } else {
            $message = 'Balance decreased successfully.';
        }

        Notification::success($message);

        return redirect()->route('admin.users.balance', $user->id);
    }
}
