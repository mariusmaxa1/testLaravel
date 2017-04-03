@extends('admin.app')

@section('title', 'Social login data - Details #' . $social->id)

@section('content_header', 'Social login data <small>login data details</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                @include('admin.social._partials.tabs')
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>#</dt>
                                    <dd>{{ $social->id }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Provider</dt>
                                    <dd>{{ $social->provider }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Name</dt>
                                    <dd>{{ $social->name }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Email</dt>
                                    <dd>{{ $social->email }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <dl class="dl-horizontal">
                                    <dt>User</dt>
                                    <dd><a href="{{ route('admin.users.show', $social->user->id) }}">{{ $social->user->name }}</a></dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Created at</dt>
                                    <dd>{{ $social->created_at }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Updated at</dt>
                                    <dd>{{ $social->updated_at }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="clearfix">
                            <div class="pull-right">
                                <a href="{{ route('admin.social.delete', $social->id) }}" class="btn btn-danger confirm-action"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection