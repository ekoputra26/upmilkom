@extends('admin.header')

@section('content')
    <!-- partial -->

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin">

                    <div class="row">

                        <div class="col-12 mb-4 mb-xl-0">

                            <h3 class="font-weight-bold">Lihat Saran Terhadap Aspek Reliability (kehandalan dosen, Tenaga Administrasi)</h3>

                        </div>

                    </div>

                </div>

            </div>

            <h3 class=" font-weight-bold">Saran Untuk Dosen</h3>
            <table class="table-responsive" id="saranDosen">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Nomor</th>
                        <th scope="col">Dosen 1</th>
                        <th scope="col">Dosen 2</th>
                        <th scope="col">Saran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saranDosen as $saran)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $saran['dosen1'] }}</td>
                            <td>{{ $saran['dosen2'] }}</td>
                            <td>{{ $saran['saranDosen'] }}</td>
                            <td><a class="btn btn-danger" href="admin-hapus-saran-dosen-{{ $saran['respondent_number'] }}">Hapus</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>
            <h3 class=" font-weight-bold">Saran Untuk Tenaga Kependidikan</h3>
            <table class="table-responsive" id="saranTK">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Nomor</th>
                        <th scope="col">Tenaga Kependidikan (Admin)</th>
                        <th scope="col">Saran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saranTK as $saran)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $saran['namaAdmin'] }}</td>
                            <td>{{ $saran['saranTenagaKependidikan'] }}</td>
                            <td><a class="btn btn-danger" href="admin-hapus-saran-tk-{{ $saran['respondent_number'] }}">Hapus</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>
            <h3 class=" font-weight-bold">Saran Untuk Program Studi</h3>
            <table class="table-responsive" id="saranProdi">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Nomor</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Saran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saranProdi as $saran)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $saran['program_studi'] }}</td>
                            <td>{{ $saran['saranProgramStudi'] }}</td>
                            <td><a class="btn btn-danger" href="admin-hapus-saran-prodi-{{ $saran['respondent_number'] }}">Hapus</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

            <!-- partial:partials/_footer.html -->

            <footer class="footer">

                <div class="d-sm-flex justify-content-center justify-content-sm-between">All Rights Reserved by Fakultas
                    Ilmu Komputer Universitas Sriwijaya

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

    <script>
        let table = new DataTable('#saranDosen', {
            // options
        });
        let table2 = new DataTable('#saranTK', {
            // options
        });
        let table3 = new DataTable('#saranProdi', {
            // options
        });
    </script>


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
