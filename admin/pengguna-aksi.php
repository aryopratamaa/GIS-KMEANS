<?php
include 'header.php';

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=="tambah") {
		?>

		<main id="main">
			<section id="contact" class="contact">
				<div class="container">

					<ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<li><span class="fa fa-address-book" style="font-size: 30px;"></span>&emsp;</li>
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Pengguna</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Tambah Data</li>
					</ol>

					<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">
							

							<div class="modal-body">
								<form action="pengguna-proses?proses=proses-tambah" method="post" enctype="multipart/form-data">


									<div class="form-group">
										<label>Nama Lengkap</label>
										<input name="nama_lengkap"  type="text" class="form-control" placeholder="nama lengkap" autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<br>

									<div class="form-group">
										<label>Username</label>
										<input name="username"  type="text" class="form-control" placeholder="username" autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<br>

									<div class="form-group">
										<label>Password</label>
										<input name="password"  type="password" class="form-control" placeholder="password" autocomplete="off" required onsubmit="this.setCustomValidity('')">
									</div>
									<br>

									<div class="form-group">
										<label>Level</label>
										<select name="level"  type="text" class="form-control" >
											<option selected disabled>Pilih</option>
											<option>Admin</option>
											<option>Pimpinan</option>
											<option>Masyarakat</option>
										</select>
									</div>
									<hr>

									<div class="modal-footer">
										<a href="pengguna" class="btn btn-primary" type="button"data-dismiss="modal">Batal</a>&nbsp;
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
						<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Pengguna</li>
						<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Ubah Data</li>
					</ol>


					<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
						<div class="bootstrap-table">
							
							<?php
							$id_akun=$_GET['id_akun'];
							$det=mysqli_query($conn,"SELECT * FROM tbl_akun where id_akun='$id_akun'");
							while($d=mysqli_fetch_array($det)){
								?>					
								<form action="pengguna-proses?proses=proses-ubah" method="post" enctype="multipart/form-data">
									<table class="table">
										<input type="hidden" readonly class="form-control" name="id_akun" value="<?php echo $d['id_akun'] ?>"></td>

										<tr>
											<td>Nama Lengkap</td>
											<td><input name="nama_lengkap" type="text" value="<?php echo $d['nama_lengkap'] ?>" class="form-control"  autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
										</tr>

										<tr>
											<td>Username</td>
											<td><input name="username" type="text" value="<?php echo $d['username'] ?>" class="form-control"  autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
										</tr>

										<tr>
											<td>Password</td>
											<td><input name="password" type="password" value="<?php echo $d['password'] ?>" class="form-control"  autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
										</tr>



										<tr>
											<td>Level</td>
											<td><select name="level"  type="text" class="form-control" >
												<option selected><?php echo $d['level'] ?></option>
												<option>Admin</option>
												<option>Pimpinan</option>
												<option>Masyarakat</option>
											</select></td>
										</tr>

									</table>
									<div class="modal-footer">
										<a href="pengguna" class="btn btn-primary" type="button" data-dismiss="modal">Batal</a>&nbsp;
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