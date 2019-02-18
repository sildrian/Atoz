<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
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
      <div class="col-md-10 col-md-offset-1">
          <div style="padding-bottom: 10%;"></div>
          @yield('content')
      </div>
      
<footer>
  <script>
    $(document).ready(function(){
        var table = $('#sample_editable_1').DataTable();
    });
  </script>
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