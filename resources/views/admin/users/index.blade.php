@extends('admin.app')

@section('title', 'Users - List')

@section('content_header', 'Users')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                    <div class="box-tools">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-box-tool pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        <form class="form-horizontal" method="GET" action="{{ route('admin.users.index') }}">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control input-sm pull-right" style="width: 180px;" placeholder="Search by name, email..." value="{{ $query }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($users) > 0)
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'id', '_title' => '#'])</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'name', '_title' => 'Name'])</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'email', '_title' => 'Email'])</th>
                                <th>Role</th>
                                <th>Flags</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'created_at', '_title' => 'Created at'])</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'updated_at', '_title' => 'Updated at'])</th>
                                <th>&nbsp;</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        @if(is_null($user->password))
                                            <label class="label label-info">no password</label>
                                        @endif
                                        @if($user->social()->count() > 0)
                                            <label class="label label-success">social</label>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td class="text-right">
                                        @if($user->active)
                                            <a href="{{ route('admin.users.deactivate', $user->id) }}" class="btn btn-info btn-xs confirm-action">Deactivate</a>
                                        @else
                                            <a href="{{ route('admin.users.activate', $user->id) }}" class="btn btn-success btn-xs confirm-action">Activate</a>
                                        @endif
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($users->hasPages())
                        <div class="box-footer">
                            {!! $users->render() !!}
                        </div>
                    @endif
                @else
                    <div class="box-body">
                        <div class="alert alert-info">Lista de useri este goala.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection