@extends('layouts.app2')

@section('content') 
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
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
                    <div class="col-md-11 col-md-offset-1">
                        <form class="form-horizontal" method="POST" action="{{ url('payment') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id_users }}">
                            <input type="hidden" name="order_number" value="{{$order->order_number}}">
                            <h3><b>Product Page</b></h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p class="col-md-6">order no.</p>
                                    <p class="col-md-6">{{$order->order_number}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p class="col-md-6">Total</p>
                                    <p class="col-md-6">Rp. {{ number_format($order->total_prepaid_balance,0)}}</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p>{{ $order->name_product }} that cost Rp. {{ number_format($order->total,0) }} will be shipped to</p>
                                    <p>{{$order->shipping_address}}</p>
                                    <p>only after you pay</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Pay Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
