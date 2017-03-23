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
                        <h1>Dashboard spital</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
