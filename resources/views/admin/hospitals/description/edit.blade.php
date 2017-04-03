@extends('admin.app')

@section('title', 'Descriere spital - Editare #')

@section('content_header', 'Descriere spital <small>editare descriere spital</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">               
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.hospitals.update.description', ['hospital_id' => $hospital->id ]) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                            <div class="row">
                                <div class="col-sm-3">
                                    @if($hospital->poza)
                                        <img src="{{ $hospital->poza }}" alt="{{ $hospital->poza }}"/>

                                    @else
                                        <img src="{{ asset('img/no-user-image.gif') }}"/>
                                    @endif
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="col-sm-9">
                                    <!-- Main content -->
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="box box-info">
                                                    <div class="box-header">
                                                        <h3 class="box-title">Descriere spital </h3>
                                                         <!-- tools box -->
                                                        <div class="pull-right box-tools">
                                                        </div><!-- /. tools -->
                                                    </div><!-- /.box-header -->
                                                    <div class="box-body pad">
                                                        <textarea name="description" id="editor1" rows="10" cols="80">
                                                                {{$hospital->description }}
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