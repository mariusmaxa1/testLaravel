@extends('layouts.front')
@section('title', 'Anunturi spital - show')
@section('right_content')
                        
    <h1>Anunturi spital - show</h1>
    <div class="clearfix">
        <div class="pull-right">
            <a href="{{ route('hospital.news.create') }}" class="btn btn-success"><i class="fa fa-pencil"></i> Adauga</a>
        </div>
    </div> 
    <hr />
    <h3>Titlu: </h3> {{ $hospitalNews->name }}
    <h3>Description: </h3> {!! $hospitalNews->description !!}
    <h3>Anexa: </h3> {{ $hospitalNews->annexa }}
    <h3>Poza: </h3> {{ $hospitalNews->photo }}
    <h3>Active: </h3> {{ $hospitalNews->avtive }}
    <div class="clearfix">
        <div class="pull-right">
            <a href="{{ route('hospital.news.edit', $hospitalNews->id ) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
        </div>
    </div> 
@endsection
