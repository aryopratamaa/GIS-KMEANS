<?php
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == "ubah") {
		include "../assets/conn/config.php";
		$id_akun = $_POST['id_akun'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		mysqli_query($conn, "update tbl_akun set nama_lengkap='$nama_lengkap', username='$username', password='$password' where id_akun='$id_akun'");
		header("location:akun?pesan=berhasil");
	}
}

include "header.php";
?>

<section id="hero-navbar">
</section>

<main id="main">
	<section id="contact" class="contact">
		<div class="container">

			<ol class="breadcrumb"
				style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<li><span class="fa fa-gear" style="font-size: 30px;"></span>&emsp;</li>
				<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Akun</li>
				<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Ubah Akun</li>
			</ol>


			<div class="panel panel-container"
				style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<div class="bootstrap-table">

					<?php
					if (isset($_GET['pesan'])) {
						if ($_GET['pesan'] == "berhasil") {
							echo "<div style='margin-top:5px;' class='alert alert-primary' role='alert'><center><span class='fa fa-check'>&nbsp; Data akun berhasil terubah . . .</span> </center></div>";
						}
					}
					?>

					<?php
					$username = $_SESSION['username'];
					$det = mysqli_query($conn, "select * from tbl_akun where username='$username'");
					while ($d = mysqli_fetch_array($det)) {
						?>
						<form action="akun?aksi=ubah" method="post" enctype="multipart/form-data">
							<table class="table">
								<input type="hidden" readonly class="form-control" name="id_akun"
									value="<?php echo $d['id_akun'] ?>">

								<tr>
									<td>Nama Lengkap</td>
									<td><input type="text" class="form-control" name="nama_lengkap"
											value="<?php echo $d['nama_lengkap'] ?>"></td>
								</tr>

								<tr>
									<td>Username</td>
									<td><input type="text" class="form-control" name="username"
											value="<?php echo $d['username'] ?>"></td>
								</tr>

								<tr>
									<td>Password</td>
									<td><input type="password" class="form-control" name="password"
											value="<?php echo $d['password'] ?>"></td>
								</tr>

							</table>

							<div class="text-right">
								<a href="index" class="btn btn-primary" type="button" data-dismiss="modal">Batal</a>
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

<br><br><br><br><br>

<?php
include 'footer.php';
?>