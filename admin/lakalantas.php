<?php
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == "simpan") {
		include "../assets/conn/config.php";
		$tgl_kejadian = $_POST['tgl_kejadian'];
		$id_kriteria = $_POST['id_kriteria'];
		$id_lalulintas = $_POST['id_lalulintas'];
		$alamat = $_POST['alamat'];
		$ket_pengaduan = $_POST['ket_pengaduan'];

		session_start();
		$username = $_SESSION['username'];
		$det = mysqli_query($conn, "select * from tbl_akun where username='$username'");
		$d = mysqli_fetch_array($det);
		$id_akun = $d['id_akun'];

		mysqli_query($conn, "insert into tbl_pengaduan_lakalantas(id_akun,foto,tgl_kejadian,id_kriteria,id_lalulintas,alamat,telepon,ket_pengaduan,status,sumber) values('$id_akun','-','$tgl_kejadian','$id_kriteria','$id_lalulintas','$alamat','0','$ket_pengaduan','Valid','ADMINISTRATOR')");

		//panggil data lakalantas
		$query1 = mysqli_query($conn, "SELECT * FROM tbl_lakalantas WHERE id_kriteria='$id_kriteria' AND id_lalulintas='$id_lalulintas'");
		$c = mysqli_fetch_array($query1);
		$row_lakalantas = mysqli_num_rows($query1);
		$n_lakalantas = $c['nilai'] + 1;

		//cek row lakalantas
		if ($row_lakalantas <= 0) {
			mysqli_query($conn, "insert into tbl_lakalantas(id_lalulintas,id_kriteria,nilai) values('$id_lalulintas','$id_kriteria','$n_lakalantas')");
		} else {
			mysqli_query($conn, "UPDATE tbl_lakalantas set nilai='$n_lakalantas' WHERE id_kriteria='$id_kriteria' AND id_lalulintas='$id_lalulintas'");
		} //keputusan cek row

		header("location:lakalantas");
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
			<form action="lakalantas?aksi=simpan" method="post" enctype="multipart/form-data">
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
							$b1 = mysqli_query($conn, "SELECT * from tbl_kriteria WHERE keterangan='Lakalantas' order by id_kriteria asc");
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
						<label>Lalulintas</label>
						<select class='form-control' name='id_lalulintas' autocomplete='off'>
							<option disabled selected>Pilih</option>";
							<?php
							$b1 = mysqli_query($conn, "SELECT * from tbl_lalulintas order by id_lalulintas asc");
							while ($b = mysqli_fetch_array($b1)) {
								?>

								<option value="<?php echo $b['id_lalulintas'] ?>"><?php echo $b['nama_lalulintas'] ?>
								</option>

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
				<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Lakalantas</li>
				<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Data Lakalantas</li>
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
					$jumlah_record = mysqli_query($conn, "SELECT COUNT(*) from tbl_lakalantas");
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
								<th class="text-center">Nama lalulintas</th>

								<?php
								$query = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas'");
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
								$data = mysqli_query($conn, "SELECT * from tbl_lalulintas where nama_lalulintas like '$cari'");
							} else {
								//untuk menampilkan data alternatif
								$data = mysqli_query($conn, "SELECT * FROM tbl_lalulintas  order by id_lalulintas");
							}

							$no = 1;
							while ($a = mysqli_fetch_array($data)) {
								$nomor = $no++;
								$kode = $a['id_lalulintas'];
								$nama = $a['nama_lalulintas'];
								$query = mysqli_query($conn, "SELECT * FROM tbl_lakalantas WHERE id_lalulintas='" . $kode . "'");
								$result = mysqli_fetch_array($query);
								if (empty($result['id_lalulintas'])) {

								} else {


									echo "<tr>
											<td class='text-center'>$nomor</td>";
									echo "<td>$nama</td>";

									//untuk menampilkan nilai sub berdasarkan kriteria
									$query1 = mysqli_query($conn, "SELECT nilai as sub FROM tbl_lakalantas WHERE id_lalulintas='" . $kode . "' ORDER BY id_kriteria ");
									while ($result1 = mysqli_fetch_array($query1)) {
										echo "<td class='text-center'>$result1[sub]</td>";
									}

									?>


									<td class="text-center">
										<a href="lakalantas-det?id_lalulintas=<?php echo $a['id_lalulintas']; ?>"
											class="btn btn-primary"><span class="fa fa-eye"></span></a>
											<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
										{ location.href='lakalantas-proses?id_lalulintas=<?php echo $a['id_lalulintas']; ?>&proses=proses-hapus' }"
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