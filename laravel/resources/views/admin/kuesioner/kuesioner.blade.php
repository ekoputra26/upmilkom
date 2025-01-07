@extends('admin.header')

@section('content')
    <!-- partial -->

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin">

                    <div class="row">

                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <h3 class="font-weight-bold">DATA KUESIONER</h3>

                        </div>

                    </div>

                </div>

            </div>

            <div class="bg-dark w-50 mx-auto text-center text-white p-5 rounded">Total Jumlah Seluruh Responden<br>
                <h3 class="font-weight-bold d-inline">{{ $jumlahResponden }}</h3>
            </div>
            <div class="row mt-3">


                <div
                    class="col bg-dark text-white text-center p-4 rounded-left @if (count($respondens) === 1) rounded-right @endif border-right border-white">
                    {{ $respondens[0][0] }} <br>
                    <h4 class="font-weight-bold fs-3">{{ $respondens[0][1] }}</h4>
                </div>

                @if (count($respondens) > 2)
                    @for ($i = 1; $i < count($respondens); $i++)
                        @if ($i != count($respondens) - 1)
                            <div class="col bg-dark text-white text-center p-4 border-right border-white">
                                {{ $respondens[$i][0] }} <br>
                                <h4 class="font-weight-bold fs-3">{{ $respondens[$i][1] }}</h4>
                            </div>
                        @endif
                    @endfor
                @endif

                @if (count($respondens) > 1)
                    <div class="col bg-dark text-white text-center p-4 rounded-right">
                        {{ $respondens[count($respondens) - 1][0] }} <br>
                        <h4 class="font-weight-bold fs-3">{{ $respondens[count($respondens) - 1][1] }}</h4>
                    </div>
                @endif

            </div>

            <h2 class="text-center m-0 p-0 mt-5">Grafik Jumlah Responden</h2>

            <div class="container p-5">
                <canvas id="jumlahRespondenChart"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

            <script>
                const ctx = document.getElementById('jumlahRespondenChart');

                new Chart(ctx, {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data: {
                        labels: [
                            @for ($i = 0; $i < count($respondens); $i++)
                                '{{ $respondens[$i][0] }}',
                            @endfor
                        ],
                        datasets: [{
                            label: 'Jumlah Responden',
                            data: [
                                @for ($i = 0; $i < count($respondens); $i++)
                                    {{ $respondens[$i][1] }},
                                @endfor
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

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
