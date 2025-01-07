@extends('admin.header')

@section('content')
    <!-- partial -->

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin">

                    <div class="row">

                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <h3 class="font-weight-bold">Sarana Prasarana</h3>

                        </div>

                    </div>

                </div>

            </div>

            <div class="bg-dark mx-auto text-white w-50 text-center p-3 rounded">
                Rata-Rata Nilai Sarana Prasarana Fasilkom <br> <span
                    class="font-weight-bold fs-1">{{ $nilaiFasilkom }}/5</span>
            </div>
            <div class="row mt-3 column-gap-2">
                <div class="col bg-dark text-white text-center p-4 rounded-left border-right border-white">
                    Sarana dan Prasarana (1) LCD, Papan Tulis, dll <br> <span
                        class="font-weight-bold fs-3">{{ $hasilFasilkom[0] }}/5</span>
                </div>
                <div class="col bg-dark text-white text-center p-4 border-right border-white">
                    Sarana dan Prasarana (2) WiFi <br> <span class="font-weight-bold fs-3">{{ $hasilFasilkom[1] }}/5</span>
                </div>
                <div class="col bg-dark text-white text-center p-4 border-right border-white">
                    Sarana dan Prasarana (3) Perkuliahan dilengkapi dengan AC yang Memadai <br> <span
                        class="font-weight-bold fs-3">{{ $hasilFasilkom[2] }}/5</span>
                </div>
                <div class="col bg-dark text-white text-center p-4 rounded-right">
                    Sarana dan Prasarana (4) Perkuliahan dilengkapi Kebersihan di dalam kelas <br> <span
                        class="font-weight-bold fs-3">{{ $hasilFasilkom[3] }}/5</span>
                </div>
            </div>

            <h3 class="text-center font-weight-bold mt-5">Rata-Rata Nilai Sarana Prasarana Fasilkom</h3>
            <div class="container w-75">
                <canvas id="nilaiSaranaPrasaranaChart"></canvas>
            </div>

            <h2 class="mt-5">Rata-Rata Nilai Sarana Prasarana</h2>
            <table class="table" id="database">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">Nomor</th>
                        <th scope="col">Nama Ruangan</th>
                        <th scope="col" class="text-left">Rata-Rata Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilRuangan as $ruangan)
                        <tr>
                            <th scope="row" class="text-left">{{ $loop->iteration }}</th>
                            <td>{{ $ruangan['ruangan'] }}</td>
                            <td class="text-left">{{ $ruangan['rataNilai'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3 class="mt-5 font-weight-bold">Ruang yang paling kurang mencukupi (papan tulis/tv, LCD, spidol, penghapus,
                kursi) (nilai di bawah 2,5)</h3>
            <table class="table" id="database2">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">Nomor</th>
                        <th scope="col">Nama Ruangan</th>
                        <th scope="col" class="text-left">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilRuangan as $ruangan)
                        @if ($ruangan['nilai'][0] < 2.5)
                            <tr>
                                <th scope="row" class="text-left">{{ $loop->iteration }}</th>
                                <td>{{ $ruangan['ruangan'] }}</td>
                                <td class="text-left">
                                    {{ $ruangan['nilai'][0] }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <h3 class="mt-5 font-weight-bold">Ruang Perkuliahan paling kurang untuk akses wifi internet yang memadai (nilai
                di bawah 2,5)</h3>
            <table class="table" id="database3">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">Nomor</th>
                        <th scope="col">Nama Ruangan</th>
                        <th scope="col" class="text-left">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilRuangan as $ruangan)
                        @if ($ruangan['nilai'][1] < 2.5)
                            <tr>
                                <th scope="row" class="text-left">{{ $loop->iteration }}</th>
                                <td>{{ $ruangan['ruangan'] }}</td>
                                <td class="text-left">
                                    {{ $ruangan['nilai'][1] }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <h3 class="mt-5 font-weight-bold">Ruang Perkuliahan yang paling minim AC yang memadai (nilai di bawah 2,5)</h3>
            <table class="table" id="database4">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">Nomor</th>
                        <th scope="col">Nama Ruangan</th>
                        <th scope="col" class="text-left">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilRuangan as $ruangan)
                        @if ($ruangan['nilai'][2] < 2.5)
                            <tr>
                                <th scope="row" class="text-left">{{ $loop->iteration }}</th>
                                <td>{{ $ruangan['ruangan'] }}</td>
                                <td class="text-left">
                                    {{ $ruangan['nilai'][2] }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <h3 class="mt-5 font-weight-bold">Ruang yang paling tidak bersih dalam kelas (nilai di bawah 2,5)</h3>
            <table class="table" id="database5">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">Nomor</th>
                        <th scope="col">Nama Ruangan</th>
                        <th scope="col" class="text-left">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilRuangan as $ruangan)
                        @if ($ruangan['nilai'][3] < 2.5)
                            <tr>
                                <th scope="row" class="text-left">{{ $loop->iteration }}</th>
                                <td>{{ $ruangan['ruangan'] }}</td>
                                <td class="text-left">
                                    {{ $ruangan['nilai'][3] }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

            <script>
                const ctx = document.getElementById('nilaiSaranaPrasaranaChart');

                new Chart(ctx, {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data: {
                        labels: ['LCD, Papan Tulis, dll', 'WiFi', ' Perkuliahan dilengkapi dengan AC yang Memadai',
                            'Perkuliahan dilengkapi Kebersihan di dalam kelas'
                        ],
                        datasets: [{
                            label: 'Nilai',
                            data: [{{ $hasilFasilkom[0] }}, {{ $hasilFasilkom[1] }},
                                {{ $hasilFasilkom[2] }},
                                {{ $hasilFasilkom[3] }},
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
                let table2 = new DataTable('#database2', {
                    // options
                });
                let table3 = new DataTable('#database3', {
                    // options
                });
                let table4 = new DataTable('#database4', {
                    // options
                });
                let table5 = new DataTable('#database5', {
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
