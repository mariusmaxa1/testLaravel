@extends('layouts.front')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection
@section('title', 'Manager spital - Edit')
@section('right_content')

    <h1>Manager spital - Edit</h1>
    {!! Form::model($hospitalManager, array('route' => array('hospital.manager.update'), 'id' => 'edit_hospital_manager_form', 'method' => 'POST')) !!}
    {!! Form::token() !!}
        <div class="input-group">
            {{ Form::label('name', 'Nume Manager') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Nume Manager','id'=>'name')) }}
        </div>
        <div class="input-group">
            {{ Form::label('description', 'Cuvant manager') }}
            {{ Form::textarea('description', null, array('class' => 'form-control','id'=>'description')) }}
        </div>
        <hr>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
        </div>
        {{ Form::close() }}
        {!! Form::model($hospitalManager, array('route' => array('hospital.manager.store'), 'id' => 'edit_hospital_manager_form', 'method' => 'POST', 'class' => 'dropzone')) !!}

        {{ Form::close() }}          
@endsection
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script>
    Dropzone.options.hospitalManagerUpdate = {
  maxFiles: 1,
  accept: function(file, done) {
    console.log("uploaded");
    done();
  },
  init: function() {
    this.on("maxfilesexceeded", function(file){
        alert("No more files please!");
    });
  }
};
</script>
@endsection
