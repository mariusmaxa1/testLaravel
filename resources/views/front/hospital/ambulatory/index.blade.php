@extends('layouts.front')
@section('title', 'Ambulatorii spital')
@section('right_content')
                        
    <h1>Ambulatorii spital</h1>
    <hr />
    <ul>
    @foreach($hospitalAmbulatories as $hospitalAmbulatory)
    
        <li>{{ $hospitalAmbulatory->name }}</li>
    
    @endforeach
    </ul>
    <div class="clearfix">
        <div class="pull-right">
            <a href="{{ route('hospital.ambulatory.edit') }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
        </div>
    </div> 

   

@endsection
