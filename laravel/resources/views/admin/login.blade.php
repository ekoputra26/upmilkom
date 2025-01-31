<!DOCTYPE html>

<html lang="en">



<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>P3PM - ADMIN</title>

  <!-- plugins:css -->

  <link rel="stylesheet" href="admin/vendors/feather/feather.css">

  <link rel="stylesheet" href="admin/vendors/ti-icons/css/themify-icons.css">

  <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">

  <!-- endinject -->

  <!-- Plugin css for this page -->

  <link rel="stylesheet" href="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">

  <link rel="stylesheet" href="admin/vendors/ti-icons/css/themify-icons.css">

  <link rel="stylesheet" type="admin/text/css" href="js/select.dataTables.min.css">

  <!-- End plugin css for this page -->

  <!-- inject:css -->

  <link rel="stylesheet" href="admin/css/vertical-layout-light/style.css">

  <!-- endinject -->

  <link rel="icon" type="image/png" sizes="16x16" href="img/about-img.jpg">

</head>

<body>

  <div class="container-scroller">

    <div class="container-fluid page-body-wrapper full-page-wrapper">

      <div class="content-wrapper d-flex align-items-center auth px-0">

        <div class="row w-100 mx-0">

          <div class="col-lg-4 mx-auto">

            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

              <div class="d-flex justify-content-center">

                <div class="brand-logo">

                  <img src="img/about-img.jpg" alt="logo">

                </div>

              </div>

              <h4>LOGIN ADMIN P3MP</h4>

              <h6 class="font-weight-light">Silahkan masuk untuk melanjutkan</h6>
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              <form class="pt-3" action="/admin-login" method="POST">

                @csrf

                <div class="form-group">

                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">

                </div>

                <div class="form-group">

                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">

                </div>

                <img src="{{ captcha_src() }}" alt="captcha">
                    <div class="mt-2"></div>
                    <input 
                        type="text" name="captcha" class="form-control @error('captcha') is-invalid @enderror" placeholder="Masukan Captcha"
                        >
                     @error('captcha') 
                     <div class="invalid-feedback">{{ $message }}</div> @enderror 

                <a href="admin-lupa-password">Lupa Password?</a>

                <div class="mt-3">

                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">MASUK</button>

                </div>

                </div>

              </form>

            </div>

          </div>

        </div>

      </div>

      <!-- content-wrapper ends -->

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



