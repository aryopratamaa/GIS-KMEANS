<?php 
include 'header.php';
?>
<style>
  #map-container {
    position: relative;
  }

  #legend {
    position: absolute;
    top: 505px;
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


<div class="container">
  <ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
    <li><span class="fa fa-map-o" style="font-size: 30px;"></span>&emsp;</li>
    <li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Maps Lakalantas</li>
    <li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Kabupaten Batu Bara, Sumatera Utara</li>

    <li><form action="" method="get">
      <div style="padding-left: 350px;">
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


  // Fungsi untuk mendapatkan warna berdasarkan nilai ket_lakalantas
function getColorByKetlakalantas($ket_lakalantas)
{
  if ($ket_lakalantas === 'Rawan') {
    return '#00FF00'; // Hijau
  } elseif ($ket_lakalantas === 'Cukup Rawan') {
    return '#FFFF00'; // Kuning
  } elseif ($ket_lakalantas === 'Sangat Rawan') {
    return '#FF0000'; // Merah
  } else {
    return '#FFFFFF'; // Putih (gaya default jika tidak ada keterangan yang cocok)
  }
}

// Array untuk menyimpan data kecamatan
$kecamatanData = [];
while ($row = mysqli_fetch_assoc($result)) {
  $nama_kecamatan = $row['nama_kecamatan'];
  $ket_lakalantas = $row['ket_lakalantas'];

  // Manually set the coordinates for each kecamatan based on its name
  $coordinatesData = [
   'Kecamatan Laut Tador' => [
    [99.339, 3.381],
    [99.327, 3.382],
    [99.313, 3.385],
    [99.301, 3.378],
    [99.296, 3.369],
    [99.287, 3.371],
    [99.273, 3.355],
    [99.271, 3.339],
    [99.263, 3.325],
    [99.263, 3.310],
    [99.245, 3.283],
    [99.225, 3.280],
    [99.224, 3.262],
    [99.231, 3.260],
    [99.206, 3.225],
    [99.225, 3.206],
    [99.240, 3.247],
    [99.247, 3.262],
    [99.252, 3.257],
    [99.261, 3.262],
    [99.268, 3.280],
    [99.289, 3.278],
    [99.302, 3.285],
    [99.307, 3.305],
    [99.313, 3.306],
    [99.329, 3.346],
    [99.334, 3.375],
    [99.340, 3.380],
    [99.339, 3.381]
    // Tambahkan koordinat untuk Kecamatan Laut Tador
  ],

  'Kecamatan Medang Deras' => [
   [99.315, 3.437],
   [99.284, 3.394],
   [99.294, 3.378],
   [99.287, 3.370],
   [99.291, 3.370],
   [99.297, 3.372],
   [99.310, 3.383],
   [99.339, 3.381],
   [99.336, 3.376],
   [99.330, 3.357],
   [99.328, 3.344],
   [99.318, 3.326],
   [99.315, 3.314],
   [99.305, 3.304],
   [99.345, 3.287],
   [99.397, 3.354],
   [99.400, 3.345],
   [99.407, 3.350],
   [99.411, 3.347],
   [99.411, 3.347],
   [99.426, 3.367],
   [99.446, 3.365],
   [99.416, 3.387],
   [99.366, 3.400],
   [99.346, 3.418],
   [99.328, 3.424],
   [99.317, 3.435],
   [99.315, 3.437]
    // Tambahkan koordinat untuk Kecamatan Medang Deras
 ],

 'Kecamatan Sei Suka' => [
   [99.446, 3.365],
   [99.436, 3.371],
   [99.426, 3.367],
   [99.420, 3.350],
   [99.410, 3.347],
   [99.400, 3.346],
   [99.393, 3.350],
   [99.369, 3.321],
   [99.352, 3.307],
   [99.345, 3.302],
   [99.345, 3.289],
   [99.390, 3.318],
   [99.399, 3.316],
   [99.406, 3.319],
   [99.436, 3.339],
   [99.442, 3.335],
   [99.448, 3.339],
   [99.488, 3.312],
   [99.492, 3.315],
   [99.485, 3.333],
   [99.491, 3.343],
   [99.481, 3.348],
   [99.472, 3.346],
   [99.456, 3.356],
   [99.448, 3.365],
   [99.446, 3.365]
 ],


 'Kecamatan Air Putih' => [
  [99.345, 3.287],
  [99.390, 3.318],
  [99.398, 3.317],
  [99.406, 3.318],
  [99.413, 3.322],
  [99.437, 3.338],
  [99.443, 3.334],
  [99.448, 3.340],
  [99.487, 3.313],
  [99.470, 3.314],
  [99.466, 3.315],
  [99.456, 3.305],
  [99.446, 3.293],
  [99.431, 3.289],
  [99.417, 3.263],
  [99.404, 3.254],
  [99.392, 3.252],
  [99.382, 3.256],
  [99.376, 3.250],
  [99.371, 3.247],
  [99.359, 3.221],
  [99.348, 3.231],
  [99.356, 3.246],
  [99.349, 3.247],
  [99.343, 3.269],
  [99.344, 3.288],
  [99.345, 3.287]
],


'Kecamatan Lima Puluh Pesisir' => [
  [99.494, 3.314],
  [99.486, 3.312],
  [99.464, 3.316],
  [99.457, 3.307],
  [99.452, 3.297],
  [99.436, 3.290],
  [99.418, 3.266],
  [99.418, 3.264],
  [99.423, 3.262],
  [99.428, 3.267],
  [99.427, 3.256],
  [99.426, 3.253],
  [99.450, 3.253],
  [99.464, 3.264],
  [99.465, 3.254],
  [99.473, 3.244],
  [99.474, 3.233],
  [99.484, 3.220],
  [99.495, 3.225],
  [99.501, 3.236],
  [99.509, 3.221],
  [99.527, 3.214],
  [99.531, 3.222],
  [99.520, 3.237],
  [99.535, 3.260],
  [99.515, 3.284],
  [99.500, 3.307],
  [99.486, 3.314],
],


'Kecamatan Lima Puluh' => [
  [99.404, 3.253],
  [99.373, 3.154],
  [99.416, 3.154],
  [99.473, 3.136],
  [99.513, 3.177],
  [99.447, 3.185],
  [99.448, 3.254],
  [99.427, 3.255],
  [99.427, 3.268],
  [99.416, 3.264],
  [99.405, 3.254],
  [99.404, 3.253]
],



'Kecamatan Datuk Lima Puluh' => [
 [99.450, 3.255],
 [99.451, 3.188],
 [99.515, 3.178],
 [99.549, 3.214],
 [99.531, 3.223],
 [99.526, 3.215],
 [99.508, 3.220],
 [99.500, 3.234],
 [99.495, 3.225],
 [99.485, 3.221],
 [99.475, 3.233],
 [99.465, 3.253],
 [99.458, 3.265],
 [99.447, 3.255],
 [99.450, 3.255]
],


'Kecamatan Talawi' => [
  [99.535, 3.259],
  [99.524, 3.236],
  [99.531, 3.223],
  [99.548, 3.213],
  [99.514, 3.180],
  [99.513, 3.177],
  [99.540, 3.173],
  [99.576, 3.170],
  [99.576, 3.193],
  [99.585, 3.207],
  [99.577, 3.213],
  [99.572, 3.233],
  [99.548, 3.245],
  [99.535, 3.258],
  [99.535, 3.259]
],



'Kecamatan Tanjung Tiram' => [
  [99.571, 3.235],
  [99.577, 3.219],
  [99.573, 3.214],
  [99.584, 3.208],
  [99.590, 3.214],
  [99.605, 3.207],
  [99.625, 3.221],
  [99.608, 3.228],
  [99.596, 3.234],
  [99.572, 3.233],
  [99.571, 3.235]
],



'Kecamatan Datuk Tanah Datar' => [
 [99.513, 3.178],
 [99.473, 3.135],
 [99.494, 3.129],
 [99.489, 3.123],
 [99.498, 3.118],
 [99.508, 3.123],
 [99.519, 3.118],
 [99.513, 3.107],
 [99.522, 3.105],
 [99.514, 3.100],
 [99.502, 3.099],
 [99.526, 3.084],
 [99.531, 3.105],
 [99.550, 3.103],
 [99.557, 3.116],
 [99.577, 3.170],
 [99.513, 3.177],
 [99.513, 3.178] 
],


'Kecamatan Sei Balai' => [
  [99.551, 3.109],
  [99.548, 3.101],
  [99.569, 3.086],
  [99.568, 3.064],
  [99.555, 3.060],
  [99.557, 3.044],
  [99.549, 3.042],
  [99.548, 3.031],
  [99.529, 3.028],
  [99.529, 3.025],
  [99.550, 3.022],
  [99.562, 3.019],
  [99.562, 3.019],
  [99.571, 3.032],
  [99.590, 3.041],
  [99.597, 3.058],
  [99.594, 3.068],
  [99.611, 3.084],
  [99.616, 3.096],
  [99.592, 3.105],
  [99.603, 3.108],
  [99.618, 3.136],
  [99.601, 3.162],
  [99.575, 3.170],
  [99.551, 3.109]
],


'Kecamatan Nibung Hangus' => [
 [99.625, 3.221],
 [99.603, 3.208],
 [99.589, 3.213],
 [99.585, 3.209],
 [99.576, 3.189],
 [99.577, 3.171],
 [99.603, 3.162],
 [99.618, 3.136],
 [99.627, 3.138],
 [99.643, 3.128],
 [99.676, 3.130],
 [99.677, 3.120],
 [99.700, 3.118],
 [99.739, 3.167],
 [99.733, 3.177],
 [99.711, 3.193],
 [99.676, 3.210],
 [99.626, 3.221],
 [99.625, 3.221]
],
    // Add coordinates for other kecamatan here
];

if (isset($coordinatesData[$nama_kecamatan])) {
    // Ambil warna berdasarkan nilai ket_lakalantas
  $color = getColorByKetlakalantas($ket_lakalantas);

    // Tambahkan warna ke array $colorsData
  $kecamatanData[] = [
    'type' => 'Feature',
    'geometry' => [
      'type' => 'Polygon',
      'coordinates' => [$coordinatesData[$nama_kecamatan]]
    ],
    'properties' => [
      'nama_kecamatan' => $nama_kecamatan,
      'ket_lakalantas' => $ket_lakalantas
    ]
  ];
}
}
        // Tutup koneksi ke database
