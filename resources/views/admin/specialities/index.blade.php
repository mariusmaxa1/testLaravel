@extends('admin.app')

@section('title', 'Lista Specialitati')

@section('content_header', 'Specialitati <small>lista specialitati</small>')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Specialitati</h3>
                    <div class="box-tools">
                        <a href="{{ route('admin.specialities.create') }}" class="btn btn-box-tool pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        <form class="form-horizontal" method="GET" action="{{ route('admin.specialities.index') }}">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control input-sm pull-right" style="width: 180px;" placeholder="Search by name..." value="{{ $query }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($specialities) > 0)
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'id_ambulatoriu', '_title' => '#'])</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'title', '_title' => 'Nume Ambulatoriu'])</th>
                                <th>Status</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'created_at', '_title' => 'Created at'])</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'updated_at', '_title' => 'Updated at'])</th>
                                <th>&nbsp;</th>
                            </tr>
                            @foreach($specialities as $speciality)
                                <tr>
                                    <td>{{ $speciality->id }}</td>
                                    <td>{{ $speciality->name }}</a></td>
                                    <td>
                                        @if($speciality->active)
                                            <span class="label label-success">active</span>
                                        @else
                                            <span class="label label-default">inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $speciality->created_at }}</td>
                                    <td>{{ $speciality->updated_at }}</td>
                                    <td class="text-right">
                                        @if($speciality->active)
                                            <a href="{{ route('admin.specialities.deactivate', $speciality->id) }}" class="btn btn-info btn-xs confirm-action">Deactivate</a>
                                        @else
                                            <a href="{{ route('admin.specialities.activate', $speciality->id) }}" class="btn btn-success btn-xs confirm-action">Activate</a>
                                        @endif
                                        <a href="{{ route('admin.specialities.edit', $speciality->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('admin.specialities.delete', $speciality->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($specialities->hasPages())
                        <div class="box-footer">
                            {!! $specialities->render() !!}
                        </div>
                    @endif
                @else
                    <div class="box-body">
                        <div class="alert alert-info">Lista cu specialitati este goala</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection