@extends('admin.app')

@section('title', 'Spitale - Lista')

@section('content_header', 'Spitale')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Spitale</h3>
                    <div class="box-tools">
                        <a href="{{ route('admin.hospitals.create') }}" class="btn btn-box-tool pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        <form class="form-horizontal" method="GET" action="{{ route('admin.hospitals.index') }}">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control input-sm pull-right" style="width: 180px;" placeholder="Cauta dupa nume, judet, clasificare" value="{{ $query }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($hospitals) > 0)
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'id', '_title' => '#'])</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'denumire_spital', '_title' => 'Nume spital'])</th>
                                <th>Status</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'judet', '_title' => 'Judet'])</th>
                                <th>Clasificare</th>
                                <th>&nbsp;</th>
                            </tr>
                            @foreach($hospitals as $hospital)
                                <tr>
                                    <td>{{ $hospital->id }}</td>
                                    <td><a href="{{ route('admin.hospitals.show.info', $hospital->id) }}">{{ $hospital->name }}</a></td>
                                    <td>
                                        @if($hospital->active)
                                            <span class="label label-success">active</span>
                                        @else
                                            <span class="label label-default">inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $hospital->county }}</td>
                                    <td>{{ $hospital->classification }}</td>
                                    <td class="text-right">
                                        @if($hospital->active)
                                            <a href="{{ route('admin.hospitals.deactivate', $hospital->id) }}" class="btn btn-info btn-xs confirm-action">Deactivate</a>
                                        @else
                                            <a href="{{ route('admin.hospitals.activate', $hospital->id) }}" class="btn btn-success btn-xs confirm-action">Activate</a>
                                        @endif
                                        <a href="{{ route('admin.hospitals.show', $hospital->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route('admin.hospitals.edit', $hospital->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('admin.hospitals.delete', $hospital->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($hospitals->hasPages())
                        <div class="box-footer">
                            {!! $hospitals->render() !!}
                        </div>
                    @endif
                @else
                    <div class="box-body">
                        <div class="alert alert-info">Lista de spitale este goala.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection