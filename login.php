<?php
// akssi login 
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == "login") {

		session_start();
		include 'assets/conn/config.php';
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM tbl_akun WHERE username='$username' AND password='$password'") or die(mysqli_error());
		$cek = mysqli_num_rows($query);

		if ($cek > 0) {

			$data = mysqli_fetch_assoc($query);



			if ($data['level'] == "Admin") {

				$_SESSION['username'] = $username;
				$_SESSION['level'] = "Admin";
				header("location:admin/index");
			} elseif ($data['level'] == "Pimpinan") {

				$_SESSION['username'] = $username;
				$_SESSION['level'] = "Pimpinan";

				header("location:pimpinan/index");
			} elseif ($data['level'] == "Masyarakat") {

				$_SESSION['username'] = $username;
				$_SESSION['level'] = "Masyarakat";

				header("location:masyarakat/index");
			}

		} else {
			header("location:login?pesan=gagal") or die(mysqli_error());
		}

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
				style="border: 1px solid; background-image: url('assets/img/bg-login.png'); background-position:center; background-position-y: 20px; box-shadow: 4px 4px 8px #888888;">


				<?php
				if (isset($_GET['pesan'])) {
					if ($_GET['pesan'] == "gagal") {
						echo "<div style='margin-top:5px;' class='alert alert-danger' role='alert'><center><span class='fa fa-times'></span> &nbsp; Login gagal !!!</center></div>";
					} elseif ($_GET['pesan'] == "berhasil") {
						echo "<div style='margin-top:5px;' class='alert alert-primary' role='alert'><center><span class='fa fa-check'></span> &nbsp; Akun anda berhasil terdaftar</center></div>";
					}
				}
				?>

				<form class="login100-form validate-form flex-sb flex-w" action="login?aksi=login" method="post"
					enctype="multipart/form-data" style=" padding: 20px;">



					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" style="background-color:#191970;">
							Login
						</button>
					</div>
				</form>
				<hr>
				<center>
					<a href="daftar">-- Daftar akun --</a>
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