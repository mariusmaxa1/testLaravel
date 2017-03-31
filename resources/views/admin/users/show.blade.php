@extends('admin.app')

@section('title', 'Users - Details #' . $user->id)

@section('content_header', 'Users <small>user details</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                @include('admin.users._partials.tabs')
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>#</dt>
                                    <dd>{{ $user->id }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Role</dt>
                                    <dd>{{ $user->role->name }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Flags</dt>
                                    <dd>
                                        @if(is_null($user->password))
                                            <label class="label label-info">no password</label>
                                        @endif
                                        @if($user->social()->count() > 0)
                                            <label class="label label-success">social</label>
                                        @endif
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Balance</dt>
                                   
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Name</dt>
                                    <dd>{{ $user->name }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Email</dt>
                                    <dd>{{ $user->email }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Companies</dt>

                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Social profiles</dt>
                                    <dd>
                                        @if($user->social()->count() <= 0)
                                            -
                                        @else
                                            <ul class="list-unstyled">
                                                @foreach($user->social as $social)
                                                    <li>
                                                        <a href="{{ route('admin.social.show', $social->id) }}">{{ $social->provider }}</a> <a class="text-danger confirm-action" href="{{ route('admin.users.social.delete', [$user->id, $social->id]) }}">&times;</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Created at</dt>
                                    <dd>{{ $user->created_at }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Updated at</dt>
                                    <dd>{{ $user->updated_at }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="clearfix">
                            <div class="pull-right">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger confirm-action"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection