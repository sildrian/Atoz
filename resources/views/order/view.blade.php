@extends('layouts.app2')

@section('content') 
<div class="clearfix"></div>
<br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="row">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
                                <div class="col-md-7"> 
                                  <span class="my-0 mr-md-auto font-weight-normal" style="display: inline-block;padding-left: 15px;"><b>Hello, {{ Auth::user()->name }}</b><br>
                                        <span><span class="text-danger"><b>{{ $countOrderUnpaid }}</b></span> unpaid order</span>
                                  </span>
                                </div>
                                <div class="col-md-5">
                                    <span>
                                        <a class="btn btn-outline-primary" href="{{url('/prepaid-balance')}}">Prepaid Balance</a>
                                    </span>
                                    |
                                    <span>
                                        <a class="btn btn-outline-primary" href="{{url('/product')}}">Product Page</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="panel-body">
                        <div class="row">
                            
                                <div class="col-md-12">   
                                    <div class="col-md-12">
                                        <form action="/search" method="POST" role="search">
                                            {{ csrf_field() }}
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="search"
                                                    placeholder="Search by no"> <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="col-md-12">
                                        @foreach($orders as $order)
                                                <div class="col-md-10">
                                                    <span>{{ $order->order_number }}</span>
                                                    <span>Rp. {{ $order->price }}</span>
                                                    <p>{{ $order->total_prepaid_balance }} for {{ $order->mobile_number }}</p>
                                                </div>

                                                <div class="col-md-2">
                                                    @if($order->status == 0)
                                                        <a class="btn btn-primay" href="{{ route('payment') }}" onclick="event.preventDefault(); document.getElementById('pay-form').submit();"> Pay now
                                                        </a>
                                                    @elseif($order->status == 1)
                                                        success
                                                    @elseif($order->status == 1 && !empty($order->shipping_code))
                                                        $order->shipping_code
                                                    @elseif($order->status == 2)
                                                        canceled
                                                    @endif
                                                </div>
                                                <div class="clearfix"></div>
                                                <hr style="padding-left: 0;padding-right: 0">
                                        @endforeach
                                    </div>
                                  {{ $orders->links() }}
                                </div>
                            <form id="pay-form" action="{{ route('payment') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="order_number" value="{{ $order->order_number }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection