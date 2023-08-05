<?php
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == "simpan") {
		include "../assets/conn/config.php";
		$tgl_kejadian = $_POST['tgl_kejadian'];
		$id_kriteria = $_POST['id_kriteria'];
		$id_kecamatan = $_POST['id_kecamatan'];
		$alamat = $_POST['alamat'];
		$ket_pengaduan = $_POST['ket_pengaduan'];

		session_start();
		$username = $_SESSION['username'];
		$det = mysqli_query($conn, "select * from tbl_akun where username='$username'");
		$d = mysqli_fetch_array($det);
		$id_akun = $d['id_akun'];

		mysqli_query($conn, "insert into tbl_pengaduan_kriminalitas(id_akun,foto,tgl_kejadian,id_kriteria,id_kecamatan,alamat,telepon,ket_pengaduan,status,sumber) values('$id_akun','-','$tgl_kejadian','$id_kriteria','$id_kecamatan','$alamat','0','$ket_pengaduan','Valid','ADMINISTRATOR')");

		//panggil data kriminalitas
		$query1 = mysqli_query($conn, "SELECT * FROM tbl_kriminalitas WHERE id_kriteria='$id_kriteria' AND id_kecamatan='$id_kecamatan'");
		$c = mysqli_fetch_array($query1);
		$row_kriminalitas = mysqli_num_rows($query1);
		$n_kriminalitas = $c['nilai'] + 1;

		//cek row kriminalitas
		if ($row_kriminalitas <= 0) {
			mysqli_query($conn, "insert into tbl_kriminalitas(id_kecamatan,id_kriteria,nilai) values('$id_kecamatan','$id_kriteria','$n_kriminalitas')");
		} else {
			mysqli_query($conn, "UPDATE tbl_kriminalitas set nilai='$n_kriminalitas' WHERE id_kriteria='$id_kriteria' AND id_kecamatan='$id_kecamatan'");
		} //keputusan cek row

		header("location:kriminalitas");
	}
}

include "header.php";
?>

<section id="hero-navbar">
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="kriminalitas?aksi=simpan" method="post" enctype="multipart/form-data">
				<div class="modal-body p-4">

					<div class="form-group">
						<label>Tanggal Kejadian</label>
						<input type="date" class="form-control" name="tgl_kejadian" autocomplete="off" required
							onsubmit="this.setCustomValidity('')"></td>
					</div>
					<br>

					<div class='form-group'>
						<label>Kejadian</label>
						<select class='form-control' name='id_kriteria' autocomplete='off'>
							<option disabled selected>Pilih</option>";
							<?php
							$b1 = mysqli_query($conn, "SELECT * from tbl_kriteria WHERE keterangan='Kriminalitas' order by id_kriteria asc");
							while ($b = mysqli_fetch_array($b1)) {
								?>

								<option value="<?php echo $b['id_kriteria'] ?>"><?php echo $b['nama_kriteria'] ?> - (<?php echo $b['keterangan'] ?>)</option>

								<?php
							}
							?>
						</select>
					</div>
					<br>

					<div class='form-group'>
						<label>Kecamatan</label>
						<select class='form-control' name='id_kecamatan' autocomplete='off'>
							<option disabled selected>Pilih</option>";
							<?php
							$b1 = mysqli_query($conn, "SELECT * from tbl_kecamatan order by id_kecamatan asc");
							while ($b = mysqli_fetch_array($b1)) {
								?>

								<option value="<?php echo $b['id_kecamatan'] ?>"><?php echo $b['nama_kecamatan'] ?></option>

								<?php
							}
							?>
						</select>
					</div>
					<br>


					<div class="form-group">
						<label>Alamat Lengkap</label>
						<td><textarea rows='4' cols='50' class='form-control' name='alamat' type='text' required
								onsubmit="this.setCustomValidity('')"></textarea></td>
					</div>
					<br>

					<div class="form-group">
						<label>Keterangan</label>
						<td><textarea rows='4' cols='50' class='form-control' name='ket_pengaduan' type='text' required
								onsubmit="this.setCustomValidity('')" maxlength="100"></textarea></td>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>



