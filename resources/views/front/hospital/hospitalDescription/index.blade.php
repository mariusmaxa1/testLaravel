@extends('layouts.front')
@section('title', 'Descriere spital')
@section('right_content')

    <h1>Descriere spital</h1>
    <hr />
    {!! $hospitalDescription->description !!}
        <div class="clearfix">
            <div class="pull-right">
                <a href="{{ route('hospital.description.edit') }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gallery</h1>
        </div>
        @foreach($hospitalImages as $image)
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="../images/hospitals/{{ $image->name }}">
                <img id="myImg" class="img-responsive" src="../images/hospitals/{{ $image->name }}" alt="" >
            </a>
        </div>
        @endforeach
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- The Close Button -->
      <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img01">

      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
    </div>
@endsection
