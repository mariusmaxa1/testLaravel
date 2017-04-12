@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(count($defaultModel) > 0)
            @foreach($defaultModel as $default)
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $default->name}}</div>
                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