mysqli_close($conn);
?>


<div id="map-container">
  <div id="legend">
    <h5>Keterangan Warna Kecamatan:</h5>
    <div>
      <span style="display: inline-block; width: 12px; height: 12px; background-color: #00FF00;"></span>
      Kecamatan Rawan (Hijau)
    </div>
    <div>
      <span style="display: inline-block; width: 12px; height: 12px; background-color: #FFFF00;"></span>
      Kecamatan Cukup Rawan (Kuning)
    </div>
    <div>
      <span style="display: inline-block; width: 12px; height: 12px; background-color: #FF0000;"></span>
      Kecamatan Sangat Rawan (Merah)
    </div>
  </div>
</div>

<div id="mapid"></div>

<script type="text/javascript">
  var mapOptions = {
    center: [3.1617, 99.5265],
    zoom: 10
  };

  var map = new L.map('mapid', mapOptions);

  var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
  map.addLayer(layer);

  // Data GeoJSON untuk Kecamatan
  var kecamatanData = {
    "type": "FeatureCollection",
    "features": <?php echo json_encode($kecamatanData); ?>
  };

  // Menambahkan layer GeoJSON kecamatan ke peta dengan warna dinamis
  L.geoJSON(kecamatanData, {
    style: function (feature) {
      var ketlakalantas = feature.properties.ket_lakalantas;
      var color;
      if (ketlakalantas === 'Rawan') {
        color = '#00FF00'; // Hijau
      } else if (ketlakalantas === 'Cukup Rawan') {
        color = '#FFFF00'; // Kuning
      } else if (ketlakalantas === 'Sangat Rawan') {
        color = '#FF0000'; // Merah
      } else {
        color = '#FFFFFF'; // Putih (gaya default jika tidak ada keterangan yang cocok)
      }
      return {
        fillColor: color,
        weight: 6,
        opacity: 5,
        color: 'white',
        fillOpacity: 0.7
      };
    },
    onEachFeature: function (feature, layer) {
      // Menambahkan label nama kecamatan ke dalam layer
      if (feature.properties && feature.properties.nama_kecamatan) {
        var popupContent = '' + feature.properties.nama_kecamatan +
        '<br>Lakalantas : ' + feature.properties.ket_lakalantas;
        layer.bindPopup(popupContent);
      }
    }
  }).addTo(map);
</script>
<br>


<div class="container">
  <div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
    <div class="bootstrap-table">

      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Kecamatan</th>
            <th class="text-center">lakalantas</th>
            <th class="text-center">Keterangan</th>
          </tr>

          <?php 
          include "../assets/conn/config.php";
          $brg=mysqli_query($conn,"SELECT * FROM tbl_kecamatan order by id_kecamatan asc ");
          $no=1;
          while($b=mysqli_fetch_array($brg)){
            $query1 = mysqli_query($conn,"SELECT sum(nilai) as sub FROM tbl_lakalantas WHERE id_kecamatan='".$b['id_kecamatan']."' ORDER BY id_kriteria");
            $result1 = mysqli_fetch_array($query1); 
            ?>
            <tr>
              <td class="text-center"><?php echo $no++ ?></td>
              <td><?php echo $b['nama_kecamatan'] ?></td>
              <td class="text-center"><?php echo $result1['sub'] ?></td>
              <td class="text-center"><?php echo $b['ket_lakalantas'] ?></td>
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



