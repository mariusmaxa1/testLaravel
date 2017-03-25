@extends('layouts.front')
@section('title', 'Manager spital - Edit')
@section('right_content')

    <h1>Manager spital - Edit</h1>
    {!! Form::model($hospitalManager, array('route' => array('hospital.manager.update'), 'id' => 'edit_hospital_manager_form', 'method' => 'POST')) !!}
    {!! Form::token() !!}
        <div class="input-group">
            {{ Form::label('name', 'Nume Manager') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Nume Manager','id'=>'name')) }}
        </div>
        <div class="input-group">
            {{ Form::label('description', 'Cuvant manager') }}
            {{ Form::textarea('description', null, array('class' => 'form-control','id'=>'description')) }}
        </div>
        <div class="input-group">
            {{ Form::label('photo', 'Poza manager') }}
            {{ Form::file('photo', null, array('class' => 'form-control','id'=>'photo')) }}
        </div>
        <hr>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        </div>
    {{ Form::close() }}
                 
@endsection
