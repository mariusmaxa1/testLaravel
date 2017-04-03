@extends('layouts.front')
@section('title', 'Contul meu')
@section('right_content')

    <h1>Contul meu</h1>
    <hr />
    <h2>Date cont</h2>
    
    {!! Form::model($user, array('route' => array('account.update'), 'id' => 'edit_hospital_account_form', 'method' => 'POST')) !!}
    {!! Form::token() !!}
    <div class="input-group">
        {{ Form::label('name', 'Nume si prenume') }}
        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Nume si prenume','id'=>'name')) }}
    </div>
    <div class="clearfix">
        <div class="pull-right">
            <button type="submit" class="btn btn-success" >Save</button>
        </div>
    </div>
        <hr>
    {{ Form::close() }}
    <h2>Schimbare parola</h2>
    {!! Form::open(array('route' => array('update.password'), 'id' => 'edit_hospital_account_password_form', 'method' => 'POST')) !!}
    {!! Form::token() !!}
        @if(!is_null($user->password))
        <div class="input-group">
            {{ Form::label('old_password', 'Parola veche') }}
            {{ Form::password('old_password', array('class' => 'form-control', 'id'=>'old_password')) }}
        </div>
        @endif
        <div class="input-group">
            {{ Form::label('password', 'Parola noua') }}
            {{ Form::password('password', array('class' => 'form-control', 'id'=>'password')) }}
        </div>
        <div class="input-group">
            {{ Form::label('password_confirmation', 'Confirmare parola') }}
            {{ Form::password('password_confirmation', array('class' => 'form-control', 'id'=>'password_confirmation')) }}
        </div>
        
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        </div>
        <hr>
    {{ Form::close() }}
@endsection
