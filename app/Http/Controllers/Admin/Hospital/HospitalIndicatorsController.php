<?php

namespace App\Http\Controllers\Admin\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hospital;
use Notification;


class HospitalIndicatorsController extends Controller
{
    public function index($hospitalId)
    {
        $hospital = Hospital::findOrFail($hospitalId);
        $hospitalIndicators = Hospital::findOrFail($hospitalId);

        return view('admin.hospitals.indicators.index', [
            'hospitalIndicators' => $hospitalIndicators,
            'hospital' => $hospital,
        ]);
    }
}
