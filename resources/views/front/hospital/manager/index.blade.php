@extends('layouts.front')
@section('title', 'Manager spital')
@section('right_content')
                        
    <h1>Manager spital</h1>
    <hr />
    <h3>Nume manager: </h3> {{ $hospitalManager->name }}
    <h3>Cuvant manager: </h3> {!! $hospitalManager->description !!}
    <h3>Poza: </h3>
    <div class="clearfix">
        <div class="pull-right">
            <a href="{{ route('hospital.manager.edit') }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
        </div>
    </div> 

   

@endsection
