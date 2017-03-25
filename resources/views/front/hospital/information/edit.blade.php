@extends('layouts.front')
@section('title', 'Informatii Generale')
@section('right_content')

    <h1>Informatii spital - Editare</h1>
    {!! Form::model($hospitalInformation, array('route' => array('hospital.information.update'), 'id' => 'edit_hospital_information_form', 'method' => 'POST')) !!}
    {!! Form::token() !!}
        <div class="input-group">
            {{ Form::label('name', 'Denumire spital') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Denumire spital','id'=>'name')) }}
        </div>
        <div class="input-group">
            {{ Form::label('county', 'Judet') }}
            {{ Form::text('county', null, array('class' => 'form-control', 'placeholder' => 'Judet','id'=>'county')) }}
        </div>
        <div class="input-group">
            {{ Form::label('city', 'Localitate') }}
            {{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'Localitate','id'=>'city')) }}
        </div>
        <div class="input-group">
            {{ Form::label('classification', 'Clasificare') }}
            {{ Form::text('classification', null, array('class' => 'form-control', 'placeholder' => 'Clasificare','id'=>'classification')) }}
        </div>
        <div class="input-group">
            {{ Form::label('address', 'Adresa spital') }}
            {{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Adresa spital','id'=>'address')) }}
        </div>
        <div class="input-group">
            {{ Form::label('phone1', 'Telefon 1') }}
            {{ Form::text('phone1', null, array('class' => 'form-control', 'placeholder' => 'Telefon 1','id'=>'phone1')) }}
        </div>
        <div class="input-group">
            {{ Form::label('phone2', 'Telefon 2') }}
            {{ Form::text('phone2', null, array('class' => 'form-control', 'placeholder' => 'Telefon 2','id'=>'phone2')) }}
        </div>
        <div class="input-group">
            {{ Form::label('phone3', 'Telefon 3') }}
            {{ Form::text('phone3', null, array('class' => 'form-control', 'placeholder' => 'Telefon 3','id'=>'phone3')) }}
        </div>
        <div class="input-group">
            {{ Form::label('fax', 'Fax') }}
            {{ Form::text('fax', null, array('class' => 'form-control', 'placeholder' => 'Fax','id'=>'fax')) }}
        </div>
            <div class="input-group">
            {{ Form::label('website', 'Website') }}
            {{ Form::text('website', null, array('class' => 'form-control', 'placeholder' => 'Website','id'=>'website')) }}
        </div>
        <div class="input-group">
            {{ Form::label('mail', 'Mail') }}
            {{ Form::text('mail', null, array('class' => 'form-control', 'placeholder' => 'Mail','id'=>'mail')) }}
        </div>                     
        <hr>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        </div>
    {{ Form::close() }}
                 
@endsection
