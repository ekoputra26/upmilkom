@extends('guest.header')
@section('content')

  <section id="intro">
    <div class="intro-content">
      <div clas="d-flex justify-content-center">
          <div class="row">
            <div class="col-md-2">
              <div onclick="a();" class="tombolku">P</div>
            </div>
            <div class="col-md-2">
              <div onclick="b();" class="tombolku">P</div>
            </div>
            <div class="col-md-2">
              <div onclick="c();" class="tombolku">E</div>
            </div>
            <div class="col-md-2">
              <div onclick="d();" class="tombolku">P</div>
            </div>
            <div class="col-md-2">
              <div onclick="e();" class="tombolku">P</div>
            </div>
          </div>
        </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('img/intro-carousel/1.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/2.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/3.jpg');"></div>
    </div>

  </section><!-- #intro -->

  <main id="main">
    <br><br>
    
    
    <section id="b1" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          @foreach($a1 as $a)
    	  <div class="col-md-12">
          <div class="card">
  			<div class="card-body">
              <div class="col-lg-12 about-img">
                <div class="d-flex justify-content-center">
                    <h2><b>{{$a->profil_tim_judul}}</b></h2>
                </div>
                <div class="d-flex justify-content-start">
                  <p>link: <a href="{{$a->link}}">{{$a->link}}</a></p>
                </div>
              </div>

              <div class="col-lg-12 content">
                <?= $a->profil_tim_text ?>
              </div>
              <br>
              <div class="col-lg-12">
                <p>
                  Download File: <a rel="noopener noreferrer" target="_blank" style="font-size:10px" href="http://upm.ilkom.unsri.ac.id/fileku/{{ $a->profil_tim_foto }}"> {{ $a->profil_tim_foto }}</a>
                </p>
              </div>
            </div>
          </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
    <section id="b2" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          @foreach($b1 as $a)
          <div class="col-md-12">
          <div class="card">
  			<div class="card-body">
              <div class="col-lg-12 about-img">
                <div class="d-flex justify-content-center">
                    <h2><b>{{$a->profil_tim_judul}}</b></h2>
                </div>
                <div class="d-flex justify-content-start">
                  <p>link: <a href="{{$a->link}}">{{$a->link}}</a></p>
                </div>
              </div>

              <div class="col-lg-12 content">
                <?= $a->profil_tim_text ?>
              </div>
              <br>
              <div class="col-lg-12">
                <p>
                  Download File: <a rel="noopener noreferrer" target="_blank" style="font-size:10px" href="http://upm.ilkom.unsri.ac.id/fileku/{{ $a->profil_tim_foto }}"> {{ $a->profil_tim_foto }}</a>
                </p>
              </div>
            </div>
          </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
    <section id="b3" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          @foreach($c1 as $a)
          <div class="col-md-12">
          <div class="card">
  			<div class="card-body">
              <div class="col-lg-12 about-img">
                <div class="d-flex justify-content-center">
                    <h2><b>{{$a->profil_tim_judul}}</b></h2>
                </div>
                <div class="d-flex justify-content-start">
                  <p>link: <a href="{{$a->link}}">{{$a->link}}</a></p>
                </div>
              </div>

              <div class="col-lg-12 content">
                <?= $a->profil_tim_text ?>
              </div>
              <br>
              <div class="col-lg-12">
                <p>
                  Download File: <a rel="noopener noreferrer" target="_blank" style="font-size:10px" href="http://upm.ilkom.unsri.ac.id/fileku/{{ $a->profil_tim_foto }}"> {{ $a->profil_tim_foto }}</a>
                </p>
              </div>
            </div>
          </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
    <section id="b4" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          @foreach($d1 as $a)
          <div class="col-md-12">
          <div class="card">
  			<div class="card-body">
              <div class="col-lg-12 about-img">
                <div class="d-flex justify-content-center">
                    <h2><b>{{$a->profil_tim_judul}}</b></h2>
                </div>
                <div class="d-flex justify-content-start">
                  <p>link: <a href="{{$a->link}}">{{$a->link}}</a></p>
                </div>
              </div>

              <div class="col-lg-12 content">
                <?= $a->profil_tim_text ?>
              </div>
              <br>
              <div class="col-lg-12">
                <p>
                  Download File: <a rel="noopener noreferrer" target="_blank" style="font-size:10px" href="http://upm.ilkom.unsri.ac.id/fileku/{{ $a->profil_tim_foto }}"> {{ $a->profil_tim_foto }}</a>
                </p>
              </div>
            </div>
          </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
    <section id="b5" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          @foreach($e1 as $a)
          <div class="col-md-12">
          <div class="card">
  			<div class="card-body">
              <div class="col-lg-12 about-img">
                <div class="d-flex justify-content-center">
                    <h2><b>{{$a->profil_tim_judul}}</b></h2>
                </div>
                <div class="d-flex justify-content-start">
                  <p>link: <a href="{{$a->link}}">{{$a->link}}</a></p>
                </div>
              </div>

              <div class="col-lg-12 content">
                <?= $a->profil_tim_text ?>
              </div>
              <br>
              <div class="col-lg-12">
                <p>
                  Download File: <a rel="noopener noreferrer" target="_blank" style="font-size:10px" href="http://upm.ilkom.unsri.ac.id/fileku/{{ $a->profil_tim_foto }}"> {{ $a->profil_tim_foto }}</a>
                </p>
              </div>
            </div>
          </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
    <br><br>

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>Tentang Kami</h2>
            <?= $home->home_tentang_kami; ?>

          </div>
        </div>

      </div>
    </section><!-- #about -->

    <br>
    
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Akreditasi</h3>
            <p class="cta-text">Universitas Sriwijaya telah mendapatkan Akreditasi Institusi Unggul dari Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) pada tahun {{ $home->home_akreditasi_tahun }}</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="http://upm.ilkom.unsri.ac.id/fileku/{{ $home->home_akreditasi_sk }}">Download Surat Keputusan</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Kontak Kami</h2>
          <p>{{ $home->home_deskripsi_kontak }}</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address>Jl. Srijaya Negara, Bukit Besar, Kec. Ilir Bar. I, Kota Palembang, Sumatera Selatan 30128</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telpon</h3>
              <p><a href="tel:+155895548855">(0711) 379249</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">upmfasilkom@ilkom.unsri.ac.id</a></p>
            </div>
          </div>

        </div>
      </div>

      <div class="container mb-4">
        <iframe src="https://maps.google.com/maps?q=fasilkom unsri bukit&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </section><!-- #contact -->

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
  <script>
    var a1 = document.getElementById("b1");
    var a2 = document.getElementById("b2");
    var a3 = document.getElementById("b3");
    var a4 = document.getElementById("b4");
    var a5 = document.getElementById("b5");

    a1.style.display = "none";
    a2.style.display = "none";
    a3.style.display = "none";
    a4.style.display = "none";
    a5.style.display = "none";
    
    function a(){
      var a1 = document.getElementById("b1");
      var a2 = document.getElementById("b2");
      var a3 = document.getElementById("b3");
      var a4 = document.getElementById("b4");
      var a5 = document.getElementById("b5");
      
      a1.style.display = "block";
      a2.style.display = "none";
      a3.style.display = "none";
      a4.style.display = "none";
      a5.style.display = "none";
    }
    function b(){
      var a1 = document.getElementById("b1");
      var a2 = document.getElementById("b2");
      var a3 = document.getElementById("b3");
      var a4 = document.getElementById("b4");
      var a5 = document.getElementById("b5");
      
      a1.style.display = "none";
      a2.style.display = "block";
      a3.style.display = "none";
      a4.style.display = "none";
      a5.style.display = "none";
    }
    function c(){
      var a1 = document.getElementById("b1");
      var a2 = document.getElementById("b2");
      var a3 = document.getElementById("b3");
      var a4 = document.getElementById("b4");
      var a5 = document.getElementById("b5");
      
      a1.style.display = "none";
      a2.style.display = "none";
      a3.style.display = "block";
      a4.style.display = "none";
      a5.style.display = "none";
    }
    function d(){
      var a1 = document.getElementById("b1");
      var a2 = document.getElementById("b2");
      var a3 = document.getElementById("b3");
      var a4 = document.getElementById("b4");
      var a5 = document.getElementById("b5");
      
      a1.style.display = "none";
      a2.style.display = "none";
      a3.style.display = "none";
      a4.style.display = "block";
      a5.style.display = "none";
    }
    function e(){
      var a1 = document.getElementById("b1");
      var a2 = document.getElementById("b2");
      var a3 = document.getElementById("b3");
      var a4 = document.getElementById("b4");
      var a5 = document.getElementById("b5");
      
      a1.style.display = "none";
      a2.style.display = "none";
      a3.style.display = "none";
      a4.style.display = "none";
      a5.style.display = "block";
    }
  
  </script>

</body>
</html>
@endsection