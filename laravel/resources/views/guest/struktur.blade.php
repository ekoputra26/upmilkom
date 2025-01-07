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
            <h2>STRUKTUR ORGANISASI TIM P3MP FASILKOM UNSRI</h2>
          </div>
		  
          <div class="col-lg-12 content">
            <div class="table-responsive" style="overflow-x:auto;">
              <table id="customers" style="white-space:nowrap;width:100%;font-size:10px;padding:1px;">
                <thead>
                  <tr>
                    <th width="30%">NAMA</th>
                    <th width="40%">NIK</th>
                    <th width="30%">JABATAN</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($struktur as $s)
                  <tr>
                    <td>{{ $s->struktur_nama }}</td>
                    <td>{{ $s->struktur_nik }}</td>
                    <td>{{ $s->struktur_jabatan }}</td>
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