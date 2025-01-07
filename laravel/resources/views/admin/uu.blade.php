@extends('admin.header')
@section('content')

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">MENU PERATURAN UNDANG UNDANG</h3>
                  <h6 class="font-weight-normal mb-0">Update Tampilan <a href="http://upm.ilkom.unsri.ac.id/peraturan-uu">Undang Undang</a></h6>
                </div>
              </div>
            </div>
          </div>
          
            
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title"></p>
                  <div class="row">
                    <div class="col-12">
						<form action="/admin-update-uu" method="POST" enctype="multipart/form-data">
                          @csrf
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1">Judul <b>Undang Undang</b></label>
                            <input class="form-control" type="text" name="tim_judul" value="{{ $tim->profil_tim_judul }}">
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1">Upload <b>File Undang Undang</b></label>
                            <input type="text" hidden name="filesaatini" value="{{ $tim->profil_tim_foto }}">
                            <input class="form-control" type="file" name="profile_picture">
                            <a style="font-size:10px"><b>file Saat Ini: </b></a><i class="icon-file menu-icon"></i><a style="font-size:10px" href="http://upm.ilkom.unsri.ac.id/fileku/{{ $tim->profil_tim_foto }}"> {{ $tim->profil_tim_foto }}</a>
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi <b>Undang Undang</b></label>
                            <textarea class="form-control ckeditor" rows="10" name="tim_text">{{ $tim->profil_tim_text }}</textarea>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">SIMPAN</button>
                      	</form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        
        
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">All Rights Reserved by Fakultas Ilmu Komputer Universitas Sriwijaya
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
  <script src="admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
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