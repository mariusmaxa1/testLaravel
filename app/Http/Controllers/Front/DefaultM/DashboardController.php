<?php

namespace App\Http\Controllers\Front\DefaultM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $roleName = Auth::user()->role->name;
        
        return view('front.default.dashboard.index', array('rolename' => $roleName));
    }
}
