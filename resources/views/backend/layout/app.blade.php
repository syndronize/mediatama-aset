
<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('backend/includes/style')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('backend/includes/navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend/includes/sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('backend/includes/footer')
        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('backend/includes/script')

</body>
</html>
