<?php
include 'header.php';

if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == "tambah") {
		?>
		
		<section id="hero-navbar">
		</section>

		<main id="main">
			<section id="contact" class="contact">
				<div class="container">

					<ol class="breadcrumb"
						style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<li><span class="fa fa-lastfm" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Lalulintas</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Tambah Data</li>
					</ol>

					<div class="panel panel-container"
						style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">

							<?php
							$carikode = mysqli_query($conn, "select max(id_lalulintas) from tbl_lalulintas");
							$datakode = mysqli_fetch_array($carikode);
							if ($datakode) {
								$nilaikode = substr($datakode[0], 2);
								$kode = (int) $nilaikode;
								$kode = $kode + 1;
								$kode_otomatis = "LS" . str_pad($kode, 2, "0", STR_PAD_LEFT);
							} else {
								$kode_otomatis = "LS01";
							}
							?>

							<div class="modal-body">
								<form action="lalulintas-proses?proses=proses-tambah" method="post"
									enctype="multipart/form-data">

									<input name="id_lalulintas" type="hidden" value="<?php echo $kode_otomatis ?>"
										class="form-control">


									<div class="form-group">
										<label>Lalulintas</label>
										<input name="nama_lalulintas" type="text" class="form-control" placeholder="lalulintas"
											autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<br>

									<div class="form-group">
										<label>Longitude</label>
										<input name="longitude" type="text" class="form-control" placeholder="0"
											autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<br>

									<div class="form-group">
										<label>Latitude</label>
										<input name="latitude" type="text" class="form-control" placeholder="0"
											autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<hr>

									<div class="modal-footer">
										<a href="lalulintas" class="btn btn-primary" type="button"
											data-dismiss="modal">Batal</a>&nbsp;
										<input type="submit" class="btn btn-success" name="simpan" value="Simpan">
									</div>
								</form>
							</div>
						</div>
					</div>

				</div>
			</section>
		</main>



		<?php
	} elseif ($_GET['aksi'] == "ubah") {
		?>

		<section id="hero-navbar">
		</section>

		<main id="main">
			<section id="contact" class="contact">
				<div class="container">

					<ol class="breadcrumb"
						style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<li><span class="fa fa-lastfm" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Lalulintas</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Ubah Data</li>
					</ol>


					<div class="panel panel-container"
						style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">

							<?php
							$id_lalulintas = $_GET['id_lalulintas'];
							$det = mysqli_query($conn, "SELECT * FROM tbl_lalulintas where id_lalulintas='$id_lalulintas'");
							while ($d = mysqli_fetch_array($det)) {
								?>
								<form action="lalulintas-proses?proses=proses-ubah" method="post" enctype="multipart/form-data">
									<table class="table">
										<input type="hidden" readonly class="form-control" name="id_lalulintas"
											value="<?php echo $d['id_lalulintas'] ?>"></td>

										<tr>
											<td>lalulintas</td>
											<td><input name="nama_lalulintas" type="text"
													value="<?php echo $d['nama_lalulintas'] ?>" class="form-control"
													autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
										</tr>

										<tr>
											<td>Longitude</td>
											<td><input name="longitude" type="text" value="<?php echo $d['longitude'] ?>"
													class="form-control" autocomplete="off" required
													onsubmit="this.setCustomValidity('')"></td>
										</tr>

										<tr>
											<td>Latitude</td>
											<td><input name="latitude" type="text" value="<?php echo $d['latitude'] ?>"
													class="form-control" autocomplete="off" required
													onsubmit="this.setCustomValidity('')"></td>
										</tr>

									</table>
									<div class="modal-footer">
										<a href="lalulintas" class="btn btn-primary" type="button"
											data-dismiss="modal">Batal</a>&nbsp;
										<input type="submit" class="btn btn-success" value="Ubah">
									</div>
								</form>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</section>
		</main>

		<?php
	}
}

?>


<?php
include 'footer.php';
?>