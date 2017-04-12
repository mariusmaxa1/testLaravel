@extends('admin.app')

@section('title', $title. ' - Detalii #' . $defaultModel->id)

@section('content_header', $title)

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
                                    <dd>{{ $defaultModel->id }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Nume</dt>
                                    <dd>{{ $defaultModel->name }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Judet</dt>
                                    <dd>{{ $defaultModel->county }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Localitate</dt>
                                    <dd>{{ $defaultModel->city }}</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <dl class="dl-horizontal">
                                    <dt>Adresa</dt>
                                    <dd>{{ $defaultModel->address }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>                        
                        <div class="row">
                            <div class="col-md-4">
                                <dl class="dl-horizontal">
                                    <dt>Telefon 1</dt>
                                    <dd>{{ $defaultModel->phone1 }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl class="dl-horizontal">
                                    <dt>Telefon 2</dt>
                                    <dd>{{ $defaultModel->phone2 }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl class="dl-horizontal">
                                    <dt>Telefon 3</dt>
                                    <dd>{{ $defaultModel->phone3 }}</dd>
                                </dl>
                            </div>                           
                        </div>
                        <hr> 
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Fax</dt>
                                    <dd>{{ $defaultModel->fax }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Email</dt>
                                    <dd>{{ $defaultModel->mail }}</dd>
                                </dl>
                            </div>
                        </div>                                              
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Created at</dt>
                                    <dd>{{ $defaultModel->created_at }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Updated at</dt>
                                    <dd>{{ $defaultModel->updated_at }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="clearfix">
                            <div class="pull-right">
                                @if($defaultModel->active)
                                    <a href="{{ url('admin/'.$modelName.'/'.$defaultModel->id.'/deactivate') }}" class="btn btn-info confirm-action"><i class="fa fa-minus-circle"></i> Deactivate</a>
                                @else
                                    <a href="{{ url('admin/'.$modelName.'/'.$defaultModel->id.'/activate') }}" class="btn btn-success confirm-action"><i class="fa fa-check"></i> Activate</a>
                                @endif
                                <a href="{{ route($modelName.'.edit', $defaultModel->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{ route($modelName.'.destroy', $defaultModel->id) }}" class="btn btn-danger confirm-action"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection