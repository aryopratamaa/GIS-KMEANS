<?php
include 'header.php';

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=="tambah") {
		?>

		<main id="main">
			<section id="contact" class="contact">
				<div class="container">

					<ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<li><span class="fa fa-clone" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Berita</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Tambah Data</li>
					</ol>

					<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">
							

							<div class="modal-body">
								<form action="berita-proses?proses=proses-tambah" method="post" enctype="multipart/form-data">


									<div class="form-group">
										<label>Judul</label>
										<input name="judul"  type="text" class="form-control" placeholder="judul" autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<br>

									<div class="form-group">
										<label>Tanggal</label>
										<input name="tgl_berita"  type="date" class="form-control"  autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<br>

									<div class="form-group">
										<label>Foto</label>
										<input type="file" class="form-control" name="foto" autocomplete="off"></td>
										<i style="color:red; font-size:13px;">*upload foto dengan extensi jpg. png. jpeg. maximal size 10Mb</i>
									</div>
									<br>

									<div class="form-group">
										<label>Keterangan</label>
										<td><textarea rows='4' cols='50' class='form-control' name='keterangan' type='text' required onsubmit="this.setCustomValidity('')"></textarea></td>
									</div>
									<hr>

									<div class="modal-footer">
										<a href="berita" class="btn btn-primary" type="button"data-dismiss="modal">Batal</a>&nbsp;
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
						<li><span class="fa fa-address-book" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Berita</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Ubah Data</li>
					</ol>


					<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">
							
							<?php
							$id_berita=$_GET['id_berita'];
							$det=mysqli_query($conn,"SELECT * FROM tbl_berita where id_berita='$id_berita'");
							while($d=mysqli_fetch_array($det)){
								?>					
								<form action="berita-proses?proses=proses-ubah" method="post" enctype="multipart/form-data">
									<table class="table">
										<input type="hidden" readonly class="form-control" name="id_berita" value="<?php echo $d['id_berita'] ?>"></td>

										<tr>
											<td>Judul</td>
											<td><input name="judul" type="text" value="<?php echo $d['judul'] ?>" class="form-control"  autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
										</tr>

										<tr>
											<td>Tanggal</td>
											<td><input name="tgl_berita" type="date" value="<?php echo $d['tgl_berita'] ?>" class="form-control"  autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
										</tr>

										<tr>
											<td>Foto</td>
											<td><input name="foto" type="file" value="<?php echo $d['foto'] ?>" class="form-control"></td>
										</tr>



										<tr>
											<td>Keterangan</td>
											<td><textarea rows='4' cols='50' class='form-control' name='keterangan' type='text'><?php echo $d['keterangan'] ?></textarea></td>
										</tr>

									</table>
									<div class="modal-footer">
										<a href="berita" class="btn btn-primary" type="button" data-dismiss="modal">Batal</a>&nbsp;
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