<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PhiIndustrie</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("dist/img/PhiIndustrieLogo.png")}}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset("plugins/jqvmap/jqvmap.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset("plugins/daterangepicker/daterangepicker.css")}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">

    <link href="{{asset("css/toastr.min.css")}}" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark ">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Tableau de bord</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item ">
                <a class="nav-link" data-toggle="dropdown" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-red elevation-4" >
        <!-- Brand Logo -->
        <a href="{{route('/')}}" class="brand-link">
            <img src="{{asset("dist/img/PhiIndustrieLogo.png")}}" alt="AdminLTE Logo" class="brand-image"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">PhiIndustrie</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset("dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->company}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2" >
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-header">Clients</li>
                    <li class="nav-item">
                        <a href="{{route('clients')}}" class="nav-link">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Consulter
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('client.create')}}" class="nav-link">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Ajouter Client
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Factures</li>
                    <li class="nav-item">
                        <a href="{{route('invoices')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>
                                Consulter
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('invoice.create')}}" class="nav-link">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Ajouter Facture
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Devis</li>
                    <li class="nav-item">
                        <a href="{{route('quotes')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>
                                Consulter
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('quote.create')}}" class="nav-link">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Ajouter Devis
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Médicaments</li>
                    <li class="nav-item">
                        <a href="{{route('medications')}}" class="nav-link">
                            <i class="nav-icon fas fa-pills"></i>
                            <p>
                                Consulter
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('create')}}" class="nav-link">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Ajouter médicament
                            </p>
                        </a>
                    </li>

                        <li class="nav-header">Profiles</li>
                    <li class="nav-item">
                        <a href="{{route('users')}}" class="nav-link">
                            <i class="nav-icon fas fa-pills"></i>
                            <p>
                                Consulter
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.create')}}" class="nav-link">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Ajouter profil
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
       @yield('content')
    </div>
    <!-- /.content-wrapper -->
    {{--<footer class="">
        <p>Copyright &copy; 2020 <a href="https://www.linkedin.com/in/aimen-medjadder/">Medjadder Aimen</a>.All rights reserved.</p>
        <div class="float-right d-none d-sm-inline-block">
            <b>V</b> 1.0.0
        </div>
    </footer>--}}

    <!-- Footer -->
    <footer class="page-footer font-small blue">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-2">© 2020 Copyright:
            <a href="https://www.linkedin.com/in/aimen-medjadder/" style="color: orange">Medjadder Aimen</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset("plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- ChartJS -->
<script src="{{asset("plugins/chart.js/Chart.min.js")}}"></script>
<!-- Sparkline -->
<script src="{{asset("plugins/sparklines/sparkline.js")}}"></script>
<!-- JQVMap -->
<script src="{{asset("plugins/jqvmap/jquery.vmap.min.js")}}"></script>
<script src="{{asset("plugins/jqvmap/maps/jquery.vmap.usa.js")}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset("plugins/jquery-knob/jquery.knob.min.js")}}"></script>
<!-- daterangepicker -->
<script src="{{asset("plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("plugins/daterangepicker/daterangepicker.js")}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
<!-- Summernote -->
<script src="{{asset("plugins/summernote/summernote-bs4.min.js")}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("dist/js/adminlte.js")}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset("dist/js/pages/dashboard.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset("dist/js/demo.js")}}"></script>

<!-- DataTables -->
<script src="{{asset("plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

<script>
    @if(Session::has('success'))

    toastr.success("{{Session::get('success')}}")
    @endif

    @if(Session::has('error'))

    toastr.error("{{Session::get('error')}}")
    @endif

    @if(Session::has('info'))

    toastr.info("{{Session::get('info')}}")
    @endif

</script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });



</script>

</body>
</html>
