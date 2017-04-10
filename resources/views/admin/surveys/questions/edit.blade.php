@extends('admin.app')

@section('title', 'Chestionar - Sectiuni #' . $question->id. ' - ' . $question->name)

@section('content_header', 'Chestionar - Sectiuni #' . $question->id. ' - ' . $question->name)

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                @include('admin.surveys.sections._partials.tabs')
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
                            <form class="form-horizontal" method="POST" action="{{ route('admin.surveys.questions.update', [$survey->id, $question->id]) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group @if($errors->has('name')) has-error @endif">
                                    <label for="inputAmount" class="col-md-4 control-label">Nume</label>
                                    <div class="col-md-6">
                                        <input id="inputAmount" type="text" class="form-control" name="name" @if($errors) value="{{ old('name', $question->name) }}" @endif">
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
                                        <input id="inputNote" type="text" class="form-control" name="order" @if($errors) value="{{ old('order', $section->order) }}" @endif >
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('active')) has-error @endif">
                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-6">
                                        <div class="checkbox">
                                            <label>
                                                <input name="active" type="hidden" value="0">
                                                <input name="active" type="checkbox" value="1" @if(old('active', $question->active) == '1') checked @endif>
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-success confirm-action" name="type" value="in"><i class="fa fa-arrow-up"></i> Edit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection