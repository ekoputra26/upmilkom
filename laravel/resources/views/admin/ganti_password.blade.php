@extends('admin.header')

@section('content')



    <!-- partial -->

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin">

                    <div class="row">

                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <h3 class="font-weight-bold">Ganti Password</h3>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (Session::has('message'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ Session::get('message') }}</li>
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="admin-ganti-password" class="mt-4">
                                @csrf
                                <div class="form-group">
                                    <label for="password_lama">Password Lama</label>
                                    <input type="password" class="form-control" id="password_lama" name="password_lama">
                                </div>

                                <div class="form-group">
                                    <label for="password_baru">Password Baru</label>
                                    <input type="text" class="form-control" id="password_baru" name="password_baru">
                                </div>

                                <div class="form-group">
                                    <label for="password_baru_confirmation">Konfirmasi Password Baru</label>
                                    <input type="text" class="form-control" id="password_baru_confirmation"
                                        name="password_baru_confirmation">
                                </div>

                                <button type="submit" class="btn btn-primary">Ganti Password</button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.html -->

        <footer class="footer">

            <div class="d-sm-flex justify-content-center justify-content-sm-between">All Rights Reserved by Fakultas Ilmu
                Komputer Universitas Sriwijaya

            </div>

        </footer>

        <!-- partial -->

    </div>

    <!-- main-panel ends -->

    </div>

    <!-- page-body-wrapper ends -->

    </div>

    <!-- container-scroller -->



    <!-- plugins:js -->

    <script src="admin/vendors/js/vendor.bundle.base.js"></script>

    <!-- endinject -->

    <!-- Plugin js for this page -->

    <script src="admin/vendors/chart.js/Chart.min.js"></script>

    <script src="admin/vendors/datatables.net/jquery.dataTables.js"></script>

    <script src="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>

    <script src="admin/js/dataTables.select.min.js"></script>



    <!-- End plugin js for this page -->

    <!-- inject:js -->

    <script src="admin/js/off-canvas.js"></script>

    <script src="admin/js/hoverable-collapse.js"></script>

    <script src="admin/js/template.js"></script>

    <script src="admin/js/settings.js"></script>

    <script src="admin/js/todolist.js"></script>

    <!-- endinject -->

    <!-- Custom js for this page-->

    <script src="admin/js/dashboard.js"></script>

    <script src="admin/js/Chart.roundedBarCharts.js"></script>

    <!-- End custom js for this page-->

    </body>



    </html>

@endsection
