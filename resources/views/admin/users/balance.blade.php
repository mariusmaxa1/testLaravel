@extends('admin.app')

@section('title', 'Users - Balance #' . $user->id)

@section('content_header', 'Users <small>user balance</small>')

@section('content')
    <div class="row">
        <section class="col-lg-12">
            <div class="nav-tabs-custom">
                @include('admin.users._partials.tabs')
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
                        <div class="text-center">
                            <p class="form-control-static">
                                <strong>Balance:</strong>
                                <span class="@if($balance->amount < 0) text-danger @elseif($balance->amount > 0) text-success @else text-muted @endif">{{ format_balance($balance->amount) }}</span>
                            </p>
                        </div
                        </div>
                        <hr>
                        <div class="row">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.users.balance.process', $user->id) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group @if($errors->has('amount')) has-error @endif">
                                    <label for="inputAmount" class="col-md-4 control-label">Amount*</label>
                                    <div class="col-md-6">
                                        <input id="inputAmount" type="text" class="form-control" name="amount" @if($errors) value="{{ old('amount') }}" @endif placeholder="0.00">
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('note')) has-error @endif">
                                    <label for="inputNote" class="col-md-4 control-label">Note</label>
                                    <div class="col-md-6">
                                        <input id="inputNote" type="text" class="form-control" name="note" @if($errors) value="{{ old('note') }}" @endif >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-success confirm-action" name="type" value="in"><i class="fa fa-arrow-up"></i> Add</button>
                                        <button type="submit" class="btn btn-danger confirm-action" name="type" value="out"><i class="fa fa-arrow-down"></i> Charge</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        @if(count($history) > 0)
                            <table class="table table-hover no-margin">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Amount before</th>
                                        <th>Amount after</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($history as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                @if($item->type == 'in')
                                                    <span class="label label-success"><i class="fa fa-arrow-up"></i></span>
                                                @else
                                                    <span class="label label-danger"><i class="fa fa-arrow-down"></i></span>
                                                @endif
                                            </td>
                                            <td><span class="@if($item->type == 'out') text-danger @else text-success @endif">{{ format_balance($item->amount) }}</span></td>
                                            <td><span class="@if($item->amount_before < 0) text-danger @elseif($item->amount_before > 0) text-success @else text-muted @endif">{{ format_balance($item->amount_before) }}</span></td>
                                            <td><span class="@if($item->amount_after < 0) text-danger @elseif($item->amount_after > 0) text-success @else text-muted @endif">{{ format_balance($item->amount_after) }}</span></td>
                                            <td>{{ $item->historable->getHistoryTitle() }}</td>
                                            <td>{{ $item->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if($history->hasPages())
                                <div class="box-footer">
                                    {!! $history->render() !!}
                                </div>
                            @endif
                        @else
                            <div class="box-body">
                                <div class="alert alert-info">No actions were performed.</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection