@extends('admin.app')

@section('title', 'Users - Create')

@section('content_header', 'Users <small>create new user</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs box-tools">
                    <li class="active"><a href="{{ route('admin.users.create') }}">Create</a></li>
                    <li class="pull-right"><a href="{{ route('admin.users.index') }}" class="btn btn-box-tool" data-toggle="tooltip" title="Back to list" data-widget="chat-pane-toggle" data-original-title="Back to list"><i class="fa fa-arrow-left"></i> Back to list</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.users.store') }}">
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
                                    <input name="name" type="text" class="form-control" id="inputName" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('email')) has-error @endif">
                                <label for="inputEmail" class="col-sm-2 control-label">E-Mail</label>
                                <div class="col-sm-10">
                                    <input name="email" type="text" class="form-control" id="inputEmail" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('role')) has-error @endif">
                                <label for="selectRole" class="col-sm-2 control-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" id="selectRole" class="form-control">
                                        <option value="agency" @if(old('role') == 'agency') selected @endif>agency</option>
                                        <option value="admin" @if(old('role') == 'admin') selected @endif>admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('password')) has-error @endif">
                                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password" type="text" class="form-control" id="inputPassword">
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('companies')) has-error @endif">
                                <label for="selectCompanies" class="col-sm-2 control-label">Companies</label>
                                <div class="col-sm-10">
                                    <select name="companies[]" id="selectCompanies" multiple class="form-control">
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" @if(in_array($company->id, old('companies', array()))) selected @endif>{{ $company->name }} #{{ $company->id }}</option>
                                        @endforeach
                                    </select>
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