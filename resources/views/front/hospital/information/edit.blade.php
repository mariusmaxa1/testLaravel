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
            <label for="country">Judet:</label>
            <input type="text" class="form-control" id="country" name="country">
        </div>
        <div class="input-group">
            <label for="city">Localitate:</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="input-group">
            <label for="classification">Clasificare:</label>
            <input type="text" class="form-control" id="classification" name="classification">
        </div>
        <div class="input-group">
            <label for="address">Adresa spital:</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="input-group">
            <label for="phone1">Telefon 1:</label>
            <input type="text" class="form-control" id="phone1" name="phone1">
        </div>
        <div class="input-group">
            <label for="phone2">Telefon 2:</label>
            <input type="text" class="form-control" id="phone2" name="phone2">
        </div>
        <div class="input-group">
            <label for="phone3">Telefon 3:</label>
            <input type="text" class="form-control" id="phone3" name="phone3">
        </div>
        <div class="input-group">
            <label for="fax">Fax:</label>
            <input type="text" class="form-control" id="fax" name="fax">
        </div>                            
        <div class="input-group">
            <label for="website">Website:</label>
            <input type="text" class="form-control" id="website" name="website">
        </div>
         <div class="input-group">
            <label for="mail">Mail:</label>
            <input type="text" class="form-control" id="mail" name="mail">
        </div>                         
        <hr>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        </div>
    {{ Form::close() }}
                 
@endsection
