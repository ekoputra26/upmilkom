@extends('guest.header')
@section('content')

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 about-img">
            <h2>AKREDITASI NASIONAL</h2>
          </div>
		  
          <div class="col-lg-12 content">
            <div class="table-responsive" style="overflow-x:auto;">
              <table id="customers" style="white-space:nowrap;width:100%;font-size:14px;padding:1px;">
                <thead>
                    <tr>
                      <th width="15%">JURUSAN</th>
                      <th width="15%">PROGRAM</th>
                      <th width="15%">AKREDITASI</th>
                      <th width="15%">SK</th>
                      <th width="10%">SERTIFIKAT</th>
                      <th width="15%">BERLAKU</th>
                      <th width="15%">BATAS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($download as $d)
                    <tr>
                      <td>{{ $d->akreditasi_studi  }}</td>
                      <td>{{ $d->akreditasi_program }}</td>
                      <td>{{ $d->akreditasi_akreditasi }}</td>
                      <td>{{ $d->akreditasi_sk }}</td>
                      <td></td>
                      <td>{{ $d->akreditasi_mulai }}</td>
                      <td>{{ $d->akreditasi_sampai }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #about -->

  </main>

  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Fakultas Ilmu Komputer Universitas Sriwijaya</strong>. All Rights Reserved
      </div>
  </footer><!-- #footer -->
  

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
@endsection