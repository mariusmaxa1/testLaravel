@extends('admin.app')

@section('title', 'Cuvant manager #')

@section('content_header', 'Cuvant manager <small>Cuvant manager</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">               
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-md-4 text-center">                       
                                @if(@$manager->poza_manager)							
                                    <img src="{{asset('images/manager/').'/' .$manager->id_manager.'/' .$manager->poza_manager}}" alt="{{ $manager->poza_manager }}" width="250px" height="auto" >
                                @else
                                    <img src="{{ asset('images/no-user-image.gif') }}"/>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <dl class="dl-horizontal">
                                    <dt>Nume manager</h2></dt>
                                    <dd>{{@$manager->nume_manager}}</dd>
                                    <dt>Cuvant manager</dt>
                                    <dd>{!! @$manager->cuvant_manager !!}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="clearfix">
                             <div class="pull-right">
                                <a href="{{ route('admin.hospitals.edit.manager', $hospital->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection