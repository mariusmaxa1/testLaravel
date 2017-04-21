@extends('layouts.front')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection
@section('title', 'Contul meu')
@section('right_content')

    <h1>Contul meu</h1>
    <hr />
    <h2>Date cont</h2>
    <div class="row">
        <div class="col-md-4">
            {{ Form::close() }}
            {!! Form::model($user, array('route' => array('hospital.description.photo.update'), 'id' => 'edit_hospital_description_form', 'method' => 'POST', 'class' => 'dropzone')) !!}
            {{ Form::close() }}
        </div>
        <div class="col-md-8">
            {!! Form::model($user, array('route' => array('account.update'), 'id' => 'edit_hospital_account_form', 'method' => 'POST')) !!}
            {!! Form::token() !!}
            <div class="input-group">
                {{ Form::label('name', 'Nume si prenume') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Nume si prenume','id'=>'name')) }}
            </div>
            <div class="input-group">
                {{ Form::label('name', 'Denumire cabinet') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Denumire cabinet','id'=>'name')) }}
            </div>
            <hr>
            <h2>Informatii de contact</h2>
            <div class="input-group">
                {{ Form::label('name', 'Tara') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Tara','id'=>'name')) }}
            </div>
            <div class="input-group">
                {{ Form::label('name', 'Judet') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Judet','id'=>'name')) }}
            </div>
            <div class="input-group">
                {{ Form::label('name', 'Localitatea') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Localitatea','id'=>'name')) }}
            </div>
            <div class="input-group">
                {{ Form::label('name', 'Adresa') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Adresa','id'=>'name')) }}
            </div>
            <div class="input-group">
                {{ Form::label('name', 'Cod postal') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Cod postal','id'=>'name')) }}
            </div>
            <hr>
            <h2>Date de contact</h2>
            <div class="input-group">
                {{ Form::label('name', 'Telefon 1') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Telefon 1','id'=>'name')) }}
            </div>
            <div class="input-group">
                {{ Form::label('name', 'Telefon 2') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Telefon 2','id'=>'name')) }}
            </div>
            <div class="input-group">
                {{ Form::label('name', 'Fax') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Fax','id'=>'name')) }}
            </div>
            <div class="input-group">
                {{ Form::label('name', 'Email') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Email','id'=>'name')) }}
            </div>
            <div class="input-group">
                {{ Form::label('name', 'Website') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Website','id'=>'name')) }}
            </div>
            <div class="clearfix">
                <div class="pull-right">
                    <button type="submit" class="btn btn-success" >Save</button>
                </div>
            </div>
            <hr>
            {{ Form::close() }}
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@endsection

