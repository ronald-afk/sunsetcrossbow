
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('admin.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin/sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               @include('admin/topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">@yield('content-title')</h1>
                    @yield('main')
                </div>
                <!-- /.container-fluid -->
               
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin/footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Logout</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('sbadmin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('sbadmin/js/sb-admin-2.min.js')}}"></script>   
      <!-- Page level plugins -->
      <script src="{{asset('sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  
      <!-- Page level custom scripts -->
      <script src="{{asset('sbadmin/js/demo/datatables-demo.js')}}"></script>
</body>

</html>