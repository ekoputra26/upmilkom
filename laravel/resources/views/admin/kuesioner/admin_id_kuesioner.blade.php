@extends('admin.header')

@section('content')
    <!-- partial -->

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12">

                    <div class="row">

                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <a class="btn btn-info" href="/admin-edit-data-kuesioner">Kembali</a>
                            <h3 class="font-weight-bold mt-4">EDIT DATA ADMIN KUESIONER</h3>

                        </div>

                    </div>

                </div>

            </div>

            <form method="POST" action="/admin-edit-data-admin">
                @csrf

                <input type="hidden" name="adminId" value="{{ $admin->id }}">

                <div class="form-group mt-3">
                    <label for="nama">Nama Admin</label>
                    <input type="text" class="form-control" id="admin" value="{{ $admin->nama }}" name="nama">
                </div>

                <button type="submit" class="btn btn-primary w-100 font-weight-bold">Simpan</button>
            </form>

            <!-- partial:partials/_footer.html -->

            <footer class="footer mt-5">

                <div class="d-sm-flex justify-content-center justify-content-sm-between">All Rights Reserved by Fakultas
                    Ilmu
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

    <script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>

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
