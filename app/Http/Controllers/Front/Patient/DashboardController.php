<?php

namespace App\Http\Controllers\Front\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $roleName = Auth::user()->role->name;
        
        return view('front.patient.dashboard.index', array('rolename' => $roleName));
    }
}
