@extends('layouts.front')
@section('title', 'Anunturi spital')
@section('right_content')
                        
    <h1>Anunturi spital</h1>
    <div class="clearfix">
        <div class="pull-right">
            <a href="{{ route('hospital.news.create') }}" class="btn btn-success"><i class="fa fa-pencil"></i> Adauga</a>
        </div>
    </div> 
    <hr />
        @if (count($hospitalNews) > 0)
            <table class="table table-hover">
                <thead> 
                    <tr> 
                        <th>Titlu articol</th> 
                        <th>Data adaugari</th> 
                        <th>#</th> 
                    </tr> 
                </thead>
                <tbody> 
                    @foreach($hospitalNews as $hospitalNewsOne)
                    <tr> 
                        <td>{{ $hospitalNewsOne->name }}</td>
                        <td>{{ $hospitalNewsOne->created_at }}</td>
                        <td class="text-right">
                            <a href="{{ route('hospital.news.show', $hospitalNewsOne->id) }}" class="btn btn-success btn-xs">view</a>
                            <a href="{{ route('hospital.news.edit', $hospitalNewsOne->id) }}" class="btn btn-warning btn-xs">edit</a>
                            <a href="{{ route('hospital.news.delete', $hospitalNewsOne->id) }}" class="btn btn-danger btn-xs confirm-action">delete</a>
                        </td>
                    </tr> 
                    @endforeach

                </tbody>
            </table>
        @else 
            <h3>Nu sunt anunturi.</h3>  
        @endif
@endsection
