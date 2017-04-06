@extends('admin.app')

@section('title', 'Lista Ambulatoriu')

@section('content_header', 'Ambulatoriu <small>lista ambulatoriu</small>')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista ambulatoriu</h3>
                    <div class="box-tools">
                        <a href="{{ route('admin.hospitals.add.ambulatories', $hospital->id)}}" class="btn btn-box-tool pull-right" data-toggle="tooltip" title="Create" data-widget="chat-pane-toggle" data-original-title="Create"><i class="fa fa-plus"></i> Edit</a>
                        <form class="form-horizontal" method="GET" action="{{ route('admin.hospitals.index.ambulatories', $hospital->id) }}">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control input-sm pull-right" style="width: 180px;" placeholder="Search by name,..." value="{{ $query }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($hospitalAmbulatories) > 0)
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Nume Ambulatoriu</th>
                                
                            </tr>
                            @foreach($hospitalAmbulatories as $hospitalAmbulatory)
                                <tr>
                                    <td>{{ $hospitalAmbulatory->id }}</td>
                                    <td>{{ $hospitalAmbulatory->name }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($hospitalAmbulatories->hasPages())
                        <div class="box-footer">
                            {!! $hospitalAmbulatories->render() !!}
                        </div>
                    @endif
                @else
                    <div class="box-body">
                        <div class="alert alert-info">Lista cu ambulatorii este goala</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection