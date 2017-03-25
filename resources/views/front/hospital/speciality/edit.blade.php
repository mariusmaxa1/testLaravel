@extends('layouts.front')
@section('title', 'Specialitati spital')
@section('right_content')

    <h1>Specialitati spital - Edit</h1>
    {!! Form::model($hospitalSpecialities, array('route' => array('hospital.speciality.update'), 'id' => 'edit_hospital_information_form', 'method' => 'POST')) !!}
    {!! Form::token() !!}
        @foreach($specialities as $speciality)
            {{ Form::checkbox('speciality_id[]',  $speciality->id ) }} {{ $speciality->name }}<br>      
         @endforeach         
        <hr>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        </div>
    {{ Form::close() }}
                 
@endsection
