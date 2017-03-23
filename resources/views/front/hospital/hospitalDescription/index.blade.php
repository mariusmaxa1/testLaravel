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
                         test
                         {!! $descriptionHospital->description !!}
                    </div>
                    <hr>
                    <div class="clearfix">
                        <div class="pull-right">
                            <a href="{{ route('hospital.hospitalDescription.edit') }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
