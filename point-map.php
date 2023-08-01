
<?php 
include 'header.php';
?>

<main id="main">
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 text-center">
        <center>
          <img src="../assets/img/logo.png" style="width:150px;"><p>
          </center>
          <h1>POLRES BATU BARA</h1>
          <h2>SISTEM INFORMASI GEOGRAFIS PEMETAAN DAERAH RAWAN KRIMINALITAS DAN MASALAH LALU LINTAS MENGGUNAKAN METODE K-MEANS CLUSTERING</h2>
        </div>
      </div>
    </section><!-- End Hero -->
  </main>
  <br>
  <br>
  <br>
  <br>
  <div class="container">
    <ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
      <li><span class="fa fa-home" style="font-size: 30px;"></span>&emsp;</li>
      <li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Home</li>
      <li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Maps, Kabupaten Batu Bara, Sumatera Utara</li>


      <li><form action="" method="get">
        <div style="padding-left: 400px;">
          <input type="search" class="form-control" placeholder="search" name="cari"> 
        </div>
      </form></li>
    </ol>
  </div>



  <?php
  // Query untuk mengambil data kecamatan dari database
  if(isset($_GET['cari'])){
    $cari=$_GET['cari'];
    $result=mysqli_query($conn,"SELECT * FROM tbl_kecamatan where nama_kecamatan like '$cari'");
  }else{
    $result=mysqli_query($conn,"SELECT * FROM tbl_kecamatan order by id_kecamatan asc");
  }
// Array untuk menyimpan data kecamatan
  $kecamatan = [];
  if (mysqli_num_rows($result) > 0) {
    // Loop melalui hasil query dan menambahkan data kecamatan ke dalam array
    while ($row = mysqli_fetch_assoc($result)) {
      $nama_kecamatan = $row['nama_kecamatan'];
      $latitude = $row['latitude'];
      $longitude = $row['longitude'];

        // Buat objek data kecamatan dan tambahkan ke array
      $kecamatan[] = [
        'name' => $nama_kecamatan,
        'latlng' => [$longitude, $latitude]
      ];
    }
  }
// Tutup koneksi ke database
  mysqli_close($conn);


  ?>

  <div id="mapid" ></div>
  <script type="text/javascript">
    var mapOptions = {
     center: [3.1617, 99.5265],
     zoom: 11
   }

   var map = new L.map('mapid', mapOptions);

   var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
   map.addLayer(layer);

   <?php foreach ($kecamatan as $kec) { ?>
    var marker = L.marker(<?php echo json_encode($kec['latlng']); ?>).addTo(map);
    marker.bindPopup('<b><?php echo $kec['name']; ?></b>');
  <?php } ?>

</script>


<?php
include 'footer.php';
?>



