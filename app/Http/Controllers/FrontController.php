<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctors;

class FrontController extends Controller
{
    public function index($tip)
    {
        if ($tip == 'doctors') {
            $defaultModel = Doctors::all();
            return view('homeTest', [
                'defaultModel' => $defaultModel
            ]);
            
        }
        
    }
}

