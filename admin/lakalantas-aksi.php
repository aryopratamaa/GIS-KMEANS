<?php
include 'header.php';

if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == "tambah") {
		?>

		<main id="main">
			<section id="contact" class="contact">
				<div class="container">

					<ol class="breadcrumb"
						style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<li><span class="fa fa-file-zip-o" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Lakalantas</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Tambah Data</li>
					</ol>


					<div class="panel panel-container"
						style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">


							<?php
							if (isset($_GET['pesan'])) {
								if ($_GET['pesan'] == "gagal") {
									echo "<div style='margin-bottom:-1px; border-radius: 15px;' class='alert alert-danger' role='alert'><span class='fa fa-times'></span> Data gagal tersimpan !!!</div><hr>";
								}
							}
							?>

							<div class="modal-body">
								<form action="lakalantas-proses?proses=proses-tambah" method="post"
									enctype="multipart/form-data">

									<div class='form-group'>
										<label>Kecamatan</label>
										<select class='form-control' name='id_kecamatan' autocomplete='off'>
											<option disabled selected>Pilih</option>";
											<?php
											$b1 = mysqli_query($conn, "SELECT * from tbl_kecamatan order by id_kecamatan asc");
											while ($b = mysqli_fetch_array($b1)) {
												?>

												<option value="<?php echo $b['id_kecamatan'] ?>"><?php echo $b['nama_kecamatan'] ?>
												</option>

												<?php
											}
											?>
										</select>
									</div>
									<br>



									<?php
									$hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas' ORDER BY id_kriteria");
									while ($baris = mysqli_fetch_array($hasil)) {
										$idK = $baris['id_kriteria'];
										$labelK = $baris['nama_kriteria'];

										echo "<div class=form-group>
										<label>" . $labelK . "</label>";
										echo "<input type='number' name=" . $idK . " class='form-control' placeholder='0'><br>";

									}

									?>
									<hr>

									<div class="modal-footer">
										<a href="lakalantas" class="btn btn-primary" type="button"
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

		<main id="main">
			<section id="contact" class="contact">
				<div class="container">

					<ol class="breadcrumb"
						style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<li><span class="fa fa-file-zip-o" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Lakalantas</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Ubah Data</li>
					</ol>


					<div class="panel panel-container"
						style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">


							<form action="lakalantas-proses?proses=proses-ubah" method="post" enctype="multipart/form-data">
								<table class="table">

									<tr>
										<td>Kecamatan</td>
										<?php
										$id_kecamatan = $_GET['id_kecamatan'];
										$a1 = mysqli_query($conn, "SELECT * FROM tbl_kecamatan WHERE id_kecamatan='$id_kecamatan'");
										$a = mysqli_fetch_array($a1);
										?>
										<td><select class="form-control" name="id_kecamatan">
												<option selected="" value="<?php echo $a['id_kecamatan'] ?>"><?php echo $a['nama_kecamatan'] ?></option>

												<?php
												$a2 = mysqli_query($conn, "SELECT * FROM tbl_kecamatan ORDER BY id_kecamatan asc");
												while ($aa = mysqli_fetch_array($a2)) {
													?>

													<option value="<?php echo $aa['id_kecamatan'] ?>"><?php echo $aa['nama_kecamatan'] ?></option>
													<?php
												}
												?>
											</select></td>
									</tr>

									<?php
									$hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas' ORDER BY id_kriteria");
									while ($baris = mysqli_fetch_array($hasil)) {
										$idK = $baris['id_kriteria'];
										$labelK = $baris['nama_kriteria'];
										$id_kecamatan = $_GET['id_kecamatan'];
										$hasil3 = mysqli_query($conn, "SELECT * FROM tbl_lakalantas WHERE id_kriteria='" . $idK . "' AND id_kecamatan='" . $id_kecamatan . "'");
										$result3 = mysqli_fetch_array($hasil3);
										$sub = $result3['nilai'];


										echo "<tr>
										<td>" . $labelK . "</td>";

										echo "<td><input type='number' name=" . $idK . " class='form-control' value=" . $sub . ">
										</td></tr>";
									}

									?>


								</table>
								<div class="modal-footer">
									<a href="lakalantas" class="btn btn-primary" type="button"
										data-dismiss="modal">Batal</a>&nbsp;
									<input type="submit" class="btn btn-success" value="Ubah">
								</div>
							</form>

						</div>
					</div>
				</div>
				</div>
		</main>
		</div>

	<?php
	}
}

?>


<?php
include 'footer.php';
?>