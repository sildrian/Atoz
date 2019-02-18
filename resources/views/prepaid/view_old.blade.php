@extends('layouts.app')

@section('header')
  Prepaid Balance
@endsection

@section('breadcrumb')
    @parent
   <li>Prepaid Balance</li>
@endsection

@section('content') 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
                      <h5 class="my-0 mr-md-auto font-weight-normal">Hello, {{ Auth::user()->name }}</h5>
                      <nav class="my-2 my-md-0 mr-md-3">
                        <!-- <a class="p-2 text-dark" href="#">Features</a>
                        <a class="p-2 text-dark" href="#">Enterprise</a>
                        <a class="p-2 text-dark" href="#">Support</a>
                        <a class="p-2 text-dark" href="#">Pricing</a> -->
                      </nav>
                      <a class="btn btn-outline-primary" href="#">Prepaid Balance |</a>
                      <a class="btn btn-outline-primary" href="#">Product Page</a>
                    </div>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('prepaid-balance') }}">
                        {{ csrf_field() }}

                        <div>
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                            </div>
                        </div>

                        <div>
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-5">
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
@endsection
