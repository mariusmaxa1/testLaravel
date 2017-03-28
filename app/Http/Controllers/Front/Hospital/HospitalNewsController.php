<?php

namespace App\Http\Controllers\Front\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Hospital;
use App\HospitalNews;
use App\Http\Requests\Front\Hospital\StoreHospitalNewsRequest;
use Notification;

class HospitalNewsController extends Controller
{
    public function index()
    {
        $hospital = Auth::user()->hospital;

        $hospitalNews = Hospital::findOrFail($hospital->id)->news()->get();
      
        return view('front.hospital.news.index', [
            'hospitalNews' => $hospitalNews
        ]);
    }
    
    public function edit($newsId)
    {
        $hospital = Auth::user()->hospital;

        $hospitalNews = HospitalNews::findOrFail($newsId);
      
        return view('front.hospital.news.edit', [
            'hospitalNews' => $hospitalNews
        ]);
    }
    
    public function update(StoreHospitalNewsRequest $request, $newsId)
    {
        $hospital = Auth::user()->hospital;

        $hospitalNews = HospitalNews::findOrFail($newsId);

        $hospitalNews->fill([
            'hospital_id' => $hospital->id,
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'photo' => $request->get('photo'),
            'active' => 1,
        ]);

        $hospitalNews->save();

        Notification::success('Date actualizate cu succes! ');
        

        return redirect()->route('hospital.news.index');
    }
    
    public function create()
    {  
        return view('front.hospital.news.create');
    }
    
    public function store(StoreHospitalNewsRequest $request)
    {
        $hospital = Auth::user()->hospital;                     
        
        $hospitalNews = new HospitalNews([
            'hospital_id' => $hospital->id,
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'photo' => $request->get('photo'),
            'active' => 1,
         ]);    
        $hospitalNews->save();

        Notification::success('Date actualizate cu succes! ');              
         
        return redirect()->route('hospital.news.index');
    }
    
    public function delete($newsId)
    {
        $hospital = Auth::user()->hospital;   
        
        $hospitalNews = HospitalNews::findOrFail($newsId);

        $hospitalNews->delete();

        Notification::success('Anuntul a fost sters cu succes.');

        return redirect()->route('hospital.news.index');
    }
    
    public function show($newsId)
    {
        $hospitalNews = HospitalNews::findOrFail($newsId);

        return view('front.hospital.news.show', [
            'hospitalNews' => $hospitalNews,
        ]);
    }
}
