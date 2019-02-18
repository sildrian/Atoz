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
                        <form class="form-horizontal" method="POST" action="{{ url('saveProduct') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id_users }}">
                            <h3><b>Product Page</b></h3>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <textarea type="text" class="form-control" placeholder="Product" name="product" required autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <textarea type="text" class="form-control" placeholder="Shipping Address" name="shipping" required autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Price" name="price" required autofocus>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
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
