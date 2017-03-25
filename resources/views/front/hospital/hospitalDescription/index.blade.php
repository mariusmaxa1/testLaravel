@extends('layouts.front')
@section('title', 'Descriere spital')
@section('right_content')

    <h1>Descriere spital</h1>
    <hr />
    {!! $hospitalDescription->description !!}
        <div class="clearfix">
            <div class="pull-right">
                <a href="{{ route('hospital.description.edit') }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
            </div>
        </div> 
@endsection
