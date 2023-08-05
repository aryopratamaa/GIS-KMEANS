<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
session_start();
ob_start();
include "../assets/conn/cek.php";
include "../assets/conn/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>POLRES BATU BARA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="../assets/img/icon-maps.png" />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/leaflet/leaflet.css" />
  <script src="../assets/leaflet/leaflet.js"></script>

  <style>
    /* Maps */
    .over {
      text-decoration: overline;
    }

    #mapid {
      border-radius: 5px;
      box-shadow: 2px 2px 4px #888888;
      border: 0px solid;
      margin: 0 auto 0 auto;
      height: 70%;
      width: 68%;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->

  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index"><span>POLRES</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index">Home</a></li>
          <li class="dropdown">
            <a href="#"><span>Data Master</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="pengguna">Pengguna</a></li>
              <li class="dropdown"> <!-- Tambahkan class "dropdown" pada li ini -->
                <a href="#" class="nav-link scrollto"><span>Verifikasi</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul> <!-- Tambahkan class "dropdown-menu-end" pada ul ini -->
                  <li><a class="dropdown-item" href="verifikasi-kriminalitas">Verfikasi Kriminalitas</a></li>
                  <!-- Tambahkan submenu di sini -->
                  <li><a class="dropdown-item" href="verifikasi-lakalantas">Verifikasi Lakalantas</a></li>
                </ul>
              </li>
              <li><a class="nav-link scrollto" href="kecamatan">Kecamatan</a></li>
              <li><a class="nav-link scrollto" href="lalulintas">Lalulintas</a></li>
              <li><a class="nav-link" href="kriteria">Kriteria</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Informasi</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="berita">Berita</a></li>
              <li><a href="kriminalitas">Kriminalitas</a></li>
              <li><a href="lakalantas">Lakalantas</a></li>
              <li><a href="tkt-kriminalitas">Tingkat Kriminalitas</a></li>
              <li><a href="tkt-lakalantas">Tingkat Lakalantas</a></li>
              <li><a class="nav-link" href="cari-maps">Cari Titik</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Analisa Metode</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="analisa-kriminalitas?max_iterasi=100">Kriminalitas</a></li>
              <li><a href="analisa-lakalantas?max_iterasi=100">Lakalantas</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Laporan</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="laporan-kriminalitas" target="_blank">Kriminalitas</a></li>
              <li><a href="laporan-lakalantas" target="_blank">Lakalantas</a></li>
            </ul>
          </li>
          <?php
          $username = $_SESSION['username'];
          $det = mysqli_query($conn, "select * from tbl_akun where username='$username'");
          $d = mysqli_fetch_array($det);
          ?>
          <li class="dropdown"><a href="#" class="getstarted"><span class="fa fa-user"></span> &emsp;Hy,
              <?php echo $d['nama_lengkap'] ?> <i class="bi bi-chevron-down dropdown-indicator"></i>
            </a>
            <ul>
              <li><a href="akun">Akun</a></li>
              <li><a href="logout">Logout</a></li>
            </ul>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>