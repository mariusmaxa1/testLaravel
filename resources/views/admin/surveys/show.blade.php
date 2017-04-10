@extends('admin.app')

@section('title', 'Chestionar - Details #' . $survey->id)

@section('content_header', 'Chestionar')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                @include('admin.surveys._partials.tabs')
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>#</dt>
                                    <dd>{{ $survey->id }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Role</dt>
                                    <dd>{{ $survey->role->name }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Name</dt>
                                    <dd>{{ $survey->name }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Descriere</dt>
                                    <dd>{{ $survey->description }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Created at</dt>
                                    <dd>{{ $survey->created_at }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Updated at</dt>
                                    <dd>{{ $survey->updated_at }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="clearfix">
                            <div class="pull-right">
                                <a href="{{ route('admin.surveys.edit', $survey->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{ route('admin.surveys.destroy', $survey->id) }}" class="btn btn-danger confirm-action"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection