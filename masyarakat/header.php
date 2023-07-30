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
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
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

  <link rel="stylesheet" href="../assets/leaflet/leaflet.css" />
  <script src="../assets/leaflet/leaflet.js"></script>


  <style type="text/css">
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

    html,
    body {
      height: 100%;
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>

<body style="background-color:#D3D3D3;">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index" style="color: #191970;">Home</a></li>
          <li><a class="nav-link scrollto" href="tkt-kriminalitas">Kriminalitas</a></li>
          <li><a class="nav-link scrollto" href="tkt-lakalantas">Lakalantas</a></li>
          <li><a class="nav-link scrollto" href="pengaduan">Pengaduan</a></li>
          <li><a class="nav-link scrollto" href="riwayat">Riwayat</a></li>


          <li style="padding-left:600px;"></li>
          <?php
          $username = $_SESSION['username'];
          $det = mysqli_query($conn, "select * from tbl_akun where username='$username'");
          $d = mysqli_fetch_array($det);
          ?>
          <li class="dropdown"><a href="#" class="getstarted scrollto"
              style="background-color: #191970; box-shadow: 2px 2px 10px #888888; padding:13px;"><span
                class="fa fa-user"></span> &emsp;Hy,
              <?php echo $d['nama_lengkap'] ?> <i class="bi bi-chevron-down dropdown-indicator"></i>
            </a>
            <ul>
              <li><a href="akun">Akun</a></li>
              <li><a href="logout">Logout</a></li>
            </ul>
          </li>
        </ul>

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