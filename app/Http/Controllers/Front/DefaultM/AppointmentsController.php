<?php

namespace App\Http\Controllers\Front\DefaultM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AppointmentsController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        
        return view('front.default.appointments.index', [
            'user' => $user
            ]);
    }
}
