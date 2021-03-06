@extends('layouts.front')
@section('title', 'Anunturi spital - Adaugare')
@section('right_content')
@include('includes.tinyeditor')
    <h1>Anunturi spital - Adaugare</h1>
    {!! Form::open(array('route' => array('hospital.news.store'), 'id' => 'create_hospital_news_form', 'method' => 'POST')) !!}
    {!! Form::token() !!}
        <div class="input-group">
            {{ Form::label('name', 'Titlu') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Titlu articol','id'=>'name')) }}
        </div>
        <div class="input-group">
            {{ Form::label('description', 'Descriere') }}
            {{ Form::textarea('description', null, array('class' => 'form-control','id'=>'description')) }}
        </div>
        <div class="input-group">
            {{ Form::label('photo', 'Anexa') }}
            {{ Form::file('annexa', null, array('class' => 'form-control','id'=>'annexa')) }}
        </div>  
        <div class="input-group">
            {{ Form::label('photo', 'Poza articol') }}
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
