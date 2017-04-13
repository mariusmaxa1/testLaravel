@extends('layouts.front')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection
@section('title', 'Contul meu')
@section('right_content')

    <h1>Descriere</h1>
    <hr />
    {!! Form::model($user, array('route' => array('hospital.description.update'), 'id' => 'edit_hospital_description_form', 'method' => 'POST')) !!}
    {!! Form::token() !!}
       <div class="input-group">
            {{ Form::label('description', 'Descriere') }}
            {{ Form::textarea('description', null, array('class' => 'form-control','id'=>'description')) }}
        </div>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        </div>
        <hr>
     <h1>Galerie foto</h1>
    {{ Form::close() }}
    {!! Form::model($user, array('route' => array('hospital.description.photo.update'), 'id' => 'edit_hospital_description_form', 'method' => 'POST', 'class' => 'dropzone')) !!}
    {{ Form::close() }}
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@endsection

