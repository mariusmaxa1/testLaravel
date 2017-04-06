<?php

namespace App\Http\Controllers\Admin\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hospital;
use Notification;


class HospitalDoctorsController extends Controller
{
    public function index($hospitalId)
    {
        $hospital = Hospital::findOrFail($hospitalId);
        $hospitalDoctors = Hospital::findOrFail($hospitalId);

        return view('admin.hospitals.doctors.index', [
            'hospitalDoctors' => $hospitalDoctors,
            'hospital' => $hospital,
        ]);
    }
}
