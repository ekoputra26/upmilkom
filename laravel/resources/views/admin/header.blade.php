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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    <style>
        #demo {

            -webkit-transition: all 0.3s ease-in-out;

            -moz-transition: all 0.3s ease-in-out;

            -o-transition: all 0.3s 0.1s ease-in-out;

            transition: all 0.3s ease-in-out;

        }

        td {}



        .new {

            margin-top: 40px;

            margin-left: 30px;

            margin-right: 30px;

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



        #customers td,
        #customers th {

            border: 1px solid #ddd;

            padding: 8px;

        }



        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }



        #customers tr:hover {
            background-color: #ddd;
        }



        #customers th {

            padding-top: 12px;

            padding-bottom: 12px;

            text-align: left;

            background-color: #4B49AC;

            color: white;

        }
    </style>

</head>

<body>

    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->

        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

                <a class="navbar-brand brand-logo mr-5" href="#"><img src="img/logo.png" /></a>

                <a class="navbar-brand brand-logo-mini" href="#"><img src="img/about-img.jpg" /></a>

            </div>

            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

                    <span class="icon-menu"></span>

                </button>

                <ul class="navbar-nav mr-lg-2">

                    <li class="nav-item nav-search d-none d-lg-block">

                        <div class="input-group">

                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">

                            </div>

                        </div>

                    </li>

                </ul>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">

                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

                            <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" alt="profile" />

                        </a>

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">

                            <a class="dropdown-item" href="/admin-ganti-password">

                                <i class="ti-key text-primary"></i>

                                Ganti Password

                            </a>

                            <a class="dropdown-item" href="/admin-logout">

                                <i class="ti-power-off text-primary"></i>

                                Logout

                            </a>

                        </div>

                    </li>

                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">

                    <span class="icon-menu"></span>

                </button>

            </div>

        </nav>

        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/_sidebar.html -->

            <nav class="sidebar sidebar-offcanvas" id="sidebar">

                <ul class="nav">

                    <li class="nav-item">

                        <a class="nav-link" href="/admin-dashboard">

                            <i class="icon-grid menu-icon"></i>

                            <span class="menu-title">Dashboard</span>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" data-toggle="collapse" href="#kuesioner" aria-expanded="false"
                            aria-controls="ui-basic">

                            <i class="icon-paper menu-icon"></i>

                            <span class="menu-title">Kuesioner</span>

                            <i class="menu-arrow"></i>

                        </a>

                        <div class="collapse" id="kuesioner">

                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" href="/admin-kuesioner">Data Kuesioner</a>
                                </li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-kuesioner1">Kuesioner Bagian
                                        1</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-kuesioner2">Kuesioner Bagian
                                        2</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-kuesioner3">Kuesioner Bagian
                                        3</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-kuesioner4">Kuesioner Bagian
                                        4</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-kuesioner5">Kuesioner Bagian
                                        5</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-lihat-saran">Saran</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-control-panel">Control
                                        Panel</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-edit-data-kuesioner">Edit Data
                                        Kuesioner</a></li>

                                <li class="nav-item"> <a class="nav-link"
                                        href="/admin-download-data-kuesioner">Download Data</a></li>

                            </ul>

                        </div>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/admin-home">

                            <i class="icon-columns menu-icon"></i>

                            <span class="menu-title">Menu Home</span>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" data-toggle="collapse" href="#ppepp" aria-expanded="false"
                            aria-controls="ui-basic">

                            <i class="icon-head menu-icon"></i>

                            <span class="menu-title">Menu PPEPP</span>

                            <i class="menu-arrow"></i>

                        </a>

                        <div class="collapse" id="ppepp">

                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" href="/admin-penetapan">Penetapan</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-pelaksanaan">Pelaksanaan</a>
                                </li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-evaluasip">Evaluasi</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-pengendalian">Pengendalian</a>
                                </li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-peningkatan">Peningkatan</a>
                                </li>

                            </ul>

                        </div>

                    </li>



                    <li class="nav-item">

                        <a class="nav-link" data-toggle="collapse" href="#profil" aria-expanded="false"
                            aria-controls="ui-basic">

                            <i class="icon-head menu-icon"></i>

                            <span class="menu-title">Menu Profil</span>

                            <i class="menu-arrow"></i>

                        </a>

                        <div class="collapse" id="profil">

                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" href="/admin-profil-tim">Tim P3MP</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-profil-visimisi">Visi Misi</a>
                                </li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-profil-kebijakan">Kebijakan
                                        Mutu</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-profil-kedudukan">Status
                                        Kedudukan</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-profil-struktur">Struktur
                                        Organisasi</a></li>

                            </ul>

                        </div>

                    </li>



                    <li class="nav-item">

                        <a class="nav-link" href="/admin-berita">

                            <i class="icon-columns menu-icon"></i>

                            <span class="menu-title">Menu Berita</span>

                        </a>

                    </li>





                    <li class="nav-item">

                        <a class="nav-link" data-toggle="collapse" href="#layanan" aria-expanded="false"
                            aria-controls="ui-basic">

                            <i class="icon-layout menu-icon"></i>

                            <span class="menu-title">Menu Layanan</span>

                            <i class="menu-arrow"></i>

                        </a>

                        <div class="collapse" id="layanan">

                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link"
                                        href="/admin-layanan-pelatihan">Pelatihan</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-layanan-auditor">Auditor</a>
                                </li>

                                <li class="nav-item"> <a class="nav-link"
                                        href="/admin-layanan-portofolio">Portofolio</a></li>

                            </ul>

                        </div>

                    </li>



                    <li class="nav-item">

                        <a class="nav-link" data-toggle="collapse" href="#download" aria-expanded="false"
                            aria-controls="ui-basic">

                            <i class="icon-file menu-icon"></i>

                            <span class="menu-title">Menu Download</span>

                            <i class="menu-arrow"></i>

                        </a>

                        <div class="collapse" id="download">

                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" href="/admin-download-dokumen">Dokumen</a>
                                </li>

                                <li class="nav-item"> <a class="nav-link"
                                        href="/admin-download-evaluasi">Evaluasi</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-download-materi">Materi</a>
                                </li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-download-sk">SK</a></li>

                            </ul>

                        </div>

                    </li>



                    <li class="nav-item">

                        <a class="nav-link" data-toggle="collapse" href="#akreditasi" aria-expanded="false"
                            aria-controls="ui-basic">

                            <i class="icon-paper menu-icon"></i>

                            <span class="menu-title">Menu Akreditasi</span>

                            <i class="menu-arrow"></i>

                        </a>

                        <div class="collapse" id="akreditasi">

                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link"
                                        href="/admin-akreditasi-internasional">Internasional</a></li>

                                <li class="nav-item"> <a class="nav-link"
                                        href="/admin-akreditasi-nasional">Nasional</a></li>

                            </ul>

                        </div>

                    </li>



                    <li class="nav-item">

                        <a class="nav-link" data-toggle="collapse" href="#peraturan" aria-expanded="false"
                            aria-controls="ui-basic">

                            <i class="icon-link menu-icon"></i>

                            <span class="menu-title">Menu Peraturan</span>

                            <i class="menu-arrow"></i>

                        </a>

                        <div class="collapse" id="peraturan">

                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link"
                                        href="/admin-peraturan-internal">Internal</a></li>

                                <li class="nav-item"> <a class="nav-link" href="/admin-peraturan-uu">Undang
                                        Undang</a></li>

                            </ul>

                        </div>

                    </li>



                </ul>

            </nav>

            @yield('content')
