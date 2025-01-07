@extends('admin.header')

@section('content')
    <!-- partial -->

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin">

                    <div class="row">

                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <h3 class="font-weight-bold">Kedisiplinan Dosen</h3>

                        </div>

                    </div>

                </div>

            </div>
            <div class="bg-dark mx-auto text-white w-75 text-center p-5 rounded">
                Rata-Rata Nilai Kedisiplinan Seluruh Dosen Fasilkom <br> <span class="font-weight-bold">Persentase Pertemuan:
                    {{ number_format(($nilaiFasilkom[0] / 16) * 100, 1, '.', ',') }}% ({{ number_format($nilaiFasilkom[0], 1, '.', ',') }}
                    dari 16 Pertemuan) -> {{ number_format(($nilaiFasilkom[1] / 16) * 100, 1, '.', ',') }}% Offline + {{ number_format(($nilaiFasilkom[2] / 16) * 100, 1, '.', ',') }}%
                    Online</span>
            </div>

            @for ($i = 0; $i < count($nilaiProdi); $i++)
                <div class="bg-dark text-white text-center p-5 rounded w-75 mx-auto mt-3">
                    {{ $nilaiProdi[$i]['program_studi'] }} <br> <span class="font-weight-bold">Persentase Pertemuan:
                        {{ number_format(($nilaiProdi[$i]['pertemuan'][1] / 16) * 100, 1, '.', ',') }}%
                        ({{ number_format($nilaiProdi[$i]['pertemuan'][1], 1, '.', ',') }} dari 16 Pertemuan) ->
                        {{ number_format($nilaiProdi[$i]['pertemuan'][2], 1, '.', ',') }}% Offline + {{ number_format($nilaiProdi[$i]['pertemuan'][3], 1, '.', ',') }}% Online</span>
                </div>
            @endfor

            <h3 class="text-center font-weight-bold mt-4">Bar Chart Persentase Total Pertemuan Dosen per Jurusan</h3>

            <div class="container w-75">
                <canvas id="persentasePertemuanDosenChart"></canvas>
            </div>

            <h3 class="text-center font-weight-bold mt-5">Bar Chart Persentase Total Pertemuan Offline Dosen per Jurusan
            </h3>
            <div class="container w-75">
                <canvas id="persentaseOfflineDosenChart"></canvas>
            </div>

            <h3 class="text-center font-weight-bold mt-5">Bar Chart Persentase Total Pertemuan Online Dosen per Jurusan</h3>
            <div class="container w-75">
                <canvas id="persentaseOnlineDosenChart"></canvas>
            </div>

            <h2 class="mt-5">Rata-Rata Nilai Kedisplinan Dosen MK</h2>
            <table class="table-responsive" id="database">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Nama Mata Kuliah</th>
                        <th scope="col">Dosen 1</th>
                        <th scope="col">Dosen 2</th>
                        <th scope="col">% Total Pertemuan</th>
                        <th scope="col">% Pertemuan Offline</th>
                        <th scope="col">% Pertemuan Online</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilMK as $mk)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $mk['program_studi'] }}</td>
                            <td>{{ $mk['nama_mk'] }}</td>
                            <td>{{ $mk['dosen1'] }}</td>
                            <td>{{ $mk['dosen2'] }}</td>
                            <td>{{ number_format(($mk['pertemuan'][0] / 16) * 100, 1, '.', ',') }}%</td>
                            <td>{{ number_format(($mk['pertemuan'][1] / 16) * 100, 1, '.', ',') }}%</td>
                            <td>{{ number_format(($mk['pertemuan'][2] / 16) * 100, 1, '.', ',') }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

            <script>
                const persentasePertemuanDosenChart = document.getElementById('persentasePertemuanDosenChart');
                const persentaseOfflineDosenChart = document.getElementById('persentaseOfflineDosenChart');
                const persentaseOnlineDosenChart = document.getElementById('persentaseOnlineDosenChart');

                new Chart(persentasePertemuanDosenChart, {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data: {
                        labels: [
                            @for ($i = 0; $i < count($nilaiProdi); $i++)
                                "{{ $nilaiProdi[$i]['program_studi'] }}",
                            @endfor
                        ],
                        datasets: [{
                            label: 'Persentase Pertemuan per 16 Pertemuan',
                            data: [
                                @for ($i = 0; $i < count($nilaiProdi); $i++)
                                    "{{ number_format(($nilaiProdi[$i]['pertemuan'][1]/16)*100, 1, '.', ',') }}",
                                @endfor
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });

                new Chart(persentaseOfflineDosenChart, {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data: {
                        labels: [
                            @for ($i = 0; $i < count($nilaiProdi); $i++)
                                "{{ $nilaiProdi[$i]['program_studi'] }}",
                            @endfor
                        ],
                        datasets: [{
                            label: 'Persentase Pertemuan per 16 Pertemuan',
                            data: [
                                @for ($i = 0; $i < count($nilaiProdi); $i++)
                                    "{{ number_format(($nilaiProdi[$i]['pertemuan'][2]/16)*100, 1, '.', ',') }}",
                                @endfor
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });

                new Chart(persentaseOnlineDosenChart, {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data: {
                        labels: [
                            @for ($i = 0; $i < count($nilaiProdi); $i++)
                                "{{ $nilaiProdi[$i]['program_studi'] }}",
                            @endfor
                        ],
                        datasets: [{
                            label: 'Persentase Pertemuan per 16 Pertemuan',
                            data: [
                                @for ($i = 0; $i < count($nilaiProdi); $i++)
                                    "{{ number_format(($nilaiProdi[$i]['pertemuan'][3]/16)*100, 1, '.', ',') }}",
                                @endfor
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });
            </script>

            <script>
                let table = new DataTable('#database', {
                    // options
                });
            </script>

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
