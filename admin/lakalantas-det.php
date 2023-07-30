<?php include "header.php"; ?>

<main id="main">
  <section id="contact" class="contact">
    <div class="container">

      <ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
        <li><span class="fa fa-history" style="font-size: 30px;"></span>&emsp;</li>
        <li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Lakalantas</li>
        <li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Detail Lakalantas</li>
        <li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;"><a href="lakalantas">Kembali</a></li>
      </ol>
      

      <div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
        <div class="bootstrap-table">

          <?php
          $det=mysqli_query($conn,"SELECT * from tbl_kriteria c, tbl_kecamatan d, tbl_lakalantas e WHERE e.id_kriteria=c.id_kriteria AND e.id_kecamatan=d.id_kecamatan AND d.id_kecamatan='$_GET[id_kecamatan]' AND c.keterangan='lakalantas'");
          while($d=mysqli_fetch_array($det)){ ?>


            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img class="img-fluid rounded-start" src="../assets/img/bg-km-lk.png" width="220" height="220px" align="center"/>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><b><?php echo strtoupper($d['nama_kriteria']) ?></b></h5>
                    <h6>Kecamatan : <?php echo $d['nama_kecamatan'] ?></h6>
                    <h6>Jumlah <?php echo $d['nama_kriteria'] ?> : <?php echo $d['nilai'] ?></h6>


                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample<?php echo $d['id_kriteria'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><span class="fa fa-chevron-down"></span>
                    </a>

                  </div>
                </div>
              </div>
            </div>




            <div class="collapse" id="collapseExample<?php echo $d['id_kriteria'] ?>">
              <div class="row">
                <?php
                //pengaduan
                $de=mysqli_query($conn,"SELECT * from tbl_pengaduan a, tbl_kriteria b, tbl_kecamatan c, tbl_akun d WHERE a.id_kriteria=b.id_kriteria AND a.id_kecamatan=c.id_kecamatan AND a.id_akun=d.id_akun AND a.id_kriteria='$d[id_kriteria]' AND a.id_kecamatan='$_GET[id_kecamatan]' AND NOT a.status='inValid' OR a.status='Verifikasi' ORDER BY a.id_pengaduan DESC");
                while($dd=mysqli_fetch_array($de)){ ?>

                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body p-3" style="font-size:10px;">
                        <b class="text-primary"><?php echo strtoupper($dd['nama_lengkap']); ?></b><br>
                        <hr>
                        Tanggal pengaduan : <?php echo $dd['tgl_kejadian'] ?><br>
                        Kecamatan : <?php echo $dd['nama_kecamatan'] ?><br>
                        Alamat : <?php echo $dd['alamat'] ?><br>
                        <p class="card-text">Keterangan : <?php echo $dd['ket_pengaduan'] ?></p>

                      </div>
                    </div>
                    <br>
                  </div>
                  <?php 
                }
                ?>


                <?php
                //kejadian
                $dee=mysqli_query($conn,"SELECT * from tbl_kejadian a, tbl_kriteria b, tbl_kecamatan c WHERE a.id_kriteria=b.id_kriteria AND a.id_kecamatan=c.id_kecamatan AND a.id_kriteria='$d[id_kriteria]' AND a.id_kecamatan='$_GET[id_kecamatan]' ORDER BY a.id_kejadian DESC");
                while($ddd=mysqli_fetch_array($dee)){ ?>
                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body p-3" style="font-size:10px;">
                        <b class="text-primary">ADMINISTRATOR</b><br>
                        <hr>
                        Tanggal pengaduan : <?php echo $ddd['tgl_kejadian'] ?><br>
                        Kecamatan : <?php echo $ddd['nama_kecamatan'] ?><br>
                        Alamat : <?php echo $ddd['alamat'] ?><br>
                        <p class="card-text">Keterangan : <?php echo $ddd['ket_kejadian'] ?></p>
                      </div>
                    </div>
                    <br>
                  </div>
                  <?php 
                }
                ?>


              </div>
              <br>
            </div>


            <?php 
          }
          ?>






        </div>
      </div>

    </div>
  </section>
</main>

<br>
<br>
<br>

<?php 
include 'footer.php'; ?>