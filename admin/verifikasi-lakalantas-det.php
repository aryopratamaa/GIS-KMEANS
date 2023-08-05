<?php
include "header.php";
?>

<section id="hero-navbar">
</section>

<main id="main">
	<section id="contact" class="contact">
		<div class="container">

			<ol class="breadcrumb"
				style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<li><span class="fa fa-check-square-o" style="font-size: 30px;"></span>&emsp;</li>
				<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Verifikasi</li>
				<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Detail Verifikasi
					Lakalantas</li>
			</ol>

			<div class="panel panel-container"
				style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<div class="bootstrap-table">

					<table class="table">

						<?php
						$data = mysqli_query($conn, "SELECT * FROM tbl_pengaduan_lakalantas a, tbl_akun b, tbl_kriteria c, tbl_lalulintas d where a.id_akun=b.id_akun AND a.id_kriteria=c.id_kriteria AND a.id_lalulintas=d.id_lalulintas AND a.id_pengaduan='$_GET[id_pengaduan]'");
						$b = mysqli_fetch_array($data); ?>
						<tr>
							<td><b>DATA PENGADUAN</b></td>
						</tr>
						<tr>
							<td>Nama Lengkap </td>
							<td> :
								<?php echo $b['nama_lengkap'] ?>
							</td>
						</tr>

						<tr>
							<td>Telepon</td>
							<td> :
								<?php echo $b['telepon'] ?>
							</td>
						</tr>

						<tr>
							<td>Tanggal Pengaduan </td>
							<td> :
								<?php echo $b['tgl_kejadian'] ?>
							</td>
						</tr>

						<tr>
							<td>Kejadian </td>
							<td> :
								<?php echo $b['nama_kriteria'] ?>
							</td>
						</tr>

						<tr>
							<td>Lalulintas </td>
							<td> :
								<?php echo $b['nama_lalulintas'] ?>
							</td>
						</tr>

						<tr>
							<td>Alamat Lengkap </td>
							<td> :
								<?php echo $b['alamat'] ?>
							</td>
						</tr>

						<tr>
							<td class="col-md-3">Keterangan </td>
							<td align="justify">
								<?php echo $b['ket_pengaduan'] ?>
							</td>
						</tr>
						<tr>
							<td>Foto</td>
							<td> <a href="" data-bs-toggle="modal"
									data-bs-target="#exampleModal<?php echo $b['id_pengaduan']; ?>"
									class="btn btn-primary"><em class="fa fa-image"></em></a></td>
						</tr>
					</table>

					<a href="verifikasi-lakalantas" class="btn btn-success">Kembali</a>
				</div>
			</div>

		</div>
	</section>
</main>


<div class="modal fade" id="exampleModal<?php echo $b['id_pengaduan']; ?>" tabindex="-1"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Foto Pengaduan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<?php
				$query = mysqli_query($conn, "SELECT * FROM tbl_pengaduan_lakalantas WHERE id_pengaduan='$b[id_pengaduan]'");
				$a = mysqli_fetch_array($query);
				?>

				<center>
					<img onerror="this.src='../assets/img/images-zoom.png'"
						src="../assets/foto/<?php echo $a['foto'] ?>" style="width:400px; height:400px;">
				</center>

			</div>
			<br>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>