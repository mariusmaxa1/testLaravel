@extends('admin.app')

@section('title', $modelName .' - editare')

@section('content_header', $modelName)

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs box-tools">
                    <li class="active"><a href="{{ route($modelName.'.edit', $defaultModel->id) }}">Edit</a></li>
                    <li class="pull-right"><a href="{{ route($modelName.'.index') }}" class="btn btn-box-tool" data-toggle="tooltip" title="Back to list" data-widget="chat-pane-toggle" data-original-title="Back to list"><i class="fa fa-arrow-left"></i> Back to list</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                            {{ Form::model($defaultModel, array('route' => array($modelName.'.update', $defaultModel->id), 'class' => 'form-horizontal', 'method' => 'PUT')) }}
                            <form class="form-horizontal" method="PUT" action="{{ route($modelName.'.update', $defaultModel->id) }}">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> <strong>Whoops!</strong> There were some problems with your input.</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group @if($errors->has('name')) has-error @endif">
                                <label for="name" class="col-sm-2 control-label">Nume</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $defaultModel->name) }}">
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('county')) has-error @endif">
                                <label for="county" class="col-sm-2 control-label">Judet</label>
                                <div class="col-sm-10">
                                    <input name="county" type="text" class="form-control" id="county" value="{{ old('county', $defaultModel->county) }}">
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('city')) has-error @endif">
                                <label for="city" class="col-sm-2 control-label">Localitatea</label>
                                <div class="col-sm-10">
                                    <input name="city" type="text" class="form-control" id="city" value="{{ old('city', $defaultModel->city) }}">
                                </div>
                            </div>                            
                            <div class="form-group @if($errors->has('address')) has-error @endif">
                                <label for="address" class="col-sm-2 control-label">Adresa</label>
                                <div class="col-sm-10">
                                    <input name="address" type="text" class="form-control" id="address" value="{{ old('address', $defaultModel->address) }}">
                                </div>
                            </div>                        
                            <div class="form-group @if($errors->has('phone1')) has-error @endif">
                                <label for="phone1" class="col-sm-2 control-label">Telefon 1</label>
                                <div class="col-sm-10">
                                    <input name="phone1" type="text" class="form-control" id="phone1" value="{{ old('phone1', $defaultModel->phone1) }}">
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('phone2')) has-error @endif">
                                <label for="phone2" class="col-sm-2 control-label">Telefon 2</label>
                                <div class="col-sm-10">
                                    <input name="phone2" type="text" class="form-control" id="phone2" value="{{ old('phone2', $defaultModel->phone2) }}">
                                </div>
                            </div>    
                            <div class="form-group @if($errors->has('phone3')) has-error @endif">
                                <label for="phone3" class="col-sm-2 control-label">Telefon 3</label>
                                <div class="col-sm-10">
                                    <input name="phone3" type="text" class="form-control" id="phone3" value="{{ old('phone3', $defaultModel->phone3) }}">
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('fax')) has-error @endif">
                                <label for="fax" class="col-sm-2 control-label">Fax</label>
                                <div class="col-sm-10">
                                    <input name="fax" type="text" class="form-control" id="fax" value="{{ old('fax', $defaultModel->fax) }}">
                                </div> 
                            </div>
                            <div class="form-group @if($errors->has('website')) has-error @endif">
                                <label for="website" class="col-sm-2 control-label">Website</label>
                                <div class="col-sm-10">
                                    <input name="website" type="url" class="form-control" id="website" value="{{ old('website', $defaultModel->website) }}">
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('mail')) has-error @endif">
                                <label for="mail" class="col-sm-2 control-label">Fax</label>
                                <div class="col-sm-10">
                                    <input name="mail" type="text" class="form-control" id="mail" value="{{ old('mail', $defaultModel->mail) }}">
                                </div> 
                            </div>
                            <div class="form-group @if($errors->has('active')) has-error @endif">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input name="active" type="hidden" value="0">
                                            <input name="active" type="checkbox" value="1" @if(old('active', $defaultModel->active) == '1') checked @endif>
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection