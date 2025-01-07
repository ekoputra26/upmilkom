@extends('admin.header')

@section('content')
    <!-- partial -->

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin">

                    <div class="row">

                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <h3 class="font-weight-bold">Cara Penilaian Dosen</h3>

                        </div>

                    </div>

                </div>

            </div>

            <div class="bg-dark mx-auto text-white w-50 text-center p-3 rounded">
                Rata-Rata Nilai Cara Penilaian Dosen Fasilkom <br> <span
                    class="font-weight-bold fs-1">{{ $nilaiFasilkom }}/5</span>
            </div>
            <div class="row mt-3 column-gap-2">

                <div class="col bg-dark text-white text-center p-4 rounded-left @if(count($nilaiProdi) === 1) rounded-right @endif border-right border-white">
                    {{ $nilaiProdi[0]['program_studi'] }} <br> <span class="font-weight-bold fs-3">{{ $nilaiProdi[0]['nilai'] }}/5</span>
                </div>

                @for($i=1; $i < count($nilaiProdi)-1; $i++)
                <div class="col bg-dark text-white text-center p-4 border-right border-white">
                    {{ $nilaiProdi[$i]['program_studi'] }} <br> <span class="font-weight-bold fs-3">{{ $nilaiProdi[$i]['nilai'] }}/5</span>
                </div>
                @endfor
                
                @if(count($nilaiProdi) > 1)
                <div class="col bg-dark text-white text-center p-4 rounded-right border-right border-white">
                    {{ $nilaiProdi[count($nilaiProdi)-1]['program_studi'] }} <br> <span class="font-weight-bold fs-3">{{ $nilaiProdi[count($nilaiProdi)-1]['nilai'] }}/5</span>
                </div>
                @endif

            </div>

            <h3 class="text-center font-weight-bold mt-5">Rata-Rata Nilai Cara Penilaian Dosen Fasilkom</h3>
            <div class="container w-75">
                <canvas id="nilaiCaraPenilaianDosenChart"></canvas>
            </div>

            <h3 class="text-center font-weight-bold mt-5">Umpan Balik terhadap Mahasiswa berdasarkan Prodi</h3>
            <div class="container w-75">
                <canvas id="umpanBalikProdiChart"></canvas>
            </div>

            <h3 class="text-center font-weight-bold mt-5">Nilai Transparansi Prodi dalam Memberikan Nilai Akhir Perkuliahan
                ke Mahasiswa </h3>
            <div class="container w-75">
                <canvas id="transparansiProdiChart"></canvas>
            </div>

            <h2 class="mt-5">Rata-Rata Nilai Cara Penilaian Dosen</h2>
            <table class="table-responsive" id="database">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Nama Mata Kuliah</th>
                        <th scope="col">Dosen 1</th>
                        <th scope="col">Dosen 2</th>
                        <th scope="col" class="text-left">Rata-Rata Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilDosen as $dosen)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $dosen['program_studi'] }}</td>
                            <td>{{ $dosen['nama_mk'] }}</td>
                            <td>{{ $dosen['dosen1'] }}</td>
                            <td>{{ $dosen['dosen2'] }}</td>
                            <td class="text-left">
                                {{ number_format($dosen['rataNilai'], 2, '.', ',') }} / 5
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

            <script>
                const ctx = document.getElementById('nilaiCaraPenilaianDosenChart');
                const umpanBalikProdiChart = document.getElementById('umpanBalikProdiChart');
                const transparansiProdiChart = document.getElementById('transparansiProdiChart');

                new Chart(ctx, {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data: {
                        labels: [
                            @for ($i = 0; $i < count($nilaiProdi); $i++)
                                "{{ $nilaiProdi[$i]['program_studi'] }}",
                            @endfor
                        ],
                        datasets: [{
                            label: 'Rata-Rata Nilai',
                            data: [
                                @for ($i = 0; $i < count($nilaiProdi); $i++)
                                    "{{ $nilaiProdi[$i]['nilai'] }}",
                                @endfor 
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 5
                            }
                        }
                    }
                });

                new Chart(umpanBalikProdiChart, {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data: {
                        labels: [
                            @for ($i = 0; $i < count($hasilProdi); $i++)
                                "{{ $hasilProdi[$i]['program_studi'] }}",
                            @endfor
                        ],
                        datasets: [{
                            label: 'Nilai Umpan Balik',
                            data: [
                                @for ($i = 0; $i < count($hasilProdi); $i++)
                                    "{{ $hasilProdi[$i]['nilai'][1] }}",
                                @endfor
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 5
                            }
                        }
                    }
                });

                new Chart(transparansiProdiChart, {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data: {
                        labels: [
                            @for ($i = 0; $i < count($hasilProdi); $i++)
                                "{{ $hasilProdi[$i]['program_studi'] }}",
                            @endfor
                        ],
                        datasets: [{
                            label: 'Nilai Transparansi',
                            data: [
                                @for ($i = 0; $i < count($hasilProdi); $i++)
                                    "{{ $hasilProdi[$i]['nilai'][3] }}",
                                @endfor
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 5
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
