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
                        <h1>Descriere spital</h1>
                        <form class="form-horizontal" method="POST" action="{{ route('hospital.hospitalDescription.update') }}" enctype="multipart/form-data">
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
                            <div class="input-group">
                                <input type="file" class="form-control">
                            </div>
                            <div class="input-group">                           
                                <textarea class="form-control" rows="10" cols="80">{{ $descriptionHospital->description }}</textarea>
                            </div>
                            <hr>
                            <div class="clearfix">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success" >Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
