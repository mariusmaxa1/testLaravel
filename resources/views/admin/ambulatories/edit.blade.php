@extends('admin.app')

@section('title', 'Ambulatoriu - Editeaza')

@section('content_header', 'Ambulatoriu <small>ambulatoriu editeaza</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs box-tools">
                    <li class="active"><a href="{{ route('admin.ambulatories.create') }}">Create</a></li>
                    <li class="pull-right"><a href="{{ route('admin.ambulatories.index') }}" class="btn btn-box-tool" data-toggle="tooltip" title="Back to list" data-widget="chat-pane-toggle" data-original-title="Back to list"><i class="fa fa-arrow-left"></i> Back to list</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.ambulatories.update', $ambulatory->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                <label for="inputTitle" class="col-sm-2 control-label">Nume ambulatoriu</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="inputTitle" value="{{ old('name', $ambulatory->name ) }}">
                                </div>
                            </div>

                           
                            <div class="form-group @if($errors->has('active')) has-error @endif">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input name="active" type="hidden" value="0">
                                            <input name="active" type="checkbox" value="1" @if(old('active')) checked @endif>
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
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection