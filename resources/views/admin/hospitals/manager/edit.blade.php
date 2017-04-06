@extends('admin.app')

@section('title', 'Cuvant manager - Editare #')

@section('content_header', 'Cuvant manager <small>editare cuvant manager</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.hospitals.update.manager', @$hospital->id) }}" enctype="multipart/form-data">
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
                                <label for="inputTitle" class="col-sm-2 control-label">Nume prenume manager</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="inputTitle" value="{{ old('name', @$manager->name) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-sm-3">
                                        @if(@$manager->poza_manager)
                                            <img src="{{asset('images/manager/').'/' .$manager->id_manager.'/' .$manager->poza_manager}}" alt="{{ $manager->poza_manager }}" width="250px" height="auto" >
                                         @else
                                        <img src="{{ asset('images/no-user-image.gif') }}"/>
                                        @endif
                                    </div>
                                    <input name="image" type="file" class="form-control" id="inputSorting" value="{{ old('image') }}">
                                </div>
                                <div class="col-sm-9">
                                    <!-- Main content -->
                                    <section class="content">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="box box-info">
                                            <div class="box-header">
                                              <h3 class="box-title">Cuvant manager </h3>
                                              <!-- tools box -->
                                              <div class="pull-right box-tools">
                                              </div><!-- /. tools -->
                                            </div><!-- /.box-header -->
                                            <div class="box-body pad">
                                                <textarea name="cuvant_manager" id="editor1" rows="10" cols="80">
                                                    {{@$manager->description }}
                                                </textarea>
                                            </div>
                                          </div><!-- /.box -->

                                        </div><!-- /.col-->
                                      </div><!-- ./row -->
                                    </section><!-- /.content -->
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