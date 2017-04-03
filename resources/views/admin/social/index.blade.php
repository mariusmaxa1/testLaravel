@extends('admin.app')

@section('title', 'Social login data - List')

@section('content_header', 'Social login data <small>login data list</small>')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Social login data</h3>
                    <div class="box-tools">
                        <form class="form-horizontal" method="GET" action="{{ route('admin.social.index') }}">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control input-sm pull-right" style="width: 180px;" placeholder="Search by name, email, provider..." value="{{ $query }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($social) > 0)
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>@include('admin._partials.sort_snippet', ['_field' => 'id', '_title' => '#'])</th>
                                <th>@include('admin._partials.sort_snippet', ['_field' => 'name', '_title' => 'Name'])</th>
                                <th>@include('admin._partials.sort_snippet', ['_field' => 'email', '_title' => 'Email'])</th>
                                <th>@include('admin._partials.sort_snippet', ['_field' => 'user_id', '_title' => 'User'])</th>
                                <th>@include('admin._partials.sort_snippet', ['_field' => 'provider', '_title' => 'Provider'])</th>
                                <th>@include('admin._partials.sort_snippet', ['_field' => 'created_at', '_title' => 'Created at'])</th>
                                <th>@include('admin._partials.sort_snippet', ['_field' => 'updated_at', '_title' => 'Updated at'])</th>
                                <th>&nbsp;</th>
                            </tr>
                            @foreach($social as $socialProfile)
                                <tr>
                                    <td>{{ $socialProfile->id }}</td>
                                    <td>
                                        @if(strlen($socialProfile->name) > 0)
                                            <a href="{{ route('admin.social.show', $socialProfile->id) }}">{{ $socialProfile->name }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if(strlen($socialProfile->email) > 0)
                                            <a href="{{ route('admin.social.show', $socialProfile->id) }}">{{ $socialProfile->email }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin.users.show', $socialProfile->user->id) }}">{{ $socialProfile->user->name}}</a></td>
                                    <td>{{ $socialProfile->provider }}</td>
                                    <td>{{ $socialProfile->created_at }}</td>
                                    <td>{{ $socialProfile->updated_at }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.social.delete', $socialProfile->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($social->hasPages())
                        <div class="box-footer">
                            {!! $social->render() !!}
                        </div>
                    @endif
                @else
                    <div class="box-body">
                        <div class="alert alert-info">Social login data list is empty.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection