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
                            <h3 class="font-weight-bold mt-4">EDIT DATA DOSEN KUESIONER</h3>

                        </div>

                    </div>

                </div>

            </div>



            <a class="btn btn-success float-right" href="/admin-new-data-dosen">Buat Data</a>
            <a class="btn btn-success float-right mr-3" href="/admin-import-data-dosen">Import Data</a>

            <table class="table mt-5" id="tabelDosen">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Dosen</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($dosens as $d)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $d->nama }}</td>
                            <td>
                                @switch($d->prodi)
                                    @case('si')
                                        Sistem Informasi
                                    @break

                                    @case('ti')
                                        Teknik Informatika
                                    @break

                                    @case('sk')
                                        Sistem Komputer
                                    @break

                                    @case('tk')
                                        Teknik Komputer
                                    @break

                                    @case('mi')
                                        Manajemen Informatika
                                    @break

                                    @case('ka')
                                        Komputerisasi Akuntansi
                                    @break
                                @endswitch
                            </td>
                            <td>
                                <a class="btn btn-primary" href="admin-edit-data-dosen-{{ $d->id }}">Edit</a>
                                <a class="btn btn-danger" href="admin-hapus-data-dosen-{{ $d->id }}">Hapus</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

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

    <script>
        let table = new DataTable('#tabelDosen', {
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
