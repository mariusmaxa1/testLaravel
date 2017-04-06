@extends('admin.app')

@section('title', 'Lista Specialitati')

@section('content_header', 'Specialitati <small>lista specialitati</small>')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista specialitati</h3>
                    <div class="box-tools">
                        <a href="{{ route('admin.hospitals.add.specialities', $hospital->id)}}" class="btn btn-box-tool pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Edit</a>
                        <form class="form-horizontal" method="GET" action="{{ route('admin.hospitals.index.specialities', $hospital->id) }}">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control input-sm pull-right" style="width: 180px;" placeholder="Search by name,..." value="{{ $query }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($hospitalSpecialities) > 0)
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Nume Ambulatoriu</th>
                                
                            </tr>
                            @foreach($hospitalSpecialities as $hospitalSpeciality)
                                <tr>
                                    <td>{{ $hospitalSpeciality->id }}</td>
                                    <td>{{ $hospitalSpeciality->name }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($hospitalSpecialities->hasPages())
                        <div class="box-footer">
                            {!! $hospitalSpecialities->render() !!}
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