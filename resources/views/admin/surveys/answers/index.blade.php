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
                            <table class="table table-hover no-margin">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Active</th>                                      
                                    </tr>
                                </thead>
                                <tbody>
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
                                    </tr>
                                </tbody>
                            </table>   
                        </div>
                        <div class="row">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.surveys.questions.answers.update', [$survey->id, $question->id]) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group @if($errors->has('name')) has-error @endif">
                                    <label for="inputAmount" class="col-md-4 control-label">Text Raspuns</label>
                                    <div class="col-md-6">
                                        <input id="inputAmount" type="text" class="form-control" name="name" @if($errors) value="{{ old('name') }}" @endif">
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('order')) has-error @endif">
                                    <label for="inputNote" class="col-md-4 control-label">Ordine</label>
                                    <div class="col-md-6">
                                        <input id="inputNote" type="text" class="form-control" name="order" @if($errors) value="{{ old('order') }}" @endif >
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('order')) has-error @endif">
                                    <label for="inputNote" class="col-md-4 control-label">Value</label>
                                    <div class="col-md-6">
                                        <input id="inputNote" type="text" class="form-control" name="order" @if($errors) value="{{ old('order') }}" @endif >
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
                        @if(count($answers) > 0)
                            <table class="table table-hover no-margin">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($answers as $answer)
                                        <tr>
                                            <td>{{ $answer->order }}</td>
                                            <td>{{ $answer->name }}</a></td>
                                            <td class="text-right">
                                            <a href="{{ route('admin.surveys.questions.answers.destroy', [$survey->id, $question->id, $answer->id]) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                                         </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="box-body">
                                <div class="alert alert-info">No answers.</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection