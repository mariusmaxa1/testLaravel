@extends('admin.app')

@section('title', 'Descriere spital #')

@section('content_header', 'Descriere spital <small>Descriere spital</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">        
                <div class="tab-content">
                    <div class="tab-pane active">
			<div class="row">
                            <div class="col-md-12">
                                <dl class="dl-horizontal">
                                    <dt>Descriere spital</dt>
                                    <dd>{!! $hospital->description !!}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
			<div class="col-md-4">
                            <dl class="dl-horizontal">
                                <dt>Poze</dt>

                            </dl>
                        </div>
                        </div>
                        <hr>
                        <div class="clearfix">
                             <div class="pull-right">
                                <a href="{{ route('admin.hospitals.edit.description', $hospital->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection