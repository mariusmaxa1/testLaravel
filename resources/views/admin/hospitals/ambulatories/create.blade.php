@extends('admin.app')

@section('title', 'Ambulatoriu - Creaza nou')

@section('content_header', 'Ambulatoriu <small>ambulatoriu nou</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs box-tools">
                    <li class="active"><a href="{{ route('admin.hospitals.add.ambulatories',  $hospital->id ) }}">Create</a></li>
                    <li class="pull-right"><a href="{{ route('admin.hospitals.index.ambulatories', $hospital->id ) }}" class="btn btn-box-tool" data-toggle="tooltip" title="Back to list" data-widget="chat-pane-toggle" data-original-title="Back to list"><i class="fa fa-arrow-left"></i> Back to list</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        {!! Form::model($hospitalAmbulatories, array('route' => array('admin.hospitals.store.ambulatories', $hospital->id), 'id' => 'edit_hospital_ambulatory_form', 'method' => 'POST')) !!}
                        {!! Form::token() !!}
                            @foreach($ambulatories as $ambulatory)
                                {{ Form::checkbox('ambulatory_id[]',  $ambulatory->id,in_array($ambulatory->id, $hospitalAmbulatoriesSelected) ) }} {{ $ambulatory->name }}<br>      
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