@extends('admin.app')

@section('title', 'Specialitate - Creaza nou')

@section('content_header', 'Specialitate <small>specialitate noua</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs box-tools">
                    <li class="active"><a href="{{ route('admin.hospitals.add.specialities',  $hospital->id ) }}">Create</a></li>
                    <li class="pull-right"><a href="{{ route('admin.hospitals.index.specialities', $hospital->id ) }}" class="btn btn-box-tool" data-toggle="tooltip" title="Back to list" data-widget="chat-pane-toggle" data-original-title="Back to list"><i class="fa fa-arrow-left"></i> Back to list</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        {!! Form::model($hospitalSpecialities, array('route' => array('admin.hospitals.store.specialities', $hospital->id), 'id' => 'edit_hospital_ambulatory_form', 'method' => 'POST')) !!}
                        {!! Form::token() !!}
                            @foreach($specialities as $speciality)
                                {{ Form::checkbox('speciality_id[]',  $speciality->id,in_array($speciality->id, $hospitalSpecialitiesSelected) ) }} {{ $speciality->name }}<br>      
                             @endforeach         
                            <hr>
                            <div class="clearfix">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success" >Save</button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection