@extends('admin.app')

@section('title', 'Chestionare - List')

@section('content_header', 'Chestionare')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Chestionare</h3>
                    <div class="box-tools">
                        <a href="{{ route('admin.surveys.create') }}" class="btn btn-box-tool pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        <form class="form-horizontal" method="GET" action="{{ route('admin.surveys.index') }}">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control input-sm pull-right" style="width: 180px;" placeholder="Search by name..." value="{{ $query }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($surveys) > 0)
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'id', '_title' => '#'])</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'name', '_title' => 'Name'])</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'created_at', '_title' => 'Created at'])</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'updated_at', '_title' => 'Updated at'])</th>
                                <th>&nbsp;</th>
                            </tr>
                            @foreach($surveys as $survey)
                                <tr>
                                    <td>{{ $survey->id }}</td>
                                    <td><a href="{{ route('admin.surveys.show', $survey->id) }}">{{ $survey->name }}</a></td>
                                    <td>{{ $survey->role->name }}</td>
                                    <td>
                                        @if($survey->active)
                                            <span class="label label-success">active</span>
                                        @else
                                            <span class="label label-default">inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $survey->created_at }}</td>
                                    <td>{{ $survey->updated_at }}</td>
                                    <td class="text-right">
                                        @if($survey->active)
                                            <a href="{{ route('admin.surveys.deactivate', $survey->id) }}" class="btn btn-info btn-xs confirm-action">Deactivate</a>
                                        @else
                                            <a href="{{ route('admin.surveys.activate', $survey->id) }}" class="btn btn-success btn-xs confirm-action">Activate</a>
                                        @endif
                                        <a href="{{ route('admin.surveys.show', $survey->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route('admin.surveys.edit', $survey->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('admin.surveys.destroy', $survey->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($surveys->hasPages())
                        <div class="box-footer">
                            {!! $users->render() !!}
                        </div>
                    @endif
                @else
                    <div class="box-body">
                        <div class="alert alert-info">Lista cu chestionare este goala este goala.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection