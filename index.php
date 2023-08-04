<?php
include 'header.php'
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
                <img src="assets/img/logo.png" class="img-fluid animated" alt="">
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





<main id="main">

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
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $image['id_berita']; ?>">
                                            <img class="img-fluid" onerror="this.src='assets/img/images-not.png'"
                                                src="assets/foto/<?php echo $image['foto']; ?>"
                                                alt="Slide <?php echo $image['id_berita']; ?>">
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
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
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
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Close</button>
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
    </section><!-- End Berita Section -->

</main>



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
        font-size: 12px;
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

<?php
// Query untuk mengambil data kecamatan dari database
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_kecamatan where nama_kecamatan like '$cari'");
} else {
    $result = mysqli_query($conn, "SELECT * FROM tbl_kecamatan order by id_kecamatan asc");
}

$fixedColors = [
    'Kecamatan Laut Tador' => '#6666c7',
    'Kecamatan Medang Deras' => '#c7507a',
    'Kecamatan Sei Suka' => '#877564',
    'Kecamatan Air Putih' => '#ccec4d',
    'Kecamatan Lima Puluh Pesisir' => '#82a9dc',
    'Kecamatan Lima Puluh' => '#f7f265',
    'Kecamatan Datuk Lima Puluh' => '#f74988',
    'Kecamatan Talawi' => '#61e95c',
    'Kecamatan Tanjung Tiram' => '#4bbba4',
    'Kecamatan Datuk Tanah Datar' => '#5a528f',
    'Kecamatan Sei Balai' => '#ef320c',
    'Kecamatan Nibung Hangus' => '#618e8d',
    // Add fixed colors for other kecamatan here
];

// Array untuk menyimpan data kecamatan
$kecamatanData = [];

while ($row = mysqli_fetch_assoc($result)) {
    $nama_kecamatan = $row['nama_kecamatan'];
    $ket_kriminalitas = $row['ket_kriminalitas'];
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
        // Check if the kecamatan name exists in the fixedColors array
        $color = isset($fixedColors[$nama_kecamatan]) ? $fixedColors[$nama_kecamatan] : '#FFFFFF';

        // Add the fixed color to the properties of the kecamatanData
        $kecamatanData[] = [
            'type' => 'Feature',
            'properties' => [
                'name' => $nama_kecamatan,
                'color' => $color // Use the fixed color instead of calling getRandomColor()
            ],
            'geometry' => [
                'type' => 'Polygon',
                'coordinates' => [$coordinatesData[$nama_kecamatan]] // Note: Wrap coordinates in another array
            ]
        ];
    }
}
// Tutup koneksi ke database
mysqli_close($conn);
?>

<br><br>
<div class="container">

    <div class="section-title">
        <h2>Peta Daerah</h2>
        <p>Kabupaten Batu Bara</p>
    </div>
</div>
<div id="map-box">
    <div id="legend">
        <h5>Keterangan Warna Kecamatan:</h5>
        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #6666c7;"></span>
            Kecamatan Laut Tador
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #c7507a;"></span>
            Kecamatan Medang Deras
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #877564;"></span>
            Kecamatan Sei Suka
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #ccec4d;"></span>
            Kecamatan Air Putih
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #82a9dc;"></span>
            Kecamatan Lima Puluh Pesisir
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #f7f265;"></span>
            Kecamatan Lima Puluh
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #f74988;"></span>
            Kecamatan Datuk Lima Puluh
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #61e95c;"></span>
            Kecamatan Talawi
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #4bbba4;"></span>
            Kecamatan Tanjung Tiram
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #5a528f;"></span>
            Kecamatan Datuk Tanah Datar
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #ef320c;"></span>
            Kecamatan Sei Balai
        </div>

        <div>
            <span style="display: inline-block; width: 12px; height: 12px; background-color: #618e8d;"></span>
            Kecamatan Nibung Hangus
        </div>

    </div>
</div>

<div id="mapid"></div>

<script type="text/javascript">
    var mapOptions = {
        center: [3.2345, 99.5265],
        zoom: 11
    };

    var map = new L.map('mapid', mapOptions);

    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    map.addLayer(layer);

    // Data GeoJSON untuk Kecamatan
    var kecamatanData = {
        "type": "FeatureCollection",
        "features": <?php echo json_encode($kecamatanData); ?>
    };

    // Menambahkan layer GeoJSON kecamatan ke peta dengan warna
    L.geoJSON(kecamatanData, {
        style: function (feature) {
            return {
                fillColor: feature.properties.color,
                weight: 6,
                opacity: 5,
                color: 'white',
                fillOpacity: 0.7
            };
        },
        onEachFeature: function (feature, layer) {
            // Menambahkan label nama kecamatan ke dalam layer
            if (feature.properties && feature.properties.name) {
                var popupContent = '' + feature.properties.name; //+
                //'<br><b>Kriminalitas: </b>' + feature.properties.ket_kriminalitas +
                //'<br><b>Lakalantas: </b>' + feature.properties.ket_lakalantas;
                layer.bindPopup(popupContent);
            }
        }
    }).addTo(map);
</script>



<?php
include 'footer.php';
?>