@extends('layouts.front')
@section('title', 'Specialitati spital')
@section('right_content')
                        
    <h1>Specialitati spital</h1>
    <hr />
    <ul>
    @foreach($hospitalSpecialities as $hospitalSpeciality)
    
        <li>{{ $hospitalSpeciality->name }}</li>
    
    @endforeach
    </ul>
    <div class="clearfix">
        <div class="pull-right">
            <a href="{{ route('hospital.speciality.edit') }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
        </div>
    </div> 

   

@endsection
