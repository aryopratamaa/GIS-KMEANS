<?php
include 'header.php';
?>

<section id="hero-navbar">
</section>

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
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<br>



<div class="container">
  <ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
    <li><span class="fa fa-map-o" style="font-size: 30px;"></span>&emsp;</li>
    <li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Maps</li>
    <li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Kabupaten Batu Bara, Sumatera Utara
    </li>



  </ol>
</div>


<div id="mapid"></div>
<script type="text/javascript">
  var mapOptions = {
    center: [3.2345, 99.5265],
    zoom: 11
  };

  var map = new L.map('mapid', mapOptions);

  var layer = new L.TileLayer(
    'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
  );
  map.addLayer(layer);

  var marker;
  // Buat fungsi untuk menyalin latitude ke clipboard
  function copyLatitudeToClipboard() {
    var latitude = marker.getLatLng().lat.toFixed(6);
    var textarea = document.createElement('textarea');
    textarea.value = latitude;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
    alert('berhasil disalin ke clipboard: ' + latitude);
  }

  // Buat fungsi untuk menyalin longitude ke clipboard
  function copyLongitudeToClipboard() {
    var longitude = marker.getLatLng().lng.toFixed(6);
    var textarea = document.createElement('textarea');
    textarea.value = longitude;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
    alert('berhasil disalin ke clipboard: ' + longitude);
  }

  // Tambahkan event listener saat marker ditempatkan
  map.on('click', function (e) {
    var latlng = e.latlng;
    var latitude = latlng.lat.toFixed(6);
    var longitude = latlng.lng.toFixed(6);

    if (marker) {
      map.removeLayer(marker);
    }

    marker = L.marker(latlng).addTo(map);
    marker
      .bindPopup('<div class="p-3"><b>Longitude:</b> ' + latitude + ' &nbsp;<button class="btn btn-sm btn-primary" onclick="copyLatitudeToClipboard()"><i class="fa fa-copy"></i></button><hr>   <b>Latitude:</b> ' + longitude + '  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-primary" onclick="copyLongitudeToClipboard()"><i class="fa fa-copy"></i></button>  <br></div>')
      .openPopup();
  });



  // Add Leaflet Control Geocoder for auto-suggestions
  var searchControl = L.Control.geocoder({
    defaultMarkGeocode: false,
  })
    .on('markgeocode', function (e) {
      var latlng = e.geocode.center;
      var latitude = latlng.lat.toFixed(6);
      var longitude = latlng.lng.toFixed(6);

      if (marker) {
        map.removeLayer(marker);
      }

      marker = L.marker(latlng).addTo(map);
      marker
        .bindPopup('<b>Longitude:</b> ' + latitude + '<br><b>Latitude:</b> ' + longitude)
        .openPopup();
    })
    .addTo(map);






  // Tambahkan koordinat garis batas Kabupaten Batu Bara
  var boundaryCoordinates = [
    [3.444796, 99.314901],
    [3.330327, 99.260656],
    [3.317988, 99.259969],
    [3.291253, 99.244177],
    [3.266575, 99.233877],
    [3.255606, 99.234564],
    [3.223385, 99.206411],
    [3.200762, 99.231130],
    [3.219958, 99.230444],
    [3.235040, 99.235937],
    [3.244637, 99.244863],
    [3.254235, 99.240743],
    [3.256292, 99.250356],
    [3.254921, 99.262029],
    [3.261090, 99.264776],
    [3.266575, 99.259283],
    [3.276858, 99.270269],
    [3.270688, 99.281942],
    [3.273430, 99.293615],
    [3.283713, 99.306661],
    [3.298794, 99.308721],
    [3.289197, 99.344427],
    [3.274801, 99.348547],
    [3.259719, 99.346487],
    [3.240524, 99.341680],
    [3.213102, 99.358846],
    [3.246009, 99.371206],
    [3.254235, 99.385626],
    [3.246694, 99.394552],
    [3.253550, 99.406912],
    [3.152085, 99.361593],
    [3.147971, 99.422018],
    [3.122603, 99.491369],
    [3.113004, 99.483129],
    [3.103406, 99.508535],
    [3.109576, 99.518148],
    [3.099977, 99.534628],
    [3.097920, 99.545614],
    [3.077694, 99.565183],
    [3.071523, 99.561750],
    [3.069809, 99.572736],
    [3.055753, 99.572393],
    [3.049141, 99.557077],
    [3.036889, 99.557077],
    [3.035880, 99.549426],
    [3.018294, 99.549715],
    [3.016276, 99.553468],
    [3.017862, 99.556066],
    [3.026510, 99.555200],
    [3.030114, 99.558376],
    [3.034822, 99.565922],
    [3.038579, 99.569928],
    [3.041852, 99.576726],
    [3.041973, 99.580488],
    [3.043428, 99.583644],
    [3.038337, 99.587771],
    [3.040034, 99.591413],
    [3.042579, 99.592384],
    [3.045610, 99.595783],
    [3.057445, 99.598283],
    [3.066530, 99.594850],
    [3.075101, 99.604978],
    [3.078700, 99.606180],
    [3.081272, 99.607896],
    [3.078529, 99.606180],
    [3.086071, 99.608240],
    [3.093785, 99.607038],
    [3.096442, 99.608840],
    [3.098413, 99.610814],
    [3.103755, 99.610238],
    [3.102227, 99.607840],
    [3.102023, 99.602124],
    [3.098659, 99.599776],
    [3.110769, 99.589026],
    [3.126732, 99.607325],
    [3.127037, 99.615796],
    [3.130299, 99.621819],
    [3.128464, 99.624983],
    [3.127037, 99.625850],
    [3.127037, 99.627228],
    [3.124999, 99.629627],
    [3.122298, 99.630035],
    [3.117432, 99.632587],
    [3.119648, 99.635343],
    [3.105495, 99.648232],
    [3.105387, 99.693594],
    [3.110936, 99.696120],
    [3.111693, 99.697888],
    [3.116306, 99.700631],
    [3.124990, 99.706694],
    [3.136484, 99.723258],
    [3.160194, 99.747653],
    [3.170031, 99.751947],
    [3.170788, 99.749746],
    [3.171148, 99.742348],
    [3.170932, 99.740399],
    [3.172769, 99.739100],
    [3.178354, 99.729320],
    [3.180156, 99.725712],
    [3.188119, 99.717772],
    [3.189668, 99.714524],
    [3.190353, 99.711782],
    [3.191938, 99.711529],
    [3.193307, 99.710519],
    [3.195073, 99.709111],
    [3.203396, 99.692331],
    [3.203216, 99.691537],
    [3.203937, 99.691212],
    [3.204441, 99.690346],
    [3.205666, 99.687134],
    [3.206603, 99.684897],
    [3.208224, 99.678834],
    [3.205684, 99.671996],
    [3.206161, 99.671779],
    [3.206567, 99.672104],
    [3.206738, 99.672284],
    [3.207125, 99.672302],
    [3.207864, 99.671499],
    [3.209143, 99.671562],
    [3.209846, 99.670778],
    [3.210954, 99.667728],
    [3.232592, 99.597117],
    [3.232880, 99.594230],
    [3.233494, 99.592224],
    [3.232991, 99.591570],
    [3.232134, 99.591355],
    [3.231245, 99.591344],
    [3.230795, 99.591205],
    [3.227204, 99.585555],
    [3.228393, 99.583895],
    [3.228879, 99.583831],
    [3.229140, 99.583868],
    [3.229726, 99.585004],
    [3.230050, 99.585230],
    [3.230555, 99.585158],
    [3.230987, 99.584842],
    [3.231996, 99.582812],
    [3.232140, 99.581811],
    [3.232491, 99.578436],
    [3.232779, 99.574232],
    [3.232906, 99.571652],
    [3.234347, 99.566925],
    [3.244210, 99.547744],
    [3.264170, 99.532971],
    [3.284346, 99.511030],
    [3.295298, 99.508720],
    [3.312015, 99.497172],
    [3.319509, 99.486202],
    [3.336801, 99.485047],
    [3.340836, 99.489666],
    [3.347753, 99.481582],
    [3.357264, 99.456466],
    [3.384355, 99.422688],
    [3.401646, 99.365525],
    [3.423549, 99.340697],
    [3.424125, 99.333191],
    [3.426719, 99.329005],
    [3.445162, 99.315436],



    // kembali ke titik awal untuk menutup poligon
  ];

  // Tambahkan garis batas dengan garis putus-putus
  L.polyline(boundaryCoordinates, { dashArray: '5, 5', color: 'red' }).addTo(map);
</script>



<br>









<?php
include 'footer.php';
?>