@extends('layouts.front')
@section('title', 'Ambulatorii spital')
@section('right_content')

    <h1>Ambulatorii spital - Edit</h1>
    {!! Form::model($hospitalAmbulatories, array('route' => array('hospital.ambulatory.update'), 'id' => 'edit_hospital_ambulatory_form', 'method' => 'POST')) !!}
    {!! Form::token() !!}
        @foreach($ambulatories as $ambulatory)
            {{ Form::checkbox('ambulatory_id[]',  $ambulatory->id,in_array($ambulatory->id, $hospitalAmbulatoriesSelected) ) }} {{ $ambulatory->name }}<br>      
         @endforeach         
        <hr>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        </div>
    {{ Form::close() }}
                 
@endsection
