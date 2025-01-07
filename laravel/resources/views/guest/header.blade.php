	<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <title>Tim Pengelola Pengembangan Pembelajaran dan Penjaminan Mutu Pendidikan Fakultas Ilmu Komputer Universitas Sriwijaya</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="keywords">

  <meta content="" name="description">



  <!-- Favicons -->

  <link href="img/about-img.jpg" rel="icon">

  <link href="img/about-img.jpg" rel="apple-touch-icon">





  <!-- Google Fonts -->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">



  <!-- Bootstrap CSS File -->

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">



  <!-- Libraries CSS Files -->

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">



  <!-- Main Stylesheet File -->

  <link href="css/style.css" rel="stylesheet">

  <style>

    	.tombolku {

          height: 150px;

          line-height: 150px;  

          width: 150px;  

          font-size: 5em;

          font-weight: bold;

          border-radius: 50%;

          background-color: #ffbb05;

          color: white;

          text-align: center;

          cursor: pointer;

        }

        #demo {

          -webkit-transition: all 0.3s ease-in-out;

          -moz-transition: all 0.3s ease-in-out;

          -o-transition: all 0.3s 0.1s ease-in-out;

          transition: all 0.3s ease-in-out;

        }

        td {

        }

        

        .new {

            margin-top: 40px;

            margin-left: 30px;

            margin-right:30px;

        }

        thead tr:first-child Th {

            position: sticky;

            z-index: 10;

            top: 0;

            background: white;

        }

        thead Th {

            position: sticky;

            z-index: 12;

            top: 51px;

            background: white;

        }

        .fixTableHead {

          overflow-y: auto;

          height: 1100px;

        }

        .fixTableHead thead th {

          position: sticky;

          top: 0;

        }

        #customers {

          font-family: Arial, Helvetica, sans-serif;

          border-collapse: collapse;

          width: 100%;

        }

        

        #customers td, #customers th {

          border: 1px solid #ddd;

          padding: 8px;

        }

        

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        

        #customers tr:hover {background-color: #ddd;}

        

        #customers th {

          padding-top: 12px;

          padding-bottom: 12px;

          text-align: left;

          background-color: #4B49AC;

          color: white;

        }

  </style>



</head>



<body id="body">



  <!--==========================

    Top Bar

  ============================-->

  <section id="topbar" class="d-none d-lg-block">

    <div class="container clearfix">

      <div class="contact-info float-right">

        <i class="fa fa-phone"></i> (0711) 379249

        <i></i>|

        <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">upmfasilkom@ilkom.unsri.ac.id</a>

      </div>

    </div>

  </section>



  <!--==========================

    Header

  ============================-->

  <header id="header" style="background-color: #06337b;">

    <div class="container">



      <div id="logo" class="pull-left">

        <img src="img/logo.png" width="150px">

      </div>



      <nav id="nav-menu-container">

        <ul class="nav-menu">

          <li class="menu-active"><a style="color:white;" href="/">Home</a></li>

          <li class="menu-active menu-has-children"><a style="color:white;">Profil</a>

            <ul>

              <li><a href="/tentang">Tentang Tim P3MP FASILKOM UNSRI</a></li>

              <li><a href="/visi-misi">Visi, Misi, dan Sasaran Mutu</a></li>

              <li><a href="/pernyataan-kebijakan">Tugas Pokok dan Fungsi</a></li>

              <li><a href="/status-kedudukan">Status dan Kedudukan</a></li>

              <li><a href="/struktur-organisasi">Struktur Organisasi</a></li>

            </ul>

          </li>

          <li class="menu-has-children"><a style="color:white;">Layanan</a>

            <ul>

              <li><a href="/pelatihan">Pelatihan FASILKOM UNSRI</a></li>

              <li><a href="/auditor">Auditor Internal</a></li>

              <li><a href="/portofolio">Portofolio Kerjasama Eksternal</a></li>

            </ul>

          </li>

          <li class="menu-has-children"><a style="color:white;" href="#services">Download</a>

            <ul>

              <li><a href="/dokumen">Dokumen Mutu</a></li>

              <li><a href="/evaluasi">Evaluasi Tim P3MP</a></li>

              <li><a href="/materi">Materi</a></li>

              <li><a href="/sk">SK</a></li>

            </ul>

          </li>

          <li class="menu-has-children"><a style="color:white;">Akreditasi</a>

            <ul>

              <li><a href="/akreditasi-internasional">Akreditasi Internasional</a></li>

              <li><a href="/akreditasi-nasional">Akreditasi Nasional</a></li>

            </ul>

          </li>

          <li class="menu-has-children"><a style="color:white;">Peraturan</a>

            <ul>

              <li><a href="/peraturan">Peraturan Internal</a></li>

              <li><a href="/peraturan-uu">Peraturan Perundang-undangan</a></li>
              
              <li><a href="/peraturan-uu">Prosedur Operasional Baku</a></li>

            </ul>

          </li>

          <li><a style="color:white;" href="#contact">Kontak</a></li>

          <li><a style="color:white;" href="/kuesioner">Kuesioner</a></li>

          <li><a style="color:white;" href="/admin-login"><b>Login</b></a></li>

        </ul>

      </nav><!-- #nav-menu-container -->

    </div>

  </header><!-- #header -->

  @yield('content')