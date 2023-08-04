<?php
include 'header.php';
?>
<style>
  #map-container {
    position: relative;
  }

  #legend {
    position: absolute;
    top: 15px;
    right: 130px;
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 12px;
    z-index: 1000;
  }
</style>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
  <ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
    <li><span class="fa fa-map-o" style="font-size: 30px;"></span>&emsp;</li>
    <li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Maps Lakalantas</li>
    <li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Kabupaten Batu Bara, Sumatera Utara
    </li>

    <li>
      <form action="" method="get">
        <div style="padding-left: 350px;">
          <input type="search" class="form-control" placeholder="search" name="cari">
        </div>
      </form>
    </li>
  </ol>
</div>

<?php
// Query untuk mengambil data kecamatan dari database
if (isset($_GET['cari'])) {
  $cari = $_GET['cari'];
  $result = mysqli_query($conn, "SELECT * FROM tbl_lalulintas where nama_lalulintas like '$cari'");
} else {
  $result = mysqli_query($conn, "SELECT * FROM tbl_lalulintas order by id_lalulintas asc");
}
// Array untuk menyimpan data kecamatan
$kecamatan = [];
if (mysqli_num_rows($result) > 0) {
  // Loop melalui hasil query dan menambahkan data kecamatan ke dalam array
  while ($row = mysqli_fetch_assoc($result)) {
    $nama_lalulintas = $row['nama_lalulintas'];
    $ket_lakalantas = $row['ket_lakalantas'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];

    // Buat objek data kecamatan dan tambahkan ke array
    $kecamatan[] = [
      'name' => $nama_lalulintas,
      'ket_lakalantas' => $ket_lakalantas,
      'latlng' => [$longitude, $latitude]
    ];
  }
}
// Tutup koneksi ke database
mysqli_close($conn);
?>

<div id="map-container">
  <div id="legend">
    <h5>Keterangan Warna Lalulintas:</h5>
    <div>
      <span style="display: inline-block; width: 12px; height: 12px; background-color: #00FF00;"></span>
      Rawan (Hijau)
    </div>
    <div>
      <span style="display: inline-block; width: 12px; height: 12px; background-color: #FFFF00;"></span>
      Cukup Rawan (Kuning)
    </div>
    <div>
      <span style="display: inline-block; width: 12px; height: 12px; background-color: #FF0000;"></span>
      Sangat Rawan (Merah)
    </div>
  </div>
</div>

<div id="mapid"></div>
<script type="text/javascript">
  var mapOptions = {
    center: [3.1617, 99.5265],
    zoom: 11
  }

  var map = new L.map('mapid', mapOptions);

  var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
  map.addLayer(layer);

  <?php foreach ($kecamatan as $kec) { ?>
    <?php
    $icon = 'default.png'; // Icon default jika tidak ada keterangan yang cocok
    if ($kec['ket_lakalantas'] === 'Rawan') {
      $icon = 'marker-icon-hijau.png';
    } else if ($kec['ket_lakalantas'] === 'Cukup Rawan') {
      $icon = 'marker-icon-kuning.png';
    } else if ($kec['ket_lakalantas'] === 'Sangat Rawan') {
      $icon = 'marker-icon-merah.png';
    } else {
      $icon = 'marker-icon-putih.png';
    }
    ?>

    var iconUrl = 'assets/leaflet/images/' + <?php echo json_encode($icon); ?>;
    var customIcon = L.icon({
      iconUrl: iconUrl,
      iconSize: [25, 41], // Sesuaikan ukuran icon sesuai kebutuhan
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      tooltipAnchor: [16, -28],
    });

    var marker = L.marker(<?php echo json_encode($kec['latlng']); ?>, { icon: customIcon }).addTo(map);
    marker.bindPopup('<b><?php echo $kec['name']; ?><br> Lakalantas : <?php echo $kec['ket_lakalantas']; ?></b>');
 <?php } ?>


</script>
<br>


<div class="container">
  <div class="panel panel-container"
    style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
    <div class="bootstrap-table">

      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Lalulintas</th>
            <th colspan="3" class="text-center">Jarak Cluster</th>
            <th class="text-center">Cluster</th>
            <th class="text-center">Keterangan</th>
          </tr>

          <?php
          include "assets/conn/config.php";
          $brg = mysqli_query($conn, "SELECT * FROM tbl_lalulintas order by id_lalulintas asc ");
          $no = 1;
          while ($b = mysqli_fetch_array($brg)) {

            echo "<tr>";

            $query = mysqli_query($conn, "SELECT * FROM tbl_lakalantas WHERE id_lalulintas='" . $b['id_lalulintas'] . "'");
            $result = mysqli_fetch_array($query);

            if (empty($result['id_lalulintas'])) {

            } else {

              ?>
              <td class="text-center">
                <?php echo $no++ ?>
              </td>
              <td>
                <?php echo $b['nama_lalulintas'] ?>
              </td>
              <td class="text-center">
                <?php echo number_format($b['c1'], 3) ?>
              </td>
              <td class="text-center">
                <?php echo number_format($b['c2'], 3) ?>
              </td>
              <td class="text-center">
                <?php echo number_format($b['c3'], 3) ?>
              </td>
              <td class="text-center">
                <?php echo $b['cluster_lakalantas'] ?>
              </td>
              <td class="text-center">
                <?php echo $b['ket_lakalantas'] ?>
              </td>

            <?php } ?>
            </tr>
          <?php
          }
          ?>

        </table>
      </div>

    </div>
  </div>
</div>






<?php
include 'footer.php';
?>