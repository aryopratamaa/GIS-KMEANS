<?php
include 'header.php';

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=="tambah") {
		?>

		<main id="main">
			<section id="contact" class="contact">
				<div class="container">

					<ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<li><span class="fa fa-folder-o" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Kriteria</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Tambah Data</li>
					</ol>


					<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">
							<!-- modal input -->

							<div class="modal-body">
								<form action="kriteria-proses?proses=proses-tambah" method="post" enctype="multipart/form-data">

									<div class="form-group">
										<label>Kriteria</label>
										<input name="nama_kriteria" type="text" class="form-control" placeholder="kriteria" autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<br>

									<div class="form-group">
										<label>Keterangan</label>
										<select name="keterangan" type="text" class="form-control">
											<option selected disabled>pilih</option>
											<option>Kriminalitas</option>
											<option>Lakalantas</option>
										</select>
									</div>
									<hr>


									<div class="modal-footer">
										<a href="kriteria" class="btn btn-primary" type="button" data-dismiss="modal">Batal</a>&nbsp;
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
						<li><span class="fa fa-folder-o" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Kriteria</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Ubah Data</li>
					</ol>


					<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">
							
							<?php
							$id_kriteria=$_GET['id_kriteria'];
							$det=mysqli_query($conn,"select * from tbl_kriteria where id_kriteria='$id_kriteria'");
							while($d=mysqli_fetch_array($det)){
								?>					
								<form action="kriteria-proses?proses=proses-ubah" method="post" enctype="multipart/form-data">
									<table class="table">

										<input type="hidden" readonly class="form-control" name="id_kriteria" value="<?php echo $d['id_kriteria'] ?>">

										<tr>
											<td>Kriteria</td>
											<td><input type="text" class="form-control" name="nama_kriteria" value="<?php echo $d['nama_kriteria'] ?>"></td>
										</tr>

										<tr>
											<td>Keterangan</td>
											<td><select name="keterangan" type="text" class="form-control">
												<option selected><?php echo $d['keterangan'] ?></option>
												<option>Kriminalitas</option>
												<option>Lakalantas</option>
											</select></td>
										</tr>

									</table>
									<div class="modal-footer">
										<a href="kriteria" class="btn btn-primary" type="button" data-dismiss="modal" >Batal</a>&nbsp;
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
