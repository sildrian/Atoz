<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  @yield('header')
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/skins/skin-blue.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datepicker/datepicker3.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    <header class="main-header">
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          
          <div class="navbar-custom-menu">
            <div class="pull-right">
                <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
          </div>
        </nav>
    </header>
      <!-- End Header -->

    <!-- Content  -->
      <div class="content-wrapper">
       <section class="content-header">
          <h1>
          </h1>
          <ol class="breadcrumb">
            @section('breadcrumb')
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            @show
          </ol>
        </section>

        <section class="content">
            @yield('content')
        </section>
      </div>
  <!-- End Content -->
<footer>
   @yield('footer')
  <script src="{{ asset('adminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
  <script src="{{ asset('adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('adminLTE/dist/js/app.min.js') }}"></script>

  <script src="{{ asset('adminLTE/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('js/validator.min.js') }}"></script>
</footer>

@yield('script')

</body>
</html>