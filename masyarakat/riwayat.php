<?php include "header.php"; ?>

<main id="main">
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
        <li><span class="fa fa-history" style="font-size: 30px;"></span>&emsp;</li>
        <li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Data</li>
        <li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Riwayat Pengaduan</li>
      </ol>
      

      <div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
        <div class="bootstrap-table">


          <?php
          $username=$_SESSION['username'];
          $det1=mysqli_query($conn,"select * from tbl_akun where username='$username'");
          $d1=mysqli_fetch_array($det1);
          $id_akun=$d1['id_akun'];

          $det=mysqli_query($conn,"SELECT * from tbl_pengaduan where id_akun='$id_akun' order by id_pengaduan DESC");
          while($d=mysqli_fetch_array($det)){ ?>

           <div class="text-justify" style="padding: 10px;">
             <table class="table">
              <tr>
                <td><img class="img-rounded" src="../assets/img/bg-riwayat.jpg" width="200" height="200px"
                  align="center"/></td>

                  <td>
                    <h6><b></b></h6>
                    <h6 class="card-title">Tanggal pemesanan : <?php echo $d['tgl_pengaduan'] ?></h6>
                    <h6>Status pesanan : <?php echo $d['status'] ?></h6>

                    <a href="riwayat-det.php" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em></a>
                  </td>
                </tr>
              </table>

              <?php
              if ($d['status']=='Proses penerimaan') {
                echo "<div style='margin-bottom:-1px' class='alert alert-info' role='alert'>Barang anda telah sampai, silahkan periksa kembali barang anda, jika ada ketidak sesuaian silah tekan RETUR, jika barang uda sesuai dengan pesanan silahkan klik SELESAI, terima kasih.</div><br>"; ?>

                <a href="retur.php?no_pesanan=<?php echo $d['no_pesanan'] ?>" class="btn btn-primary">Retur</a>
                <a href="riwayat.php?no_pesanan=<?php echo $d['no_pesanan'] ?>&aksi=selesai" class="btn btn-danger">Selesai</a>

              <?php  } ?>

              <div align="right">
                <div class='small'> 

                  <?php
                  if ($d['status']=='Verifikasi') { ?>
                    <font style="color: green;"><b>proses verifikasi</b></font> &emsp;<img src='../assets/img/check.png'>&emsp;
                    valid&emsp;<img src='../assets/img/circle.png'>&emsp;
                    in valid&emsp;<img src='../assets/img/circle.png'>&emsp;
                    

                  <?php }elseif ($d['status']=='Valid') { ?>
                   <font style="color: green;"><b>proses verifikasi</b></font> &emsp;<img src='../assets/img/check.png'>&emsp;
                   valid&emsp;<img src='../assets/img/circle.png'>&emsp;
                   in valid&emsp;<img src='../assets/img/circle.png'>&emsp;


                 <?php }elseif ($d['status']=='inValid') { ?>
                   <font style="color: green;"><b>proses verifikasi</b></font> &emsp;<img src='../assets/img/check.png'>&emsp;
                   valid&emsp;<img src='../assets/img/circle.png'>&emsp;
                   in valid&emsp;<img src='../assets/img/circle.png'>&emsp;
                 <?php } ?>


               </div>
             </div>

           </div>
           <br>
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
include 'footer.php';