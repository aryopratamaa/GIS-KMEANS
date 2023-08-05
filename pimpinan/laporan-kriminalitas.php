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
		body {
			font-family: "Lato", sans-serif;
			/* Menggunakan font "Roboto Slab" atau fallback ke font sans-serif */
			font-size: 14px;
		}


		.border {
			border: 2px solid #e0e0e0;
			/* Menetapkan garis tepi dengan ketebalan 2px dan warna #e0e0e0 */
			border-radius: 8px;
			/* Membuat sudut border melengkung dengan jari-jari 8px */
			padding: 20px;
			/* Memberikan ruang padding sebesar 20px di dalam elemen */
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			/* Menambahkan bayangan dengan efek pencahayaan */
		}

		.border-header {
			border-bottom: 1px solid #e0e0e0;
			/* Menetapkan garis bawah dengan ketebalan 1px dan warna #e0e0e0 */
			margin-bottom: 10px;
			/* Memberikan margin bawah sebesar 10px untuk memisahkan dengan konten berikutnya */
			padding-bottom: 5px;
			/* Memberikan ruang padding bawah sebesar 5px di dalam elemen */
			background-color: #f7f7f7;
			/* Menetapkan warna latar belakang #f7f7f7 */
		}

		.hr {
			border: none;
			/* Menghapus garis bawaan */
			height: 3px;
			/* Mengatur tinggi garis */
			background-color: #000;
			/* Mengatur warna latar belakang garis */
			margin: 10px 0;
			/* Mengatur margin atas dan bawah */
			background-image: linear-gradient(to right, #000, #000 50%, transparent 50%);
			/* Efek
		}
	</style>
</head>

<body>

	<div class="container">
		<br>
		<table>
			<tr>
				<td align="center"><img src="../assets/img/logo.png" style="width:85px; height:100px;"></td>
				<td>
					<strong>
						<h4><b>&emsp;POLRES BATU BARA</b></h4>
					</strong>
					&emsp;&nbsp;&nbsp;Jl. Perintis Kemerdekaan No.28, Lima Puluh Kota, Kec. Lima Puluh, Kabupaten Batu
					Bara, Sumatera Utara 21255<br>
					&emsp;&nbsp;&nbsp;Telepon: (021) 72120599
				</td>
			</tr>
		</table>
		<hr class="hr">
		<br>

		<center>
			<h4><b>DATA KASUS KRIMINALITAS KECAMATAN</b></h4>
		</center>

		<div class="table-responsive">
			<table class="table  table-bordered" style="font-size:12px;">
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Nama Kecamatan</th>

					<?php
					$query = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='kriminalitas'");
					while ($b = mysqli_fetch_array($query)) {

						echo "
						<th class='text-center'>$b[nama_kriteria]</th>";
					}
					?>
				</tr>

				<?php
				//untuk menampilkan data alternatif
				$data = mysqli_query($conn, "SELECT * FROM tbl_kecamatan  order by id_kecamatan");
				$no = 1;
				while ($a = mysqli_fetch_array($data)) {
					$nomor = $no++;
					$kode = $a['id_kecamatan'];
					$nama = $a['nama_kecamatan'];

					echo "<tr>";

					$qu = mysqli_query($conn, "SELECT * FROM tbl_kriminalitas WHERE id_kecamatan='" . $kode . "'");
					$res = mysqli_fetch_array($qu);

					if (empty($res['id_kecamatan'])) {

					} else {

						echo "
						<td class='text-center'>$nomor</td> 
						<td>$nama</td>";

						//untuk menampilkan nilai sub berdasarkan kriteria
						$query1 = mysqli_query($conn, "SELECT nilai as sub FROM tbl_kriminalitas WHERE id_kecamatan='" . $kode . "' ORDER BY id_kriteria ");
						while ($result1 = mysqli_fetch_array($query1)) {
							echo "<td class='text-center'>$result1[sub]</td>";
						}
					}

					?>


					</tr>
					<?php
				}
				?>

			</table>
		</div>
		<br>


		<b>BATU BARA,
			<?php echo date('d') ?>
			<?php
			$tgl_sekarang = date('Y/m/d');
			$tahun = date('Y', strtotime($tgl_sekarang));
			$bulan = date('m', strtotime($tgl_sekarang));

			if ($bulan == '01') {
				$ktr_bulan = 'Januari';
			} elseif ($bulan == '02') {
				$ktr_bulan = 'Februari';
			} elseif ($bulan == '03') {
				$ktr_bulan = 'Maret';
			} elseif ($bulan == '04') {
				$ktr_bulan = 'April';
			} elseif ($bulan == '05') {
				$ktr_bulan = 'Mei';
			} elseif ($bulan == '06') {
				$ktr_bulan = 'Juni';
			} elseif ($bulan == '07') {
				$ktr_bulan = 'Juli';
			} elseif ($bulan == '08') {
				$ktr_bulan = 'Agustus';
			} elseif ($bulan == '09') {
				$ktr_bulan = 'September';
			} elseif ($bulan == '10') {
				$ktr_bulan = 'Oktober';
			} elseif ($bulan == '11') {
				$ktr_bulan = 'November';
			} elseif ($bulan == '12') {
				$ktr_bulan = 'Desember';
			}

			echo $ktr_bulan;
			?>
			<?php echo $tahun ?>
		</b>
		<p>Tdd,</p>
		<br>
		<br>
		<br>
		<b>........................................</b>
		<br>
		<br>
		<br>

	</div>




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

<script>
	window.print();
</script>