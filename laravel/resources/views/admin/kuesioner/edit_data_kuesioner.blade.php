@extends('admin.header')

@section('content')
    <!-- partial -->

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin">

                    <div class="row">

                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                            @endif

                            <h3 class="font-weight-bold">EDIT DATA KUESIONER</h3>

                        </div>

                    </div>

                </div>

            </div>

            <h4>Pilih data yang ingin diedit</h4>
            <ul class="list-group mt-3">
                <a class="list-group-item" href="admin-edit-data-waktu">Edit Data Waktu Kuesioner</a>
                <a class="list-group-item" href="admin-edit-data-deskripsi">Edit Data Deskripsi Kuesioner</a>
                <a class="list-group-item" href="admin-edit-data-mata-kuliah">Edit Data Mata Kuliah</a>
                <a class="list-group-item" href="admin-edit-data-dosen">Edit Data Dosen</a>
                <a class="list-group-item" href="admin-edit-data-instrumen">Edit Data Instrumen Kuesioner</a>
                <a class="list-group-item" href="admin-edit-data-jenis-mata-kuliah">Edit Data Jenis Mata Kuliah</a>
                <a class="list-group-item" href="admin-edit-data-ruangan">Edit Data Ruangan</a>
                <a class="list-group-item" href="admin-edit-data-prodi">Edit Data Program Studi dan Kelas</a>
                <a class="list-group-item" href="admin-edit-data-admin">Edit Data Admin</a>
            </ul>

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
