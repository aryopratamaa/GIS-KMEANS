<?php
include 'header.php';
?>

<!-- ======= Hero Section ======= -->
<section id="hero">

  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
        <div data-aos="zoom-out">
          <h1>Sistem Informasi Geografis Daerah <span>Rawan Kriminalitas</span> dan <span>Masalah Lalu
              Lintas</span></h1>
          <h2>Kepolisian Resor Kabupaten Batu Bara</h2>
          <div class="text-center text-lg-start">
            <a href="login" class="btn-get-started scrollto">Pengaduan</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <img src="../assets/img/logo.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
    viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
  </svg>

</section><!-- End Hero -->

<style>
  #map-box {
    position: relative;
  }

  #legend {
    position: absolute;
    top: 25px;
    right: 350px;
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 14px;
    z-index: 1000;
  }



  html,
  body {
    height: 100%;
    font-family: 'Roboto', sans-serif;
  }

  /* Ganti ukuran gambar sesuai kebutuhan */
  .carousel-inner img {
    width: 290px;
    height: 200px;
    box-shadow: 2px 2px 4px #888888;
    border-radius: 5px;
    object-fit: cover;
    /* Untuk memastikan gambar tetap proporsional */
  }

  /* Ganti lebar carousel agar muat lebih dari satu gambar */
  .carousel-inner {
    display: flex;
    flex-wrap: nowrap;
  }

  /* Ganti lebar tombol navigasi */
  .carousel-control-prev,
  .carousel-control-next {
    width: 5%;
  }

  /* Atur jarak antara gambar-gambar dalam satu slide */
  .carousel-inner .carousel-item {
    margin-right: 5px;
    /* Atur spasi antar gambar */
  }

  /* Hapus margin pada item terakhir agar tidak ada jarak ekstra */
  .carousel-inner .carousel-item:last-child {
    margin-right: 0;
  }
</style>

<!-- ======= Berita Section ======= -->
<section id="berita" class="berita">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Artikel Singkat</h2>
      <p>Berita Terbaru</p>
    </div>
    <div class="row" data-aos="fade-up">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php
          $data = mysqli_query($conn, "SELECT * FROM tbl_berita ORDER BY id_berita DESC");
          $images = mysqli_fetch_all($data, MYSQLI_ASSOC);
          $active = true;

          foreach (array_chunk($images, 4) as $slide) {
            $carouselItemClass = $active ? 'carousel-item active' : 'carousel-item';
            ?>
            <div class="<?php echo $carouselItemClass; ?>">
              <div class="d-flex justify-content-between">
                <?php foreach ($slide as $image) { ?>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $image['id_berita']; ?>">
                    <img class="img-fluid" onerror="this.src='../assets/img/images-not.png'"
                      src="../assets/foto/<?php echo $image['foto']; ?>" alt="Slide <?php echo $image['id_berita']; ?>">
                  </a>
                <?php } ?>
              </div>
            </div>

            <!-- Modal untuk setiap gambar -->
            <?php foreach ($slide as $image) { ?>
              <div class="modal fade" id="exampleModal<?php echo $image['id_berita']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Artikel Berita</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                      <?php
                      $det = mysqli_query($conn, "SELECT * FROM tbl_berita WHERE id_berita='$image[id_berita]'");
                      $d = mysqli_fetch_array($det);
                      ?>
                      <table class="table">
                        <tr>
                          <td>Judul</td>
                          <td>
                            <?php echo $d['judul']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Tanggal</td>
                          <td>
                            <?php echo $d['tgl_berita']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Keterangan</td>
                          <td align="justify">
                            <?php echo $d['keterangan']; ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

            <?php
            $active = false;
          }
          ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

  </div>

  </div>
</section><!-- End Berita Section -->


<?php
include 'footer.php';
?>