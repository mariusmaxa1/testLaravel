@extends('layouts.front')
@section('title', 'Descriere spital')
@section('right_content')

    <h1>Descriere spital</h1>
    {!! Form::model($hospitalDescription, array('route' => array('hospital.description.update'), 'id' => 'edit_hospital_description_form', 'method' => 'POST')) !!}
    {!! Form::token() !!}
        <div class="input-group">
            {{ Form::label('photo', 'Imagine spital') }}
            {{ Form::file('photo', null, array('class' => 'form-control','id'=>'photo')) }}
        </div>
       <div class="input-group">
            {{ Form::label('description', 'Descriere spital') }}
            {{ Form::textarea('description', null, array('class' => 'form-control','id'=>'description')) }}
        </div>
        <hr>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        </div>
    </form>
@endsection
