@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-sm-3">
                        @include('_partials.front.menu')
                    </div>
                    <div class="col-sm-9">
                        <h1>Informatii spital - Editare</h1>
                        {!! Form::model($hospitalInformation, array('route' => array('hospital.information.update'), 'id' => 'edit_hospital_information_form', 'method' => 'POST')) !!}
                        {!! Form::token() !!}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
                                    <h4><i class="icon fa fa-ban"></i> <strong>Whoops!</strong> There were some problems with your input.</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif 
                            <div class="input-group">
                                {{ Form::label('name', 'Denumire spital') }}
                                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Denumire spital','id'=>'name')) }}
                            </div>
                            <div class="input-group">
                                <label for="country">Judet:</label>
                                <input type="text" class="form-control" id="country" name="country">
                            </div>
                            <div class="input-group">
                                <label for="city">Localitate:</label>
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                            <div class="input-group">
                                <label for="classification">Clasificare:</label>
                                <input type="text" class="form-control" id="classification" name="classification">
                            </div>
                            <div class="input-group">
                                <label for="address">Adresa spital:</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <div class="input-group">
                                <label for="phone1">Telefon 1:</label>
                                <input type="text" class="form-control" id="phone1" name="phone1">
                            </div>
                            <div class="input-group">
                                <label for="phone2">Telefon 2:</label>
                                <input type="text" class="form-control" id="phone2" name="phone2">
                            </div>
                            <div class="input-group">
                                <label for="phone3">Telefon 3:</label>
                                <input type="text" class="form-control" id="phone3" name="phone3">
                            </div>
                            <div class="input-group">
                                <label for="fax">Fax:</label>
                                <input type="text" class="form-control" id="fax" name="fax">
                            </div>                            
                            <div class="input-group">
                                <label for="website">Website:</label>
                                <input type="text" class="form-control" id="website" name="website">
                            </div>
                             <div class="input-group">
                                <label for="mail">Mail:</label>
                                <input type="text" class="form-control" id="mail" name="mail">
                            </div>                         
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
        </div>
    </div>
</div>
@endsection
