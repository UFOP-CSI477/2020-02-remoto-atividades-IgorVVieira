<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vacinação</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-bs4.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @yield('content')
</body>
<!-- jQuery -->
<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- jquery-validation -->
<script src="{{ asset('assets/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/jquery-validation/additional-methods.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('assets/select2/js/select2.full.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets//datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>

<script>
    @if (Session::has('error'))
        toastr.error('{!! Session::get('error') !!}','',{timeOut: 4000});
    @endif
    @if (Session::has('success'))
        toastr.success('{!! Session::get('success') !!}','',{timeOut: 4000});
    @endif
    @if (Session::has('warning'))
        toastr.warning('{!! Session::get('warning') !!}','',{timeOut: 4000});
    @endif
    @if (Session::has('status'))
        toastr.info('{!! Session::get('status') !!}','',{timeOut: 4000});
    @endif
</script>
@yield('scripts')

</html>
