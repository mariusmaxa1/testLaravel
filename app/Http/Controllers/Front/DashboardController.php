<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;



class DashboardController extends Controller
{
    
public function __construct()
{
    $this->middleware('auth');
}


    public function getIndex()
    {
        $roleName = Auth::user()->role->name;
        
        $roleAlias = Auth::user()->role->alias;
        
        if ($roleAlias == "patient") {
            return view('front.hospital.dashboard.index', array('rolename' => $roleName));           
        }
        
        if ($roleAlias == "default") {
            return view('front.default.dashboard.index', array('rolename' => $roleName));           
        }
        
        if ($roleAlias == "hospital") {
            return view('front.hospital.dashboard.index', array('rolename' => $roleName));           
        }
        
        if ($roleAlias == "admin") {
            return view('admin.dashboard', array('rolename' => $roleName));           
        }
        
    }
}
