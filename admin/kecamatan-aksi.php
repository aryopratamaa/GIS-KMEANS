<?php
include 'header.php';

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=="tambah") {
		?>

		<main id="main">
			<section id="contact" class="contact">
				<div class="container">

					<ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<li><span class="fa fa-newspaper-o" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Kecamatan</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Tambah Data</li>
					</ol>

					<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">
							

							<div class="modal-body">
								<form action="kecamatan-proses?proses=proses-tambah" method="post" enctype="multipart/form-data">


									<div class="form-group">
										<label>Kecamatan</label>
										<input name="nama_kecamatan"  type="text" class="form-control" placeholder="kecamatan" autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<br>

									<div class="form-group">
										<label>Longitude</label>
										<input name="longitude"  type="text" class="form-control" placeholder="0" autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<br>

									<div class="form-group">
										<label>Latitude</label>
										<input name="latitude"  type="text" class="form-control" placeholder="0" autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<hr>

									<div class="modal-footer">
										<a href="kecamatan" class="btn btn-primary" type="button"data-dismiss="modal">Batal</a>&nbsp;
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
	}elseif ($_GET['aksi']=="ubah") {
		?>

		<main id="main">
			<section id="contact" class="contact">
				<div class="container">

					<ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<li><span class="fa fa-newspaper-o" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Kecamatan</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Ubah Data</li>
					</ol>


					<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">
							
							<?php
							$id_kecamatan=$_GET['id_kecamatan'];
							$det=mysqli_query($conn,"SELECT * FROM tbl_kecamatan where id_kecamatan='$id_kecamatan'");
							while($d=mysqli_fetch_array($det)){
								?>					
								<form action="kecamatan-proses?proses=proses-ubah" method="post" enctype="multipart/form-data">
									<table class="table">
										<input type="hidden" readonly class="form-control" name="id_kecamatan" value="<?php echo $d['id_kecamatan'] ?>"></td>

										<tr>
											<td>Kecamatan</td>
											<td><input name="nama_kecamatan" type="text" value="<?php echo $d['nama_kecamatan'] ?>" class="form-control"  autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
										</tr>

										<tr>
											<td>Longitude</td>
											<td><input name="longitude" type="text" value="<?php echo $d['longitude'] ?>" class="form-control"  autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
										</tr>

										<tr>
											<td>Latitude</td>
											<td><input name="latitude" type="text" value="<?php echo $d['latitude'] ?>" class="form-control"  autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
										</tr>

									</table>
									<div class="modal-footer">
										<a href="kecamatan" class="btn btn-primary" type="button" data-dismiss="modal">Batal</a>&nbsp;
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