<main id="main">
	<section id="contact" class="contact">
		<div class="container">

			<ol class="breadcrumb"
				style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<li><span class="fa fa-file-zip-o" style="font-size: 30px;"></span>&emsp;</li>
				<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Kriminalitas</li>
				<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Data Kriminalitas</li>
			</ol>

			<div class="panel panel-container"
				style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<div class="bootstrap-table">
					<a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"><i
							class="fa fa-plus"></i>&emsp; Tambah Data</a>
					<br>
					<br>


					<?php
					$per_hal = 50;
					$jumlah_record = mysqli_query($conn, "SELECT COUNT(*) from tbl_kriminalitas");
					$jum = mysqli_num_rows($jumlah_record);
					$halaman = ceil($jum / $per_hal);
					$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
					$start = ($page - 1) * $per_hal;
					?>

					<table>
						<tr>
							<td>Jumlah Record</td>
							<td>
								<?php echo $jum; ?>
							</td>
						</tr>
						<tr>
							<td>Jumlah Halaman</td>
							<td>
								<?php echo $halaman; ?>
							</td>
						</tr>
					</table>

					<br>

					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<tr style="box-shadow: 2px 2px 4px #888888;">
								<th class="text-center">No</th>
								<th class="text-center">Nama Kecamatan</th>

								<?php
								$query = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='kriminalitas'");
								while ($b = mysqli_fetch_array($query)) {

									echo "
											<th class='text-center'>$b[nama_kriteria]</th>";
								}
								?>

								<th class="text-center">Opsi</th>
							</tr>

							<?php
							if (isset($_GET['cari'])) {
								$cari = $_GET['cari'];
								$data = mysqli_query($conn, "SELECT * from tbl_kecamatan where nama_kecamatan like '$cari'");
							} else {
								//untuk menampilkan data alternatif
								$data = mysqli_query($conn, "SELECT * FROM tbl_kecamatan  order by id_kecamatan");
							}

							$no = 1;
							while ($a = mysqli_fetch_array($data)) {
								$nomor = $no++;
								$kode = $a['id_kecamatan'];
								$nama = $a['nama_kecamatan'];
								$query = mysqli_query($conn, "SELECT * FROM tbl_kriminalitas WHERE id_kecamatan='" . $kode . "'");
								$result = mysqli_fetch_array($query);
								if (empty($result['id_kecamatan'])) {

								} else {


									echo "<tr>
											<td class='text-center'>$nomor</td>";
									echo "<td>$nama</td>";

									//untuk menampilkan nilai sub berdasarkan kriteria
									$query1 = mysqli_query($conn, "SELECT nilai as sub FROM tbl_kriminalitas WHERE id_kecamatan='" . $kode . "' ORDER BY id_kriteria ");
									while ($result1 = mysqli_fetch_array($query1)) {
										echo "<td class='text-center'>$result1[sub]</td>";
									}

									?>


									<td class="text-center">
										<a href="kriminalitas-det?id_kecamatan=<?php echo $a['id_kecamatan']; ?>"
											class="btn btn-primary"><span class="fa fa-eye"></span></a>

										<a href="kriminalitas-proses?id_kecamatan=<?php echo $a['id_kecamatan']; ?>&proses=proses-hapus"
											class="btn btn-success"><span class="fa fa-trash"></span></a>
									</td>
								<?php } ?>
								</tr>
							<?php
							}
							?>

						</table>
					</div>
					<ul class="pagination">
						<?php
						for ($x = 1; $x <= $halaman; $x++) {
							?>
							<li><a href="?page=<?php echo $x ?>" class="btn btn-primary"><?php echo $x ?></a></li>&emsp;
							<?php
						}
						?>
					</ul>
				</div>
			</div>

		</div>
	</section>
</main>

<?php
include 'footer.php';
?>