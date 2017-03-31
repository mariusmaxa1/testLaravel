@extends('admin.app')

@section('title', 'Spital - Detalii #' . $hospital->id)

@section('content_header', 'Spital <small>detalii spital</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>#</dt>
                                    <dd>{{ $hospital->id }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Denumire spital</dt>
                                    <dd>{{ $hospital->name }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Judet</dt>
                                    <dd>{{ $hospital->county }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Localitate</dt>
                                    <dd>{{ $hospital->city }}</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Clasificare</dt>
                                    <dd>{{ $hospital->classification }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Adresa spital</dt>
                                    <dd>{{ $hospital->address }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>                        
                        <div class="row">
                            <div class="col-md-4">
                                <dl class="dl-horizontal">
                                    <dt>Telefon 1</dt>
                                    <dd>{{ $hospital->phone1 }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl class="dl-horizontal">
                                    <dt>Telefon 2</dt>
                                    <dd>{{ $hospital->phone2 }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl class="dl-horizontal">
                                    <dt>Telefon 3</dt>
                                    <dd>{{ $hospital->phone3 }}</dd>
                                </dl>
                            </div>                           
                        </div>
                                                <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Clasificare</dt>
                                    <dd>{{ $hospital->classification }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Adresa spital</dt>
                                    <dd>{{ $hospital->address }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr> 
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Fax</dt>
                                    <dd>{{ $hospital->fax }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Email</dt>
                                    <dd>{{ $hospital->mail }}</dd>
                                </dl>
                            </div>
                        </div>                                              
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Created at</dt>
                                    <dd>{{ $hospital->created_at }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Updated at</dt>
                                    <dd>{{ $hospital->updated_at }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="clearfix">
                            <div class="pull-right">
                                @if($hospital->active)
                                    <a href="{{ route('admin.hospitals.deactivate', $hospital->id) }}" class="btn btn-info confirm-action"><i class="fa fa-minus-circle"></i> Deactivate</a>
                                @else
                                    <a href="{{ route('admin.hospitals.activate', $hospital->id) }}" class="btn btn-success confirm-action"><i class="fa fa-check"></i> Activate</a>
                                @endif
                                <a href="{{ route('admin.hospitals.edit', $hospital->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{ route('admin.hospitals.delete', $hospital->id) }}" class="btn btn-danger confirm-action"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection