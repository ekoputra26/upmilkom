@extends('admin.header')
@section('content')

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">MENU PENETAPAN PPEPP</h3>
                  <h6 class="font-weight-normal mb-0">Update Tampilan <a href="http://upm.ilkom.unsri.ac.id/">Penetapan PPEPP</a></h6>
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
                      <div class="d-flex justify-content-first">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modaltambah">TAMBAH PENETAPAN</a>
                      </div>
                      <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Tambah Penetapan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form action="/admin-update-penetapan" method="POST" enctype="multipart/form-data">
                             	@csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Judul <b>Penetapan PPEPP</b></label>
                                  <input class="form-control" type="text" name="tim_judul" value="">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Upload <b>File Penetapan PPEPP</b></label>
                                  <input class="form-control" type="file" name="profile_picture">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Deskripsi <b>Tentang Penetapan PPEPP</b></label>
                                  <textarea class="form-control ckeditor" rows="10" name="tim_text"></textarea>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Link <b>Penetapan PPEPP</b></label>
                                  <input class="form-control" type="text" name="link" value="">
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                             </form>
                          </div>
                        </div>
                      </div>
                      
                      <br><br>
                      <div class="table-responsive" style="overflow-x:auto;">
                        <table id="customers" style="white-space:nowrap;width:100%;font-size:10px;padding:1px;">
                          <thead>
                            <tr>
                              <th width="30%">JUDUL</th>
                              <th width="30%">FILE</th>
                              <th width="30%">LINK</th>
                              <th width="10%">AKSI</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($tim as $t)
                            <tr>
                              <td>{{ $t->profil_tim_judul }}</td>
                              <td><i class="icon-file menu-icon"></i><a style="font-size:10px" href="http://upm.ilkom.unsri.ac.id/fileku/{{ $t->profil_tim_foto }}"></a>{{ $t->profil_tim_foto }}</td>
                              <td>{{ $t->link }}</td>
                              <td><a class="btn btn-danger" href="/admin-hapus-penetapan?id={{ $t->profil_tim_id }}">HAPUS</a></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
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
  <script>
    var table = $('#customers').DataTable( {
      "order": [[ 0, "asc" ]],
      "paging":   true,
      "ordering": true,
      "info":     true,
      "filter": true,
    } );
  </script>
</body>

</html>
@endsection