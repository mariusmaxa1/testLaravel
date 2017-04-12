@extends('admin.app')

@section('title', 'Users - Edit #' . $user->id)

@section('content_header', 'Users - Edit #' . $user->id)

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                @include('admin.users._partials.tabs')
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> <strong>Whoops!</strong> There were some problems with your input.</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group @if($errors->has('name')) has-error @endif">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="inputName" value="{{ old('name', $user->name) }}">
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('email')) has-error @endif">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('role')) has-error @endif">
                                <label for="selectRole" class="col-sm-2 control-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" id="selectRole" class="form-control">                                      
                                        @foreach($roles as $role) 
                                        <option value="{{ $role->id }}" @if(old('role', $user->role_id) == $role->id) selected @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('new_password')) has-error @endif">
                                <label for="inputNewPassword" class="col-sm-2 control-label">New password</label>
                                <div class="col-sm-10">
                                    <input name="new_password" type="password" type="text" class="form-control" id="inputNewPassword">
                                </div>
                            </div>
                             <div class="form-group @if($errors->has('active')) has-error @endif">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input name="active" type="hidden" value="0">
                                            <input name="active" type="checkbox" value="1" @if(old('active', $user->active) == '1') checked @endif>
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection