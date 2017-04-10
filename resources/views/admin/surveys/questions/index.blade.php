@extends('admin.app')

@section('title', 'Chestionar - Intrebari #' . $survey->id. ' - ' . $survey->name)

@section('content_header', 'Chestionar - Intrebari #' . $survey->id. ' - ' . $survey->name)

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                @include('admin.surveys._partials.tabs')
                <div class="tab-content">
                    <div class="tab-pane active">
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
                        <div class="row">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.surveys.questions.create', $survey->id) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group @if($errors->has('name')) has-error @endif">
                                    <label for="inputAmount" class="col-md-4 control-label">Text Intrebare</label>
                                    <div class="col-md-6">
                                        <input id="inputAmount" type="text" class="form-control" name="name" @if($errors) value="{{ old('name') }}" @endif">
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('section')) has-error @endif">
                                    <label for="selectRole" class="col-sm-4 control-label">Sectiunea</label>
                                    <div class="col-sm-6">
                                        <select name="section" id="selectRole" class="form-control">
                                            @foreach($sections as $section)
                                             <option value="{{ $section->id }}" >{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('displayMode')) has-error @endif">
                                    <label for="displayMode" class="col-sm-4 control-label">Tip raspuns</label>
                                    <div class="col-sm-6">
                                        <select name="displayMode" id="selectRole" class="form-control">
                                             <option value="radioBox" >RadioBox</option>
                                             <option value="checkBox" >Check Box</option>
                                             <option value="textarea" >Textarea</option>
                                             <option value="text" >Text</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('order')) has-error @endif">
                                    <label for="inputNote" class="col-md-4 control-label">Ordine</label>
                                    <div class="col-md-6">
                                        <input id="inputNote" type="text" class="form-control" name="order" @if($errors) value="{{ old('order') }}" @endif >
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label class="col-xs-1 control-label">Book</label>
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" name="book[0].title" placeholder="Title" />
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" name="book[0].isbn" placeholder="ISBN" />
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="text" class="form-control" name="book[0].price" placeholder="Price" />
                                    </div>
                                    <div class="col-xs-1">
                                        <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('active')) has-error @endif">
                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-6">
                                        <div class="checkbox">
                                            <label>
                                                <input name="active" type="hidden" value="0">
                                                <input name="active" type="checkbox" value="1" >
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-success confirm-action" name="type" value="in"><i class="fa fa-arrow-up"></i> Adaugare</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        @if(count($questions) > 0)
                            <table class="table table-hover no-margin">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Active</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($questions as $question)
                                        <tr>
                                            <td>{{ $question->order }}</td>
                                            <td>{{ $question->name }}</a></td>
                                            <td>
                                                @if($question->active)
                                                    <span class="label label-success">active</span>
                                                @else
                                                    <span class="label label-default">inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                            @if($question->active)
                                            <a href="{{ route('admin.surveys.questions.deactivate', [$survey->id, $question->id]) }}" class="btn btn-info btn-xs confirm-action">Deactivate</a>
                                            @else
                                                <a href="{{ route('admin.surveys.questions.activate', [$survey->id, $question->id]) }}" class="btn btn-success btn-xs confirm-action">Activate</a>
                                            @endif
                                            <a href="{{ route('admin.surveys.questions.edit', [$survey->id, $question->id]) }}" class="btn btn-success btn-xs">Raspunsuri</a>
                                            <a href="{{ route('admin.surveys.questions.edit', [$survey->id, $question->id]) }}" class="btn btn-warning btn-xs">edit</a>
                                            <a href="{{ route('admin.surveys.sections.destroy', [$survey->id, $question->id]) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                         </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if($sections->hasPages())
                                <div class="box-footer">
                                    {!! $history->render() !!}
                                </div>
                            @endif
                        @else
                            <div class="box-body">
                                <div class="alert alert-info">No questions.</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
<script>
@endsection