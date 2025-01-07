@extends('admin.header')

@section('content')
    <!-- partial -->
    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin">

                    <div class="row">

                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <h3 class="font-weight-bold">CONTROL PANEL KUESIONER</h3>

                        </div>

                    </div>

                </div>

            </div>
            @if (Session::has('message'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ Session::get('message') }}</li>
                    </ul>
                </div>
            @endif
            <h5>Kondisi Kuesioner Saat Ini: @if ($tanggalTest)
                    <span class="font-weight-bold">TERTUTUP</span>
                @else
                    <span class="font-weight-bold">TERBUKA</span>
                @endif
            </h5>
            <h4 class="mb-3">Atur Ketersediaan Kuesioner Langsung</h4>
            <form method="POST" action="/admin-toggle-tanggal">
                @csrf
                @if ($tanggalTest)
                    <button type="submit" class="btn btn-primary">Buka Kuesioner Selama 1 Bulan</button>
                @else
                    <button type="submit" class="btn btn-danger">Tutup Kuesioner</button>
                @endif
            </form>
            <hr>
            <h4>Jadwalkan Penutupan Kuesioner</h4>
            <form method="POST" action="/admin-set-tanggal">
                @csrf
                <div class="form-group">
                    <label for="tanggalKuesioner">Tanggal Kuesioner Ditutup (Bulan/Hari/Tahun)</label>
                    <input type="date" class="form-control w-25" id="tanggalKuesioner" name="tanggalKuesioner"
                        value="{{ $tanggal }}">
                </div>
                <button type="submit" class="btn btn-primary">Atur Penjadwalan</button>
            </form>




            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

            <!-- partial:partials/_footer.html -->

            <footer class="footer">

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
