<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function getIndex()
    {
        $roleName = Auth::user()->role->name;
        
        return view('front.hospital.dashboard.index', array('rolename' => $roleName));
    }
}
