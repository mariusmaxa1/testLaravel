@extends('admin.app')

@section('title', $title. ' - Lista')

@section('content_header', $title)

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ $title }} </h3>
                    <div class="box-tools">
                        <a href="{{ route($modelName.'.create') }}" class="btn btn-box-tool'dentists.create pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>                                            
                        <form class="form-" method="GET" action="{{ route($modelName.'.index') }}">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control input-sm pull-right" style="width: 180px;" placeholder="Cauta dupa nume, judet" value="{{ $query }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($defaultModel) > 0)
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'id', '_title' => '#'])</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'name', '_title' => 'Name'])</th>
                                <th>Status</th>
                                <th>@include('_partials.admin.sort_snippet', ['_field' => 'judet', '_title' => 'Judet'])</th>
                                <th>&nbsp;</th>
                            </tr>
                            @foreach($defaultModel as $default)
                                <tr>
                                    <td>{{ $default->id }}</td>
                                    <td><a href="{{ route($modelName.'.show', $default->id) }}">{{ $default->name }}</a></td>
                                    <td>
                                        @if($default->active)
                                            <span class="label label-success">active</span>
                                        @else
                                            <span class="label label-default">inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $default->county }}</td>
                                    <td class="text-right">
                                            
                                        @if($default->active)
                                            <a href="{{ url('admin/'.$modelName.'/'.$default->id.'/deactivate') }}" class="btn btn-info btn-xs confirm-action">Deactivate</a>
                                        @else
                                            <a href="{{ url('admin/'.$modelName.'/'.$default->id.'/activate') }}" class="btn btn-success btn-xs confirm-action">Activate</a>
                                        @endif
                                        <a href="{{ route($modelName.'.show', $default->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route($modelName.'.edit', $default->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\DefaultController@destroy', $default->id], 'class'=>'default-form']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs confirm-action']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($defaultModel->hasPages())
                        <div class="box-footer">
                            {!! $hospitals->render() !!}
                        </div>
                    @endif
                @else
                    <div class="box-body">
                        <div class="alert alert-info">Lista este goala.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection