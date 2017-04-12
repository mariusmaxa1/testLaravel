<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * @param \Illuminate\Contracts\Auth\Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Show admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle admin login process.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');

        // Check only for admins
        // $credentials['role_id'] = 9;
        
        if ($this->auth->attempt($credentials, $request->has('remember')) && $this->auth->user()->role->alias == 'admin') {
            return redirect()->intended(route('admin.dashboard'));                                     
        }

        return redirect()->route('admin.login');
    }

    /**
     * Logout active user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect()->route('admin.login');
    }
}
