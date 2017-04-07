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
                        @if ($routeName == 'dentists.index')
                        <a href="{{ route('dentists.create') }}" class="btn btn-box-tool'dentists.create pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        @endif
                        @if ($routeName == 'doctors.index')
                        <a href="{{ route('doctors.create') }}" class="btn btn-box-tool'dentists.create pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        @endif
                        @if ($routeName == 'pharmacies.index')
                        <a href="{{ route('pharmacies.create') }}" class="btn btn-box-tool'dentists.create pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        @endif
                        @if ($routeName == 'familyDoctors.index')
                        <a href="{{ route('familyDoctors.create') }}" class="btn btn-box-tool'dentists.create pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        @endif
                        @if ($routeName == 'privateClinics.index')
                        <a href="{{ route('privateClinics.create') }}" class="btn btn-box-tool'dentists.create pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        @endif
                        @if ($routeName == 'privateAmbulances.index')
                        <a href="{{ route('privateAmbulances.create') }}" class="btn btn-box-tool'dentists.create pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        @endif
                        @if ($routeName == 'laboratories.index')
                        <a href="{{ route('laboratories.create') }}" class="btn btn-box-tool'dentists.create pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Create</a>
                        @endif
                        
                        
                        <form class="form-horizontal" method="GET" action="{{ route($routeName) }}">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control input-sm pull-right" style="width: 180px;" placeholder="Cauta dupa nume, judet, clasificare" value="{{ $query }}">
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
                                    <td><a href="{{ route('dentists.show', $default->id) }}">{{ $default->name }}</a></td>
                                    <td>
                                        @if($default->active)
                                            <span class="label label-success">active</span>
                                        @else
                                            <span class="label label-default">inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $default->county }}</td>
                                    <td class="text-right">
                                        @if ($routeName == 'dentists.index')
                                        <a href="{{ route('dentists.show', $default->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route('dentists.edit', $default->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('dentists.destroy', $default->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                        @endif
                                        @if ($routeName == 'doctors.index')
                                        <a href="{{ route('doctors.show', $default->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route('doctors.edit', $default->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('doctors.destroy', $default->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                        @endif
                                        @if ($routeName == 'pharmacies.index')
                                        <a href="{{ route('pharmacies.show', $default->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route('pharmacies.edit', $default->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('pharmacies.destroy', $default->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                        @endif
                                        @if ($routeName == 'familyDoctors.index')
                                        <a href="{{ route('familyDoctors.show', $default->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route('familyDoctors.edit', $default->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('familyDoctors.destroy', $default->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>                                    
                                        @endif
                                        @if ($routeName == 'privateClinics.index')
                                        <a href="{{ route('privateClinics.show', $default->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route('privateClinics.edit', $default->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('privateClinics.destroy', $default->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                        @endif
                                        @if ($routeName == 'privateAmbulances.index')
                                        <a href="{{ route('privateAmbulances.show', $default->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route('privateAmbulances.edit', $default->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('privateAmbulances.destroy', $default->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                        @endif
                                        @if ($routeName == 'laboratories.index')
                                        <a href="{{ route('laboratories.show', $default->id) }}" class="btn btn-success btn-xs">view</a>
                                        <a href="{{ route('laboratories.edit', $default->id) }}" class="btn btn-warning btn-xs">edit</a>
                                        <a href="{{ route('laboratories.destroy', $default->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                        @endif
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