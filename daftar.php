<?php
// akssi login 
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == "daftar") {
		include 'assets/conn/config.php';
		$nama_lengkap = $_POST['nama_lengkap'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		mysqli_query($conn, "insert into tbl_akun(nama_lengkap,username,password,level) values('$nama_lengkap','$username','$password','Masyarakat')");
		header("location:login");

	}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>POLRES BATU BARA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/img/icon-maps.png" />
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css-login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/css-login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css-login/css/main.css">
</head>

<body>



	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90"
				style="border: 0px solid; background-position:center; box-shadow: 4px 4px 8px #888888;">
				<center>
					<h3>Buat Akun</h3>
				</center>

				<?php
				if (isset($_GET['pesan'])) {
					if ($_GET['pesan'] == "gagal") {
						echo "<div style='margin-top:5px;' class='alert alert-primary' role='alert'><center><span class='fa fa-times'>&nbsp; Login gagal, periksa username dan password !!!</span> </center></div>";
					}
				}
				?>

				<form class="login100-form validate-form flex-sb flex-w" action="daftar?aksi=daftar" method="post"
					enctype="multipart/form-data" style=" padding: 20px;">


					<div class="wrap-input100 validate-input m-b-16" data-validate="Nama lengkap is required">
						<input class="input100" type="text" name="nama_lengkap" placeholder="Nama Lengkap">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" style="background-color:#191970;">
							Daftar
						</button>
					</div>
				</form>
				<hr>
				<center>
					Sudah memiliki akun?<a href="login">&nbsp;&nbsp;<u>Masuk!</u></a>
				</center>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
	<script src="assets/css-login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/css-login/vendor/animsition/js/animsition.min.js"></script>
	<script src="assets/css-login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/css-login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/css-login/vendor/select2/select2.min.js"></script>
	<script src="assets/css-login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/css-login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="assets/css-login/vendor/countdowntime/countdowntime.js"></script>
	<script src="assets/css-login/js/main.js"></script>

</body>

</html>